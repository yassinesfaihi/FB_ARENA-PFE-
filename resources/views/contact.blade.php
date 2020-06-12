@extends('layouts.nav')
@section('content')
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/header-bg/4.jpg">
		<div class="container">
			<h2>Contact</h2>
		</div>
	</section>
	<!-- Page top section end -->

	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h2 class="contact-title">INFORMATION</h2>
					<div class="contact-info-warp">
						<h4>Location</h4>
						<div class="contact-info">
							<img src="img/icons/1-dark.png" alt="">
							<div class="cf-text">
								<p>6 Rue ghana,1021</p>
							</div>
						</div>
					</div>
					<div class="contact-info-warp">
						<h4>Telephone</h4>
						<div class="contact-info">
							<img src="img/icons/2-dark.png" alt="">
							<div class="cf-text">
								<p>+216 53292112</p>
							</div>
						</div>
					</div>
					<div class="contact-info-warp">
						<h4>E-mail</h4>
						<div class="contact-info">
							<img src="img/icons/3-dark.png" alt="">
							<div class="cf-text">
								<p>Tcody@gmail.com</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<h2 class="contact-title">Contactez nous</h2>
					<form class="contact-form">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="nom">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="e-mail">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="sujet">
								<textarea placeholder="Message"></textarea>
								<button class="site-btn">Envoyer le message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.4979363380253!2d10.183083437031781!3d36.80658629552573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd346585c53559%3A0x24976efa256ac44!2save%20du%20Ghana%2C%20Tunis!5e0!3m2!1sfr!2stn!4v1591011259882!5m2!1sfr!2stn" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</section>
	<!-- Contact section end -->							
@endsection
