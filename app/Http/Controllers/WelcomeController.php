<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{


    public function index(){
        $events = DB::table('events')->paginate(10);
        return view('welcome', ['events' => $events]);
    }

}
