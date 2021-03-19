@extends('base')

@section('title', 'Mon compte')

@section('content')
<form method="POST" action="{{route('login.post')}}">
  @csrf
  @if ($errors->any())
  <div class="alert alert-warning">
    Vous n'avez pas pu être authentifié &#9785;
    {{$errors}}
  </div>
  @endif

  @if (session()->get('redirectFromRegister'))
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="{{session()->get('redirectEmail')}}" aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
    <div id="email_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" value="{{session()->get('redirectPassword')}}" aria-describedby="password_feedback" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <div id="password_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  @else
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="" aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
    <div id="email_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" value="" aria-describedby="password_feedback" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <div id="password_feedback" class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  @endif

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="client" id="inlineRadio1" value="client">
    <label class="form-check-label" for="inlineRadio1">client</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="manager" id="inlineRadio2" value="manager">
    <label class="form-check-label" for="inlineRadio2">manager</label>
  </div>

  <div class="form-group">
    <label for="password">Vous n'avez pas de compte? </label>
    <label for="inscription" style="color: grey; font-size:large">S'inscire</label>
    <a href="/register/client" style="color: blue; font-size:large"> client</a>
    <a href="/entrerUnHotel" style="color: blue; font-size:large"> hôtel</a>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
@endsection