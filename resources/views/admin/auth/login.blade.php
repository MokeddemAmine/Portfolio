@extends('admin.layouts.app-auth')
@section('title','dashboard login')
    
@section('content')
            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2 text-capitalize">{{_('We Are web developers')}}</h1>
                                        <p>{{_('Welcome back, please login to your account.')}}</p>
                                        @if (session('successMessage'))
                                            <strong class="text-success mb-3">{{session('successMessage')}}</strong>
                                        @endif
                                        <form action="{{route('admin.dashboard.logins.store')}}" method="post" class="mt-3 mt-sm-5">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('email')}}*</label>
                                                        <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{_('email')}}" />
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('email') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('password')}}*</label>
                                                        <input type="password" name="password" class="form-control" placeholder="{{_('Password')}}" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input @error('remember_me') is-invalid @enderror" name="remember_me" value="remember" type="checkbox" id="gridCheck">
                                                            <label class="form-check-label text-capitalize" for="gridCheck">
                                                                {{_('remember me')}}
                                                            </label>
                                                        </div>
                                                        <a href="{{route('admin.dashboard.forgot_password')}}" class="ml-auto text-capitalize">{{_('forgot password ?')}}</a>
                                                    </div>
                                                    @if(session('errorMessage'))
                                                        <strong class="text-danger my-3">{{session('errorMessage')}}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">{{_('sign in')}}</button>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>{{_("Don't have an account ?")}}<a href="{{route('admin.dashboard.register')}}" class="text-capitalize"> {{_('sign up')}}</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="{{asset('admin/assets/img/bg/login.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
@endsection
