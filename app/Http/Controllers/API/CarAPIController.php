<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;

// Load Model Car
use App\Car;
use Validator;

class CarAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return $this->sendResponse($cars->toArray(), "Car retrived successfully.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'license' => 'required',
            'cartype' => 'required',
            'carseat' => 'required',
            'carlevel' => 'required',
            'owner' => 'required',
            'responsibility' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{
            // Insert data to table events
            $cars = Car::create($input);
            return $this->sendResponse($cars->toArray(), "Car create successfully.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::find($id);

        if(is_null($cars)){
            return $this->sendError('Car not found.');
        }

        return $this->sendResponse($cars->toArray(), "Car retrived successfully.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'license' => 'required',
            'cartype' => 'required',
            'carseat' => 'required',
            'carlevel' => 'required',
            'owner' => 'required',
            'responsibility' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{
            // ค้นหารายที่ต้องการอัพเดท
            $cars = Car::find($id);
           if(is_null($cars)){
                return $this->sendError('Car not found.');
           }else{
                $cars->license = $input['license'];
                $cars->cartype = $input['cartype'];
                $cars->carseat = $input['carseat'];
                $cars->carlevel = $input['carlevel'];
                $cars->owner = $input['owner'];
                $cars->responsibility = $input['responsibility'];
                $cars->save();
                return $this->sendResponse($cars->toArray(), "Car update successfully.");
           }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = Car::find($id);
        if(is_null($cars)){
            return $this->sendError('Car not found.');
        }else{
            $cars->delete();
            return $this->sendResponse($id, "This data delete successfully.");
        }
    }
}
