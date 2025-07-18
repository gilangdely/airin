<x-layout.app title="Perbarui user" activeMenu="users.edit">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('User') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Edit an user.') }}
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
                            {{ __('Edit') }}
                        </li>
                    </x-ui.breadcrumb>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('users.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @include('users.include.form')

                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

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
