@extends('layouts.main')

@section('login-container')
    <div class="bg">
        <div class="container">
            <h1 class="mb-4 text-center">Login</h1>
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" />
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="#" class="btn btn-forgot">Lupa Password?</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-login w-100" type="submit" name="login">
                            <i class="fas fa-sign-in-alt"></i> Masuk
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if (session()->has('loginFailed'))
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                {{ session('loginFailed') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
