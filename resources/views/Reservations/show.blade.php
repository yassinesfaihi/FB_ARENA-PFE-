@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
   @include("partials.alerts")
   <div class="row m-2">
      <div class="col-md-8 text-left">
         <h2  class="text-left">liste des events
         </h2>
      </div>
      <div class="col-md-2">
        <a href="{{ route('Reservations.index')}}">
         <button class="btn btn btn-primary">calendrier
         </button>
         </a>
      </div>
      <div class="col-md-2 text-right">
         <a href="{{ route('Reservations.create')}}">
         <button class="btn btn btn-primary">ajouter
         </button>
         </a>
      </div>
   </div>
   <div class="container mt-3">
      @if (!$events->isEmpty())
      <table class="table table-striped table-condensed table-sm " >
         <thead>
            <tr>
               <th scope="col">
               </th>
               <th scope="col">date debut
              </th>
              <th scope="col">date fin
              </th>
               <th scope="col">client
               </th>
               <th scope="col">terrain
              </th>
               <th scope="col" style="width:20px">operations
               </th>
            </tr>
         </thead>
         <tbody>
            <tr>
               @foreach ($events as $event)
               <td>{{ $event->reservation_id}}
               </td>
               <td>{{ $event->start_date }}
               </td>
               <td>{{ $event->end_date }}
              </td>
              <td>{{ $event->client->name}}
              </td>
              <td>{{ $event->pitch->name}}
              </td>
               <td>
                 
                  <a href="{{ route('Reservations.edit',$event->reservation_id) }}"> 
                  <button  type="button" class="btn btn-warning bt-op">
                  <i class="fa fa-pencil-square-o" aria-hidden="true">
                  </i>
                  </button>
                  </a>
                  <form method="POST" class="text-nowrap float-right" action="{{ route('Reservations.destroy',$event->reservation_id) }}">
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
      <div class="text-right"> {{$events->links()}} </div>
   </div>
   @else
   <div >
      <p  class="text-center">pas de events
      </p>
   </div>
   @endif
</div>

@endsection
