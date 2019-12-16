<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Event;

use App\User;


use App\Participate;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::find($id);
        $users =  Event::join('participates','events.id','=','participates.idEvent')->join('users','users.id','=','participates.idUser')->where('idEvent',$id)->get();
        return view('event',['event'=>$event,'users'=>$users]);

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

    public function getEventFromId($id)
    {
        $events = Event::join('participates','events.id','=','participates.idEvent')->where('participates.idUser',$id)->get();
        $user = User::find($id);

        return view('profile',['user'=>$user,'events'=>$events]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            array(
                'name' => 'required',
                'description' => 'required', 
                'place' => 'required',
                'date' => 'required|date',
                'image' => 'required|mimes:jpeg,jpg,png'
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


    public function searchEvent(Request $request,$value=null)
    {
        if($value=="null")
        {
            $events = Event::all()->paginate(10);
            $value="";
        }
        else
        {
            $events = Event::where('name', 'like', '%'.$value.'%')->paginate(10);
        }
        if($request->has('page'))
        {
            return view('welcome', ['events' => $events]);
        }
        $out = '<div class="flex-container" >';
        foreach($events as $event)
        {
            $out .= view('eventbox',['event' => $event])->render();
        }
        $out .= '</div>';
        $out .= '<div>'. $events->links() .'</div>';
        return response($out);
    }
}