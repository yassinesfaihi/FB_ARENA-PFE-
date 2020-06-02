@extends('layouts.dashboardUser')
@section('title')
Gestion des entraîneurs
@endsection
@section('PageHeader')
Gestion des entraîneurs
@endsection
@section('content')
@include("partials.alerts")
<div class="row justify-content-center">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6 ">
            <h5>liste des entraîneurs
            </h5>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('coachs.search')}}" method="get" >
              <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-perpend">
                  <button type="submit" class="btn btn-primary">chercher
                  </button>
                </span>
              </div>
            </form>
          </div>
          <div class="col-md-2 text-right">
            <a href="{{ route('coachs.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="container">
        @if (! $coachs->isEmpty())
        @foreach ($coachs as $coach)
                 <section class="items mt-3">
                    <div class="container">
                 <!-- item-->
                 <div class="item">
                 <div class="row bg-white has-shadow">
                 <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                <div class="item-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="/storage/avatars/{{$coach->avatar}}" alt="..." class="img-fluid"></div>
                    <div class="text">
                      <h3 class="h4">{{$coach->name}} </h3><small>appartietnt a l'academie {{$coach->academy->name}}</small>
                    </div>
                  </div>
                  <div class="item-date"><span class="hidden-sm-down"><i class="fa fa-phone" aria-hidden="true"></i>
                    {{$coach->salary}}</span></div>
                 </div>
                 <div class="right-col col-lg-6  float-right">
                  <form method="POST" class="text-nowrap float-right" action="{{ route('coachs.destroy',$coach->coach_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  <div class="float-right"> 
                    <a href="{{ route('coachs.show',$coach->coach_id) }}">
                      <button  type="button" class="btn btn-primary">
                        <i class="fa fa-info-circle" aria-hidden="true">
                        </i>
                      </button>
                    </a>
                    <a href="{{ route('coachs.edit',$coach->coach_id) }}"> 
                      <button  type="button" class="btn btn-warning">
                        <i class="fa fa-pencil-square-o" aria-hidden="true">
                        </i>
                      </button>
                    </a>   
                  <button class="btn btn-danger delete" onclick="return confirm('Tu es sure?')">
                        <i class="fa fa-trash-o" aria-hidden="true">
                        </i>
                      </button> 
                    </form>
                </div>
              </div>
            </div>
          </div>
          </section>
        <div class="align-items-center "> {{$coachs->links()}}</div>
      @endforeach
      </div>
      @else
      <div >
        <p  class="text-center">pas d'entreneur
        </p>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

  