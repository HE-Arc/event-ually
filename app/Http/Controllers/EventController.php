<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function participate($idUser,$id)
    {
        DB::table('participates')->insert(
            ['idUser' => auth()->user()->id,
             'idEvent' => $id]
        );
        return redirect('/');

    }

    public function storeEvent(Request $request)
    {


        $validator = Validator::make($request->all(),
            array(
                'name' => 'required',
                'description' => 'required', 
                'place' => 'required',
                'date' => 'required|date',
                'image' => 'mimes:jpeg,jpg,png'
            )
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

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