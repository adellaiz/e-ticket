<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventDetailedResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        return response()->json([
            'success' => true,
            'data' => EventResource::collection(Event::all()),
        ]);
    }

    public function show($id){
        $event = Event::find($id);

        if(!$event){
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new EventDetailedResource($event),
        ]);
    }
}
