@extends('layouts.layout')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Table Types des Entrées</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="{{url('typeentrees')}}">Fournisseurs</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Table Type Entrees</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button class="btn btn-primary mr-1" data-toggle="modal"
                    data-target="#smallsizemodal"><i class="fa fa-plus"></i> Ajouter Type Entrees</button>

            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Liste des types d'entre</div>
            @error('nomtype')
                    <div class="alert alert-light-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="alert-icon">
                            <i class="icon-close"></i>
                        </div>
                        <div class="alert-message">
                            <span> {{ $message }}</span>
                        </div>
                    </div>
                @enderror
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeentree as $typeentree)
                                    <tr>
                                        <td>{{ $typeentree->id }}</td>
                                        <td>{{ $typeentree->nomtype }}</td>
                                        <td>
                                                  <a href="{{ route('typeentrees.edit', $typeentree->id) }}"
                                                      class="btn btn-primary btn-sm" title="Edit">
                                                      <span class="fa fa-edit"></span></a>

                                                  <form action="{{ route('typeentrees.destroy', $typeentree->id)}}" method="POST"
                                                      class="d-inline">
                                                      @csrf
                                                      <button type="submit"
                                                          onclick="return confirm('Voulez vous supprimer le type d\'entre ?')"
                                                          class="btn btn-danger btn-sm" title="Delete">
                                                          <span class="fa fa-trash"></span></button>
                                                      @method('DELETE')
                                                  </form>
                                              </td>>
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
                        <h5 class="modal-title"><i class="fa fa-star"></i> Nouveau type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('typeentrees.store') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="input-5">Nom du type</label>
                                        <input type="text" name="nomtype" class="form-control" id="input-5" required>


                                    </div>


                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Voulez vous enregistrer le type entree ?')">
                                        <i class="fa fa-save"></i> Enregistrer</button>
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
