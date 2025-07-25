<x-layout.app title="Detail role" activeMenu="roles.show">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('Role') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Detail role information.') }}
                        </p>
                    </div>

                    <x-ui.breadcrumb>
                        <li class="breadcrumb-item">
                            <a href="/">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('roles.index') }}">{{ __('Role') }}</a>
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
                                    <table class="table table-hover table-striped">
                                        <tr>
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $role->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">{{ __('Permissions') }}</td>
                                            <td>
                                                <ul class="mb-0 list-inline">
                                                    @foreach ($role->permissions as $permission)
                                                        <li class="list-inline-item ">• {{ $permission->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">{{ __('Created at') }}</td>
                                            <td>{{ $role->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">{{ __('Updated at') }}</td>
                                            <td>{{ $role->updated_at->format('Y-m-d H:i:s') }}</td>
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
