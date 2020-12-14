<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // categories et soous-categories
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('nom_categorie', 'id')->all();
        return view('categories.index', compact('categories', 'allCategories'));


        /* //
        $categories = Category::all();
        return view('categories.index',[
            'categories' => $categories
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
            'nom_categorie' => ['required',  'max:255','string', 'unique:categories,nom_categorie']
            ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Category::create($input);
        return back()->with('success', 'Catégorie ajoutée !');


        /* $categorie = new Category();
        $categorie->nom_categorie = $request->nom_categorie;
        $categorie->save();
        return redirect('categories')->with('status','Enregistrement reussie avec succees!!!'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $categorie = Category::find($id);
        return view('categories.edit',[
            'categorie' => $categorie
        ]);


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
        $request->validate(['nom_categorie' => ['required',  'max:255', 'string', 'unique:categories,nom_categorie']
        ]);
        $categorie = Category::find($id);

        $categorie->nom_categorie = $request->get('nom_categorie');

        $categorie->save();

        return redirect('categories')->with('status','Modification reussie avec succees!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $categorie = Category::find($id);
        $categorie->delete();
        return back()->with('success', 'Catégorie supprimé !');
    }
}
