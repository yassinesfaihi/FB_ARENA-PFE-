
@extends(\Auth::user()->role == 'admin' ? 'layouts.dashboardAdmin' : 'layouts.dashboardUser')
@section('title')
@endsection
@section('PageHeader')
@endsection
@section('content')
<div class="panel important">
   <h3>Modifier les informations de {{  $user->name}}</h3>
   <form method="POST" action="{{ route('users.update', $user) }}">
      @csrf
      {{method_field('PUT')}}
      <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom:') }}</label>
         <div class="col-md-5">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      <div class="form-group row">
         <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email:') }}</label>
         <div class="col-md-5">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      <div class="form-group row">
         <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numero de telephone:') }}</label>
         <div class="col-md-5">
            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      <div class="form-group row">
         <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adresse:') }}</label>
         <div class="col-md-5">
            <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ $user->adress }}" required autocomplete="adress">
            @error('adress')
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
            <a href="{{ route('users.index') }}"><button  type="button" class="btn btn-primary bt"><i class="fa fa-arrow-left" aria-hidden="true"></i> retour </button>
         </div>
      </div>
   </form>
</div>
@endsection