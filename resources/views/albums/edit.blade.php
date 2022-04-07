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
<div class="bg-gradient-to-r from-gray-400 to-gray-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="/">Home</a>

        </li>

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/create"> Een album toevoegen</a>

        </li>


    </ul>

</div>
<div class="container">
    <form action="{{ route('albums.update', [$albums->id])}}" method="POST" >
        @csrf
        @method('PUT')

        <p> Naam:</p>
        <input class="item_gap" type="name" name="name" value="{{$albums->name}}"   placeholder="vul hier een nummer in" aria-label="voeg nummer toe">

        <p>Jaar:</p>
        <input class="item_gap" type="text" name="year" value="{{$albums->year}}" >

        <p>Aantal keer verkocht:</p>
        <input class="item_gap" type="text" name="times_sold" value="{{$albums->times_sold}}" >
        <br>


        <input class="item_gap" type="submit"/>
    </form>

    <form action="{{ route('song_album.store', [$albums->id]) }}" method="POST">
        @csrf
        <label for="song_id">Nummer:</label>
        <select name="song_id" id="song_id">
            @foreach($songs as $song)
                <option value="{{$song->id}}">{{$song->title}}</option>
            @endforeach
        </select>
        <input value="koppel" type="submit">
    </form>
    <br>
</div>
</body>
</html>
