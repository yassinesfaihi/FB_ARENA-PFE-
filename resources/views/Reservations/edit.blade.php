<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
  </head>
  <body>
  <form method="POST" action="{{ route('Reservations.update',$event) }}">   
            @csrf
            {{method_field('PUT')}}
            <div class="container">
        <div class="jumntron" style="margin-top:5%;">
              <h1>Modifier réservation</h1>
                 <hr>
                 <div class="form-group">
                    <label for="type">Entrer le type de réservation:</label>
                    <input type="text" class="form-control" name="type" value="{{$event->type}}" id="type" required> 
                 </div>

                 <div class="form-group">
                    <label for="color">choisir coleur:</label>
                    <input type="color" class="form-control" name="color" value="{{$event->color}}" id="color" required> 
                 </div>

                  <div class="form-group">
                    <label for="start_date">Entrer Date Debut:</label>
                    <input type="datetime-local" class="form-control" name="start_date" value="{{$event->start_date}}" id="start_date" required>  
                   </div> 
            
                   <div class="form-group">
                    <label for="end_date">Entrer Date Fin:</label>
                    <input type="datetime-local" class="form-control" name="end_date" value="{{$event->end_date}}" id="end_date" required>
                   </div>
            
                   <div class="form-group">
                    <label for="client_id" >{{ __('nom de client:') }}</label>
                    <select id="client_id"  class="form-control" name="client_id"  required >
                    @foreach ($clients as $client)
                    <option value="{{$client->client_id}}">{{$client->name}}</option>
                    @endforeach
                    </select>
                   </div>

                   <div class="form-group">
                    <label for="pitch_id" >{{ __('nom de terrain:') }}</label>
                    <select id="pitch_id"  class="form-control" name="pitch_id"  required >
                    @foreach ($pitchs as $pitch)
                    <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
                    @endforeach
                    </select>
                   </div>
            <br>
            <input type="submit" name="submit" class="btn btn-success" value="Modifier réservation"> 
          </div>
           </div>
        </form>
  </body>
</html>