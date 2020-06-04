@extends('layouts.dashboardUser')
@section('title')
Gestion des membres
@endsection
@section('PageHeader')
Gestion des membres
@endsection
@section('content')
<div class="panel important">
  @include("partials.alerts")
        <div class="row m-2">
          <div class="col-md-6 text-left">
            <h2 class="text-left">liste des members
            </h2>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('members.search')}}" method="get" >
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
            <a href="{{ route('members.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
        <div class="container mt-3">
          @if (!$members->isEmpty())
          <table class="table table-striped table-condensed table-sm " >
             <thead>
                <tr>
                  <th scope="col">
                  </th>
                   <th scope="col">nom
                   </th>
                   <th scope="col">numero de telephone
                   </th>
                   <th scope="col">etat de l'abonnement
                  </th>
                  <th scope="col">academie
                  </th>
                   <th scope="col" style="width:97px">operations
                   </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   @foreach ($members as $member)
                   <td><img  src="/storage/avatars/{{$member->avatar}}" alt="..." class="img-fluid">
                   </td>
                   <td>{{ $member->name }}
                  </td>
                   <td>{{ $member->phone }}
                   </td>
                   @if ($member->state=='paye')
                   <td ><span class="green">{{ $member->state}}
                  </td> 
                   @else
                   <td><span class="red">{{ $member->state }}
                  </td>
                   @endif
                   <td>{{ $member->academy->name}}
                  </td>
                   <td>
                      <a href="{{ route('members.show',$member->member_id) }}">
                      <button  type="button" class="btn btn-primary bt-op">
                      <i class="fa fa-info-circle" aria-hidden="true">
                      </i>
                      </button>
                      </a>
                      <a href="{{ route('members.edit',$member->member_id) }}"> 
                      <button  type="button" class="btn btn-warning bt-op">
                      <i class="fa fa-pencil-square-o" aria-hidden="true">
                      </i>
                      </button>
                      </a>
                      <form method="POST" class="text-nowrap float-right" action="{{ route('members.destroy',$member->member_id) }}">
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
          <div class="text-right"> {{$members->links()}} </div>
       </div>
       @else
       <div >
          <p  class="text-center">pas de membre
          </p>
       </div>
       @endif
    
      
 </div>
@endsection
