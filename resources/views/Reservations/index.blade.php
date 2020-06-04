<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Scripts -->
  <!-- custom icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  

<header role="banner">
  <h1>FOOTBALL ARENA</h1>
  <ul class="utilities">
     <br>
     <li class="users"><a href="/profilUser">Mon profil</a></li>
     <li class="logout warn">
        <form method="POST" action="{{ route('logout') }}">
           {{ csrf_field() }}
           {{ method_field('post') }}
           <button type="submit"  class="logout" ><i class="fa fa-sign-out" aria-hidden="true">  déconnecter</i>
           </button> 
        </form>
     </li>
  </ul>
</header>
<nav role='navigation'>
  <ul class="main">
     @if (Auth::user()->role == 'prop')    
     <li><a href="/stats">statistiques</a></li>
     <li><a href="/users">Gerants</a></li>
     <li><a href="/pitches">Terrains</a></li>
     @endif
     <li><a href="/Reservations">Planning</a></li>
     <li><a href="/clients">Clients</a></li>
     <li><a href="/academies">Académies</a></li>
     <li><a href="/members">Membres</a></li>
     <li><a href="/coachs">Entraîneurs</a></li>
  </ul>
</nav>
<main role="main">
  <section>
    <div class="panel important"> {!! $calendar->calendar() !!}
      {!! $calendar->script() !!}</div>
   
  </section>
</main>

</body>
</html>
