@extends('layouts.layout')

@section('content')
  @section('title','Detail des entres | '.config('app.name'))
  
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <!-- <h4 class="page-title">Form Bordered</h4> -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('detail_entrees.show',$detail_entree->entree_id) }}">Detail des entrees</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit le detail des entrees</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="/detail_entrees/{{ $detail_entree->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-user-circle-o"></i>
                                Mettre a jour les Infos du detail de l'entree
                            </h4>
                            <div class="form-group row">

                                <div class="form-group row col-sm-12">
                                    <label for="input-23" class="col-sm-2 col-form-label">Entree</label>
                                    <div class="col-sm-4">
                                        <select name="entree_id" class="form-control">
                                            @foreach ($entrees as $entree)
                                                <option value="{{ $entree->id }}" {!! $detail_entree->entree_id == $entree->id ?
                                                    'selected="selected"' : '' !!}>{{ $entree->id }}
                                                </option>

                                            @endforeach
                                            @error('entree_id')

                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        </select>
                                    </div>

                                    <label for="input-23" class="col-sm-2 col-form-label">Produit</label>
                                    <div class="col-sm-4">
                                        <select name="produit_id" class="form-control">
                                            @foreach ($produits as $produit)
                                                <option value="{{ $produit->id }}" {!! $detail_entree->produit_id == $produit->id ?
                                                    'selected="selected"' : '' !!}>{{ $produit->nomproduit }}
                                                </option>

                                            @endforeach
                                            @error('produit_id')

                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row col-sm-12">
                                <label for="input-23" class="col-sm-2 col-form-label">Quantite</label>
                                <div class="col-sm-4">
                                    <input type="number" name="quantite" value="{{ $detail_entree->quantite }}" class="form-control"
                                        id="input-4">
                                </div>
                                <label for="input-15" class="col-sm-2 col-form-label">Prix d'achat</label>
                                <div class="col-sm-4">
                                    <input type="number" name="prix_achat" value="{{ $detail_entree->prix_achat }}"
                                        class="form-control" id="input-4">
                                </div>
                            </div>
                            <!-- <div class="form-group row"> -->
                            <div class="form-group row col-sm-12">
                                <label for="input-4" class="col-sm-2 col-form-label">Prix de vente</label>
                                <div class="col-sm-4">
                                    <input type="number" name="prix_vente" value="{{ $detail_entree->prix_vente }}"
                                        class="form-control" id="input-4">
                                </div>


                            </div>




                            <div class="form-footer">
                                <a href="{{route('detail_entrees.show',$detail_entree->entree_id)}}"><button type="button" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                    RETOUR</button></a>
                                <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                    REINITIALISER</button>
                                <button type="submit" onclick="return confirm('Voulez vous modifier le detail_entree ?')"
                                    class="btn btn-success shadow-success m-1"><i class="fa fa-check-square-o"></i>
                                    MODIFIER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
@endsection
