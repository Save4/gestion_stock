<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Unitemesure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produits = DB::table('produits')
                   ->join('unitemesures','produits.unitemesure_id','unitemesures.id')
                   ->select('unitemesures.*','produits.*')
                   ->get();
        $unitemesures = Unitemesure::all();
        return view('produits.index',[
            'produits' => $produits,
            'unitemesures' => $unitemesures
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
        $unitemesures = Unitemesure::all();
        return view('produits.create',[
            'unitemesures' => $unitemesures
        ]);
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
        $request->validate(['nomproduit' => 'required',
        'unitemesure_id' => 'required',
        'prixachat' => 'required',
        'prixvente' => 'required'
        ]);

        $produit = new Produit();
        $produit->nomproduit = $request->nomproduit;
        $produit->unitemesure_id = $request->unitemesure_id;
        $produit->prixachat = $request->prixachat;
        $produit->prixvente = $request->prixvente;
        $produit->save();
        return redirect('produits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
