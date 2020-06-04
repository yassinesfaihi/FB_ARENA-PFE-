@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
  <h3>{{ __('ajouter une reservation') }}</h3>

          <form action="{{ route('Reservations.store') }}" method="POST">   
          @csrf
          
       
            <div class="form-group row ">

              <label for="type" class="col-md-4 col-form-label text-md-right" >Entrer le type de réservation:</label>
              <div class="col-md-5">
              <select id="type"  class="form-control  " name="type"  required >
                <option value="Tournoi">Tournoi</option>
                <option value="match">match</option>
              </select>  
            </div>
          </div>
          <div class="form-group row ">
            <label for="start_date "class="col-md-4 col-form-label text-md-right" >Entrer Date Debut</label>
            <div class="col-md-5">
            <input id="start_date" type="datetime-local" class="form-control   @error('start_date') is-invalid @enderror" name="start_date"  required autocomplete="start_date" autofocus>
            @error('start_date')
                <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          </div>
          
            <div class="form-group row ">
              <label for="end_date " class="col-md-4 col-form-label text-md-right">Entrer Date Fin:</label>
              <div class="col-md-5">
              <input type="datetime-local" class="form-control " name="end_date"  id="end_date" required>
             </div>
          </div>

            <div class="form-group row ">
              <label for="client_id" class="col-md-4 col-form-label text-md-right" >{{ __('nom de client:') }}</label>
              <div class="col-md-5">
              <select id="client_id"  class="form-control " name="client_id"  required >
              @foreach ($clients as $client)
              <option value="{{$client->client_id}}">{{$client->name}}</option>
              @endforeach
              </select>
             </div>
          </div>

            <div class="form-group row ">
              <label for="pitch_id" class="col-md-4 col-form-label text-md-right" >{{ __('nom de terrain:') }}</label>
              <div class="col-md-5">

              <select id="pitch_id"  class="form-control " name="pitch_id"  required >
              @foreach ($pitchs as $pitch)
              <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
              @endforeach
              </select>
             </div>   
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
