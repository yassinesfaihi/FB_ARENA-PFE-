@extends('layouts.dashboardUser')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              
                <div class="container-fluid">
                    
                    
                    <h2 class="text-center">details du client</h2>

                    <br>
                    <table class="table table-bordered table-user-information">
                        <tbody>
                            <tr>
                                <td class="table-info " style='width:30%'>nom complet:</td>
                                <td class="col-5">{{$client->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-info" >email:</td>
                                <td>{{$client->phone}}</td>
                            </tr>
                            <tr>
                                <td class="table-info "> numero de telephone:</td>
                                <td>{{$client->adress}}</td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('clients.edit',$client->client_id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                <a href="{{ route('clients.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                 
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
