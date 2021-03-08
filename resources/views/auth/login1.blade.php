@extends('layouts.apps')

@section('content')
    <h3 class="text-center mt-0 m-b-15">
        <a href="index.html" class="logo logo-admin"><img src={{ asset('assets/images/sintang.png') }} height="100 px"
                alt="logo"></a> <br>
        {{-- <h2 class="text-center">Login <br> SIANTRI</h2> --}}
    </h3>

    <div class="p-3">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <form class="form-horizontal m-t-20" action="index.html">

                <div class="form-group row">
                    <div class="col-12">
                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                            placeholder="Username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                </div>

                {{-- <div class="form-group m-t-10 mb-0 row">
                    <div class="col-sm-7 m-t-20">
                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your
                                password ?</small></a>
                    </div>
                    <div class="col-sm-5 m-t-20">
                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i>
                            <small>Create an account ?</small></a>
                    </div>
                </div> --}}
            </form>

    </div>

@endsection
