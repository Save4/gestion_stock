@extends('layouts.layout')
@section('content')

  @section('title','Mode de paiement | '.config('app.name'))



  <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Mode de paiement</h4>

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
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i>
                                Annuler</button>
                            <button type="reset" class="btn btn-dark shadow-dark m-1" class="d-inline"> <i class="fa fa-times"></i>
                                Reinitialiser</button>
                            <button type="submit" class="btn btn-success shadow-success m-1" class="d-inline"><i
                                    class="fa fa-check-square-o"></i> Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--End Row-->

@endsection()
