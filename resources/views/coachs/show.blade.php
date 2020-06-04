@extends('layouts.dashboardUser')

@section('content')
<div class="panel important">
    <div class="inner">
       <h3 class=" text-center m-3">  details du l'entraîneur</h3>
       <div class="container-fluid  ">
           <div class="inner">        <img src="/storage/avatars/{{$coach->avatar}}" class="avatar img-responsive" alt="avatar">
           </div>

          <br>
          <table class="table table-hover table-user-information table-sm">
             <tbody>
                <tr>
                   <td  style='width:45%' >nom complet:</td>
                   <td class="col-5">{{$coach->name}}</td>
                </tr>
                <tr>
                   <td>salaire</td>
                   <td>{{$coach->salary}}</td>
                </tr>
                <tr>
                   <td >date d'embauche</td>
                   <td>{{$coach->hire_date}}</td>
                </tr>
             </tbody>
          </table>
          <div class="inner">
             <a href="{{ route('coachs.edit',$coach->coach_id) }}"> <button  type="button" class="btn btn-warning bt"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
             editer </button></a>
             <a href="{{ route('coachs.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i>
             retour </button></a> 
          </div>
       </div>
    </div>
 </div>
@endsection
