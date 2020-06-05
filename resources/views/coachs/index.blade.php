@extends('layouts.dashboardUser')
@section('title')
Gestion des entraîneurs
@endsection
@section('PageHeader')
Gestion des entraîneurs
@endsection
@section('content')
<div class="panel important">
  @include("partials.alerts")
        <div class="row m-2">
          <div class="col-md-6 text-left">
            <h2 class="text-left">liste des entraîneurs
            </h2>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('coachs.search')}}" method="get" >
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
            <a href="{{ route('coachs.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
        <div class="container mt-3">
          @if (!$coachs->isEmpty())
          <table class="table table-striped table-condensed table-sm " >
             <thead>
                <tr>
                  
                  <th scope="col">
                  </>
                   <th scope="col">nom
                   </th>
                   <th scope="col">salaire
                   </th>
                   
                  <th scope="col">academie
                  </th>
                   <th scope="col" style="width:97px">operations
                   </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   @foreach ($coachs as $coach)
                   
                   <td><img  src="/storage/avatars/{{$coach->avatar}}" alt="..." class="t-avatar">
                   </td>
                   <td>{{ $coach->name }}
                  </td>
                   <td>{{ $coach->salary }}
                   </td>
                   <td>{{ $coach->academy->name}}
                  </td>
                   <td>
                      <a href="{{ route('coachs.show',$coach->coach_id) }}">
                      <button  type="button" class="btn btn-primary bt-op">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                      </button>
                      </a>
                      <a href="{{ route('coachs.edit',$coach->coach_id) }}"> 
                      <button  type="button" class="btn btn-warning bt-op">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                      </button>
                      </a>
                      <form method="POST" class="text-nowrap float-right" action="{{ route('coachs.destroy',$coach->coach_id) }}">
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
          <div class="text-right"> {{$coachs->links()}} </div>
       </div>
       @else
       <div >
          <p  class="text-center">pas d'entraîneur
          </p>
       </div>
       @endif
    
      
 </div>
@endsection

  