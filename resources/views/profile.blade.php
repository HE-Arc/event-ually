@extends('layouts.app')

@section('content')

<div id="EventContainer">
<div class="container">
<h1>Profil de {{str_replace(['[',']','"'],' ',App\User::where('id',auth()->user()->id)->pluck('name'))}}</h1>
<h3> Compte créé le : {{str_replace(['[',']','"'],' ',substr(App\User::where('id',auth()->user()->id)->pluck('created_at'),0,12))}}</h3>
<h3> Adresse email : {{str_replace(['[',']','"'],' ',App\User::where('id',auth()->user()->id)->pluck('email'))}}</h3>
<hr/>

<h1 class="profileDetails">Les événements de {{str_replace(['[',']','"'],' ',App\User::where('id',auth()->user()->id)->pluck('name'))}}</h1>
</div>
    <div class="flex-container">

        @foreach ($events as $event)
        <div class="flex-item">
            <h3 class="nameEvent">{{ $event->name }}</h3>
            <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
            <div class="imageBlock">
                <p class="placeEvent"><i class="fas fa-map-marker-alt"></i> {{ $event->place }}</p><br>
                <p class="dateEvent"><i class="fas fa-calendar-alt"></i> {{preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p><br>
                <p class="memberEvent"><i class="fas fa-users"></i> {{App\Participate::where('idEvent',$event->idEvent)->count()}}</p>

                <p class="descriptionEvent">{{ $event->description }}</p>

            </div>
            <p></p>

            @if (Auth::check())@if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->idEvent)->first())
                <a href='{{ route("subscribe",[$event->idUser,$event->idEvent]) }}' class="subscribe">Se désinscrire</a>
            @else
                <a href='{{ route("subscribe",[$event->idUser,$event->idEvent]) }}' class="subscribe">S'inscrire</a>
            @endif
            @endif
            <a href='{{ route("events",[$event->idEvent]) }}'>Détails</a>

        </div>

        @endforeach
    </div>
</div>
@endsection

