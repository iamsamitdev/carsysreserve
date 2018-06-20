@extends('backend.templates.login_register')
@section('title_page')Login @endsection

@section('content')
<div class="login-box card">
        <div class="card-body">
            <form method="post" class="form-horizontal form-material" id="loginform" action="{{route('login')}}">
                @csrf
                <h3 class="box-title m-b-20">เข้าสู่ระบบ</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" id="email" type="text" value="{{old('email')}}" placeholder="Email"> 
                        @if($errors->has('email'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" placeholder="Password"> 
                        @if($errors->has('password'))
                            <span class="text-danger" role="alert">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> จำข้อมูลไว้ </label>
                        </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> ลืมรหัสผ่านหรือเปล่า?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>ยังไม่ได้ลงทะเบียนหรือเปล่า ? <a href="{{url('register')}}" class="text-info m-l-5"><b>สมัครสมาชิกที่นี่</b></a></p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>ขอรีเซ็ตรหัสผ่าน</h3>
                        <p class="text-muted">ระบบจะส่งรหัสผ่านไปให้ทางอีเมล์ที่ลงทะเบียนไว้ </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email"> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-md btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
@endsection