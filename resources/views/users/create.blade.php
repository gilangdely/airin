<x-layout.app title="Tambah user" activeMenu="users.create">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('User') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Create a new user.') }}
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
                            {{ __('Create') }}
                        </li>
                    </x-ui.breadcrumb>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    @include('users.include.form')

                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout.app>
