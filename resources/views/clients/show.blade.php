@extends('layouts.dashboardUser')
@section('content')
<div class="panel">
   <div class="card">
      <div class="card-header text-center">  details du client</div>
      <div class="container-fluid">
         <br>
         <table class="table table-hover table-user-information table-sm">
            <tbody>
               <tr>
                  <td  style='width:45%' >nom complet:</td>
                  <td class="col-5">{{$client->name}}</td>
               </tr>
               <tr>
                  <td>numero de telephone:</td>
                  <td>{{$client->phone}}</td>
               </tr>
               <tr>
                  <td > adresse</td>
                  <td>{{$client->adress}}</td>
               </tr>
            </tbody>
         </table>
         <div>
            <a href="{{ route('clients.edit',$client->client_id) }}"> <button  type="button" class="btn btn-warning bt"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            editer </button></a>
            <a href="{{ route('clients.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i>
            retour </button></a> 
         </div>
      </div>
   </div>
</div>
@if (!$client->reservations->isEmpty())
<div class="panel">
   <div class="card">
      <div class=" card-header text-center"> 
         details des reservations
      </div>
      <div class="container-fluid">
         <table class="table table-hover table-user-information table-sm mt-2">
            <th colspan="2">reservation a venir</th>
            @foreach ($client->reservations as $reservation)
            @if ($reservation->start_date>Carbon\Carbon::now())
            <tbody>
               <tr>
                  <td  >{{$reservation->type}}</td>
                  <td>{{$reservation->start_date}}</td>
               </tr>
            </tbody>
            @endif
            @endforeach
         </table>
         <table class="table table-hover table-user-information table-sm">
            <th colspan="2">historique des reservations</th>
            @foreach ($client->reservations as $reservation)
            @if ($reservation->start_date<Carbon\Carbon::now())
            <tbody>
               <tr>
                  <td>{{$reservation->type}}</td>
                  <td>{{$reservation->start_date}}</td>
               </tr>
            </tbody>
            @endif
            @endforeach
         </table>
      </div>
   </div>
</div>
@endif
@endsection
