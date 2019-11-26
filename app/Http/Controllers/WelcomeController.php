<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Event;



class WelcomeController extends Controller
{
    public function index(){

        $events = Event::paginate(10);
        return view('welcome')->with('events',$events);
    }
}
