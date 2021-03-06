@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$event->name}}</h1>
        <img style="float:right" src="{{ asset($event->image) }}" alt="Pas d'image" height="512" width="512" class="imageEvent"></img>

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
                    <a href="{{ route('profile',[$user->id]) }}">{{$user->name}}</a><br>
                @endforeach
            @endif
        @endif
        </br>
        @if (Auth::check())
            @if($event->date > date("Y-m-d"))
                @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())
                    <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}'>Se désinscrire</a>
                @else
                    <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}'>S'inscrire</a>
                @endif
            @endif
        @endif
    </div>
@endsection