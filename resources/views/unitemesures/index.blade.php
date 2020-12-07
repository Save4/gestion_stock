@extends('layouts.layout')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Les unités de mesure</h4>

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
                <div class="card-header"><i class="fa fa-table"></i> Liste des unites de mesure</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unité</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unite as $unite)
                                    <tr>
                                        <td>{{ $unite->id }}</td>
                                        <td>{{ $unite->nomunite }}</td>
                                        <td>
                                               <a href="{{ route('unitemesures.edit', $unite->id) }}"
                                                   class="btn btn-primary btn-sm" title="Edit">
                                                   <span class="fa fa-edit"></span></a>

                                               <form action="{{ route('unitemesures.destroy', $unite->id)}}" method="POST"
                                                   class="d-inline">
                                                   @csrf
                                                   <button type="submit"
                                                       onclick="return confirm('Voulez vous supprimer l'unite de mesure ?')"
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
                                    <th>Unité</th>
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
                        <h5 class="modal-title"><i class="fa fa-star"></i> Nouvelle unité</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('unitemesures.store') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="input-5">Nom d'unité</label>
                                        <input type="text" name="nomunite" class="form-control" id="input-5" required>


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
