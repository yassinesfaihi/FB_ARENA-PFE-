<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
 <div class="container">
  <div class="jumbotron">
    <div class="row">
<a href="{{ route('Reservations.create')}}" class="btn btn-success">Ajouter réservation</a>
<a href="/Reservations/display" class="btn btn-primary">modifier réservation</a>
<a href="/Reservations/display" class="btn btn-danger">supprimer réservation</a>
<a href="/coachs" class="btn btn-primary">Retour</a>
    </div>
    <br>
    <div class="row">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(\Session::has('success'))
      <div class="alert alert-success">
       <p>{{ \Session::get('success')}}</p>
      </div>
      @endif
      <div class="col-md-9 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading" style="background:#2e6da4; color:white;">
            <h2 style="text-align: center">
              calandrier des Reservations
            </h2>
          </div>
          <br><br>
            <div class="panel-body">
              {!! $calendar->calendar() !!}
             {!! $calendar->script() !!}
            </div> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>