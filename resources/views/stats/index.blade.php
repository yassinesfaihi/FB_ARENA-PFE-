
@extends('layouts.dashboardUser')
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's type reservation when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's type reservation when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's type reservation.
      function drawSarahChart() {

        // Create the data table for Sarah's type reservation.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['match', {{$reservations1}}],
          ['tournoi', {{$reservations2}}],

        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'statistique de Reservation par type',
                       width:300,
                       height:300,
                       colors: ['#00a63f','rgb(0, 153, 255)', '#f6c7b6'],
                       backgroundColor: {
                       fill:'transparent'
                       },
                       };

        // Instantiate and draw the chart for Sarah's pitch disponibility.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pitch disponibility.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pitch disponibility.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['disponible', {{$pitches1}}],
          ['travaux', {{$pitches2}}],
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Disponibilté terrains',
                       width:300,
                       height:300,
                       colors: ['#00a63f','rgb(0, 153, 255)', '#f6c7b6'],
                       backgroundColor: {
                       fill:'transparent'
                       },
                       };

        // Instantiate and draw the chart for Anthony's member age.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['member', 'par age'],
            ['member moin de 18 ans',   {{$members1}}],
            ['member egal à 18 ou plus',{{$members2}}],
          ]);

          var options = {
            title: 'Membres par age',
            width:500,
             height:350,
             colors: [ 'rgb(0, 153, 255)','#00a63f', '#66ff33'],
            pieHole: 0.4,
            backgroundColor: {
                       fill:'transparent'
                       },
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          chart.draw(data, options);
        }
      </script>


      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['membre', 'par payment'],
            ['membre payer',   {{$members3}}],
            ['membre non payer',   {{$members4}}],
          ]);

          var options = {
            title: 'Membres par payement',
             width:500,
             height:350,
            pieHole: 0.4,
            colors: ['#00a63f','rgb(0, 153, 255)', '#66ff33'],
            backgroundColor: {
                       fill:'transparent'
                       },
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
          chart.draw(data, options);
        }
      </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var oldData = google.visualization.arrayToDataTable([
    ['Name', 'nombre clients par région'],
    ['clients de tunis', {{$clients4}}],
    ['clients de Ariana', {{$clients2}}],
    ['clients de manouba', {{$clients3}}],
    ['clients de ben arous', {{$clients5}}],
    ['Autres region ', {{$clients6}}]
  ]);


  var colChartBefore = new google.visualization.ColumnChart(document.getElementById('colchart_before'));
  var options = { legend: { position: 'top' },
          width:1100,
          height:500,
  colors: ['#00a63f', '#00a63f', '#f6c7b6'],
                       backgroundColor: {
                       fill:'transparent'
                       },
                        };

  colChartBefore.draw(oldData, options);
  colChartAfter.draw(newData, options);

  var diffData = colChartDiff.computeDiff(oldData, newData);
  colChartDiff.draw(diffData, options);
  barChartDiff.draw(diffData, options);
}
</script>

      <!--Div that will hold the pie chart-->
      <br>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card stat_resglob ml-5" style="width: 15rem;">
                <div class="card-body">
                  <h5 class="card-title">Reservations Total :</h5>
                  <p class="card-text">{{$reservations3}}</p>
                </div>
              </div>
            </div>
          <div class="col-sm">
            <div class="card stat_clientsglob ml-5" style="width: 15rem;">
                <div class="card-body">
                  <h5 class="card-title">Clients Total :</h5>
                  <p class="card-text">{{$clients}}</p>
                </div>
              </div>          </div>
          <div class="col-sm">
            <div class="card stat_membresglob ml-5" style="width: 15rem;">
                <div class="card-body">
                  <h5 class="card-title">Memberes Total :</h5>
                  <p class="card-text">{{$members}}</p>
                </div>
              </div>
            </div>
        </div>
      </div>
<br><br>
  <div class="container">
      <hr>
    <div class="row mt-5">
      <div class="col-sm ml-5 mt-5  px-5">
        <h1>Nombre de Réservation par jour semaine mois :</h1>
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card stat_resglob ml-5" style="width: 15rem;">
                    <div class="card-body">
                      <h5 class="card-title">Reservations ce Jour :</h5>
                      <p class="card-text">{{$reservations4}}</p>
                    </div>
                  </div>
                </div>
              <div class="col-sm">
                  <br><br><br><br>
                <div class="card stat_clientsglob ml-5" style="width: 15rem;">
                    <div class="card-body">
                      <h5 class="card-title">Reservations ce mois</h5>
                      <p class="card-text">{{$reservations6}}</p>
                    </div>
                  </div>
                 </div>
              <div class="col-sm">
                <div class="card stat_membresglob ml-5" style="width: 15rem;">
                    <div class="card-body">
                      <h5 class="card-title">Reservations  ce Mois :</h5>
                      <p class="card-text">{{$reservations5}}</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
    </div>
      <div>
        <div class="col-sm">
            <div id="Anthony_chart_div"></div>
          </div>
          <div class="col-sm">
            <div id="Sarah_chart_div"></div>
        </div>
      </div>
    </div>
  </div>
  <hr><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div id="donutchart" ></div>
    </div>
      <div class="col-lg-2">
        <div id="donutchart2"></div>
    </div>
    </div>
    <hr><br><br><br>
    <span id='colchart_before' style='width: 450px; height: 250px; display: inline-block'></span>
@endsection
