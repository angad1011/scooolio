@extends('layouts.login')
@section('content')
  <div class="container px-sm-10">
        <div class="grid columns-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="g-col-2 g-col-xl-1 d-none d-xl-flex flex-column min-vh-screen">
                <a href="" class="-intro-x d-flex align-items-center pt-5">
                    <img alt=" " class="w-100" src="dist/images/logo.svg">
                    <!-- <span class="text-white fs-lg ms-3"> Ru<span class="fw-medium">bick</span> </span> -->
                </a>
                <div class="my-auto">
                    <img alt=" " class="-intro-x w-1/2 mt-n16" src="dist/images/illustration.svg">
                    <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10">
                        A few more clicks to
                        <br>
                        sign in to your account.
                    </div>
                    <div class="-intro-x mt-5 fs-lg text-white text-opacity-70 dark-text-gray-500">Centralize all your
                        accounts within a single location for school/college management</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="g-col-2 g-col-xl-1 h-screen h-xl-auto d-flex py-5 py-xl-0 my-10 my-xl-0">
                <div
                    class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
                    <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start"> Sign In As</h2>
                     @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          @foreach ($errors->all() as $error)
                          {{ $error }}.
                         @endforeach 
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                     @csrf    
                    <!-- <div class="mt-3">
                        <div class="d-flex flex-coloumn flex-sm-row mt-2">
                            <div class="form-check me-2">
                                <input id="radio-switch-4" class="form-check-input" checked type="radio"
                                    name="horizontal_radio_button" value="horizontal-radio-chris-evans">
                                <label class="form-check-label" for="radio-switch-4">Admin</label>
                            </div>
                            <div class="form-check me-2 mt-2 mt-sm-0"> <input id="radio-switch-5"
                                    class="form-check-input" type="radio" name="horizontal_radio_button"
                                    value="horizontal-radio-liam-neeson"> <label class="form-check-label"
                                    for="radio-switch-5">School/College</label> </div>
                        </div>
                    </div> -->
                    <div class="intro-x mt-2 text-gray-500 d-xl-none text-center">Centralize all your accounts within a
                        single location for school management</div>
                    <div class="intro-x mt-8">
                        <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block"
                            placeholder="Email" name="email" required>
                        <input type="password"
                            class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4"
                            placeholder="Password" name="password" required>
                    </div>
                    <div class="intro-x d-flex text-gray-700 dark-text-gray-600 fs-xs fs-sm-sm mt-4">
                        <div class="d-flex align-items-center me-auto">
                            <input id="remember-me" type="checkbox" class="form-check-input border me-2">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div>
                        <a href="">Forgot Password?</a>
                    </div>
                    <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                       <!--  <a href="{{ route('dashboards.index') }}"
                            class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Login</a> -->
                        <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top" type="submit">Login</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection