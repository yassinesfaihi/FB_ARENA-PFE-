@extends('layouts.dashboardUser')
@section('title')
Gestion des academie
@endsection
@section('PageHeader')
Gestion des academie
@endsection
@section('content')
<div class="panel important">
  @include("partials.alerts")
 
        <div class="row m-2">
          <div class="col-md-6 text-left">
            <h2 class="text-left">liste des academies
            </h2>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('academies.search')}}" method="get" >
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
            <a href="{{ route('academies.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
        <div class="container mt-3">
        @if (!$academies->isEmpty())
        <table class="table table-striped table-condensed table-sm ">
          <thead>
            <tr>
              <th scope="col">numero
              </th>
              <th scope="col">nom du academie
              </th>
              
              <th scope="col" style="width:97px"  >operations
              </>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($academies as $academy)
              <td>{{ $academy->academy_id}}
              </td>
              <td>{{ $academy->name }}
              </td>
            
              <td>
                  <a href="{{ route('academies.show',$academy->academy_id) }}">
                    <button  type="button" class="btn btn-primary bt-op">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('academies.edit',$academy->academy_id) }}"> 
                    <button  type="button" class="btn btn-warning bt-op ">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <form method="POST" class="text-nowrap float-right " action="{{ route('academies.destroy',$academy->academy_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  <button type="submit"   class="btn btn-danger bt-op " onclick="return confirm('confirmer la suppression?')">
                    <i class="fa fa-trash-o" aria-hidden="true">
                    </i>
                  </button>    
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot >
        </table >
        <div class="text-right"> {{$academies->links()}} </div>
      </div>
      @else
      <div >
        <p  class="text-center">pas d'academies
        </p>
      </div>
      @endif
    </div>
 
@endsection