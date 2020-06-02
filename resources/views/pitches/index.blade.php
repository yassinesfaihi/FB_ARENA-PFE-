@extends('layouts.dashboardUser')
@section('title')
Gestion des terrain
@endsection
@section('PageHeader')
Gestion des terrain
@endsection
@section('content')
@include("partials.alerts")
<div class="row justify-content-center">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6 ">
            <h5>liste des terrains
            </h5>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('pitches.search')}}" method="get" >
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
            <a href="{{ route('pitches.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
      </div>
      <div>
        @if (!$pitches->isEmpty())
        <table class="table table-bordered" style=" table-layout: auto">
          <thead>
            <tr>
              <th scope="col">numero
              </th>
              <th scope="col">nom du terrain
              </th>
              <th scope="col">diponibilité
              </th>
              <th scope="col" style="width:150px"  >operations
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
              <td>{{ $pitch->state }}
              </td>
              <td>
                  <a href="{{ route('pitches.show',$pitch->pitch_id) }}">
                    <button  type="button" class="btn btn-primary">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('pitches.edit',$pitch->pitch_id) }}"> 
                    <button  type="button" class="btn btn-warning">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <form method="POST" class="text-nowrap float-right" action="{{ route('pitches.destroy',$pitch->pitch_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  <button type="submit"   class="btn btn-danger" onclick="return confirm('Tu es sure?')">
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
        {{$pitches->links()}} 
      </div>
      @else
      <div >
        <p  class="text-center">pas de terrain
        </p>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection