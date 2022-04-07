<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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

            <a href="#">home</a>

        </li>
        @if (Auth::user())

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/songs/create"> een nummer toevoegen</a>

        </li>

@endif
    </ul>

</div>

<div class="container1">

    @foreach($songs as $song)
        <b>    <i>  <a href="/songs/{{$song->id}}">song: {{$song->title}}  </a></i></b>
        <br>
        @if (Auth::user())

        <td><a style="color: red" href = '/songs/delete/{{ $song->id }}'>Delete</a></td>
        <td><a style="color: orange" href = '/songs/{{ $song->id }}/edit'>update</a></td>
        @endif

            @endforeach

</div>
</body>
</html>
