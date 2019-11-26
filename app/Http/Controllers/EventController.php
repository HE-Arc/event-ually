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


    public function searchEvent(Request $request)
    {
        $value = $request->input('searchValue');
        $events = DB::table('events')->where('name', 'like', '%'.$value.'%')->paginate(10);
        //$events->withPath("/");
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
        $out1 = $events->links();
        return response($out);
    }
}