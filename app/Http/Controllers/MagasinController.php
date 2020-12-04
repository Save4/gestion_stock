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
        $typeentree = Magasin::all();

        return \view('typeentrees.index', compact('typeentree'));
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
            'nomtype' => 'required'
        ]);

        $typeentree = new Typeentree();

        $typeentree->nomtype = $request->nomtype;

        $typeentree->save();

        return redirect('typeentrees')->with('succes', 'Type ajouté !');
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
        $typeentree = Magasin::find($id);

        return \view('typeentrees.edit', compact('typeentree'));
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
        $typeentree = Magasin::find($id);

        $typeentree->nomtype = $request->get('nomtype');

        $typeentree->save();

        return redirect('typeentrees')->with('succes', 'Type modifié !');
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
        $typeentree = Magasin::find($id);

        $typeentree->delete();

        return redirect('typeentrees')->with('succes', 'Type supprimé !');
    }
}
