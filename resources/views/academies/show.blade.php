@extends('layouts.dashboardUser')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              
                <div class="container-fluid">
                    
                    
                    <h2 class="text-center">details de l'academie</h2>

                    <br>
                    <table class="table table-bordered table-user-information">
                        <tbody>
                            <tr>
                                <td class="table-info " style='width:30%'>nom de l'academie</td>
                                <td class="col-5">{{$academy->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-info" >appartient au terrain</td>
                                <td>{{$academy->pitch->name}}</td>
                            </tr>
                            
                            
                            
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('academies.edit',$academy->academy_id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                <a href="{{ route('academies.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                 
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
