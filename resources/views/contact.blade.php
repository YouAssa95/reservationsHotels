@extends('base')

@section('title', 'Contact')

@section('content')
<form method="POST" action="{{route('contact.post')}}" >
    <!-- @csrf -->
    @if ($errors->any())
        <div class="alert alert-warning">
          Vous n'avez pas pu être authentifié &#9785;
          {{$errors}}
        </div>
    @endif
    <!-- <div class="form-group">
    <label for="name" >Nom</label>
      <input type="name" id="name" name="name" placeholder="Nom" > 
    </div> -->
    <div class="form-group">
      <label for="name">Nom et prénom</label>
      <input type="name" id="name" name="name" value="{{old('name')}}"
             aria-describedby="name_feedback" class="form-control @error('name') is-invalid @enderror"> 
      @error('name')
      <div id="name_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email"  value="{{old('email')}}"
             aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror"> 
      @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="form-group">
    <!-- <label for="message">message</label> -->
    <textarea placeholder="Votre message ici..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
@endsection