@extends('layouts.dashboardUser')

@section('content')

    <div class="well well-white row mini-profile-widget p-3">
        <div class="col-md-4">
            <div class="image-container">
                <img src="/storage/avatars/{{$coach->avatar}}" class="avatar img-responsive" alt="avatar">
            </div>  
        </div>
        <div class="col-md-8"> 
            <div class="details">
                <h4>{{$coach->name}}</h4>
                <hr> 
                <p><strong>salaire:  </strong>{{$coach->salary}}</p>
               <p><strong>Date:  </strong>{{$coach->hire_date}}</p>
                <p><strong>appartietn a l'acedmie: </strong>{{$coach->academy->name}}</p>

                <hr> 

                <p class="mg-top-20"> 

                    <a href="{{ route('coachs.edit',$coach->coach_id) }}"> <button  type="button" class="btn btn-warning fa fa-pencil-square-o "> editer </button>
                    <a href="{{ route('coachs.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>

                </p>
            </div>
        </div>
    </div>

</div>
@endsection
