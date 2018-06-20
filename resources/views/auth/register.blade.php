@extends('backend.templates.login_register')
@section('title_page')Register @endsection

@section('content')
<div class="login-box card">
        <div class="card-body">
                <form method="post" action="{{ route('register') }}" class="form-horizontal form-material" >

                    @csrf

                <h3 class="box-title m-b-20">ลงทะเบียน</h3>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" placeholder="Fullname" value="{{ old('fullname') }}" >

                        @if ($errors->has('fullname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="E-Mail Address">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password again">
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control {{ $errors->has('tel') ? ' is-invalid' : '' }}" type="text" name="tel" placeholder="Tel">
                            @if ($errors->has('tel'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel') }}</strong>
                            </span>
                        @endif
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-success p-t-0 p-l-10">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>มีบัญชีอยู่แล้ว ? <a href="{{ route('login') }}" class="text-info m-l-5"><b>เข้าสู่ระบบ</b></a></p>
                    </div>
                </div>
            </form>
            
        </div>
      </div>
@endsection