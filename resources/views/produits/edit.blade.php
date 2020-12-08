@extends('layouts.layout')

@section('content')
  @section('title','Produit | '.config('app.name'))

<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <!-- <h4 class="page-title">Form Bordered</h4> -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('produits')}}">Produits</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Produit</li>
            </ol>
        </div>
        <!-- <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i
                        class="fa fa-cog mr-1"></i> Setting</button>
                <button type="button"
                    class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                    data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <a href="javaScript:void();" class="dropdown-item">Action</a>
                    <a href="javaScript:void();" class="dropdown-item">Another action</a>
                    <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                </div>
            </div>
        </div> -->
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="/produits/{{$produit->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="form-header text-uppercase">
                            <i class="fa fa-user-circle-o"></i>
                            Modifier le produit
                        </h4>
                        <div class="form-group row">
                            <label for="input-1" class="col-sm-2 col-form-label">Nom Produit</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomproduit" value="{{$produit->nomproduit}}" class="form-control"
                                    id="input-1">
                            </div>
                        </div>
                        <div class="form-group row">

                        <label for="input-1" class="col-sm-2 col-form-label"> Categorie</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categorie_id" id="categorie_id">
                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}"{!! $produit->categorie_id==$categorie->id ? 'selected="selected"':'' !!}>
                                        {{ $categorie->nom_categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                        <label for="input-1" class="col-sm-2 col-form-label"> Unite Mesure</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="unitemesure_id" id="unitemesure_id">
                                    @foreach($unitemesures as $unitemesure)
                                    <option value="{{$unitemesure->id}}"{!! $produit->unitemesure_id==$unitemesure->id ? 'selected="selected"':'' !!}>
                                        {{ $unitemesure->nomunite}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-3" class="col-sm-2 col-form-label">Prix Achat </label>
                            <div class="col-sm-10">
                                <input type="text" name="prixachat" value="{{$produit->prixachat}}" class="form-control"
                                    id="input-3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-4" class="col-sm-2 col-form-label">Prix Vente</label>
                            <div class="col-sm-10">
                                <input type="text" name="prixvente" value="{{$produit->prixvente}}" class="form-control"
                                    id="input-4">
                            </div>
                        </div>


                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                RETOUR</button>
                            <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                REINITIALISER</button>
                            <button type="submit" onclick="return confirm('Voulez vous modifier le produit ?')"
                             class="btn btn-success shadow-success m-1"><i
                                    class="fa fa-check-square-o"></i>
                                MODIFIER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
</div>
@endsection
