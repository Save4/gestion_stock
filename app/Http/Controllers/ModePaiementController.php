<?php

namespace App\Http\Controllers;

use App\Mode_paiement;
use Illuminate\Http\Request;

class ModePaiementController extends Controller
{

  function __construct()
   {
       $this->middleware('auth');
   }

    public function index()
    {
      $mode_paiements = Mode_paiement::all();
      return view('mode_paiements/index',[
          'mode_paiements' => $mode_paiements
      ]);
    }

    public function create()
    {
      return view('mode_paiements/create');
    }

    public function store(Request $request)
    {
      $request->validate([
      'nom_mode' =>'required',

         ]);

  $mode_paiement= new Mode_paiement();
  $mode_paiement->nom_mode= $request->nom_mode;

  $mode_paiement->save();
  return redirect('mode_paiements');
    }


    public function show(Mode_paiement $mode_paiement)
    {

    }


    public function edit($id)
    {
      $mode_paiement = Mode_paiement::find($id);

        return view('mode_paiements.edit', compact('mode_paiement'));
    }

    public function update(Request $request, Mode_paiement $mode_paiement)
    {

      $mode_paiement->nom_mode=$request->nom_mode;

           $mode_paiement->save();
           return redirect('mode_paiements');
    }


    public function destroy(Mode_paiement $mode_paiement)
    {
      $mode_paiement=Mode_paiement::find($mode_paiement->id);
    $mode_paiement->delete();
    return redirect('mode_paiements');
    }
}
