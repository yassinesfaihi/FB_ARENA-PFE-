@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                
                <div class="card-header">{{ __('ajouter une nouvelle academie') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('academies.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('nom de l academie') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pitch_id" class="col-md-4 col-form-label text-md-right">{{ __('nom du terrain') }}</label>

                            <div class="col-md-6">
                            
                                <select id="pitch_id"  class="form-control" name="pitch_id"  required >
                                    @foreach ($pitches as $pitch)
                                    <option value="{{$pitch->pitch_id}}">{{$pitch->name}}</option>
    
                                    @endforeach
                                   
                                  </select>
                            </div>
                        </div>
                    </div>
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ajouter une academie') }}
                                    
                                </button>
                                <a href="{{ route('academies.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




