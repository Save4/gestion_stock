<?php

namespace App\Http\Controllers;

use App\Magasin;
use Illuminate\Http\Request;

class MagasinController extends Controller
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
        $magasin = Magasin::all();

        return \view('magasins.index', compact('magasin'));
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
        //
        $request->validate([
            'nom_magasin' => ['required', 'string', 'max:255', 'unique:magasins']
        ]);

        $magasin = new Magasin();

        $magasin->nom_magasin = $request->nom_magasin;

        $magasin->save();

        return redirect('magasins')->with('succes', 'Type ajouté !');
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
        $magasin = Magasin::find($id);

        return \view('magasins.edit', compact('magasin'));
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
        $request->validate([
            'nom_magasin' => ['required', 'string', 'max:255', 'unique:magasins']
        ]);
        
        $magasin = Magasin::find($id);

        $magasin->nom_magasin = $request->get('nom_magasin');

        $magasin->save();

        return redirect('magasins')->with('succes', 'Type modifié !');
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
        $magasin = Magasin::find($id);

        $magasin->delete();

        return redirect('magasins')->with('succes', 'Type supprimé !');
    }
}
