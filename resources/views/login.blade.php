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

  <div class="form-group">
    <label for="statut">Votre statut</label>
    <select  id="statut" name="statut" required class="form-control @error('team1') is-invalid @enderror" aria-describedby="team1_feedback">
      <option value="0">Vous êtes ? </option>
      <option value="1">client</option>
      <option value="2">manager</option>
      <option value="3">admin</option>
    </select>
  </div>
  

  <div class="form-group">
    <label for="password">Vous n'avez pas de compte? </label>
    <a href="/register" style="color: blue; font-size:large"> S'inscire ici</a>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
@endsection