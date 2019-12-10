<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Event;

use App\Participate;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::find($id);
        return view('event')->with('event',$event);
    }

    public function create()
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

    public function getEventFromIdUser()
    {
        $events = Event::join('participates','events.id','=','participates.idEvent')->where('participates.idUser',auth()->user()->id)->get();
        return view('profile',['events'=>$events]);

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
        $path = Storage::putFile('images', $request->file('image'));
        $event->image = 'storage/'.$path;
        $event->idUser = auth()->user()->id;

        $event->save();

        return redirect('/');    
    }


    public function searchEvent(Request $request,$value)
    {
        if($value=="null")
        {
            $events = DB::table('events')->paginate(10);
            $value="";
        }
        else
        {
            $events = DB::table('events')->where('name', 'like', '%'.$value.'%')->paginate(10);
        }
        //https://youtu.be/2U1t9f-64_4?t=494 pour rechercher sur les autres champs
        //$events->withPath("/");
        if($request->has('page'))
        {
            return view('welcome', ['events' => $events]);
        }

        $out = '<div class="flex-container" >';
        foreach($events as $event)
        {
            $out .= '<div class="flex-item">';
            $out .= '<p class="nameEvent">'. $event->name .'</p>';
            $out .= '<p class="descriptionEvent">'. $event->description .'</p>';
            $out .= '<p class="placeEvent">Localisation: '. $event->place .'</p>';
            $out .= '<p class="dateEvent">,le '. $event->date .'</p>';
            $out .= '<p></p>';
            $out .= '<a href="events/'. $event->id .'">Détails</a>';
            $out .= '</div>';
        }
        $out .= '</div>';
        $out .= '<div>'. $events->links() .'</div>';
        return response($out);
    }
}