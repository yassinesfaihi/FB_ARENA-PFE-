@extends('layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">                
   
                <h3>Modifier les informations du membre {{$member->name}}</h3>

                <div class="card-body">
                    <form method="POST" enctype='multipart/form-data' action="{{ route('members.update', $member) }}">
                        
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom:') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" value="{{$member->name}}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age:') }}</label>

                            <div class="col-md-5">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age"  required autocomplete="age" value="{{$member->age}}" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numero:') }}</label>

                            <div class="col-md-5">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  required autocomplete="phone" value="{{$member->phone}}" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Etat:') }}</label>

                            <div class="col-md-5">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state"  required autocomplete="state" value="{{$member->phone}}" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Etat abonnement:</label>

                            <div class="col-md-5">
                                <select id="state"  class="form-control" name="state"  required >
                                    <option value="paye">paye</option>
                                    <option value="retard">en retard</option>

                                   
                                  </select>
                                @error('state')
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
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar du membre:</label>
    
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
                                    {{ __('enregistrer') }}
                                </button>
                                <a href="{{ route('members.index') }}"><button  type="button" class="btn btn-primary bt "><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    
                    

                      

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




