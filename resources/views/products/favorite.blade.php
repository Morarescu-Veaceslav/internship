@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Favorite Products</h1>
            <hr>
            @if(Auth::check())
            <table class="table">
           <thead>
            <th>Created By</th>
            <th>Nume Produs</th>
            <th>Titlu</th>
            <th>Pret</th>
            <th>Created At</th>
            <th>Last Updated</ht>
           </thead>
           <tbody>
                @foreach($products as  $product)        
                  @if(Auth::user()->id === $product->id_user )
                  <tr>
                        <th>{{$product->name}}</th>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->title}}</td>
                        <td>{{ $product->price}} $</td>
                        <td>{{ date('M j, Y', strtotime($product->created_at))}}</td>
                        <td>{{ date('M j, Y', strtotime($product->updated_at))}}</td>
                        <td>
                        <div class="row">
                        <div class="col-md-8">
                        {!! Form::model($product,['route' => ['favorites.update', $product->id],'method' => 'PUT']) !!}
                        {{ Form::hidden('id_user', 0, ['class' => 'form-control'])}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-md'])}}
                        {!! Form::close() !!}  
                        </div>
                        </div>
                        </td>
                   </tr>     
                  @endif
                @endforeach
             </tbody>
            </table> 
            
            @endif   
           
        </div>
    </div>
</div>

@endsection