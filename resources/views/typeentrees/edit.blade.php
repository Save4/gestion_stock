@extends('layouts.layout')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Les types des entrées</h4>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">BangoDash</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
            </ol> --}}
        </div>
        {{-- <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal"
                    data-target="#smallsizemodal"><i class="fa fa-cog mr-1"></i> Ajouter</button>

            </div>
        </div> --}}
    </div>
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-6">
            {{-- <h6 class="text-uppercase">Form with square input</h6>
            --}}
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('typeentrees.update', $typeentree->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <h4 class="form-header text-uppercase">
                            <i class="fa fa-file-text-o"></i>
                            Editer
                        </h4>
                        <div class="form-group">
                            <label for="input-22">Unité</label>
                        <input type="text" name="nomtype" value="{{ $typeentree->nomtype }}" class="form-control form-control-square" id="input-22" required>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary shadow-primary m-1"><i class="fa fa-times"></i>
                                ANNULER</button>
                                <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                               REINITIALISER</button>
                            <button type="submit" class="btn btn-success shadow-success m-1"><i
                                    class="fa fa-check-square-o"></i>
                                MODIFIER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--End Row-->


@endsection
