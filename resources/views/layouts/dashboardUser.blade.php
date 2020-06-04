<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- custom icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
   </head>
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
         @yield('content')
      </section>
   </main>
   <!-- Bootstrap core JavaScript
      ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!-- Icons -->
   <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
   <script>
      feather.replace()
   </script>
   </body>
</html>