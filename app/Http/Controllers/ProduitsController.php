<?php

namespace App\Http\Controllers;

use App\Produit;


use App\Category;


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

                   ->join('categories','produits.categorie_id','categories.id')
                   ->join('unitemesures','produits.unitemesure_id','unitemesures.id')
                   ->select('categories.*','unitemesures.*','produits.*')
                   ->get();
        $categories = Category::all();
        $unitemesures = Unitemesure::all();
        return view('produits.index',[
            'produits' => $produits,
            'categories' => $categories,

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

        $categories = Category::all();
        $unitemesures = Unitemesure::all();
        return view('produits.create',[
            'categories' => $categories,

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

        $request->validate(['nomproduit' => ['required','string','max:255','unique:produits,nomproduit'],
        'categorie_id' => 'required',

        'unitemesure_id' => 'required',
        'prixachat' => 'required',
        'prixvente' => 'required'
        ]);

        $produit = new Produit();
        $produit->nomproduit = $request->nomproduit;


        $produit->categorie_id = $request->categorie_id;

        $produit->unitemesure_id = $request->unitemesure_id;
        $produit->prixachat = $request->prixachat;
        $produit->prixvente = $request->prixvente;
        $produit->save();
        return redirect('produits')->with('status','Enregistrement reussie avec succees!!');
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


        $categories = Category::all();


        $unitemesures = Unitemesure::all();
        $produit = Produit::find($produit->id);
        return view('produits.edit',[
            'produit' => $produit,


            'categories' => $categories,

            'unitemesures' => $unitemesures
        ]);
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
        $request->validate(['nomproduit' => 'required',


        'categorie_id' => 'required',

        'unitemesure_id' => 'required',
        'prixachat' => 'required',
        'prixvente' => 'required'
        ]);

        $produit->nomproduit = $request->nomproduit;

        $produit->categorie_id = $request->categorie_id;

        $produit->unitemesure_id = $request->unitemesure_id;
        $produit->prixachat = $request->prixachat;
        $produit->prixvente = $request->prixvente;
        $produit->save();
        return redirect('produits')->with('status','Modification reussie avec succees!!');
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
        $produit = Produit::find($produit->id);
        $produit->delete();
        return redirect('produits')->with('status','Suppression reussie avec succees!!');
    }
}
