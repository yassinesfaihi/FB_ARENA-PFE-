@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
  <h3>{{ __('Modifier la reservation') }}</h3>

          <form action="{{ route('Reservations.store') }}" method="POST">   
          @csrf
          <div class="form-group row ">

            <label for="type" class="col-md-4 col-form-label text-md-right" >Entrer le type de réservation:</label>
            <select id="type"  class="form-control col-md-5 " name="type"  required >
              <option value="Tournoi">Tournoi</option>
              <option value="match">match</option>
            </select>  
          </div>

          <div class="form-group row ">
            <label for="start_date "class="col-md-4 col-form-label text-md-right" >Entrer Date Debut</label>
            <input type="datetime-local" class="form-control col-md-5" name="start_date" id="start_date" required>  
          </div>
           <div class="form-group row ">
            <label for="end_date " class="col-md-4 col-form-label text-md-right">Entrer Date Fin:</label>
            <input type="datetime-local" class="form-control col-md-5" name="end_date"  id="end_date" required>
           </div>

          

             <div class="form-group row ">
              <label for="client_id" class="col-md-4 col-form-label text-md-right" >{{ __('nom de client:') }}</label>
              <select id="client_id"  class="form-control col-md-5" name="client_id"  required >
              @foreach ($clients as $client)
              <option value="{{$client->client_id}}">{{$client->name}}</option>
              @endforeach
              </select>
             </div>

             <div class="form-group row ">
              <label for="pitch_id" class="col-md-4 col-form-label text-md-right" >{{ __('nom de terrain:') }}</label>
              <select id="pitch_id"  class="form-control col-md-5" name="pitch_id"  required >
              @foreach ($pitchs as $pitch)
              <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
              @endforeach
              </select>
             </div>   
             <div class="form-group row mb-0">
              <div class="col-md-5 offset-md-4">
                  <button type="submit" class="btn btn-primary bt">
                      {{ __('ajouter ') }}
                      
                  </button>
                  
                  <a href="/Reservations/display"><button  type="button" class="btn btn-primary bt"><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
              </div>
          </div>      
        </form> 
        
      </div>
    </div>
    @endsection
