@extends('layouts.app')

@section('content')
    <div class="flex-container">
        @foreach ($events ?? '' as $event)
            <div class="flex-item">
                <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128"></img>
                <h3 class="nameEvent">{{ $event->name }}</h3>
                <p class="descriptionEvent">{{ $event->description }}</p>
                <p class="placeEvent"><img src="..\resources\img\gps.png" width="25px"alt ="Localisation:">{{ $event->place }}</p>
                <p class="dateEvent"><img src="..\resources\img\calendar.png" width="25px"alt ="Localisation:"> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p>
                <p></p>
                <a href='events/{{$event->id}}'>Détails</a>
                @if (Auth::check())
                    @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())
                        <a href='events/{{$event->idUser}}/{{$event->id}}'>Se désinscrire</a>
                    @else
                        <a href='events/{{$event->idUser}}/{{$event->id}}'>S'inscrire</a>
                    @endif
                @endif
                @if (Auth::guest()) 
                @endif
            </div>
        @endforeach
    </div>
    <div>{{ $events->links() }}</div>
@endsection