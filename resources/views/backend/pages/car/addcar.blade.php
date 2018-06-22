@extends('backend.templates.master')
@section('title_page')เพิ่มรายการรถใหม่ @endsection
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">เพิ่มรายการรถใหม่</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">เพิ่มรายการรถใหม่</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center text-right">
        <a  class="btn btn-md btn-primary" href="{{url('backend/cardetails')}}" role="button">กลับหน้ารายการถ</a>
    </div>
</div>

<div class="card card-outline-info">
        <div class="card-body">
            <form action="{{url('backend/addcarprocess')}}" method="post" class="form-horizontal" name="addevent_form" id="addevent_form" enctype="multipart/form-data">
                @csrf
                <div class="form-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">License</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="license" id="license">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Car type</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="cartype" id="cartype">
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Car Seat</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="carseat" id="carseat">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Car Level</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="carlevel" id="carlevel">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Car Image</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="carimg_1" id="carimg_1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Car Owner</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="owner" id="owner">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Responsibility</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="responsibility" id="responsibility">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Car Status</label>
                                    <div class="col-md-10">
                                        <select class="form-control custom-select" name="status" id="status">
                                            <option value="">-- Select status -- </option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </div>


            </form>
        </div>
    </div>
</div>


@endsection