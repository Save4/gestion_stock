<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index',[
            'fournisseurs' => $fournisseurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fournisseurs.create');
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
        $request->validate(['name' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'nif' => 'required',
        'rc' => 'required',
        'adresse' => 'required',
        ]);

        $fournisseur = new Fournisseur();
        $fournisseur->name = $request->name;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        $fournisseur->nif = $request->nif;
        $fournisseur->rc = $request->rc;
        $fournisseur->adresse = $request->adresse;
        $fournisseur->assujetva = (isset($request->assujetva) && $request->assujetva == 'on') ? 1 : 0;
        $fournisseur->save();
        return redirect('fournisseurs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
        $fournisseur = Fournisseur::find($fournisseur->id);
        return view('fournisseurs.edit',[
            'fournisseur' => $fournisseur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
        $request->validate(['name' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'nif' => 'required',
        'rc' => 'required',
        'adresse' => 'required',
        ]);
        
        $fournisseur->name = $request->name;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        $fournisseur->nif = $request->nif;
        $fournisseur->rc = $request->rc;
        $fournisseur->adresse = $request->adresse;
        $fournisseur->assujetva = isset($request->assujetva) ? 1 : 0;
        $fournisseur->save();
        return redirect('fournisseurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
        $fournisseur = Fournisseur::find($fournisseur->id);
        $fournisseur->delete();
        return redirect('fournisseurs');
    }
}
