@extends('layouts.app')

@section('content')
    <div class="flex-container">
        @foreach ($events as $event)
            <div class="flex-item">
                <p class="nameEvent">{!! $event->name !!}</p>
                <p class="descriptionEvent">{!! $event->description !!}</p>
                <p class="placeEvent">Localisation: {!! $event->place !!}</p>
                <p class="dateEvent">,le {!! $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) !!}</p>
                <p></p>
                <a href='events/{{$event->id}}'>Détails</a>
            </div>
        @endforeach
    </div>
    <div>{!! $events->links() !!}</div>
@endsection