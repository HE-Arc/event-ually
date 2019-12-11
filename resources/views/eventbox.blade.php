<div class="flex-item">
    <h3 class="nameEvent">{{ $event->name }}</h3>
    <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
    <div class="imageBlock">
        <p class="placeEvent"><img src="..\resources\img\gps.png" width="25px"alt ="Localisation:">{{ $event->place }}</p><br>
        <p class="dateEvent"><img src="..\resources\img\calendar.png" width="25px"alt ="Date:"> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p>
        <p class="descriptionEvent">{{ $event->description }}</p>
    </div>
    <p></p>
    @if (Auth::check())
    <p class="memberEvent"><img src="..\resources\img\member.png" width="25px"alt ="Participants:">{{App\Participate::where('idEvent',$event->id)->count()}}</p>
        @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())
            <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}' class="subscribe">Se désinscrire</a>
        @else
            <a href='{{ route("subscribe",[$event->idUser,$event->id]) }}' class="subscribe">S'inscrire</a>
        @endif
    @endif
    @if (Auth::guest()) 
    @endif
    <a href='{{ route("events",[$event->id]) }}'>Détails</a>
</div>