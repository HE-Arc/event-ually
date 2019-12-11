@extends('layouts.app')

@section('content')

<div id="EventContainer">
    <div class="flex-container">
        @foreach ($events as $event)
        <div class="flex-item">
            <h3 class="nameEvent">{{ $event->name }}</h3>
            <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
            <div class="imageBlock">
                <p class="placeEvent"><i class="fas fa-map-marker-alt"></i> {{ $event->place }}</p><br>
                <p class="dateEvent"><i class="fas fa-calendar-alt"></i> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p><br>
                <p class="memberEvent"><i class="fas fa-users"></i> {{App\Participate::where('idEvent',$event->idEvent)->count()}}</p>

                <p class="descriptionEvent">{{ $event->description }}</p>
            </div>
            <p></p>
            <a href='{{ route("events",[$event->idEvent]) }}'>Détails</a>
            <a href='{{ route("subscribe",[$event->idUser,$event->idEvent]) }}' class="subscribe">Se désinscrire</a>
        </div>

        @endforeach
    </div>
</div>
@endsection

