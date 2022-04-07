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
<style>
    .container_flex{
        display: flex;
        justify-content: space-between;

        flex-flow: column wrap;
        gap: 20px;
    }
</style>
<body>
<div class="bg-gradient-to-r from-gray-400 to-gray-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="#">home</a>

        </li>


        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/albums/create"> een album toevoegen</a>

        </li>
        </li> <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/albums/edit"> een album wijzigen</a>


    </ul>

</div>

<div class="container1">

    @foreach($albums as $albums)


        <b>    <i> <a href="/albums/{{$albums->id}}">album: {{$albums->name}}  </a></i></b>   <br>
    @if (Auth::user())
        <form action="{{route('albums.destroy', $albums->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input value="Delete" type="submit"  class="flex-shrink-0 bg-red-500 hover:bg-green-700 border-teal-200 hover:border-teal-700 text-sm border-4 text-black py-1 px-2 rounded" style="border: solid white">
        </form>
        <td><button class="flex-shrink-0 bg-yellow-400 hover:bg-green-700 border-teal-200 hover:border-teal-700 text-sm border-4 text-black py-1 px-2 rounded">  <a href = '/albums/{{ $albums->id }}/edit'>update</a>  </button></td>

@endif
    @endforeach

</div>
<br>
</body>
</html>
