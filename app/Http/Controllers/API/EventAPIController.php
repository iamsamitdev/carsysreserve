<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;

// Load Model
use App\Event;
use Validator;

class EventAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return $this->sendResponse($events->toArray(), "Events retrived successfully.");
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
            'title' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{
            // Insert data to table events
            $events = Event::create($input);
            return $this->sendResponse($events->toArray(), "Events create successfully.");
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
        $events = Event::find($id);

        if(is_null($events)){
            return $this->sendError('Event not found.');
        }

        return $this->sendResponse($events->toArray(), "Events retrived successfully.");
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
            'title' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{
            // ค้นหารายที่ต้องการอัพเดท
            $events = Event::find($id);
           if(is_null($events)){
                return $this->sendError('Event not found.');
           }else{
                $events->title = $input['title'];
                $events->description = $input['description'];
                $events->start = $input['start'];
                $events->end = $input['end'];
                $events->status = $input['status'];
                $events->save();
                return $this->sendResponse($events->toArray(), "Events update successfully.");
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
        $events = Event::find($id);
        if(is_null($events)){
            return $this->sendError('Event not found.');
        }else{
            $events->delete();
            return $this->sendResponse($id, "This data delete successfully.");
        }
    }
}
