@extends('layouts.app')

@section('content')
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 80%;
  }

  </style>
    <div class="pusher">
        
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://qcomo.co/assets/images/salchipapas.png" alt="Los Angeles" width="700" height="300">
    </div>
    <div class="carousel-item">
      <img src="https://qcomo.co/assets/images/salchipapas.png" alt="Chicago" width="700" height="300">
    </div>
    <div class="carousel-item">
      <img src="https://qcomo.co/assets/images/salchipapas.png" alt="New York" width="700" height="300">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

        <div class="ui vertical stripe segment none">

            <h2 class="ui horizontal header divider">
                <a href="#">Destacados / Ofertas</a>
            </h2>
           
            <div class="ui container three doubling stackable link cards">

                @foreach ($products as $product)

                    @include('partials.product')

                @endforeach

            </div>

            <div class="ui center aligned header">
                <a class="ui huge button" href="{{ route('shop.index') }} ">Ver mas comidas...</a>
            </div>
        </div>
    </div>
@endsection
