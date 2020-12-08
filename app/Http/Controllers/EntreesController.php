<?php

namespace App\Http\Controllers;

use App\Entree;
use App\Fournisseur;
use App\Magasin;
use App\Typeentree;
use App\Mode_paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EntreesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $entrees= DB::table('entrees')
           ->join('fournisseurs', 'entrees.fournisseur_id', 'fournisseurs.id')
           ->join('magasins', 'entrees.magasin_id', 'magasins.id')
           ->join('typeentrees', 'entrees.type_entree_id', 'typeentrees.id')
           ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
           ->select('fournisseurs.*','magasins.*','typeentrees.*','mode_paiements.*','entrees.*')
           ->get();
           $fournisseurs = Fournisseur::all();
           $magasins = Magasin::all();
           $typeentrees = Typeentree::all();
           $mode_paiements = Mode_paiement::all();


  return view('entrees/index',[

    'fournisseurs'=> $fournisseurs,
    'magasins'=> $magasins,
    'typeentrees'=> $typeentrees,
    'mode_paiements'=> $mode_paiements,
    'entrees'=>$entrees
  ]);
    }
}
