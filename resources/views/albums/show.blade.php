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

            <a href="/albums">home</a>

        </li>

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/albums/create"> een album toevoegen</a>

        </li>
        <li class="mr-6 flex-auto">



        </li>
    </ul>

</div>
<div class="container">
    <p class="item_gap">Album: {{$albums -> name}} </p>
    <p class="item_gap">Jaar: {{$albums -> year}} </p>
    <p class="item_gap">Aantal keer verkocht: {{$albums->times_sold}} </p>
    {{--    <p class="item_gap">geselecteerde band: {{$albums->band->name}}</p>--}}
    {{--    <p class="item_gap">geselecteerde song: {{$albums->songs->title}}</p>--}}
    songs:
    @foreach($albums->songs as $song)
        <p> {{$song->title}} </p>
    @endforeach

</div>



</body>
</html>
