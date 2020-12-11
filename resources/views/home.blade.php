@extends('layouts.app')

@section('content')
<div class="container">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <h1> Gestion stock</h1>
                        </div>
                    @endif

                          <div class="alert btn-danger">
                            <p class="lead text-center"> <b>Bienvenue a notre application de gestion du stock </b> </p>
                          </div>

    <div class="row">


        <div class="col-md-3">
          <a href="{{route('produits.index')}}" class="thumbnail">
            <img src="images/produit.jpg" alt="...">
          </a>  <h4 class="text-center">Les produits</h4>
        </div>
<div class="col-md-3">
  <a href="{{route('entrees.index')}}" class="thumbnail">
    <img src="images/entre.jpg" class="img-responsive" alt="...">
  </a>  <h4 class="text-center">Les entrees</h4>
</div>
<!-- <div class="col-md-4">
  <a href="{{route('detail_entrees.index')}}" class="thumbnail">
    <img src="images/detail.jpg" alt="...">
  </a>  <h4 class="text-center">Le detail des entrees</h4>
</div> -->

<div class="col-md-3">
  <a href="{{route('magasins.index')}}" class="thumbnail">
    <img src="images/magasin.jpg" class="img-responsive" alt="...">
  </a>  <h4 class="text-center">les magasins</h4>
</div>

<div class="col-md-3">
  <a href="{{route('fournisseurs.index')}}" class="thumbnail">
    <img src="images/fournisseur.jpg" class="img-responsive" alt="...">
  </a>  <h4 class="text-center">Les fournisseurs</h4>
</div>




</div>
</div>
@endsection
