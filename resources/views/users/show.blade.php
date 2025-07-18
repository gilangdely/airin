<x-layout.app title="Detail user" activeMenu="users.show">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('User') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Detail user information.') }}
                        </p>
                    </div>

                    <x-ui.breadcrumb>
                        <li class="breadcrumb-item">
                            <a href="/">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('users.index') }}">{{ __('User') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('Detail') }}
                        </li>
                    </x-ui.breadcrumb>
                </div>
            </div>
 
            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <div class="avatar avatar-xl">
                                                    @if (!$user->avatar)
                                                        <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}"
                                                            alt="Avatar" class="rounded img-fluid">
                                                    @else
                                                        <img src="{{ asset('storage/uploads/avatars/' . $user->avatar) }}"
                                                            alt="Avatar" class="rounded img-fluid">
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="fw-bold">{{ __('Email') }}</td>
                                            <td>{{ $user->email ?? '-' }}</td>
                                        </tr> --}}
                                        <tr>
                                            <td class="fw-bold">{{ __('Role') }}</td>
                                            <td>{{ $user->getRoleNames()->toArray() !== [] ? $user->getRoleNames()[0] : '-' }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="fw-bold">{{ __('Unit Sekolah') }}</td>
                                            <td>{{ $user->unit_sekolah->nama_unit_sekolah ?? '-' }}
                                            </td>
                                        </tr> --}}
                                        {{-- <tr>
                                        <td class="fw-bold">{{ __('Email verified at') }}</td>
                                        <td>{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i:s') : '-' }}
                                        </td>
                                    </tr> --}}
                                        <tr>
                                            <td class="fw-bold">{{ __('Created at') }}</td>
                                            <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">{{ __('Updated at') }}</td>
                                            <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout.app>
