<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function show($id){
        $event = DB::table('events')->where('id',$id)->first();
        return view('event', ['event' => $event]);
    }

    public function createEvent()
    {
        return view('createEvent');
    }

    public function storeEvent()
    {
        
    }
}