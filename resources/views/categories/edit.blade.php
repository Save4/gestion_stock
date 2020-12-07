@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <!-- <h4 class="page-title">Form Bordered</h4> -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editer le Categorie</li>
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
                        <form role="form" action="categories/{{$categorie->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="form-header text-uppercase">
                                <i class="fa fa-user-circle-o"></i>
                                Mettre a jour les Infos du Categorie
                            </h4>
                            <div class="form-group row">
                                <label for="input-1" class="col-sm-2 col-form-label">Nom Categorie</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nom_categorie" value="{{ $categorie->nom_categorie }}"
                                        class="form-control" id="input-1" required>
                                </div>
                            </div>



                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                    Retour</button>
                                <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                    Reinitialiser</button>
                                <button type="submit" class="btn btn-success shadow-success m-1"><i
                                        class="fa fa-check-square-o"></i>
                                    Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->
    </div>
@endsection
