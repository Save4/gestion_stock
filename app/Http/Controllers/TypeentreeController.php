<?php

namespace App\Http\Controllers;

use App\Typeentree;
use Illuminate\Http\Request;

class TypeentreeController extends Controller
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
        $typeentree = Typeentree::all();

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
            'nomtype' => ['required', 'max:255', 'string', 'unique:typeentrees,nom_type']
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
        $typeentree = Typeentree::find($id);

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
        $request->validate([
            'nomtype' => ['required', 'max:255', 'string', 'unique:typeentrees,nom_type']
        ]);
        
        $typeentree = Typeentree::find($id);

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
        $typeentree = Typeentree::find($id);

        $typeentree->delete();

        return redirect('typeentrees')->with('succes', 'Type supprimé !');
    }
}
