@extends('backend.templates.master')
@section('title_page')Calendars @endsection
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">ปฏิทินการจองรถ</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">หน้าหลัก</a></li>
                <li class="breadcrumb-item active">ปฏิทินการจองรถ</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center text-right">
            <a  class="btn btn-md btn-success" href="#modal-add-event" data-toggle="modal" role="button">เพิ่มข้อมูลการจอง</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <!-- Modal Add new event-->
<div class="modal fade" id="modal-add-event" tabindex="1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-add-event">เพิ่มกิจกรรมใหม่</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-body">
                                <form action="#" class="form-horizontal" name="addevent_form" id="addevent_form">

                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-4">Title</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="title" id="title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-4">Description</label>
                                                        <div class="col-md-8">
                                                              <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-4">Start</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="start" id="start" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="control-label text-right col-md-4">End</label>
                                                            <div class="col-md-8">
                                                                    <input type="text" name="end" id="end" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-4">Color mark</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control custom-select" name="className" id="className">
                                                                <option value="">-- Select color -- </option>
                                                                <option value="bg-success">Green</option>
                                                                <option value="bg-danger">Red</option>
                                                                <option value="bg-primary">Blue</option>
                                                                <option value="bg-warning">Yellow</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="control-label text-right col-md-4">Status</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control custom-select" name="status" id="status">
                                                                <option value="">-- Select status -- </option>
                                                                <option value="1">Active</option>
                                                                <option value="0">InActive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn_submit">บันทึกรายการ</button>
        </div>
        </div>
    </div>
    </div>
</div>

    <!--POPUP SHOW Calendar detail-->
      <!-- Modal -->
      <div class="modal fade" id="detailModal" tabindex="1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

@endsection