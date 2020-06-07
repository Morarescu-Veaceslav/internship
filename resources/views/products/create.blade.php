@extends('layouts.app')

@section('content')

@if(count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach    
        </ul>
    </div>


@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Product</h1>
            <hr>

            {!! Form::open(['route' => 'products.store']) !!}

                {{ Form::label('name', 'Nume Produs:') }}
                {{ Form::text('name', null , ['class' => 'form-control'])}}

                {{ Form::label('title', 'Titlu:') }}
                {{ Form::text('title', null, ['class' => 'form-control'])}}
                
                {{ Form::hidden('email', Auth::user()->email, ['class' => 'form-control'])}}
            
                {{ Form::label('price', 'Pret:') }}
                {{ Form::text('price', null, ['class' => 'form-control'] )}}

                {{ Form::hidden('id_user', 0, ['class' => 'form-control'])}}

                {{Form::submit('Create Product', ['class' => 'btn btn-success btn-md btn-block', 'style' => 'margin-top:20px;'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection