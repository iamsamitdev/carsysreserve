@extends('backend.templates.login_register')
@section('title_page')Register @endsection

@section('content')
<div class="login-box card">
        <div class="card-body">
            <form method="post" class="form-horizontal form-material" id="loginform" action="{{route('register')}}">
                @csrf
                <h3 class="box-title m-b-20">ลงทะเบียน</h3>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="fullname" value="{{old('fullname')}}" placeholder="Fullname">
                        @if($errors->has('fullname'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('fullname')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="email" value="{{old('email')}}" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                        @if($errors->has('password_confirmation'))
                        <span class="text-danger" role="alert">
                            <strong>{{$errors->first('password_confirmation')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="tel" value="{{old('tel')}}" placeholder="Tel">
                            @if($errors->has('tel'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('tel')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-success p-t-0 p-l-10">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> ฉันยอมรับเงื่อนไข <a href="#">อ่านเงื่อนไข</a></label>
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
                        <p>มีบัญชีอยู่แล้ว ? <a href="{{url('login')}}" class="text-info m-l-5"><b>เข้าสู่ระบบ</b></a></p>
                    </div>
                </div>
            </form>
            
        </div>
      </div>
@endsection