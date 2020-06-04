@extends('layouts.dashboardAdmin')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
   <div class="container">
      <h2 class="text-center m-2">mes données</h2>
      <div class="row justify-content-center">
         <div class='col-8 '>
            <table class="table table-hover table-user-information table-sm">
               <tbody>
                  <tr>
                     <td  style='width:30%'>nom complet:</td>
                     <td class="col-5">{{auth::user()->name}}</td>
                  </tr>
                  <tr>
                     <td  >email:</td>
                     <td>{{auth::user()->email}}</td>
                  </tr>
                  <tr>
                     <td > numero de telephone:</td>
                     <td>{{auth::user()->phone}}</td>
                  </tr>
                  <tr>
                     <td >adresse:</td>
                     <td>{{auth::user()->adress}}</td>
                  </tr>
               </tbody>
            </table>
            <div>
               <a href="{{ route('users.edit',auth::user()->id) }}"> <button  type="button" class="btn btn-warning bt "> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> editer </button>
               <a href="{{ route('users.index')}}"><button  type="button" class="btn btn-primary bt "> <i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
