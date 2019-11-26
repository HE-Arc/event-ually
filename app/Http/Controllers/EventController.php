<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Event;

use App\Participate;

class EventController extends Controller
{
    public function show($id){
        $event = Event::find($id);
        return view('event')->with('event',$event);
    }

    public function createEvent()
    {
        return view('createEvent');
    }

    public function participate($idUser,$id)
    {
        if(Participate::where('idUser',auth()->user()->id)->where('idEvent',$id)->exists()) {
            Participate::where('idUser',auth()->user()->id)->where('idEvent',$id)->delete();
        }
        else
        {
            $participate = new Participate;
            $participate->idUser = auth()->user()->id;
            $participate->idEvent = $id;
            $participate->save();
            
        }
        
        return redirect()->back();


    }

    public function store(Request $request)
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
        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->place=$request->input('place');
        $event->date = $request->input('date');
        $event->idCategory = $request->input('category');
        $event->idUser = auth()->user()->id;

        $event->save();


        return redirect('/');    
    }
}