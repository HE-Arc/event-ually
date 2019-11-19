@extends('layouts.app')

@section('content')
<form action="EventController" method="POST">
<h3>Créer événement</h1>

  Nom de l'événement:<br>
  <input type="text" name="name">
  <br>Description:<br>
  <input type="text" name="description">
  <br>Endroit:<br>
  <input type="text" name="place">
  <br>Date:<br>
  <input type="date" name="date">
  <br></br>
  <input type="submit">
</form>
@endsection