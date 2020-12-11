@extends('layouts.layout')

@section('content')
  @section('title','Mode de paiement | '.config('app.name'))


  <!-- Breadcrumb-->
   <div class="row pt-2 pb-2">
       <div class="col-sm-9">
           <h4 class="page-title"> Table Mode de paiement</h4>
           <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="{{url('typeentrees')}}">Fournisseurs</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Table Mode Paiement</li>
            </ol>
       </div>
       <div class="col-sm-3">
           <div class="btn-group float-sm-right">
               <button class="btn btn-primary mr-1" data-toggle="modal"
                   data-target="#smallsizemodal"><i class="fa fa-plus"></i> Ajouter Mode Paiement</button>

           </div>
       </div>
   </div>
   <!-- End Breadcrumb-->

   <div class="row">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-header"><i class="fa fa-table"></i> Liste Mode de paiement</div>
               <div class="col-xs-12">
                @if (session('status'))
                <div class="alert alert-success">
                   {{ session('status') }} 
                </div>
                @endif
            </div>
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
                                                  <a href="{{ route('mode_paiements.edit', $mode_paiement->id) }}"
                                                      class="btn btn-primary btn-sm" title="Edit">
                                                      <span class="fa fa-edit"></span></a>

                                                  <form action="{{ route('mode_paiements.destroy', $mode_paiement->id)}}" method="POST"
                                                      class="d-inline">
                                                      @csrf
                                                      <button type="submit"
                                                          onclick="return confirm('Voulez vous supprimer le mode de paiement ?')"
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
                                   <th>#</th>
                                   <th>Mode de paiement</th>
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
                                       <label for="input-5">Mode de paiement</label>
                                       <input type="text" name="nom_mode" class="form-control" id="input-5" required>


                                   </div>

                                   <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Enregistrer</button>
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
