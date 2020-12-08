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
                            @method('GET')
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
                                            class="fa fa-times"></i>
                                        ANNULER</button>
                                    <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                        REINITIALISER</button>
                                        <button type="submit" onclick="return confirm('Voulez vous modifier le fournisseur ?')"
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

    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Table des details d'entree</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Entrees detailes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table des entrees detaile</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <form role="form" action="{{ url('detail_entrees') }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                            data-target="#largesizemodal">Ajouter
                            les entrees detaile</button>


                        <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-star"></i> Ajouter les entrees detaile</h5>
                                        <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form class="form-bordered">
                                                            <h4 class="form-header text-uppercase">
                                                                <i class="fa fa-address-book-o"></i>
                                                                Les entrees detaile
                                                            </h4>
                                                            <form>
                                                                <div class="form-group row">

                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Produit</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="produit_id" id=""
                                                                            class="form-control">
                                                                            <option value="0" disabled="true"
                                                                                selected="true">Selectionner le produit
                                                                            </option>
                                                                            @foreach ($produits as $produit)
                                                                                <option value="{{ $produit->id }}">
                                                                                    {{ $produit->nomproduit }}
                                                                                </option>
                                                                            @endforeach
                                                                            @error('produit_id')

                                                                                <div class="alert alert-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror



                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Quantite</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" name="quantite"
                                                                            class="form-control" id="input-12">
                                                                    </div>
                                                                    <label for="input-15"
                                                                        class="col-sm-2 col-form-label">Prix d'achat</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" name="prix_achat"
                                                                            class="form-control" id="input-12">
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="form-group row"> -->
                                                                <div class="form-group row">
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Prix de vente</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" name="prix_vente"
                                                                            class="form-control" id="input-12">
                                                                    </div>

                                                                </div>
                                                                <!-- </div> -->




                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Row-->
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="reset" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Fermer</button>
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-check-square-o"></i>
                                            Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="javaScript:void();">Action</a>
        <a class="dropdown-item" href="javaScript:void();">Another action</a>
        <a class="dropdown-item" href="javaScript:void();">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="javaScript:void();">Separated link</a>
    </div>
    </div>
    </div>
    </div>
    <!-- End Breadcrumb-->



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i>Liste des entrees detail</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4" id="example_wrapper">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="example" role="grid"
                                        aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>entree</th>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Prix d'achat</th>
                                                <th>Prix de vente</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail_entrees as $detail_entree)
                                                <tr>
                                                    <td>{{ $detail_entree->id }}</td>
                                                    <td>{{ $detail_entree->entree_id }}</td>
                                                    <td>{{ $detail_entree->nomproduit }}</td>
                                                    <td>{{ $detail_entree->quantite }}</td>
                                                    <td>{{ $detail_entree->prix_achat }}</td>
                                                    <td>{{ $detail_entree->prix_vente }}</td>
                                                    <td>
                                                        <a href="detail_entrees/{{ $detail_entree->id }}/edit"
                                                            class="btn btn-primary btn-sm" title="Edit">
                                                            <span class="fa fa-edit"></span></a>

                                                        <form action="detail_entrees/{{ $detail_entree->id }} " method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Voulez vous supprimer l'entrees ?')"
                                                                class="btn btn-danger btn-sm" title="Delete">
                                                                <span class="fa fa-trash"></span></button>
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
