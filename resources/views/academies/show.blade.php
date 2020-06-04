@extends('layouts.dashboardUser')

@section('content')
<div class="panel important">
    <div class="container">
                    <h2 class="text-center m-2 ">details de l'academie</h2>
                    <div class="row justify-content-center">
                    <div class='col-8 '>
                    <table class="table table-hover table-user-information table-sm">
                        <tbody>
                            <tr>
                                <td style='width:30%'>nom de l'academie</td>
                                <td class="col-5">{{$academy->name}}</td>
                            </tr>
                            <tr>
                                <td>appartient au terrain</td>
                                <td>{{$academy->pitch->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('academies.edit',$academy->academy_id) }}"> <button  type="button" class="btn btn-warning bt"> editer </button>
                <a href="{{ route('academies.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
