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
        $entrees = DB::table('entrees')
            ->join('fournisseurs', 'entrees.fournisseur_id', 'fournisseurs.id')
            ->join('magasins', 'entrees.magasin_id', 'magasins.id')
            ->join('typeentrees', 'entrees.type_entree_id', 'typeentrees.id')
            ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
            ->select('fournisseurs.*', 'magasins.*', 'typeentrees.*', 'mode_paiements.*', 'entrees.*')
            ->get();
        $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        $typeentrees = Typeentree::all();
        $mode_paiements = Mode_paiement::all();


        return view('entrees/index', [

            'fournisseurs' => $fournisseurs,
            'magasins' => $magasins,
            'typeentrees' => $typeentrees,
            'mode_paiements' => $mode_paiements,
            'entrees' => $entrees
        ]);
    }

    public function create()
    {

        return view('entrees.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'fournisseur_id' => 'required',
            'type_entree_id' => 'required',
            'magasin_id' => 'required',
            'mode_paiement_id' => 'required',
            'date_entree' => 'required',
            'montant' => 'required',
        ]);

        $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        $typeentrees = Typeentree::all();
        $mode_paiements = Mode_paiement::all();

        $entrees = new Entree();
        $entrees->fournisseur_id = $request->fournisseur_id;
        $entrees->type_entree_id = $request->type_entree_id;
        $entrees->magasin_id = $request->magasin_id;
        $entrees->mode_paiement_id = $request->mode_paiement_id;
        $entrees->date_entree = $request->date_entree;
        $entrees->montant = $request->montant;
        $entrees->etat_cloture = (isset($request->etat_cloture) && $request->etat_cloture == 'on') ? 1 : 0;
        $entrees->save();
        return redirect('entrees');
    }


    public function show(Fournisseur $fournisseur)
    {


    }


    public function edit(Fournisseur $fournisseur)
    {

        $fournisseur = Fournisseur::find($fournisseur->id);
        return view('fournisseurs.edit', [
            'fournisseur' => $fournisseur
        ]);
    }


    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
        $request->validate([
            'name' => 'required',
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


    public function destroy(Fournisseur $fournisseur)
    {

        $fournisseur = Fournisseur::find($fournisseur->id);
        $fournisseur->delete();
        return redirect('fournisseurs');
    }
}
