<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Event;

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

    public function storeEvent(Request $request)
    {
        DB::table('events')->insert(
            ['name' => $request->name, 
            'description' => $request->description, 
            'place' => $request->place, 
            'date' => $request->date,
            'idCategory' => $request->category,
            'idUser' => auth()->user()->id
            ]
        );

        return redirect('/');
    }
}