<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\{HasMiddleware, Middleware};
use Illuminate\Support\Facades\Log;

class UsersController extends BaseController implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:user view', only: ['index', 'show']),
            new Middleware('permission:user create', only: ['store']),
            new Middleware('permission:user edit', only: ['update']),
            new Middleware('permission:user delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of users.
     */
    public function index(Request $request): JsonResponse
    {
        $query = User::query()->select('users.*');

        if ($request->has('nama')) {
            $query->where('siswa.nama', 'LIKE', '%' . $request->input('nama') . '%');
        }

        if ($request->has('role_id')) {
            $query->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->where('model_has_roles.role_id', '=', $request->role_id)
                ->where('model_has_roles.model_type', '=', User::class)
                ->select('users.*')
                ->distinct();
        }

        $users = $query->orderBy('updated_at', 'desc')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'unique:users,username'],
            'role' => ['required', 'exists:roles,id'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        try {
            return DB::transaction(function () use ($request, $validated) {
                $validated['password'] = Hash::make($request->password);

                $user = User::create($validated);
                $role = Role::select('id', 'name')->find($request->role);
                $user->assignRole($role->name);

                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully',
                    'data' => $user
                ], 201);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified user.
     */
    public function show(User $user): JsonResponse
    {
        $user->load('roles:id,name');

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'unique:users,username,' . $user->id],
            'role' => ['required', 'exists:roles,id'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        try {
            return DB::transaction(function () use ($request, $user, $validated) {
                if (!$request->password) {
                    unset($validated['password']);
                } else {
                    $validated['password'] = Hash::make($request->password);
                }

                $user->update($validated);
                $role = Role::select('id', 'name')->find($request->role);
                $user->syncRoles($role->name);

                return response()->json([
                    'success' => true,
                    'message' => 'User updated successfully',
                    'data' => $user
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified user.
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            return DB::transaction(function () use ($user) {
                $user->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'User deleted successfully'
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "The user can't be deleted because it's related to another table",
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update authenticated user's profile
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $user = auth()->user();
        $validated = $this->validateProfileUpdate($request, $user);

        if ($request->hasFile('users_picture')) {
            $validated['users_picture'] = $this->handleProfilePicture($request->file('users_picture'), $user);
        }

        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    private function validateProfileUpdate(Request $request, $user): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'users_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);
    }

    private function handleProfilePicture($file, $user): string
    {
        $filename = "profile_{$user->id}." . $file->getClientOriginalExtension();
        $file->storeAs('profile-pictures', $filename, 'public');
        return $filename;
    }
}
