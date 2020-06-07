<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>Products</title>
        <style>
        
        </style>
    </head>
    <body>

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header ">
      <a class="navbar-brand" href="{{url('/')}}">Products</a>
    </div>
    @if(Auth::check())
    <ul class="nav navbar-nav">
      <li ><a href="{{url('/home')}}">Home</a></li>
      <li ><a href="{{url('/favorites')}}">Favorites</a></li>
    </ul>
    @endif
    <ul class="nav navbar-nav navbar-right">
    @if(Auth::check())
    <li>
       <a  href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
          <span class="glyphicon glyphicon-log-out"></span>  logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
           @csrf
        </form>                  
     </li>
    @else
      <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    @endif  
    </ul>
    
  </div>
</nav>

@if(Session::has('success'))

<div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success')}}
</div>


@endif
<div class="container">
  <div class="text-center">
    <h1>Toate Produsele</h1>
  </div>
  <br>
    <div class="row">
       <div class="col-lg-12 ">
         <table class="table">
           <thead>
            <th>Nume Produs</th>
            <th>Titlu</th>
            <th>Pret</th>
            <th>Created At</th>
            <th>Last Updated</ht>
            @if(Auth::check())
            <th>Add to Favorite</th>
            @endif
           </thead>

           <tbody>
           @foreach($products as $product)
            <tr>
            <td>{{ $product->name}}</td>
            <td>{{ $product->title}}</td>
            <td>{{ $product->price}} $</td>
            <td>{{ date('M j, Y', strtotime($product->created_at))}}</td>
            <td>{{ date('M j, Y', strtotime($product->updated_at))}}</td>
            <td>
              @if(Auth::check())
              <div class="col-md-4">
              @if(Auth::user()->id === $product->id_user)
             <button type="button" class="btn btn-default btn-md disabled">Is Added</button>
              @else
              {!! Form::model($product,['route' => ['favorites.update', $product->id],'method' => 'PUT']) !!}
                  {{ Form::hidden('id_user', Auth::user()->id, ['class' => 'form-control'])}}
                  {{Form::submit('Add to Favorites ', ['class' => 'btn btn-info btn-md'])}}
                  {!! Form::close() !!} 

              @endif     
              </div>
              @endif
            </td>                
            </tr>
          @endforeach    
          </tbody>
       </table>
       <div class="text-center">
                {!! $products->links() !!}
       </div>
    </div>
  </div>       
</div>       
</body>
</html>
