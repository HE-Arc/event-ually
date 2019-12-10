@extends('layouts.app')

@section('content')
    <div class="container">

    <h1>{{$event->name}}</h1>
        <h3>Date</h3>
        <p>{{$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date)}}</p>
        <h3>Lieu</h3>
        <p>{{$event->place}}</p>
        <h3>Description</h3>
        <p>{{$event->description}}</p>

    </div>
@endsection