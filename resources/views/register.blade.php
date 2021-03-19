@extends('base')

@section('title', 'Inscription')

@section('content')
<form method="POST" action="{{route('register')}}">
  @csrf
  @if ($errors->any())
  <div class="alert alert-warning">
    Inscription échouée &#9785;
    {{$errors}}
  </div>
  @endif

  <div class="form-group">
    <label for="lastname">Nom</label>
    <input type="name" id="lastname" name="lastname" value="{{old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror">
    @error('lastname')
    <div id="lastname_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="firstname">Prénom</label>
    <input type="name" id="firstname" name="firstname" value="{{old('firstname')}}" class="form-control @error('firstname') is-invalid @enderror">
    @error('firstname')
    <div id="firstname_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="{{old('email')}}" aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
    <div id="email_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="tel">Tel</label>
    <input type="tel" id="tel" name="tel" value="{{old('tel')}}" aria-describedby="tel_feedback" class="form-control @error('tel') is-invalid @enderror" required>
    @error('tel')
    <div id="tel_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="dateNaiss">Date de naissance</label>
    <input type="date" id="dateNaiss" name="dateNaiss" value="{{old('dateNaiss')}}" aria-describedby="dateNaiss_feedback" class="form-control @error('dateNaiss') is-invalid @enderror" required>
    @error('dateNaiss')
    <div id="dateNaiss_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" value="{{old('password')}}" aria-describedby="password_feedback" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <div id="password_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
@endsection