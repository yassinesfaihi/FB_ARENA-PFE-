@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">

                <h3>{{ __('Ajouter une nouvelle academie') }}</h3>
                    <form method="POST" action="{{ route('academies.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom de l academie:') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pitch_id" class="col-md-4 col-form-label text-md-right">{{ __('Nom du terrain:') }}</label>

                            <div class="col-md-5">
                            
                                <select id="pitch_id"  class="form-control" name="pitch_id"  required >
                                    @foreach ($pitches as $pitch)
                                    <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
    
                                    @endforeach
                                   
                                  </select>
                            </div>
                        </div>
                    
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary bt ">
                                    {{ __('ajouter une academie') }}
                                    
                                </button>
                                <a href="{{ route('academies.index') }}"><button  type="button" class="btn btn-primary bt"><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
                            </div>
                        </div>
                    </form>
        
</div>
@endsection




