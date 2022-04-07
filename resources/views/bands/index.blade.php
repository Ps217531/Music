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
<div class="bg-gradient-to-r from-blue-400 to-gray-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="#">home</a>

        </li>
        @if (Auth::user())

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/bands/create"> een band toevoegen</a>

        </li>


@endif
    </ul>

</div>
<div class="container1">
    @foreach($bands as $band)


        <b>    <i> <a href="/bands/{{$band->id}}">album: {{$band->name}} <br> </a></i></b> <br>

        @if (Auth::user())

        <form action="{{route('bands.destroy', $band->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input value="Delete" type="submit"  class="flex-shrink-0 bg-red-500 hover:bg-green-700 border-teal-200 hover:border-teal-700 text-sm border-4 text-black py-1 px-2 rounded">


        </form>
        <td><a style="color: orange" href = '/bands/{{$band->id}}/edit'>update</a></td>
@endif


    @endforeach
</div>
</body>
</html>
