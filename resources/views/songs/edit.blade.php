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
<body style="background: #cbd5e0">

<div class="bg-gradient-to-r from-gray-400 to-gray-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="/">home</a>

        </li>

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/songs/create"> een nummer toevoegen</a>

        </li>


    </ul>
</div>

<div class="container">
    <form action="{{ route('songs.update', ['id' => $song->id])}}" method="POST" >
        @csrf
        @method('PUT')

        <p> Title:</p>
        <input class="item_gap" type="name" name="title" value="{{$song->title}}"   placeholder="vul hier een nummer in" aria-label="voeg nummer toe">
        <br><br>
        <p>Singer:</p>
        <input class="item_gap" type="text" name="singer" value="{{$song->singer}}" >
        <br>
        <label for="album_id">Album:</label>
        <br>
        <BR>
        <input class="item_gap" type="submit"  class="flex-shrink-0 bg-red-500 hover:bg-green-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" />
    </form>



    <form action="{{ route('album_song.store', ['id' => $song->id]) }}" method="POST">
        @csrf
        <select name="album_id" id="album_id">
            @foreach($albums as $album)
                <option value="{{$album->id}}">{{$album->name}}</option>
            @endforeach
        </select>
        <input value="koppel" type="submit">
    </form>
</div>
</body>
</html>

