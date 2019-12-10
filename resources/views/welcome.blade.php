@extends('layouts.app')

<script>
    window.addEventListener('load', function () {
        document.getElementById('search').oninput = async(e) => {
            e.preventDefault();
            value = document.getElementById('search').value;
            console.log(value);
            if(value == "")
            {value ="null";}

            fetch("search/"+value, {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
            },    
            method: 'get',
                //body: JSON.stringify({searchValue: document.getElementById('search').value })
            }).then(response => {
                if (response.ok) {
                    //console.log('Request successful', response); 
                    
                    response.text().then((htmlText) => {
                        console.log(htmlText);
                        document.querySelector('#EventContainer').innerHTML = htmlText;
                    });


                } else {
                    console.log('Error', response);
                }
            });
            

        }
  })
</script>


@section('content')
<div class="search-container" id="search-container">
        <input type="text" placeholder="Search.." name="search" id="search" class="search">
    </div>

    <div id="EventContainer">
        <div class="flex-container">
            @foreach ($events ?? '' as $event)
                <div class="flex-item">
                    <h3 class="nameEvent">{{ $event->name }}</h3>
                    <img src="{{ asset($event->image) }}" alt="Pas d'image" height="128" width="128" class="image"></img>
                    <div class="imageBlock">
                        <p class="placeEvent"><i class="fas fa-map-marker-alt"></i>{{ $event->place }}</p><br>
                        <p class="dateEvent"><i class="fas fa-calendar-alt"></i> {{ $newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$event->date) }}</p><br>
                        <p class="memberEvent"><i class="fas fa-users"></i>{{App\Participate::where('idEvent',$event->id)->count()}}</p>
                    </div>
                    <p class="descriptionEvent">{{ $event->description }}</p>

                    @if (Auth::check())
                        @if (App\Participate::where('idUser', auth()->user()->id)->where('idEvent', $event->id)->first())
                            <a href='events/{{$event->idUser}}/{{$event->id}}' class="subscribe">Se désinscrire</a>
                        @else
                            <a href='events/{{$event->idUser}}/{{$event->id}}' class="subscribe">S'inscrire</a>
                        @endif
                    @endif
                    @if (Auth::guest()) 
                    @endif
                    <a href='events/{{$event->id}}'>Détails</a>
                </div>
            @endforeach
        </div>
        <div>{{ $events->links() }}</div>
    </div>
@endsection