@extends('admin.layouts.app-auth')
@section('title','dashboard register')
    
@section('content')
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="register p-5">
                                        <h1 class="mb-2">{{_("We are web developers")}}</h1>
                                        <p>{{_('Welcome, Please create your account.')}}</p>
                                        <form action="{{route('admin.registers.store')}}" method="post" class="mt-2 mt-sm-5">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{ __('admin key') }}*</label>
                                                        <input type="text" class="form-control @error('admin_key') is-invalid @enderror" name="admin_key" placeholder="{{_('Admin Key Please')}}" />
                                                    </div>
                                                    @if ($errors->has('admin_key'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('admin_key') }}</strong>
                                                    @endif
                                                </div>
                                               
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('first Name')}}*</label>
                                                        <input type="text" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{_('First Name')}}" />
                                                    </div>
                                                    @if ($errors->has('first_name'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('first_name') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('last Name')}}*</label>
                                                        <input type="text" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{_('Last Name')}}" />
                                                    </div>
                                                    @if ($errors->has('last_name'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('last_name') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('email')}}*</label>
                                                        <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{_('Email')}}" />
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('email') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('password')}}*</label>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{_('Password')}}" />
                                                    </div>
                                                    @if ($errors->has('password'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('password') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label text-capitalize">{{_('confirm password')}}*</label>
                                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="{{_('Confirm Password')}}" />
                                                    </div>
                                                    @if ($errors->has('password_confirmation'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('password_confirmation') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input @error('terms_conditions') is-invalid @enderror" name="terms_conditions" type="checkbox" id="gridCheck" value="agree">
                                                        <label class="form-check-label" for="gridCheck">
                                                            {{_('I accept terms & policy')}}
                                                        </label>
                                                    </div>
                                                    @if ($errors->has('terms_conditions'))
                                                        <strong class="text-danger mb-3">{{ $errors->first('terms_conditions') }}</strong>
                                                    @endif
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">{{_('sign up')}}</button>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>{{_('Already have an account ?')}}<a href="{{route('admin.login')}}"> {{_("Sign In")}}</a></p>
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
                
@endsection