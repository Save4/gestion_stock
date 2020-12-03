@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <!-- <h4 class="page-title">Form Bordered</h4> -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/homr')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('fournisseurs')}}">Fournisseur</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Fournisseur</li>
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
                    <form role="form" action="/fournisseurs/{{$fournisseur->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="form-header text-uppercase">
                            <i class="fa fa-user-circle-o"></i>
                            Mettre a jour les Infos du Fournisseur
                        </h4>
                        <div class="form-group row">
                            <label for="input-1" class="col-sm-2 col-form-label">Nom Fournisseur</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{$fournisseur->name}}" class="form-control"
                                    id="input-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-2" class="col-sm-2 col-form-label">Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="tel" value="{{$fournisseur->tel}}" class="form-control"
                                    id="input-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-3" class="col-sm-2 col-form-label">Email </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="{{$fournisseur->email}}" class="form-control"
                                    id="input-3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-4" class="col-sm-2 col-form-label">Nif</label>
                            <div class="col-sm-10">
                                <input type="text" name="nif" value="{{$fournisseur->nif}}" class="form-control"
                                    id="input-4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-4" class="col-sm-2 col-form-label">Rc</label>
                            <div class="col-sm-10">
                                <input type="text" name="rc" value="{{$fournisseur->rc}}" class="form-control"
                                    id="input-4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-4" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-10">
                                <input type="text" name="adresse" value="{{$fournisseur->adresse}}" class="form-control"
                                    id="input-4">
                            </div>
                        </div>
                        <div class="demo-checkbox">
                            <!-- <input type="hidden" value="0" name="assujetva"> -->
                            <input {{ isset($fournisseur['assujetva']) && $fournisseur['assujetva']=='1' ?
                                            'checked' : ''}} type="checkbox"
                                class="form-check" name="assujetva" id="assujetva" class="filled-in chk-col-primary">
                            <label for="assujetva">Assujetva</label>
                        </div>


                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary shadow-primary m-1"><i class="fa fa-times"></i>
                                ANNULER</button>
                            <button type="submit" class="btn btn-success shadow-success m-1"><i
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