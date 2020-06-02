@extends('layouts.dashboardAdmin')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              
                <div class="container-fluid">
                    <br>
                    <h2 class="text-center">mes données</h2>
                    <br>
                    <table class="table table-bordered table-user-information">
                        <tbody>
                            <tr>
                                <td class="table-info " style='width:30%'>nom complet:</td>
                                <td class="col-5">{{auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-info" >email:</td>
                                <td>{{auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td class="table-info "> numero de telephone:</td>
                                <td>{{auth::user()->phone}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">adresse:</td>
                                <td>{{auth::user()->adress}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('users.edit',auth::user()->id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                <a href="{{ route('users.index')}}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>

              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
