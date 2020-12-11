@extends('layouts.layout')
@section('content')

  @section('title','Mode de paiement | '.config('app.name'))



  <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Edit Mode Paiement</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('mode_paiements')}}">Mode Paiement</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Mode Paiement</li>
            </ol>
        </div>

    </div>
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-6">

            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('mode_paiements.update', $mode_paiement->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <h4 class="form-header text-uppercase">
                            <i class="fa fa-file-text-o"></i>
                            Editer
                        </h4>
                        <div class="form-group">
                            <label for="input-22">Mode de paiement</label>
                        <input type="text" name="nom_mode" value="{{ $mode_paiement->nom_mode }}" class="form-control form-control-square" id="input-22" required>
                        @error('nom_categorie')
                        <code> {{ $message }}</code>
                         @enderror
                        </div>
                        <div class="form-footer">
                           <button type="submit" class="btn btn-primary shadow-primary m-1"><i class="fa fa-backward"></i>
                                RETOUR</button>
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

@endsection()
