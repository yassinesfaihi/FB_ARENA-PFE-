<!DOCTYPE html>
<html >
<head>
	<title>F Ball </title>
	<meta charset="UTF-8">
	<meta name="description" content="X Gym Fitness HTML Template">
	<meta name="keywords" content="fitness, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<a href="/" class="site-logo">
			<img src="img/logo.png" alt="">
		</a>
		<ul class="main-menu">
			<li><a href="/">Acceuil</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/about">À propos</a></li>
            <li class="header-right">
				<div class="hr-box">
                    @if (Auth::user()->role == 'admin')
                    <a class="active" href="/profil">Dashboard</a>

                    @else
                    <a class="active" href="/profilUser">Dashboard</a>

                    @endif
				</div>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end -->

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/hero-bg.jpg">
		<div class="container">
			<div class="hero-text">
				<h2>Un système de gestion gratuit</h2>
				<h2><span>pour les propriétaires</span>de terrains de football</h2>
				<a href="" class="site-btn">REJOIGNEZ-NOUS</a>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Feature section -->
	<section class="feature-section">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Pour <span>le ProPriétaire</span> du terrain de football. </h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="icon-box-item">
						<div class="ib-icon">
							<i class="flaticon-031-stats"></i>
						</div>
						<h4>Statistique</h4>
						<p>Restez informé de toutes les statistiques de vos clients, employeurs et votre terrain.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="icon-box-item">
						<div class="ib-icon">
							<i class="flaticon-033-time"></i>
						</div>
						<h4>Gestion du temps</h4>
						<p>Gerer facilement votre terrain de football depuis la maison ne perdez pas de temps. </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="icon-box-item">
						<div class="ib-icon">
							<i class="flaticon-034-vision"></i>
						</div>
						<h4>Avoir une vision</h4>
						<p>restez à jour de toutes les nouvelles,ne vous inquiétez pas de la mauvaise gestion de vos employeurs.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Feature section end -->

	<!-- Add section -->
	<section class="add-section set-bg" data-setbg="img/add-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 ml-auto">
					<div class="add-text">
						<h2>Pour le <span>Gérant</span>de terrain</h2>
						<ul>
							<li><img src="img/check-icon.png" alt="">Gérer les Reservations, Les clients et les membres.</li>
							<li><img src="img/check-icon.png" alt="">Gérer l'academie ,le terrain  et les entreneurs.</li>
							<li><img src="img/check-icon.png" alt="">Gérer votre profile , rester connecter.</li>
						</ul>
						<a href="#" class="site-btn">Become a Member</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Add section end -->

	
	<!-- Trainers section end -->

	
	<!-- Footer section -->
	<footer class="footer-section">
					<div class="copyright"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->    
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> T-CODY  All rights reserved <a href="/" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
				</div>
	</footer>
	<!-- Footer section end -->
									
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
