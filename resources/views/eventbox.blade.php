@if($event->date > date("Y-m-d"))
<div class="flex-item">
@else
<div class="flex-item over">
@endif
<h3 class="nameEvent">{{ $event->name }}</h3>
    <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
    <div class="imageBlock">
        <p class="placeEvent"><i class="fas fa-map-marker-alt"></i> {{ $event->place }}</p><br>
        <p class="dateEvent"><i class="fas fa-calendar-alt"></i> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p><br>
        @if (Auth::check())
            <p class="memberEvent"><i class="fas fa-users"></i> {{App\Participate::where('idEvent',$event->id)->count()}}</p>
        @endif
        <p class="descriptionEvent">{{ $event->description }}</p>
    </div>
    <p></p>
    @if (Auth::check())
        @if($event->date > date("Y-m-d"))
            @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())

                <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}' class="subscribe">Se désinscrire</a>
            @else
                <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}' class="subscribe">S'inscrire</a>
            @endif
        @endif
    @endif
    <a href='{{ route("events",[$event->id]) }}'>Détails</a>
</div>