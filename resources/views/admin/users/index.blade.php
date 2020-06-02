@extends('layouts.dashboardAdmin')
@section('title')
Gestion des utilisateurs
@endsection
@section('PageHeader')
Gestion des utilisateurs
@endsection
@section('content')
@include("partials.alerts")
<div class="row justify-content-center">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6 ">
            <h5>liste des utilisateurs
            </h5>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('users.search')}}" method="get" >
              <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-perpend">
                  <button type="submit" class="btn btn-primary">chercher
                  </button>
                </span>
              </div>
            </form>
          </div>
          <div class="col-md-2 text-right">
            <a href="{{ route('users.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
      </div>
      <div>
        @if (!$users->isEmpty())
        <table class="table table-bordered" style=" table-layout: auto">
          <thead>
            <tr>
              <th scope="col">id
              </th>
              <th scope="col">nom
              </th>
              <th scope="col">email
              </th>
              <th scope="col" style="width:150px"  >operations
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($users as $user)
              <th scope="row">{{ $user->id }}
              </th>
              <td>{{ $user->name }}
              </td>
              <td>{{ $user->email }}
              </td>
              <td>
                  <a href="{{ route('users.show',$user->id) }}">
                    <button  type="button" class="btn btn-primary">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('users.edit',$user->id) }}"> 
                    <button  type="button" class="btn btn-warning">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  {{-- 
                  <!––  //With the 
                  <a> tag you are sending a get request.
                    that's why we changed it like that because the destroy method require a DELETE request
                    thank you stackoverflow you saved me  ––> --}}
                    <form method="POST" class="text-nowrap float-right" action="{{route('users.destroy',$user->id) }}">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                    <button type="submit"   class="btn btn-danger" onclick="return confirm('Tu es sure?')" >
                      <i class="fa fa-trash-o" aria-hidden="true">
                      </i>
                    </button> 
                        </form>  
                  </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot >
        </table >
        {{$users->links()}} 
      </div>
      @else
      <div >
        <p  class="text-center">pas d'utilisateurs
        </p>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection