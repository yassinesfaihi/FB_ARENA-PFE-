@extends('layouts.dashboardUser')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              
                <div class="container-fluid">
                    
                    
                    <h2 class="text-center">details du terrain</h2>

                    <br>
                    <table class="table table-bordered table-user-information">
                        <tbody>
                            <tr>
                                <td class="table-info " style='width:30%'>nom du terrain</td>
                                <td class="col-5">{{$pitch->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-info" >capacité</td>
                                <td>{{$pitch->capacity}}</td>
                            </tr>
                            <tr>
                                <td class="table-info "> prix</td>
                                <td>{{$pitch->price}}</td>
                            </tr>
                            <tr>
                                <td class="table-info ">disponibilité</td>
                                <td>{{$pitch->state}} </td>
                            </tr>
                            
                            
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('pitches.edit',$pitch->pitch_id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                <a href="{{ route('pitches.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                 
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
