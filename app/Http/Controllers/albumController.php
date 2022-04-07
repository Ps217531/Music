<?php

namespace App\Http\Controllers;


use App\Http\Requests\albumRequest;
use App\Http\Requests\dierRequest;
use App\Models\Album;
use App\Models\DierModel;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class albumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return view('albums.index', ['albums' => album::all('id', 'name', 'year', 'times_sold')]);

//return view('/albums/index');
    }//,'name' ,'year','times_sold'

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | Create');
        return view('albums.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(albumRequest $request)
    {
        Album::create($request->except('_token'));

        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | store');

        //   return redirect()->route('dieren');
        return view('albums.index', ['albums' => Album::all()]);

        $validated = $request->validate();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | Show');
        return view('albums.show', ['albums' => Album::find($id)]);
        //return view('show', ['dieren' => dierModel::find($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $songs = Song::all();
        $albums = Album::find($id);
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | Edit');
        return view('albums.edit', ['albums' => $albums, 'songs' => $songs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(albumRequest $request, $id)
    {
        $albums = Album::find($id);
        Album::find($id)->songs()->attach($request->input('song_id'));
        $albums->update($request->only(['name', 'year', 'times_sold']));
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | Update');
        return redirect()->route('albums.index', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Album | Destroy');
        return redirect()->route('albums.index');
    }
}
