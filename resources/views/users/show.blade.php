@extends(\Auth::user()->role == 'admin' ? 'layouts.dashboardAdmin' : 'layouts.dashboardUser')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
              
                <div class="container-fluid">
                    
                    @if (Auth::user()->role == 'admin')
                    <h2 class="text-center">details du l'utilisateur</h2>

                    @else
                    <h2 class="text-center">details du gérant</h2>

                    @endif
                    <br>
                    <table class="table table-bordered table-user-information">
                        <tbody>
                            <tr>
                                <td class="table-info " style='width:30%'>nom complet:</td>
                                <td class="col-5">{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td class="table-info" >email:</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td class="table-info "> numero de telephone:</td>
                                <td>{{$user->phone}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">adresse:</td>
                                <td>{{$user->adress}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
              <div>
                <a href="{{ route('users.edit',$user->id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                <a href="{{ route('users.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                 
              </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
