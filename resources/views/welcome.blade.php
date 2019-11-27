@extends('layouts.app')

@section('content')
    <div class="flex-container">
        @foreach ($events ?? '' as $event)
            <div class="flex-item">
                <p class="nameEvent">{{ $event->name }}</p>
                <p class="descriptionEvent">{{ $event->description }}</p>
                <p class="placeEvent"><img src="..\resources\img\gps.png" width="25px"alt ="Localisation:">{{ $event->place }}</p>
                <p class="dateEvent"><img src="..\resources\img\calendar.png" width="25px"alt ="Localisation:"> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p>
                <p></p>
                @if (Auth::check())
                <p class="memberEvent"><img src="..\resources\img\member.png" width="25px"alt ="Participants:">{{App\Participate::where('idEvent',$event->id)->count()}}</p>
                    @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())
                        <a href='events/{{$event->idUser}}/{{$event->id}}'>Se désinscrire</a>
                    @else
                        <a href='events/{{$event->idUser}}/{{$event->id}}'>S'inscrire</a>
                    @endif
                @endif
                @if (Auth::guest()) 
                @endif
                <a href='events/{{$event->id}}'>Détails</a>

            </div>
        @endforeach
    </div>
    <div>{{ $events->links() }}</div>
@endsection