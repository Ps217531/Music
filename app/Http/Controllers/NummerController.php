<?php

namespace App\Http\Controllers;

use App\Http\Requests\songRequest;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
class NummerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        {

            return view('songs.index', ['songs' => Song::all('title', 'id', 'singer')]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $songsFromAPI = [];  //array

        if ($request->query->has('title')) {//staat boven in de url balk
            $api_key = 'f92ee61b259c5f77389593d14edac69f';// de key die ik aangemaakt heb
            $title = $request->query('title');
            $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=track.search&track=' . $title . '&api_key=' . $api_key . '&format=json')->json();// hier wordt de key ingevoerd
            $songsFromAPI = $response["results"]["trackmatches"]["track"];// de lijst word getoont als response
        }


        return view('songs.create', ['songFromAPI' => $songsFromAPI]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(songRequest $request)
    {
        Song::create($request->except('_token'));

        return view('songs.index', ['songs' => Song::all('title', 'id')]);
        $validated = $request->validate();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {  // $songs = ['Living on a prayer', 'Nothing else matters', 'Thunderstruck', 'Back in black', 'Ace of spades'];
        //$song = $songs[$id];
        return view('songs.show', ['songs' => song::find($id)]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //   $songs = ['Living on a prayer', 'Nothing else matters', 'Thunderstruck', 'Back in black', 'Ace of spades'];
        //   $song = $songs[$id];
        //   return view('songs.edit', ['songs' =>  $songs[$id]]);

        $albums = Album::all();
        $song = Song::find($id);
        return view('songs.edit', ['song' => $song, 'albums' => $albums]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(songRequest $request, $id)
    {
        $albums = Album::find($id);
        Album::find($id)->albums()->attach($request->input('album_id'));
        $song = Song::find($id);
        $song->update($request->only(['title', 'singer']));
        return redirect()->route('songs.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Song::destroy($id);
        return redirect('songs');
//        DB::delete('delete from songs where id = ?',[$id]);


    }
}
