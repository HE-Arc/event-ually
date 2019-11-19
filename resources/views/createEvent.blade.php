@extends('layouts.app')

@section('content')
  <h1>Créez un événement</h1>
  {!! Form::open(array('action' => 'EventController@storeEvent', 'files' => true)) !!}
  {!! Form::label('name', 'Nom de l\'événement: ') !!}
  {!! Form::text('name') !!}

  {!! Form::label('descritpion', 'Description: ') !!}
  {!! Form::text('descritpion') !!}
  
  {!! Form::label('place', 'Lieu: ') !!}
  {!! Form::text('place') !!}
  
  {!! Form::label('date', 'Date: ') !!}
  {!! Form::date('date') !!}

  {!! Form::submit('Créer !') !!}
  {!! Form::close() !!}
@endsection