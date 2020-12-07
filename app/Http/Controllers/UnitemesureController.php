<?php

namespace App\Http\Controllers;

use App\Unitemesure;
use Illuminate\Http\Request;

class UnitemesureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unite = Unitemesure::all();

        return view('unitemesures.index', compact('unite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'nomunite' => 'required',
        ]);

        $unitemesure = new Unitemesure();

        $unitemesure->nomunite = $request->nomunite;

        $unitemesure->save();

        return redirect('unitemesures')->with('succes', 'Nouvelle unité ajoutée !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $unite = Unitemesure::find($id);

        return view('unitemesures.edit', compact('unite'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $unite = Unitemesure::find($id);

        $unite->nomunite = $request->get('nomunite');

        $unite->save();

        return redirect('unitemesures')->with('succes', 'Unité modifiée !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $unitemesure = Unitemesure::find($id);

        $unitemesure->delete();

        return redirect('unitemesures')->with('succes', 'Nouvelle unité supprimée !');
    }
}
