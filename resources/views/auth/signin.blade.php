@extends('auth.layouts.Master')

@section('title', 'Авторизация')

@section('content')
<div class="row">
    <div class="col-sm-9 col-lg-6 col-xl-4 mx-auto">
        <div class="card card--custom card--dark">
            <h3>Войти в аккаунт</h3>
            <form method="POST" action="{{ route('login') }}" class="mt-4" novalidate>
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') ?: '' }}">

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark w-100 mb-2">Войти <i class="fas fa-sign-in-alt ml-2"></i></button>

            </form>
        </div>
    </div>
</div>
@endsection
