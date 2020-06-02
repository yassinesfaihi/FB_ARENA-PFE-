<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>
  <body>
      <div class="container">
      <div class="jumbotron">
<table class="table table-striped table-bordered table-hover">
<thead class="thead">
<tr class="warning">
<th>ID</th>
<th>type</th>
<th>Date Debut</th>
<th>Date fin</th>
<th>client</th>
<th>pitch</th>
<th>color</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>
</thead>
@foreach ($events as $event)
    <tbody>
        <tr>
        <td>{{$event->reservation_id}}</td>
        <td>{{$event->type}}</td>
        <td>{{$event->start_date}}</td>
        <td>{{$event->end_date}}</td>
        <td>{{$event->client_id}}</td>
        <td>{{$event->pitch_id}}</td>
        <td>{{$event->color}}</td>
        <th><a href="{{ route('Reservations.edit',$event->reservation_id)}}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Modifier</a></th>
        <th>
        <form method="POST" action="{{route('Reservations.destroy',$event->reservation_id)}}">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tu es sure?')">Supprimer</button>
        </form>
      </th>
      </tr>
    </tbody>
@endforeach
</table>
      </div>
      </div>
  </body>