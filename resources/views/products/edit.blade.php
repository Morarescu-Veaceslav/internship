@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Product</h1>
            <hr>

            {!! Form::model($product, ['route' =>['products.update', $product->id], 'method' => 'PUT']) !!}

                {{ Form::label('name', 'Nume Produs:') }}
                {{ Form::text('name', null , ['class' => 'form-control'])}}

                {{ Form::label('title', 'Titlu:') }}
                {{ Form::text('title', null, ['class' => 'form-control'])}}

                {{ Form::label('price', 'Pret:') }}
                {{ Form::text('price', null, ['class' => 'form-control'] )}}
                {{ Form::hidden('id_user', $product->id_user, ['class' => 'form-control'])}}

                
                <div class="row">
                    <div class="col-md-6">
                      {{Form::submit('Save Changes', ['class' => 'btn btn-success btn-md btn-block', 'style' => 'margin-top:20px;'])}}
                    </div>
                    <div class="col-md-6">
                    {!! Html::linkRoute('home', 'Cancel', array($product->id), array('class' =>
                        'btn btn-danger btn-md btn-block', 'style' => 'margin-top:20px;')) !!}
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection