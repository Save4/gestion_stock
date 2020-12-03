@extends('layouts.layout')

@section('content')
  @section('title','Mode de paiement | '.config('app.name'))


  <!-- Breadcrumb-->
   <div class="row pt-2 pb-2">
       <div class="col-sm-9">
           <h4 class="page-title">Mode de paiement</h4>

       </div>
       <div class="col-sm-3">
           <div class="btn-group float-sm-right">
               <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal"
                   data-target="#smallsizemodal"><i class="fa fa-cog mr-1"></i> Ajouter</button>

           </div>
       </div>
   </div>
   <!-- End Breadcrumb-->

   <div class="row">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-header"><i class="fa fa-table"></i> Mode de paiement</div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table id="example" class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Mode de paiement</th>
                                   <th>Actions</th>

                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($mode_paiements as $mode_paiement)
                                   <tr>
                                       <td>{{ $mode_paiement->id }}</td>
                                       <td>{{ $mode_paiement->nom_mode }}</td>
                                       <td>
                                           <div class="btn-group" role="group" aria-label="Button group">
                                               <button><a href="{{ route('mode_paiements.edit', $mode_paiement->id) }}"  title="Edit"><strong><i
                                                           class="fa fa-edit"></i></strong></a></button>
                                               <form action="{{ route('mode_paiements.destroy', $mode_paiement->id)}}" method="post">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button type="submit" onclick="return confirm('Supprimer ? ')" title="Delete"><strong><i class="fa fa-trash"></i></strong></button>
                                               </form>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach


                           </tbody>
                           <tfoot>
                               <tr>
                                   <th>#</th>
                                   <th>MOde de paiement</th>
                                   <th>Actions</th>
                               </tr>
                           </tfoot>
                       </table>
                   </div>
               </div>
           </div>
       </div>


       <!-- Modal -->
       <div class="modal fade" id="smallsizemodal">
           <div class="modal-dialog modal-sm">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title"><i class="fa fa-star"></i> Ajouter un mode de paiement</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <div class="card">
                           <div class="card-body">
                               <form method="POST" action="{{ route('mode_paiements.store') }}">
                                   @csrf
                                   @method('POST')
                                   <div class="form-group">
                                       <label for="input-5">Nom d'unité</label>
                                       <input type="text" name="nom_mode" class="form-control" id="input-5" required>


                                   </div>

                                   <button type="submit" class="btn btn-primary"> Save</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </div>

   </div><!-- End Row-->
@endsection
