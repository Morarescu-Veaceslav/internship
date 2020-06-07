@extends('layouts.app')

@section('content')

@if(Session::has('success'))

<div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success')}}
</div>


@endif


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Lista Produselor</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('products.create')}}" class="btn btn-md btn-block btn-primary">Creaza un produs nou</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <table class="table">
                <thead>
                    <th>Nume Produs</th>
                    <th>Titlu</th>
                    <th>Pret</th>
                    <th>Created At</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name}}</td>
                        <td>{{ substr($product->title, 0, 50) }}{{ strlen($product->title) > 50 ? "..." : ""}}</td>
                        <td>{{ $product->price}}</td>
                        <td>{{ date('M j, Y', strtotime($product->created_at))}}</td>
                        <td>
                        @if(Auth::user()->email === $product->email)
                        <div class="row">
                            <div class="col-sm-4">
                            {!! Html::linkRoute('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-success'))!!}
                            </div>
                            <div class="col-sm-4">
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE'])!!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                            {!! Form::close() !!}
                            </div>

                            <div class="col-ms-4">
                           
                            </div>
                        </div>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $products->links(); !!}
            </div>
        </div>
    </div>
</div>
@endsection
