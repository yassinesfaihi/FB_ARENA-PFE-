@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
              
                <h3>Modifier les informations du terrain {{  $pitch->name}}</h3>

          
                    <form method="POST" action="{{ route('pitches.update', $pitch) }}">
                        
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('nom du terrain:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $pitch->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                         
                        <div class="form-group row">
                            <label for="capacity" class="col-md-4 col-form-label text-md-right">{{ __('capacite en nombre de joueurs:') }}</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control  @error('capacity') is-invalid @enderror" name="capacity" value="{{ $pitch->capacity }}" required autocomplete="capacity">
                               
                                @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
        
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('prix:') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $pitch->price }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Disponibilité:') }}</label>

                            <div class="col-md-6">
                            
                                <select id="state"  class="form-control" name="state"  required >
                                    <option value="disponible">disponible</option>
                                    <option value="en travaux">en travaux</option>
                                   
                                  </select>
                            </div>
                        </div>
                       

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bt">
                                    {{ __('enregistrer') }}
                                </button>
                                <a href="{{ route('pitches.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
                            </div>
                        </div>
                    </form>
        
</div>
@endsection




