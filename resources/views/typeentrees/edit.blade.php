@extends('layouts.layout')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Les types des entrées</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('typeentrees') }}">Type Entrees</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Typee Entrees</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button class="btn btn-primary " data-toggle="modal" data-target="#smallsizemodal"><i
                        class="fa fa-plus"></i> Ajouter</button>

            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-6">
            <!-- {{-- <h6 class="text-uppercase">Form with square input</h6>
                    --}} -->
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
                            <label for="input-22">Nom du type d'entre</label>
                            <input type="text" name="nomtype" value="{{ $typeentree->nomtype }}"
                                class="form-control form-control-square" id="input-22" required>
                            @error('nomtype')
                                <code> {{ $message }}</code>
                            @enderror
                        </div>
                        <div class="form-footer">

                            <a href="{{ route('typeentrees.index') }}"><button type="button"
                                    class="btn btn-primary shadow-primary m-1"><i
                                            class="fa fa-backward"></i>
                                        RETOUR</button></a>

                            <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                REINITIALISER</button>
                            <button type="submit" class="btn btn-success shadow-success m-1"><i
                                    class="fa fa-check-square-o"></i>
                                Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--End Row-->


@endsection
