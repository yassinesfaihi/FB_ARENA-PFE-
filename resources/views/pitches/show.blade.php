@extends('layouts.dashboardUser')

@section('content')
<div class="panel">
    <div class="card">
       <div class="card-header text-center">details du terrain</div>
       <div class="container-fluid">
        <br>

                    <table class="table table-hover table-user-information table-sm">
                        <tbody>
                            <tr>
                                <td  style='width:30%'>nom du terrain</td>
                                <td class="col-5">{{$pitch->name}}</td>
                            </tr>
                            <tr>
                                <td  >capacité</td>
                                <td>{{$pitch->capacity}}</td>
                            </tr>
                            <tr>
                                <td > prix</td>
                                <td>{{$pitch->price}}</td>
                            </tr>
                            <tr>
                                <td >disponibilité</td>
                                <td>{{$pitch->state}} </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('pitches.edit',$pitch->pitch_id) }}"> <button  type="button" class="btn btn-warning bt"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> editer </button></a>
                <a href="{{ route('pitches.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button></a>
                 
              </div>
              
            </div>
        </div>
    </div>

    @if (!$pitch->academies->isEmpty())
<div class="panel">
   <div class="card">
      <div class=" card-header text-center"> 
         details des academies
      </div>
      <div class="container-fluid">
         <table class="table table-hover table-user-information table-sm mt-2">
            <th colspan="2">academies</th>
            @foreach ($pitch->academies as $academy)
            <tbody>
               <tr>
                  <td>{{$academy->academy_id}}</td>
                  <td>{{$academy->name}}</td>
               </tr>
            </tbody>
            @endforeach
         </table>
      </div>
   </div>
</div>
@endif

@if (!$pitch->reservations->isEmpty())
<div class="panel important">
   <div class="card">
      <div class=" card-header text-center"> 
         details des reservations
      </div>
      <div class="container-fluid">

         <table class="table table-hover table-user-information table-sm mt-2">
            <td>nom cu client</td>
            <td >etat</td>
            <td >date</td>
            @foreach ($pitch->reservations as $reservation)
                 
            <tbody>
               <tr>
                  <td>{{$reservation->client->name}}</td>
                  @if ($reservation->start_date>Carbon\Carbon::now())
                  <td><span class="green">a venir</span></td>
                  <td>{{$reservation->start_date}}</td>
                  @else
                  <td><span class="red">passe</span></td>
                  <td>{{$reservation->start_date }}</td>
                  @endif
               </tr>
            </tbody>
            @endforeach
         </table>
      </div>
   </div>
</div>
@endif
@endsection
