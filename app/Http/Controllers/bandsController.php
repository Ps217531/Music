<?php

namespace App\Http\Controllers;


use App\Http\Requests\bandRequest;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\facades\log;

class bandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return view('bands.index', ['bands' => band::all('id', 'name', 'genre', 'founded', 'active_til')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(bandRequest $request)
    {
        Band::create($request->except('_token'));

        //   return redirect()->route('dieren');
        return view('bands.index', ['bands' => Band::all('name', 'genre', 'founded', 'active_til')]);
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
        Log::channel('mijnlogs')->info($user . 'Band | Create');

        return view('bands.show', ['bands' => Band::find($id)]);
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
        $user = auth()->user()->name;
        $bands = Band::find($id);
        Log::channel('mijnlogs')->info($user . 'Band | Edit');
        return view('bands.edit', ['bands' => $bands, 'albums' => Album::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(bandRequest $request, $id)
    {
        // Band update
        if ($request->input('album') == null) {
            $bands = Band::find($id);
            $bands->update($request->only(['name', 'genre', 'founded', 'active_til']));
            Log::channel('mijnlogs')->info(auth()->user()->name . ': Band | Update');
            return redirect()->route('bands.index', ['id' => $id]);
        } // Album koppelen
        else {
            Album::find($request->input('album'))->update(['band_id' => $id]);
            return redirect()->route('albums.show', ['id' => $request->input('album')]);
        }


//        $bands = Band::find($id);
//        $bands->update($request->only(['name', 'genre', 'founded', 'active_til']));
//        return redirect()->route('bands.index', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Band::destroy($id);
        $user = auth()->user()->name;
        Log::channel('mijnlogs')->info($user . 'Band | Create');
        return redirect()->route('bands.index');

    }
}
