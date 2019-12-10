@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$event->name}}</h1>
        <img style="float:right" src="{{ asset($event->image) }}" alt="Pas d'image" height="256" width="256" class="image"></img>

        <h3>Date</h3>
        <p>{{$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date)}}</p>
        <h3>Lieu</h3>
        <p>{{$event->place}}</p>
        <h3>Description</h3>
        <p>{{$event->description}}</p>
        @if($users->isEmpty())
        @else
            @if (Auth::check())
                <h3>Utilisateurs qui participent:</h3>
                @foreach($users as $user)
                    <p>{{$user->name}}</p>
                @endforeach
            @endif
        @endif
    </div>
@endsection