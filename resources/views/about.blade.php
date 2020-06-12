@extends('layouts.nav')
@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/header-bg/4.jpg">
    <div class="container">
        <h2>À propos</h2>
    </div>
</section>
<!-- Page top section end -->

<!-- About section -->
<section class="about-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-5">
                <div class="section-title text-center">
                    <h2><span>Nous nous soucions </span>de votre complexe</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="about-text">
                    <p>T-CODY est une start-up tunisienne fondée en 2019 qui a pour vocation de proposer des solutions innovantes en matière des nouvelles technologies. Elle fournit plusieurs services comme la création et refonte de sites web, le développement d’application mobile iOS et Android, Community management et Référencement SEO.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-text">
                    <p>Gérez vos réservations en temps réel, stockez les informations de vos joueurs dans une base de données, modifiez à votre guise les tarifs de votre complexe et suivez en temps réel toutes vos statistiques grâce à notre logiciel de gestion</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-img">
                    <img src="img/about-img.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="text-center pt-4">
            <a href="#" class="site-btn">REJOIGNEZ-NOUS</a>
        </div>
    </div>
</section>
<!-- About section end -->

<!-- Achievement section -->
<div class="achievement-section set-bg" data-setbg="img/achievement-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="circle-progress" data-cptitle="sécurité" data-cpid="id-1" data-cpvalue="50" data-cpcolor="#00a63f"></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-progress" data-cptitle="Gestion" data-cpid="id-2" data-cpvalue="75" data-cpcolor="#00a63f"></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-progress" data-cptitle="Profit" data-cpid="id-3" data-cpvalue="100" data-cpcolor="#00a63f"></div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-progress" data-cptitle="perte de Temps" data-cpid="id-4" data-cpvalue="1" data-cpcolor="#00a63f"></div>
            </div>
        </div>
    </div>
</div>
<!-- Achievement section end -->

@endsection