@extends('backend.templates.login_register')
@section('title_page')Register @endsection

@section('content')
<div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" action="index.html">
                <h3 class="box-title m-b-20">Sign Up</h3>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Name">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Confirm Password">
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
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{url('backend/login')}}" class="text-info m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
            
        </div>
      </div>
@endsection