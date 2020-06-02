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
                
                <div class="card-header">{{ __('ajouter un nouveau entraîneur') }}</div>

                <div class="card-body">
                    <form method="POST" enctype='multipart/form-data'  action="{{ route('coachs.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">nom d'entraîneur</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" enctype="multipart/form-data" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">salaire</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary"  required autocomplete="salary"  autofocus>

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hire_date" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <input id="hire_date" type="Date" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date"  required autocomplete="hire_date" autofocus>

                                @error('hire_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="academy_id" class="col-md-4 col-form-label text-md-right">{{ __('nom de l academie') }}</label>

                            <div class="col-md-6">
                            
                                <select id="academy_id"  class="form-control" name="academy_id"  required >
                                    @foreach ($academies as $academy)
                                    <option value="{{$academy->academy_id}}">{{$academy->name}}</option>
    
                                    @endforeach
                                   
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">image d'entreneur</label>

                        <div class="col-md-6">
                            <input id="avatar" type="file" class=" @error('avatar') is-invalid @enderror" name="avatar"  autofocus>

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ajouter un entreneur') }}
                                    
                                </button>
                                <a href="{{ route('coachs.index') }}"><button  type="button" class="btn btn-primary fa fa-arrow-left "> retour </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




