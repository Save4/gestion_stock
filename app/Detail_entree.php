<?php

namespace App\Http\Controllers;

use App\Detail_entree;
use App\Entree;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Detail_entreesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $detail_entrees = DB::table('detail_entrees')
            ->join('entrees', 'detail_entrees.entree_id', 'entrees.id')
            ->join('produits', 'detail_entrees.produit_id', 'produits.id')
            ->select('entrees.*','produits.*', 'detail_entrees.*')
            ->get();
        $entrees = Entree::all();
        $produits = Produit::all();


        return view('detail_entrees/index', [

            'entrees' => $entrees,
            'produits' => $produits,
            'detail_entrees' => $detail_entrees
        ]);
    }

    public function create()
    {

        return view('detail_entrees.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'entree_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required',
            'prix_achat' => 'required',
            'prix_vente' => 'required',
        ]);

        $entrees = Entree::all();
        $produits = Produit::all();

        $detail_entree = new Detail_entree();
        $detail_entree->entree_id = $request->entree_id;
        $detail_entree->produit_id = $request->produit_id;
        $detail_entree->quantite = $request->quantite;
        $detail_entree->prix_achat = $request->prix_achat;
        $detail_entree->prix_vente = $request->prix_vente;
        $detail_entree->save();
        return redirect('detail_entrees');
    }


    public function show(Detail_entree $detail_entree)
    {
    }


    public function edit(Detail_entree $detail_entree)
    {

        $entrees = Entree::all();
        $produits = Produit::all();

        $detail_entree = Detail_entree::find($detail_entree->id);
        return view('detail_entrees.edit', [
            'entrees' => $entrees,
            'produits' => $produits,
            'detail_entree' => $detail_entree
        ]);
    }


    public function update(Request $request, Detail_entree $detail_entree)
    {

        $request->validate([
            'entree_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required',
            'prix_achat' => 'required',
            'prix_vente' => 'required',
        ]);
        $entrees = Entree::all();
        $produits = Produit::all();

        $detail_entree = new Detail_entree();
        $detail_entree->entree_id = $request->entree_id;
        $detail_entree->produit_id = $request->produit_id;
        $detail_entree->quantite = $request->quantite;
        $detail_entree->prix_achat = $request->prix_achat;
        $detail_entree->prix_vente = $request->prix_vente;
        $detail_entree->save();
        return redirect('detail_entrees');
    }


    public function destroy(Detail_entree $detail_entree)
    {

        $detail_entree = Detail_entree::find($detail_entree->id);
        $detail_entree->delete();
        return redirect('detail_entrees');
    }
}
