@extends('layouts.app')

@section('content')

<div id="EventContainer">
    <div class="flex-container">
        @foreach ($events as $event)
        <div class="flex-item">
            <h3 class="nameEvent">{{ $event->name }}</h3>
            <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
            <p class="placeEvent"><img src="..\resources\img\gps.png" width="25px"alt ="Localisation:">{{ $event->place }}</p>
            <p class="dateEvent"><img src="..\resources\img\calendar.png" width="25px"alt ="Localisation:"> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p>
            <p class="descriptionEvent">{{ $event->description }}</p>
            <a href='events/{{$event->idEvent}}'>Détails</a>
        </div>
        @endforeach
    </div>
</div>
@endsection

