@extends('layouts.dashboardUser')
@section('title')
Gestion des clients
@endsection
@section('PageHeader')
Gestion des clients
@endsection
@section('content')
@include("partials.alerts")
<div class="row justify-content-center">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6 ">
            <h5>liste des clients
            </h5>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('clients.search')}}" method="get" >
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
            <a href="{{ route('clients.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="p-2">
        @if (!$clients->isEmpty())
        <table class="table table-bordered " style=" table-layout: auto">
          <thead>
            <tr>
              
              <th scope="col">nom
              </th>
              <th scope="col">numero de telephone
              </th>
              <th scope="col" style="width:150px"  >operations
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($clients as $client)
              
              <td>{{ $client->name }}
              </td>
              <td>{{ $client->phone }}
              </td>
              <td>
                  <a href="{{ route('clients.show',$client->client_id) }}">
                    <button  type="button" class="btn btn-primary">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <a href="{{ route('clients.edit',$client->client_id) }}"> 
                    <button  type="button" class="btn btn-warning">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                    </button>
                  </a>
                  <form method="POST" class="text-nowrap float-right" action="{{ route('clients.destroy',$client->client_id) }}">
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
        <div class="justify-content-center"> {{$clients->links()}} </div>
       
      </div>
      @else
      <div >
        <p  class="text-center">pas de clients
        </p>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection