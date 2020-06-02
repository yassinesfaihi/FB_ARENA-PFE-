@extends('layouts.dashboardUser')
@section('title')
Gestion des membres
@endsection
@section('PageHeader')
Gestion des membres
@endsection
@section('content')
@include("partials.alerts")
 <div class="row justify-content-center">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6 ">
            <h5>liste des members
            </h5>
          </div>
          <div class="col-md-4">
            <form   action="{{ route('members.search')}}" method="get" >
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
            <a href="{{ route('members.create')}}">
              <button class="btn btn btn-primary">ajouter
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="">
        @if (!$members->isEmpty())
        @foreach ($members as $member)
          
        <section class="items mt-3">
          <div class="container">
            <!-- item-->
            <div class="item">
              <div class="row bg-white has-shadow">
                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                  <div class="item-title d-flex align-items-center">
                    <div class="image has-shadow"><img src="/storage/avatars/{{$member->avatar}}" alt="..." class="img-fluid"></div>
                    <div class="text">
                      <h3 class="h4">{{$member->name}} </h3><small>appartietnt a l'academie {{$member->academy->name}}</small>
                    </div>
                  </div>
                  <div class="item-date"><span class="hidden-sm-down"><i class="fa fa-phone" aria-hidden="true"></i>
                    {{$member->phone}}</span></div>
                </div>
                <div class="right-col col-lg-6  float-right">
                  <form method="POST" class="text-nowrap float-right" action="{{ route('members.destroy',$member->member_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  <div class="float-right"> 
                    <a href="{{ route('members.show',$member->member_id) }}">
                      <button  type="button" class="btn btn-primary">
                        <i class="fa fa-info-circle" aria-hidden="true">
                        </i>
                      </button>
                    </a>
                    <a href="{{ route('members.edit',$member->member_id) }}"> 
                      <button  type="button" class="btn btn-warning">
                        <i class="fa fa-pencil-square-o" aria-hidden="true">
                        </i>
                      </button>
                    </a>
                    <button type="submit"   class="btn btn-danger" onclick="return confirm('Tu es sure?')">
                      <i class="fa fa-trash-o" aria-hidden="true">
                      </i>
                    </button> 
                          </form>
                </div>
              </div>
            </div>
          </div>
          </section>
        @endforeach
      <div class="align-items-center "> {{$members->links()}}</div>
        
      </div>
      @else
      <div >
        <p  class="text-center">pas de membres
        </p>
      </div>
      @endif
    </div>
  </div>
 </div>
@endsection
