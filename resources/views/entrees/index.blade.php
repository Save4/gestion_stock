@extends('layouts.layout')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Table des entrees</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Entrees</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table des entrees</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <form role="form" action="{{ url('entres') }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                            data-target="#largesizemodal">Ajouter
                            les entrees</button>
                        <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-star"></i> Ajouter les entrees</h5>
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
                                                                Les entrees
                                                            </h4>
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Fournisseur</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="fournisseur_id" id=""
                                                                            class="form-control">
                                                                            <option value="0" disabled="true"
                                                                                selected="true">Selectionner le fournisseur
                                                                            </option>
                                                                            @foreach ($fournisseurs as $fournisseur)
                                                                                <option value="{{ $fournisseur->id }}">
                                                                                    {{ $fournisseur->nom }}
                                                                                </option>
                                                                            @endforeach
                                                                            @error('fournisseur_id')

                                                                                <div class="alert alert-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror



                                                                        </select>
                                                                    </div>
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Type
                                                                        d'entree</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="type_entree_id" id=""
                                                                            class="form-control">
                                                                            <option value="0" disabled="true"
                                                                                selected="true">Selectionner la type
                                                                                d'entree
                                                                            </option>
                                                                            @foreach ($typeentrees as $typeentree)
                                                                                <option value="{{ $typeentree->id }}">
                                                                                    {{ $typeentree->nomtype }}
                                                                                </option>
                                                                            @endforeach
                                                                            @error('type_entree_id')

                                                                                <div class="alert alert-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror



                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Mode de
                                                                        paiement</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="mode_paiement_id" id=""
                                                                            class="form-control">
                                                                            <option value="0" disabled="true"
                                                                                selected="true">Selectionner le mode de
                                                                                paiement
                                                                            </option>
                                                                            @foreach ($mode_paiements as $mode_paiement)
                                                                                <option value="{{ $mode_paiement->id }}">
                                                                                    {{ $mode_paiement->nom_mode }}
                                                                                </option>
                                                                            @endforeach
                                                                            @error('mode_paiement_id')

                                                                                <div class="alert alert-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror



                                                                        </select>
                                                                    </div>
                                                                    <label for="input-15"
                                                                        class="col-sm-2 col-form-label">Magasin</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="magasin_id" id=""
                                                                            class="form-control">
                                                                            <option value="0" disabled="true"
                                                                                selected="true">Selectionner le magasin
                                                                            </option>
                                                                            @foreach ($magasins as $magasin)
                                                                                <option value="{{ $magasin->id }}">
                                                                                    {{ $magasin->nom_magasin }}
                                                                                </option>
                                                                            @endforeach
                                                                            @error('magasin_id')

                                                                                <div class="alert alert-danger">{{ $message }}
                                                                                </div>
                                                                            @enderror



                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="form-group row"> -->
                                                                <div class="form-group row">
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Montant</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="number" name="montant"
                                                                            class="form-control" id="input-12">
                                                                    </div>
                                                                    <label for="input-23"
                                                                        class="col-sm-2 col-form-label">Date d'entre</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="date" name="date_entree"
                                                                            class="form-control" id="input-12">
                                                                    </div>
                                                                </div>
                                                                <!-- </div> -->

                                                                <div class="mt-3">
                                                                    <label for="assujetva">Etat de cloture</label>

                                                                    <input type="checkbox" name="etat_cloture" checked
                                                                        data-on-color="success" data-off-color="info"
                                                                        data-on-text="Yes" data-off-text="No">
                                                                    <input type="checkbox" name="etat_cloture" checked
                                                                        data-on-color="info" data-off-color="success"
                                                                        data-on-text="1" data-off-text="0">
                                                                </div>


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
                <div class="card-header"><i class="fa fa-table"></i>Liste des entres</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="dataTables_wrapper container-fluid dt-bootstrap4" id="example_wrapper">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="example" role="grid"
                                        aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th >#</th>
                                                <th>Fournisseur</th>
                                                <th>Magasin</th>
                                                <th>Type d'entree</th>
                                                <th>Mode de paiement</th>
                                                <th>Montant</th>
                                                <th>Date d'entree</th>
                                                <th>Date de creation</th>
                                                <th>Date de mise a jour</th>
                                                <th>Etat de cloture</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($entrees as $entree)
                                                <tr class="odd" role="row">
                                                    <td class="sorting_1">{{ $entree->id }}</td>
                                                    <td>{{ $entree->nom }}</td>
                                                    <td>{{ $entree->nom_magasin }}</td>
                                                    <td>{{ $entree->nomtype }}</td>
                                                    <td>{{ $entree->nom_mode }}</td>
                                                    <td>{{ $entree->montant}}</td>
                                                    <td>{{ $entree->date_entree }}</td>
                                                    <td>{{ $entree->created_at }}</td>
                                                    <td>{{ $entree->}updated_at}</td>
                                                    <td>{{ $entree->etat_cloture == '0' ? 'No' : 'Yes' }}</td>
                                                    <td>
                                                        <a href="entrees/{{ $entree->id }}/edit"
                                                            class="btn btn-primary btn-sm" title="Edit">
                                                            <span class="fa fa-edit"></span></a>

                                                        <form action="entrees/{{ $entree->id }} " method="POST"
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
