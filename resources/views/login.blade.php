@extends('layouts.login')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <!-- Basic login form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center"><h3 class="fw-light my-4">{{ __('Login') }}</h3></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger border-left-danger" role="alert">
                            <ul class="pl-4 my-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Login form-->
                    <form method="POST" action="{{ route('signin') }}" class="user">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('E-mail') }}" value="{{ old('email') }}" required autofocus>
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Senha') }}" required>
                        </div>
                        <!-- Form Group (remember password checkbox)-->
                        {{-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                            </div>
                        </div> --}}
                        <!-- Form Group (login box)-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center"></div>
            </div>
        </div>
    </div>
</div>
@endsection
