@extends('dashboard.layouts.auth.auth-master')
@section('title', 'Login')
@section('css')
    <style>
        .blur-background {
            backdrop-filter: blur(10px);
        }
    </style>
@endsection
@section('content')
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100"style="background-image: url('{{ asset('dashboard/assets/login-bg.png') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-11" style="width:auto">
                    <div class="card mb-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-xxl-10 mx-auto" style="position: relative; z-index: 1;">
                                <div class="card mb-0 border-0 shadow-none mb-0">
                                    <div class="card-body p-sm-100 m-lg-1">
                                        <div class="text-center mt-1">
                                            <h5 class="fs-3xl">{{ trans('Dashboard/login_trans.Welcome Back') }}</h5>
                                        </div>
                                        <div class="p-1 mt-1">

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                @if (App::getLocale() == 'ar')
                                                    <div class="mb-3" dir="rtl">
                                                    @else
                                                        <div class="mb-3">
                                                @endif
                                                <label for="email"
                                                    class="form-label">{{ trans('Dashboard/login_trans.Email') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative ">
                                                    <input type="email" name="email"
                                                        class="form-control  password-input" id="email"
                                                        :value="old('email')" placeholder="Enter email" required autofocus
                                                        autocomplete="email">

                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                        </div>

                                        @if (App::getLocale() == 'ar')
                                            <div class="mb-3" dir="rtl">
                                            @else
                                                <div class="mb-3">
                                        @endif
                                        <label class="form-label"
                                            for="password-input">{{ trans('Dashboard/login_trans.Password') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3 ">
                                            <input type="password" id="password" name="password"
                                                class="form-control pe-5 password-input " placeholder="Enter password"
                                                id="password-input" required autocomplete="current-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remember_me"
                                            name="remember">
                                        <label class="form-check-label"
                                            for="remember_me">{{ trans('Dashboard/login_trans.Remember me') }}
                                        </label>
                                    </div>
                                    <br>


                                    <button class="btn btn-primary w-100"
                                        type="submit">{{ trans('Dashboard/login_trans.login') }}</button>
                                </div>


                                </form>
                                @if (App::getLocale() == 'ar')
                                    <div class="text-center mt-5" dir="rtl">
                                    @else
                                        <div class="text-center mt-5">
                                @endif
                                {{-- <p class="mb-0">{{ trans("Dashboard/login_trans.Don't have an account ?") }} <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline">{{ trans("Dashboard/login_trans.SignUp") }} </a> </p> --}}
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        </div>
        </div>
        <!--end col-->
        </div>
        <!--end row-->
        </div>
        <!--end container-->
    </section>

@endsection
@section('script')
    <script src="{{ asset('dashboard') }}/assets/js/pages/password-addon.init.js"></script>
    <!--Swiper slider js-->
    <script src="{{ asset('dashboard') }}/assets/libs/swiper/swiper-bundle.min.js"></script>
    <!-- swiper.init js -->
    <script src="{{ asset('dashboard') }}/assets/js/pages/swiper.init.js"></script>
@endsection
