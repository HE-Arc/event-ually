@extends('layouts.app')

@section('content')
  <div class="col-sm-6">
    <div class="well">
      <h1>Créez un événement</h1>
      {!! Form::open(array('action' => 'EventController@storeEvent', 'files' => true)) !!}
        {!! Form::label('name', 'Nom de l\'événement: ') !!}
        {!! Form::text('name', 'Suisse-Maroc', ['class' => 'form-control']) !!}

        {!! Form::label('descritpion', 'Description: ') !!}
        {!! Form::text('description', 'Finale de la coupe du monde de curling', ['class' => 'form-control']) !!}
        
        {!! Form::label('place', 'Lieu: ') !!}
        {!! Form::text('place', 'Neuchâtel', ['class' => 'form-control']) !!}
        
        {!! Form::label('date', 'Date: ') !!}
        {!! Form::date('date', new Datetime('tomorrow'), ['class' => 'form-control']) !!}

        {!! Form::label('category', 'Catégorie: ') !!}
        {!! Form::select('category', 
                          array('1' => 'Neutre',
                                '2' => 'Romantique',
                                '3' => 'Sport',
                                '4' => 'Loisirs',
                                '5' => 'Relax',
                                '6' => 'Festival',
                                '7' => 'Education'),
                          '3', 
                          ['class' => 'form-control']) !!}

        {!! Form::label('image', 'Image: ') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}

        <br>
        {!! Form::submit('Créer !', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>
@endsection