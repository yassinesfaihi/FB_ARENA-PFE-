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
<body>
       
  
  <!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">

  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
     
       
     
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          {{ csrf_field() }}
          {{ method_field('post') }}
         
          <button type="submit"  class="btn btn-info" ><i class="fa fa-sign-out" aria-hidden="true">  déconnecter</i>
          
          
           
          </button> 
        </form>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
      
      <div class="container-fluid">
        
        <div class="row">
          <nav class="col-md-2 d-none d-md-block col-lg-2 ">
            <div class="bg-light border-right" id="sidebar-wrapper">
              <div class="sidebar-heading"> FOOTBALL ARENA </div>
              <div class="list-group list-group-flush">
                <a href="/profil" class="list-group-item list-group-item-action ">Mon profil</a>
                <a href="/users" class="list-group-item list-group-item-action ">Utilisateurs</a>
                

              </div>
            </div>
            </nav>
            
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="container">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3>@yield('title')</h3>
               
            </div>  
                <div class="container">
                    @yield('content')
                    <div class="container">
                    </div>
                </div>
                
            </div>          

                          
            
          </main>
        </div>
      </div>
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
