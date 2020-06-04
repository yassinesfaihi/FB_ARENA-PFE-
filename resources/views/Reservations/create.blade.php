<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container mr-5">
      <div class="row m-5 px-5">
        <div class="col-md-8 col-offset-2 ml-5 px-5">
        <div class="panel panel-default ml-5">
          <div class="panel-heading" style="background:#2e6da4; color:white;">
            Ajouter une réservation
          </div>
          <div class="panel-body">
           <h1>Task: Ajouter données</h1>
          <form action="{{ route('Reservations.store') }}" method="POST">   
          @csrf
          <label for="type">Entrer le type de réservation:</label>
          <select id="type"  class="form-control" name="type"  required >
            <option value="Tournoi">Tournoi</option>
            <option value="match">match</option>
          </select>
          <br>
          <label for="color">choisir coleur:</label>
          <input type="color" class="form-control" name="color" id="color" required> 
          <label for="start_date">Entrer Date Debut:</label>
          <input type="datetime-local" class="form-control" name="start_date" id="start_date" step="3600"required>
          <label for="end_date">Entrer Date Fin:</label>
          <input type="datetime-local" class="form-control" name="end_date" id="end_date" required>
          <label for="client_id" >{{ __('nom de client:') }}</label>
          <select id="client_id"  class="form-control" name="client_id"  required >
          @foreach ($clients as $client)
          <option value="{{$client->client_id}}">{{$client->name}}</option>
          @endforeach
          </select>
          <label for="pitch_id" >{{ __('nom de terrain:') }}</label>
          <select id="pitch_id"  class="form-control" name="pitch_id"  required >
          @foreach ($pitchs as $pitch)
          <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
          @endforeach
          </select>
          <br>
          <input type="submit" name="submit" class="btn btn-primary" value="Ajouter réservation">
        </form> 
        </div>
        </div>
          </div>
        </div>  
        </div>
      </div>
    </div>
  </body>
</html>