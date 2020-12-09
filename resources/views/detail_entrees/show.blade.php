@extends('layouts.layout')

@section('content')
@section('title','Entres | '.config('app.name'))


<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Table details entrees</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
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
                <input type="date" name="" value="{{ $entree->date_entree }}" class="form-control" id="input-10" readonly>
            </div>
            <label for="input-10" class="col-sm-1 col-form-label">Fournisseur</label>
               <input type="text" value=" {{ $entree->name }}" class="form-control" id="input-10" readonly>
            <div class="col-sm-3">

            </div>
        </div>


        <fieldset>
            <legend>Details Entrees</legend>

            <form action="">
                <div class="form-group row">
                    <label for="input-23" class="col-sm-2 col-form-label">Produit</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control">
                            <option value="">yes</option>
                        </select>
                    </div>
                    <label for="input-23" class="col-sm-2 col-form-label">Quantite</label>
                    <div class="col-sm-4">
                        <input type="text" name="date_entree" class="form-control" id="input-12">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-23" class="col-sm-2 col-form-label">Prix Achat</label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" class="form-control" id="input-12">
                    </div>
                    <label for="input-23" class="col-sm-2 col-form-label">Prix Vente</label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" class="form-control" id="input-12">
                    </div>
                </div>
                <div>
                    <button class="btn btn-secondary" type="reset" data-dismiss="modal"><i class="fa fa-backward"></i>
                        Retour</button>
                    <button class="btn btn-primary" type="submit" onclick="return confirm('Voulez vous enregistrer un entree ?')">
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
                                <table class="table table-bordered dataTable" id="example" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Produit</th>
                                            <th>Quantite</th>
                                            <th>Prix Achat</th>
                                            <th>Prix Vente</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $entree->id }}</td>
                                            <td>{{ $entree->name }}</td>
                                            <td>{{ $entree->nom_magasin }}</td>
                                            <td>{{ $entree->nomtype }}</td>
                                            <td>{{ $entree->nom_mode }}</td>
                                            <td>

                                                <a href="entrees/{{ $entree->id }}/edit" class="btn btn-primary btn-sm" title="Edit" class="d-inline">
                                                    <span class="fa fa-edit"></span></a>

                                                <form action="entrees/{{ $entree->id }} " method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Voulez vous supprimer un entree ?')" class="btn btn-danger btn-sm" title="Delete">
                                                        <span class="fa fa-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>

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


@endsection
