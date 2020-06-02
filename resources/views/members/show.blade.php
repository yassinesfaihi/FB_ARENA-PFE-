@extends('layouts.dashboardUser')

@section('content')

    <div class="well well-white row mini-profile-widget p-3">
        <div class="col-md-4">
            <div class="image-container">
                <img src="/storage/avatars/{{$member->avatar}}" class="avatar img-responsive" alt="avatar">
            </div>  
        </div>
        <div class="col-md-8"> 
            <div class="details">
                <h4>{{$member->name}}</h4>
                <hr> 
                <p><strong>Age:  </strong>{{$member->age}}</p>
                
                <p><strong>etat de l'abonnement:  </strong>{{$member->state}}</p>
                <p><strong>numero de telephone:  </strong>{{$member->phone}}</p>
                <p><strong>appartietn a l'acedmie: </strong>{{$member->academy->name}}</p>

                <hr> 

                <p class="mg-top-20"> 

                    <a href="{{ route('members.edit',$member->member_id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                    <a href="{{ route('members.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>

                </p>
            </div>
        </div>
    </div>

</div>
@endsection
