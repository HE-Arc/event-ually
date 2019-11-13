@extends('layouts.app')

@section('content')
    <div class="flex-container">
        @foreach ($events as $event)
            <div class="flex-item">
                <p>{!! $event->name !!}</p>
                <button type="button">Détails</button>
            </div>
        @endforeach
    </div>
    <div>{!! $events->links() !!}</div>
@endsection