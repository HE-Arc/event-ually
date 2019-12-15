@extends('layouts.app')

<script>
    window.addEventListener('load', function () {
        document.getElementById('search').oninput = async(e) => {
            e.preventDefault();
            value = document.getElementById('search').value;
            if(value == "")
            {value ="null";}
            route = "{{ route('search',['']) }}";
            route += "/"+value;
            console.log(route);
            fetch(route, {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
            },    
            method: 'get',
            }).then(response => {
                if (response.ok) {                    
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
                @include('eventbox')
            @endforeach
        </div>
        <div class="pagination">{{ $events->links() }}</div>
    </div>
@endsection