@extends('base')

@section('title', 'Création d\'un match')

@section('content')
<form   method="POST" action="{{route('matches.store')}}">
  @if ($errors->any())
    <div class="alert alert-warning">
      Le match n'a pas pu être ajouté &#9785;
    </div>
  @endif
  
  <div class="form-group">
    <label for="team0">Équipe à domicile</label>
    <select class="form-control" id="team0" name="team0">
      @foreach ($teams as $team)
      <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="team1">Équipe à l'extérieur</label>
    <select class="form-control" id="team0" name="team0" >
      @foreach ($teams as $team)
      <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" aria-describedby="team_name_feedback" 
        class="form-control @error('date') is-invalid @enderror" value="{{ old('team_name') }}">
  </div>
  <div class="form-group">
    <label for="time">Heure</label>
    <input type="time" class="form-control" id="time" name="time" value="{{ old('team_name') }}">
  </div>
  <div class="form-group">
    <label for="score0">Nombre de buts de l'équipe à domicile</label>
    <input type="number" class="form-control" id="score0" name="score0" min="0" value="{{ old('team_name') }}">
  </div>
  <div class="form-group">
    <label for="score1">Nombre de buts de l'équipe à l'extérieur</label>
    <input type="number" class="form-control" id="score1" name="score1" min="0" value="{{ old('team_name') }}">
      @error('date')
        <div id="date_feedback" class="invalid-feedback">
          {{ $errors }}
        </div>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
@endsection