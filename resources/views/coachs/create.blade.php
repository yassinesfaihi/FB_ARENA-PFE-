@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
 
                <h3>{{ __('ajouter un nouveau entraîneur') }}</h3>
                    <form method="POST" enctype='multipart/form-data'  action="{{ route('coachs.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom d'entraîneur:</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" enctype="multipart/form-data" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">Salaire:</label>

                            <div class="col-md-5">
                                <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary"  required autocomplete="salary"  autofocus>

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hire_date" class="col-md-4 col-form-label text-md-right">Date d'embauche:</label>

                            <div class="col-md-5">
                                <input id="hire_date" type="Date" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date"  required autocomplete="hire_date" autofocus>

                                @error('hire_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="academy_id" class="col-md-4 col-form-label text-md-right">{{ __('Nom de l academie:') }}</label>

                            <div class="col-md-5">
                            
                                <select id="academy_id"  class="form-control" name="academy_id"  required >
                                    @foreach ($academies as $academy)
                                    <option value="{{$academy->academy_id}}">{{$academy->name}}</option>
    
                                    @endforeach
                                   
                                  </select>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">avatar</label>

                        <div class="col-md-5">
                            <input id="avatar" type="file" class=" @error('avatar') is-invalid @enderror" name="avatar"  autofocus>

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary bt">
                                    {{ __('ajouter un entraîneur') }}
                                    
                                </button>
                                <a href="{{ route('coachs.index') }}"><button  type="button" class="btn btn-primary bt "> <i class="fa fa-arrow-left" aria-hidden="true"></i>retour </button>
                            </div>
                        </div>
                    </form>
                </div>
      
@endsection




