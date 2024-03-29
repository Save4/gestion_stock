<?php

namespace App\Http\Controllers;

use App\Entree;
use App\Magasin;
use App\Produit;
use App\Typeentree;
use App\Fournisseur;
use App\Detail_entree;
use App\Mode_paiement;
use App\Category;
use App\Unitemesure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Detail_entreeController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /* public function index()
    {
        $detail_entrees = DB::table('detail_entrees')
            ->join('entrees', 'detail_entrees.entree_id', 'entrees.id')
            ->join('produits', 'detail_entrees.produit_id', 'produits.id')
            ->join('fournisseurs', 'entrees.fournisseur_id', 'fournisseurs.id')
            ->join('magasins', 'entrees.magasin_id', 'magasins.id')
            ->join('typeentrees', 'entrees.type_entree_id', 'typeentrees.id')
            ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
            ->join('categories','produits.categorie_id','categories.id')
            ->join('unitemesures','produits.unitemesure_id','unitemesures.id')
            ->select('produits.*','categories.*','unitemesures.*','fournisseurs.*', 'magasins.*', 'typeentrees.*', 'mode_paiements.*','entrees.*',  'detail_entrees.*')
            ->get();
        $entrees = Entree::all();
         $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        $typeentrees = Typeentree::all();
        $mode_paiements = Mode_paiement::all();
        $produits = Produit::all();
         $categories = Category::all();
        $unitemesures = Unitemesure::all();


        return view('detail_entrees/index', [

            'entrees' => $entrees,

            'fournisseurs' => $fournisseurs,
            'magasins' => $magasins,
            'typeentrees' => $typeentrees,
            'mode_paiements' => $mode_paiements,
            'produits' => $produits,
            'categories' => $categories,
            'unitemesures' => $unitemesures,

            'detail_entrees' => $detail_entrees
        ]);
    }
 */
    public function create()
    {

        return view('detail_entrees.create');

    }

      // Injection des 
      public function getPrixAchat(Request $request)
      {
          # code...
          if ($request->has('produit_id')) {
              $produit_id = $request->get('produit_id');
              $produit = DB::table('produits')
                  ->where('produits.id', '=',  $produit_id)
                  ->first();
          }
          return view('detail_entrees.getPrixAchat', [
              'produit' =>$produit
          ]);
      }

      public function getPrixVente(Request $request)
      {
          # code...
          if ($request->has('produit_id')) {
              $produit_id = $request->get('produit_id');
              $produit = DB::table('produits')
                  ->where('produits.id', '=',  $produit_id)
                  ->first();
          }
          return view('detail_entrees.getPrixVente', [
              'produit' =>$produit
          ]);
      }

    public function store(Request $request,Entree $entree)
    {
        //
        $request->validate([
            'entree_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required',
            'prixachat' => 'required',
            'prixvente' => 'required',
            'prixachattotal' => 'required',
            'prixventetotal' => 'required',
        ]);

        $entrees = Entree::all();
        $produits = Produit::all();
        $detail_entree = DB::table('detail_entrees')
                        ->join('entrees', 'detail_entrees.entree_id', 'entrees.id')
                        ->join('produits','detail_entrees.produit_id','produits.id')
                        ->select('entrees.*', 'detail_entrees.*')
                        ->get();


        $detail_entree = new Detail_entree();
        $detail_entree->entree_id = $request->entree_id;
        $detail_entree->produit_id = $request->produit_id;
        $detail_entree->quantite = $request->quantite;
        $detail_entree->prixachat = $request->prixachat;
        $detail_entree->prixvente = $request->prixvente;
        $detail_entree->prixachattotal = $request->prixachattotal;
        $detail_entree->prixventetotal = $request->prixventetotal;
        $detail_entree->save();
        return redirect()->route('detail_entrees.show', $detail_entree->entree_id);
    }


    public function show( $entre )
    {
        // $detail_entree = Detail_entree::find($detail_entree->id);

        $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        $typeentrees = Typeentree::all();
        $mode_paiements = Mode_paiement::all();
        $produit = Produit::all();
        // $entree = Entree::all();
        $entree = DB::table('entrees')
                    ->join('fournisseurs', 'entrees.fournisseur_id', 'fournisseurs.id')
                    ->join('magasins', 'entrees.magasin_id', 'magasins.id')
                    ->join('typeentrees', 'entrees.type_entree_id', 'typeentrees.id')
                    ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
                    ->where('entrees.id','=',$entre)
                    // ->select(DB::raw('entrees.*, entrees.id,date_entree, entrees.fournisseur_id, name,nom_magasin
                    // ,nomtype, nom_mode'))
                    ->select('fournisseurs.*','magasins.*','typeentrees.*','mode_paiements.*','entrees.*')
                    ->first();
        $detail_entree = DB::table('detail_entrees')
                        ->join('entrees', 'detail_entrees.entree_id', 'entrees.id')
                        ->join('produits', 'detail_entrees.produit_id', 'produits.id')
                        ->select('entrees.*','produits.*', 'detail_entrees.*')
                        ->where('detail_entrees.entree_id', $entre)
                        ->get();
       
    //    dd($entree);
         if(!isset($entree->id))
         return redirect('404');
        return view('detail_entrees.show', [

            'fournisseurs' => $fournisseurs,
            'magasins' => $magasins,
            'typeentrees' => $typeentrees,
            'mode_paiements' => $mode_paiements,
            'produit' => $produit,
            'entree' => $entree,
            'detail_entree' => $detail_entree

            ]);
    }


    public function edit(Detail_entree $detail_entree)
    {

        $entrees = Entree::all();
        $produits = Produit::all();

        $detail_entree = Detail_entree::find($detail_entree->id);
        return view('detail_entrees.edit', [
            'entrees' => $entrees,
            'entree' => $detail_entree,
            'produits' => $produits,
            'detail_entree' => $detail_entree
        ]);
    }


    // public function update(Request $request, Detail_entree $detail_entree)
    public function update(Request $request, Detail_entree $detail_entree)
    {
        //
        
        $request->validate([
            'entree_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required',
            'prix_achat' => 'required',
            'prix_vente' => 'required',
        ]);

        $detail_entree->entree_id = $request->get('entree_id');
        $detail_entree->produit_id = $request->get('produit_id');
        $detail_entree->quantite = $request->get('quantite');
        $detail_entree->prix_achat = $request->get('prix_achat');
        $detail_entree->prix_vente = $request->get('prix_vente');
        
        $detail_entree->save();

        return redirect()->route('detail_entrees.show',$detail_entree->entree_id);
    }


    public function destroy(Detail_entree $detail_entree)
    { 
        
        $detail_entree = Detail_entree::find($detail_entree->id);
        $entree = $detail_entree->entree_id; 
        $detail_entree->delete();
        return redirect()->route('detail_entrees.show', $entree);
    }
}
