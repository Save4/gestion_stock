@extends('layouts.layout')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Les unités de mesure</h4>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">BangoDash</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
            </ol> --}}
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
                <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
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
                                            <div class="btn-group" role="group" aria-label="Button group">
                                                <a href="{{ route('unitemesures.edit', $unite->id) }}"><strong><i
                                                            class="fa fa-edit"></i></strong></a>
                                                <form action="{{ route('unitemesures.destroy', $unite->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de supprimer ce chauffeur ? ')"><strong><i class="fa fa-trash"></i></strong></button>
                                                </form>
                                            </div>
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
                                    {{-- <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-check-square-o"></i>
                                            Enregistrer</button>
                                    </div> --}}
                                    {{-- <div class="form-footer">
                                        <button type="submit" class="btn btn-dark shadow-dark m-1"><i
                                                class="fa fa-times"></i> Cancel</button>
                                        <button type="submit" class="btn btn-success shadow-success m-1"><i
                                                class="fa fa-check-square-o"></i> Save</button>
                                    </div> --}}

                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-times"></i>
                                            Close</button>
                                        <button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i>
                                            Save
                                            changes</button>
                                    </div> --}}


                                    {{-- <button type="button" class="btn btn-primary"><i
                                            class="fa fa-check-square-o"></i>
                                        Enregistrer</button> --}}

                                    <button type="submit" class="btn btn-primary"> Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save
                        changes</button>
                </div> --}}
            </div>
        </div>
    </div>

    </div><!-- End Row-->
@endsection
