@extends('layouts.layout')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Table Categories</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javaScript:void();">magasin</a></li> -->
                    <li class="breadcrumb-item active" aria-current="page">Table Categories</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <form role="form" action="{{ url('categories') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                            data-target="#largesizemodal"><i class="fa fa-plus"></i> Ajouter
                            Categorie</button>
                        <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-star"></i> Ajout Categorie</h5>
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
                                                            @csrf
                                                            <h4 class="form-header text-uppercase">
                                                                <i class="fa fa-address-book-o"></i>
                                                                Identifiant Categorie
                                                            </h4>
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label for="input-10"
                                                                        class="col-sm-2 col-form-label">Nom
                                                                        Categorie</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="nom_categorie"
                                                                            class="form-control" id="input-10">
                                                                            @error('nom_categorie')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="form-group row"> -->



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
                                        <button class="btn btn-primary" type="submit" onclick="return confirm('Voulez vous enregistrer le categorie ?')">
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
                <div class="card-header"><i class="fa fa-table"></i>Liste des Categories</div>
                @error('nom_categorie')
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
                                                    aria-sort="ascending" rowspan="1" colspan="1">Categories</th>

                                                <th tabindex="0" class="sorting" aria-controls="example"
                                                    style="width: 68px;"
                                                    aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                    colspan="1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $categorie)
                                                <tr class="odd" role="row">
                                                    <td class="sorting_1">{{ $categorie->id }}</td>
                                                    <td>{{ $categorie->nom_categorie }}</td>
                                                    <td>
                                                        <a href="/categories/{{$categorie->id }}/edit"
                                                            class="btn btn-primary btn-sm" title="Edit">
                                                            <span class="fa fa-edit"></span></a>

                                                        <form action="/categories/{{$categorie->id }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Voulez vous supprimer le categorie ?')"
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
                                                <th rowspan="1" colspan="1">Categories</th>
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
