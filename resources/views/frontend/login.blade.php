@extends('layouts.login_master')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{ asset('/login') }}/images/5.jpeg);">
                <span class="login100-form-title-1">
                    {{ __('POS Software Login') }}
                </span>
            </div>
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">@csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                           placeholder="Enter username" value="{{ old('email') }}" autocomplete="off" autofocus>
                    @error('email')
                    <span class="focus-input100">{{ $message }}</span>
                    @enderror
                </div>
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                           placeholder="Enter password"  autocomplete="off">
                    @error('password')
                    <span class="focus-input100">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
<!--            <div class="container w-full p-b-15 txt1">
                Copyright &copy; <script>document.write(new Date().getFullYear());</script>&nbsp;
                <a href="javascript:void(0)">{{ config('app.name') }}</a> - All rights reserved .
                <div class="float-right">
                    Developed By :&nbsp;<a href="https://mahdi.infrequentbd.com/" target="_blank">Mahdi Hasan</a> .
                </div>
            </div>-->
            <div class="container text-center p-b-15 txt1">
                Copyright &copy; <script>document.write(new Date().getFullYear());</script>&nbsp;
                <a href="javascript:void(0)">{{ config('app.name') }}</a> - All rights reserved .
                <br>
                Developed By :&nbsp;<a href="https://mahdi.infrequentbd.com/" target="_blank">Mahdi Hasan</a> .
            </div>
        </div>
    </div>
</div>
@endsection
