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
<body >
<div class="bg-gradient-to-r from-gray-400 to-gray-800 text-white text-5xl">

    <ul class="flex p-4">

        <li class="mr-6 flex-auto">

            <a href="/albums">Home</a>

        </li>

        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="*"> Een album toevoegen</a>

        </li>
        </li>
        <li class="mr-6 flex-auto">

            <a class="text-white-800 hover:text-gray-400" href="/albums/update"> Een album wijzigen</a>


    </ul>

</div>
<div class="container">
    <form action = "{{route('albums.store')}}" method = "post">
        @CSRF


        <p>naam:</p>
        <input class="item_gap" type='text' name='name'/>

        @error('name')
        <div>
            {{$message}}
        </div>
        @enderror
        <p>jaar:</p>
        <input class="item_gap" type="text" name='year'/>

        @error('year')
        <div>
            {{$message}}
        </div>
        @enderror
        <p>Aantal keer verkocht:</p>
        <input class="item_gap" type="text" name='times_sold'/>

        @error('times_sold')
        <div>
            {{$message}}
        </div>
        @enderror

        <br>

        <input class="item_gap" type='submit' value="add"/>



    </form>
</div>
</body>
</html>
