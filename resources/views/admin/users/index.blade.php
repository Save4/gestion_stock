@extends('layouts.layout')
@section('content')


<div class="content-wrapper">
    <div class="row justify-content-center">
      <div class="card">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                 <h1 class="card-title"><strong>Liste des utilisateurs</strong></h1>

                <div class="card-body">
                    <table id="tb1" class="table table-bordered table-striped"style="font-size:12px;font-family:'Times New Roman'">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Roles</th>
                  <th class="disabled-sorting text-right" scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach($users as $user)
               <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{ implode(',', $user->roles()->get()->pluck('role')->toArray())}}</td>

                    <td>
                       @can('edit-users')
                      <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary">Editer</button></a>
                      @endcan
                      @can('delete-users')
                      <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Supprimer</button>
                      </form>
                      @endcan
                    </td>

                 </tr>
                 @endforeach
              </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
