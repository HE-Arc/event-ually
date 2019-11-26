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