<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="bg-gradient-to-r from-green-400 to-green-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="/bands">Home</a>

        </li>

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/create"> Een band toevoegen</a>

        </li>
        </li>


    </ul>

</div>

<div class="container">
    <form action="{{ route('bands.update', ['id' => $bands->id])}}" method="POST" >
        @csrf
        @method('PUT')

        <p> Naam:</p>
        <input class="item_gap" type="name" name="name" value="{{$bands->name}}"   placeholder="vul hier een nummer in" aria-label="voeg nummer toe">

        <p>Genre:</p>
        <input class="item_gap" type="text" name="genre" value="{{$bands->genre}}" >

        <p>Ontstaan:</p>
        <input class="item_gap" type="text" name="founded" value="{{$bands->founded}}" >


        <p>Actief tot:</p>
        <input class="item_gap" type="text" name="active_til" value="{{$bands->active_til}}" >
        <br>

        <input class="item_gap" type="submit"/>
    </form>
    <h2> band wijzigen</h2>
    <form action="{{ route('bands.update', ['id' => $bands->id])}}" method="post">
        @csrf
        @method('PUT')
        <label for="singer">Album:</label>
        <select name="album" id="album">
            @foreach($albums as $album)
                @if($album->band_id == $bands->id)
                    <option value="{{$album->id}}" selected>{{$album->naam}}</option>
                @else
                    <option value="{{$album->id}}">{{$album->name}}</option>
                @endif
            @endforeach
        </select> <br>
        <input class="item_gap" type="submit"/>
    </form>
</div>
</body>
</html>
