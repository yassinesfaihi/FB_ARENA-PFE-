@extends('layouts.dashboardAdmin')
@section('title')
Gestion des utilisateurs
@endsection
@section('PageHeader')
Gestion des utilisateurs
@endsection
@section('content')
<div class="panel important">
  @include("partials.alerts")
  <div class="row m-2">
    <div class="col-md-6 text-left">
            <h2 class="text-left">liste des utilisateurs
            </h2>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('users.search')}}" method="get" >
              <div class="input-group">
                <input type="search" name="search" class="form-control mr-1">
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
        <div class="container mt-3">
        @if (!$users->isEmpty())
        <table class="table table-striped table-condensed table-sm ">
          <thead>
            <tr>
              <th scope="col">id
              </th>
              <th scope="col">nom
              </th>
              <th scope="col">email
              </th>
              <th scope="col" style="width:97px"  >operations
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
                    <button  type="button" class="btn btn-primary bt-op ">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('users.edit',$user->id) }}"> 
                    <button  type="button" class="btn btn-warning bt-op">
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
                    <button type="submit"   class="btn btn-danger bt-op" onclick="return confirm('confirmer la suppression?')" >
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
        <div class="text-right"> {{$users->links()}} </div>
      </div>
      @else
      <div >
        <p  class="text-center">pas d'utilisateurs
        </p>
      </div>
      @endif
    </div>
  
@endsection