@extends('layouts.dashboardUser')
@section('title')
Gestion des terrain
@endsection
@section('PageHeader')
Gestion des terrain
@endsection
@section('content')
<div class="panel important">
  @include("partials.alerts")
        <div class="row m-2">
          <div class="col-md-6 text-left">
            <h2 class="text-left" >liste des terrains
            </h2>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('pitches.search')}}" method="get" >
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
            <a href="{{ route('pitches.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
        <div class="container mt-3">
        @if (!$pitches->isEmpty())
        <table class="table table-striped table-condensed table-sm ">
          <thead>
            <tr>
              <th scope="col">numero
              </th>
              <th scope="col">nom du terrain
              </th>
              <th scope="col">diponibilité
              </th>
              <th scope="col" style="width:97px"  >operations
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($pitches as $pitch)
              <td>{{ $pitch->pitch_id}}
              </td>
              <td>{{ $pitch->name }}
              </td>
              @if ($pitch->state=="disponible" )
              <td><span class="green">{{ $pitch->state }}</span>
              @else
              <td><span class="red">{{ $pitch->state }}</span>
              @endif
              </td>
              <td>
                  <a href="{{ route('pitches.show',$pitch->pitch_id) }}">
                    <button  type="button" class="btn btn-primary bt-op">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('pitches.edit',$pitch->pitch_id) }}"> 
                    <button  type="button" class="btn btn-warning bt-op">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <form method="POST" class="text-nowrap float-right " action="{{ route('pitches.destroy',$pitch->pitch_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  <button type="submit"   class="btn btn-danger bt-op" onclick="return confirm('confirmer la suppression?')">
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
        <div class="text-right"> {{$pitches->links()}} </div>
      </div>
      @else
      <div >
        <p  class="text-center">pas de terrain
        </p>
      </div>
      @endif
    </div>
  
@endsection