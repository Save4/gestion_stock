@extends('layouts.layout')

@section('content')
@section('title', 'Entres | ' . config('app.name'))


<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Table details entrees</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="javaScript:void();">Entrees</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Table details entrees</li>
            </ol>
        </div>

        <div class="form-row">
            <label for="input-10" class="col-sm-1 col-form-label">Numero Entree</label>
            <div class="col-sm-3">
                <input type="text" name="" value="{{ $entree->id }}" class="form-control" id="input-10" readonly>
            </div>
            <label for="input-10" class="col-sm-1 col-form-label">Date d'entre</label>
            <div class="col-sm-3">
                <input type="date" name="" value="{{ $entree->date_entree }}" class="form-control" id="input-10"
                    readonly>
            </div>
            <label for="input-10" class="col-sm-1 col-form-label">Fournisseur</label>
            <div class="col-sm-3">
                <input type="text" value=" {{ $entree->name }}" class="form-control" id="input-10" readonly>
            </div>
        </div>


        <fieldset>
            <legend>Details Entrees</legend>

            <form role="form" action="{{route('detail_entrees.store')}}" method="POST">
                @csrf
                <div class="form-group row">

                    <label for="input-23" class="col-sm-1 col-form-label">Code Entree</label>
                    <div class="col-sm-3">
                        <select name="entree_id" id="entree_id" class="form-control">
                            <option value="">select code entree</option>
                            <option value="{{$entree->id}}">{{$entree->id}}</option>
                        </select>
                    </div>

                    <label for="input-23" class="col-sm-1 col-form-label">Produit</label>
                    <div class="col-sm-3">
                        <select name="produit_id" id="produit_id" class="form-control">
                            <option value="">Select produit</option>
                            @foreach($produit as $produit)
                            <option value="{{$produit->id}}">{{$produit->nomproduit}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="input-23" class="col-sm-1 col-form-label">Quantite</label>
                    <div class="col-sm-3">
                        <input type="number" name="quantite" class="form-control" id="input-12">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-23" class="col-sm-2 col-form-label">Prix Achat</label>
                    <div class="col-sm-4">
                        <input type="text" name="prix_achat" class="form-control" id="input-12">
                    </div>
                    <label for="input-23" class="col-sm-2 col-form-label">Prix Vente</label>
                    <div class="col-sm-4">
                        <input type="text" name="prix_vente" class="form-control" id="input-12">
                    </div>
                </div>
                <div>
                    <a href="{{url('entrees')}}"><button class="btn btn-secondary" type="button" data-dismiss="modal"><i
                                class="fa fa-backward"></i>
                            Retour</button></a>
                    <button class="btn btn-primary" type="submit"
                        onclick="return confirm('Voulez vous enregistrer un entree ?')">
                        <i class="fa fa-check-square-o"></i>
                        Enregistrer</button>
            </form>

        </fieldset>
    </div>

    <!--  -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Liste details entres</div>
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
                                            <th>Code Entree</th>
                                            <th>Produit</th>
                                            <th>Quantite</th>
                                            <th>Prix Achat</th>
                                            <th>Prix Vente</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_entree as $detail_entree)
                                        <tr>
                                            <td>{{$detail_entree->id}}</td>
                                            <td>{{$detail_entree->entree_id}}</td>
                                            <td>{{$detail_entree->nomproduit}}</td>
                                            <td>{{$detail_entree->quantite}}</td>
                                            <td>{{$detail_entree->prix_achat}}</td>
                                            <td>{{$detail_entree->prix_vente}}</td>
                                            <td>

                                                <a href="/detail_entrees/{{$detail_entree->id}}/edit"
                                                    class="btn btn-primary btn-sm" title="Edit" class="d-inline">
                                                    <span class="fa fa-edit"></span></a>

                                                <form action="/detail_entrees/{{$detail_entree->id}}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Voulez vous supprimer un detail entree ?')"
                                                        class="btn btn-danger btn-sm" title="Delete">
                                                        <span class="fa fa-trash"></span></button>
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
    <!--  -->




</div>

<!-- End Breadcrumb-->


@endsection