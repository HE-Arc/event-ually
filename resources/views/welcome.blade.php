@extends('layouts.app')

<script>
    window.addEventListener('load', function () {
        document.getElementById('search').oninput = async(e) => {
            e.preventDefault();
            fetch("{{route('search')}}" , {
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                    "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                },    
                method: 'post',
                body: JSON.stringify({searchValue: document.getElementById('search').value })
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
        <div class="flex-container" >
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
    </div>
    
    
@endsection
