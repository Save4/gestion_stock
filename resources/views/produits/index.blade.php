@extends('layouts.layout')

@section('content')

  @section('title','Produits | '.config('app.name'))



<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Tables Produits</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="javaScript:void();">Produits</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Table Produits</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <form role="form" action="{{url('produits')}}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                        data-target="#largesizemodal"><i class="fa fa-plus"></i> Ajouter
                        Produit</button>
                    <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-star"></i> Ajout Produit</h5>
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
                                                            Identifiants Produits
                                                        </h4>
                                                        <form>
                                                            <div class="form-group row">
                                                                <label for="input-10"
                                                                    class="col-sm-2 col-form-label">Nom
                                                                    Produits</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nomproduit"
                                                                        class="form-control @error('nomproduit') is-danger @enderror" id="input-10"
                                                                        placeholder="Taper le nom du produit ici">
                                                                        @error('nomproduit')
                                                                        <div class="alert alert-danger">{{$message}}
                                                                        </div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nomunite"

                                                                    class="col-sm-2 col-form-label">Categorie</label>
                                                                <div class="col-sm-10">
                                                                    <select
                                                                        class="form-control @error('nom_categorie') is-danger @enderror"
                                                                        name="categorie_id" id="categorie_id">
                                                                        <option>Select Category</option>
                                                                        @foreach($categories as $categorie)
                                                                        <option value="{{$categorie->id}}">
                                                                            {{$categorie->nom_categorie}}</option>
                                                                        @endforeach
                                                                        @error('categorie_id')
                                                                        <div class="alert alert-danger">{{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nomunite"

                                                  class="col-sm-2 col-form-label">Unite Mesure</label>
                                                                <div class="col-sm-10">
                                                                    <select class="form-control @error('nomunite') is-danger @enderror" name="unitemesure_id"
                                                                        id="unitemesure_id">
                                                                        <option>Select Unite Mesure</option>
                                                                        @foreach($unitemesures as $unitemesure)
                                                                        <option value="{{$unitemesure->id}}">
                                                                            {{$unitemesure->nomunite}}</option>
                                                                        @endforeach
                                                                        @error('unitemesure_id')
                                                                        <div class="alert alert-danger">{{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="input-10"
                                                                    class="col-sm-2 col-form-label">Prix Achat</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="prixachat"
                                                                        class="form-control @error('prixachat') is-danger @enderror" id="input-10"
                                                                        placeholder="Taper le prix d'achat ici">
                                                                        @error('prixachat')
                                                                        <div class="alert alert-danger">{{$message}}
                                                                        </div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-10"
                                                                    class="col-sm-2 col-form-label">Prix Vente</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="prixvente"
                                                                        class="form-control @error('prixvente') is-danger @enderror" id="input-10"
                                                                        placeholder="Taper le prix de vente ici">
                                                                        @error('prixvente')
                                                                        <div class="alert alert-danger">{{$message}}
                                                                        </div>
                                                                        @enderror
                                                                </div>
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
                                    <button class="btn btn-primary" type="submit"
                                        onclick="return confirm('Voulez vous Enregistrer le produit ?')">
                                        <i class="fa fa-check-square-o"></i>
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
            <div class="card-header"><i class="fa fa-table"></i>Liste des Produits</div>
            @error('nomproduit')
            <div class="alert alert-light-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon">
                    <i class="icon-close"></i>
                </div>
                <div class="alert-message">
                    <span> {{ $message }}</span>
                </div>
            </div>
            @enderror
            <div class="col-xs-12">
                @if (session('status'))
                <div class="alert alert-success">
                   {{ session('status') }} 
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="dataTables_wrapper container-fluid dt-bootstrap4" id="example_wrapper">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="example" role="grid"
                                    aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 68px;"
                                                aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                colspan="1">#</th>
                                            <th tabindex="0" class="sorting_asc" aria-controls="example"
                                                style="width: 131px;"
                                                aria-label="Name: activate to sort column descending"
                                                aria-sort="ascending" rowspan="1" colspan="1">Nom Produit</th>

                                                <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 215px;"
                                                aria-label="Position: activate to sort column ascending" rowspan="1"
                                                colspan="1">Categorie</th>


                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 215px;"
                                                aria-label="Position: activate to sort column ascending" rowspan="1"
                                                colspan="1">Unite Mesure</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 90px;"
                                                aria-label="Office: activate to sort column ascending" rowspan="1"
                                                colspan="1">Prix Achat</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 32px;" aria-label="Age: activate to sort column ascending"
                                                rowspan="1" colspan="1">Prix Vente</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 68px;"
                                                aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produits as $produit)
                                        <tr class="odd" role="row">
                                            <td class="sorting_1">{{$produit->id}}</td>
                                            <td>{{$produit->nomproduit}}</td>


                                            <td>{{$produit->nom_categorie}}</td>


                                            <td>{{$produit->nomunite}}</td>
                                            <td>{{$produit->prixachat}}</td>
                                            <td>{{$produit->prixvente}}</td>
                                            <td>
                                                <a href="produits/{{$produit->id}}/edit" class="btn btn-primary btn-sm"
                                                    title="Edit">
                                                    <span class="fa fa-edit"></span></a>

                                                <form action="produits/{{$produit->id}} " method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Voulez vous supprimer le produit ?')"
                                                        class="btn btn-danger btn-sm" title="Delete">
                                                        <span class="fa fa-trash"></span></button>
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">#</th>
                                            <th rowspan="1" colspan="1">Nom Produit</th>

                                            <th rowspan="1" colspan="1">Nom Categorie</th>


                                            <th rowspan="1" colspan="1">Unite Mesure</th>
                                            <th rowspan="1" colspan="1">Prix Achat</th>
                                            <th rowspan="1" colspan="1">Prix Vente</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot>
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
