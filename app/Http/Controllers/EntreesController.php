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

        $entree = new Entree();
        $entree->fournisseur_id = $request->fournisseur_id;
        $entree->type_entree_id = $request->type_entree_id;
        $entree->magasin_id = $request->magasin_id;
        $entree->mode_paiement_id = $request->mode_paiement_id;
        $entree->date_entree = $request->date_entree;
        $entree->montant = $request->montant;
        $entree->etat_cloture = (isset($request->etat_cloture) && $request->etat_cloture == 'on') ? 1 : 0;
        $entree->save();
        return redirect('entrees');
    }


    public function show(Entree $entree)
    {
      
            $entrees = DB::table('entrees')
                ->join('fournisseurs', 'entrees.fournisseur_id', 'fournisseurs.id')
                ->join('magasins', 'entrees.magasin_id', 'magasins.id')
                ->join('typeentrees', 'entrees.type_entree_id', 'typeentrees.id')
                ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
                ->join('mode_paiements', 'entrees.mode_paiement_id', 'mode_paiements.id')
                ->where('entrees.id', $entree->id)
                ->select('fournisseurs.*', 'magasins.*', 'typeentrees.*', 'mode_paiements.*', 'entrees.*')
                ->get();

                $fournisseurs = Fournisseur::all();
              $magasins = Magasin::all();
              $typeentrees = Typeentree::all();
              $mode_paiements = Mode_paiement::all();

              return view('detail_entrees.index', [

                  'fournisseurs' => $fournisseurs,
                  'magasins' => $magasins,
                  'typeentrees' => $typeentrees,
                  'mode_paiements' => $mode_paiements,
                  'entree' => $entree
              ]);

    }


    public function edit(Entree $entree)
    {

        $fournisseurs = Fournisseur::all();
        $magasins = Magasin::all();
        $typeentrees = Typeentree::all();
        $mode_paiements = Mode_paiement::all();

        $entree = Entree::find($entree->id);
        return view('entrees.edit', [
            'fournisseurs' => $fournisseurs,
            'magasins' => $magasins,
            'typeentrees' => $typeentrees,
            'mode_paiements' => $mode_paiements,
            'entree' => $entree
        ]);
    }


    public function update(Request $request, Entree $entree)
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

        $entree->fournisseur_id = $request->fournisseur_id;
        $entree->type_entree_id = $request->type_entree_id;
        $entree->magasin_id = $request->magasin_id;
        $entree->mode_paiement_id = $request->mode_paiement_id;
        $entree->date_entree = $request->date_entree;
        $entree->montant = $request->montant;
        $entree->etat_cloture = isset($request->etat_cloture) ? 1 : 0;
        $entree->save();
        return redirect('entrees');
    }


    public function destroy(Entree $entree)
    {

        $entree = Entree::find($entree->id);
        $entree->delete();
        return redirect('entrees');
    }

}
