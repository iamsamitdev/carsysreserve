@extends('backend.templates.master')
@section('title_page')ข้อมูลรถในระบบ @endsection
@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">ข้อมูลรถในระบบ</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">ข้อมูลรถในระบบ</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center text-right">
        <a  class="btn btn-md btn-success" href="{{url('backend/addcar')}}" role="button">เพิ่มรถใหม่</a>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr class="bg-success text-white">
            <th>ID</th>
            <th>Image</th>
            <th>License</th>
            <th>Type</th>
            <th>Seat</th>
            <th>Level</th>
            <th>Owner</th>
            <th>Resibility</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars['data'] as $car)
        <tr>
            <td>{{$car['id']}}</td>
            <td><img src="{{asset('assets/images/car')}}/{{$car['carimg_1']}}" height="50"></td>
            <td>{{$car['license']}}</td>
            <td>{{$car['cartype']}}</td>
            <td>{{$car['carseat']}}</td>
            <td>{{$car['carlevel']}}</td>
            <td>{{$car['owner']}}</td>
            <td>{{$car['responsibility']}}</td>
            <td>
                <a href="#" class="btn btn-sm btn-success">View</a>
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection