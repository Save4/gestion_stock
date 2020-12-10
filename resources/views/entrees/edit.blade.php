@extends('layouts.layout')

@section('content')
  @section('title','Entres | '.config('app.name'))
  
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <!-- <h4 class="page-title">Form Bordered</h4> -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('entrees') }}">Entrees</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit l'entrees</li>
                </ol>
            </div>

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="/entrees/{{ $entree->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-user-circle-o"></i>
                                Mettre a jour les Infos du l'entree
                            </h4>
                            <div class="form-group row">

                                <div class="form-group row col-sm-12">
                                    <label for="input-23" class="col-sm-2 col-form-label">Fournisseur</label>
                                    <div class="col-sm-4">
                                        <select name="fournisseur_id" class="form-control">
                                            @foreach ($fournisseurs as $fournisseur)
                                                <option value="{{ $fournisseur->id }}" {!! $entree->fournisseur_id ==
                                                    $fournisseur->id ? 'selected="selected"' : ''
                                                    !!}>{{ $fournisseur->name }}
                                                </option>

                                            @endforeach
                                            @error('fournisseur_id')

                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        </select>
                                    </div>

                                    <label for="input-23"
                                        class="col-sm-2 col-form-label">Type
                                        d'entree</label>
                                    <div class="col-sm-4">
                                        <select name="type_entree_id" class="form-control">
                                            @foreach ($typeentrees as $typeentree)
                                                <option value="{{ $typeentree->id }}" {!! $entree->type_entree_id ==
                                                    $typeentree->id ? 'selected="selected"' : ''
                                                    !!}>{{ $typeentree->nomtype }}
                                                </option>

                                            @endforeach
                                            @error('type_entree_id')

                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        </select>
                                    </div>
                                </div>
                            </div>


                                <div class="form-group row col-sm-12">
                                    <label for="input-23"
                                        class="col-sm-2 col-form-label">Magasin</label>
                                    <div class="col-sm-4">
                                    <select name="magasin_id" class="form-control">
                                        @foreach ($magasins as $magasin)
                                            <option value="{{ $magasin->id }}" {!! $entree->magasin_id == $magasin->id ?
                                                'selected="selected"' : '' !!}>{{ $magasin->nom_magasin }}
                                            </option>

                                        @endforeach
                                        @error('magasin_id')

                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror



                                    </select>
                                </div>
                                <label for="input-15"
                                    class="col-sm-2 col-form-label">Mode de paiement</label>
                                <div class="col-sm-4">
                                        <select name="mode_paiement_id" class="form-control">
                                            @foreach ($mode_paiements as $mode_paiement)
                                                <option value="{{ $mode_paiement->id }}" {!! $entree->mode_paiement_id ==
                                                    $mode_paiement->id ? 'selected="selected"' : ''
                                                    !!}>{{ $mode_paiement->nom_mode }}
                                                </option>

                                            @endforeach
                                            @error('mode_paiement_id')

                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror



                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row"> -->
                                <div class="form-group row col-sm-12">
                                        <label for="input-4" class="col-sm-2 col-form-label">Montant</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="montant" value="{{ $entree->montant }}"
                                                class="form-control" id="input-4">
                                        </div>

                                    <label for="input-4" class="col-sm-2 col-form-label">Date d'entree</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="date_entree" value="{{ $entree->date_entree }}"
                                            class="form-control" id="input-4">
                                    </div>
                                </div>
                                <div class="demo-checkbox">

                                    <input
                                        {{ isset($entree['etat_cloture']) && $entree['etat_cloture'] == '1' ? 'checked' : '' }}
                                        type="checkbox" class="form-check" name="etat_cloture" id="etat_cloture"
                                        class="filled-in chk-col-primary">
                                    <label for="etat_cloture">Etat de cloture</label>
                                </div>



                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary shadow-primary m-1"><i
                                            class="fa fa-backward"></i>
                                        RETOUR</button>
                                    <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                        REINITIALISER</button>
                                        <button type="submit" onclick="return confirm('Voulez vous modifier un entree ?')"
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
