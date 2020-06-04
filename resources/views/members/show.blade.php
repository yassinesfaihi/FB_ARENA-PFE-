@extends('layouts.dashboardUser')

@section('content')
<div class="panel important">
    <div class="inner">
       <h2 class="text-center m-3">  details du membre</h2>
       <div class="container-fluid  ">
           <div class="inner"><img src="/storage/avatars/{{$member->avatar}}" class="avatar img-responsive" alt="avatar">
           </div>

          <br>
          <table class="table table-hover table-user-information table-sm">
             <tbody>
                <tr>
                   <td  style='width:45%' >nom complet:</td>
                   <td class="col-5">{{$member->name}}</td>
                </tr>
                <tr>
                   <td>age</td>
                   <td>{{$member->age}}</td>
                </tr>
                <tr>
                   <td >numero de telephone</td>
                   <td>{{$member->phone}}</td>
                </tr>
                <tr>
                    <td >appartient a l'academie</td>
                    <td>{{$member->academy->name}}</td>
                 </tr>
                 @if ($member->state=='paye')
                   <tr>
                    <td >etat de l'abonnement</td>
                    <td ><span class="green">{{ $member->state}}
                  </td>
                </tr>
                   @else
                   <tr>
                    <td >etat de l'abonnement</td>
                    <td ><span class="red">{{ $member->state}}
                  </td>
                   @endif
             </tbody>
          </table>
          <div class="inner">
             <a href="{{ route('members.edit',$member->member_id) }}"> <button  type="button" class="btn btn-warning bt"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
             editer </button></a>
             <a href="{{ route('members.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i>
             retour </button></a> 
          </div>
       </div>
    </div>
 </div>
@endsection
