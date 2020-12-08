@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Tables Fournisseurs</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="javaScript:void();">Fournisseurs</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Table Fournisseurs</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <form role="form" action="{{url('fournisseurs')}}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-primary m-1" data-toggle="modal"
                        data-target="#largesizemodal"><i class="fa fa-plus"></i> Ajouter
                        Fournisseur</button>
                    <div class="modal fade" id="largesizemodal" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-star"></i> Ajout Fournisseur</h5>
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
                                                            Identifiants Fournisseur
                                                        </h4>
                                                        <form>
                                                            <div class="form-group row">
                                                                <label for="input-10"
                                                                    class="col-sm-2 col-form-label">Nom
                                                                    Fournisseur</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="name"
                                                                        class="form-control @error('name') is-danger @enderror"
                                                                        id="input-10">
                                                                    @error('name')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <label for="input-11"
                                                                    class="col-sm-2 col-form-label">Telephone</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="tel"
                                                                        class="form-control @error('tel') is-danger @enderror"
                                                                        id="input-11">
                                                                    @error('tel')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-12"
                                                                    class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-4">
                                                                    <input type="email" name="email"
                                                                        class="form-control @error('email') is-danger @enderror"
                                                                        id="input-12">
                                                                    @error('email')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <label for="input-13"
                                                                    class="col-sm-2 col-form-label">NIF</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="nif"
                                                                        class="form-control @error('nif') is-danger @enderror"
                                                                        id="input-13">
                                                                    @error('nif')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="input-14"
                                                                    class="col-sm-2 col-form-label">RC</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="rc"
                                                                        class="form-control @error('rc') is-danger @enderror"
                                                                        id="input-14">
                                                                    @error('rc')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <label for="input-15"
                                                                    class="col-sm-2 col-form-label">Adresse</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="adresse"
                                                                        class="form-control @error('adresse') is-danger @enderror"
                                                                        id="input-15">
                                                                    @error('adresse')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- <div class="form-group row"> -->

                                                            <div class="demo-checkbox">

                                                                <input type="checkbox" id="assujetva" name="assujetva"
                                                                    class="filled-in chk-col-primary" checked="">
                                                                <label for="assujetva">Assujetva</label>
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
                                    <button class="btn btn-primary" type="submit"
                                        onclick="return confirm('Voulez vous Enregistrer le fournisseur ?')">
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
            <div class="card-header"><i class="fa fa-table"></i>Liste des fournisseurs</div>
            @error('name')
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
            @error('email')
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
                                                aria-sort="ascending" rowspan="1" colspan="1">Nom Fournisseur</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 215px;"
                                                aria-label="Position: activate to sort column ascending" rowspan="1"
                                                colspan="1">Telephone</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 90px;"
                                                aria-label="Office: activate to sort column ascending" rowspan="1"
                                                colspan="1">Email</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 32px;" aria-label="Age: activate to sort column ascending"
                                                rowspan="1" colspan="1">NIF</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 86px;"
                                                aria-label="Start date: activate to sort column ascending" rowspan="1"
                                                colspan="1">RC</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 68px;"
                                                aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                colspan="1">Adresse</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 68px;"
                                                aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                colspan="1">Assujet Tva</th>
                                            <th tabindex="0" class="sorting" aria-controls="example"
                                                style="width: 68px;"
                                                aria-label="Salary: activate to sort column ascending" rowspan="1"
                                                colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fournisseurs as $fournisseur)
                                        <tr class="odd" role="row">
                                            <td class="sorting_1">{{$fournisseur->id}}</td>
                                            <td>{{$fournisseur->name}}</td>
                                            <td>{{$fournisseur->tel}}</td>
                                            <td>{{$fournisseur->email}}</td>
                                            <td>{{$fournisseur->nif}}</td>
                                            <td>{{$fournisseur->rc}}</td>
                                            <td>{{$fournisseur->adresse}}</td>
                                            <td>{{$fournisseur->assujetva == '0' ? 'No' : 'Yes'}}</td>
                                            <td>
                                                <a href="fournisseurs/{{$fournisseur->id}}/edit"
                                                    class="btn btn-primary btn-sm" title="Edit">
                                                    <span class="fa fa-edit"></span></a>

                                                <form action="fournisseurs/{{$fournisseur->id}} " method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Voulez vous supprimer le fournisseur ?')"
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
                                            <th rowspan="1" colspan="1">Nom Fournisseur</th>
                                            <th rowspan="1" colspan="1">Telephone</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">NIF</th>
                                            <th rowspan="1" colspan="1">RC</th>
                                            <th rowspan="1" colspan="1">Adresse</th>
                                            <th rowspan="1" colspan="1">Assujet Tva</th>
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