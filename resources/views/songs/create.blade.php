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
<style>
</style>
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
    <form action = "{{route('song.store')}}" method = "post">
        @CSRF


        <p>Title</p>
        <input class="item_gap" type='text' name='title' />

        @error('title')
        <div>
            {{$message}}
        </div>
        @enderror
        <p>singer</p>
        <input class="item_gap" type="text" name='singer'/>

        @error('singer')
        <div>
            {{$message}}
        </div>
        @enderror
        <br>
        <select class="item_gap" name="" id="">
            <option value="test">test</option>
        </select>
        <br>

        <input type = 'submit' value = "Add song"/>
    </form>



</div>



<div class="container">

<form  action = "{{route('songs.create')}}"  method="GET">
    @csrf
    <input name="title" id="title" required type="text">
    <button type="submit" value="Zoek">Zoek</button>
</form>


@foreach($songFromAPI as $song)
        <div class="container">
    <p>{{$song ['name']}} </p>
    <p>{{$song ['artist']}} </p>

        <form  action = "{{route('songs')}}" method="POST">
        @csrf
        <input type="hidden" name="title" value="{{$song ['name']}}">
        <input type="hidden" name="singer" value="{{$song ['artist']}}">
            <br>
        <button  class="btadd"  type="submit">Toevoegen</button>
    </form></div>
@endforeach

</div>
</body>
</html>

