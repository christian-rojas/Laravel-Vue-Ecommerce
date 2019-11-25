<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Grial Wines</title>

        <!-- Fonts -->
        

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="portada">
        @include('layouts.app')
        

<div class="typewriter first">
  <h5>El sentido de tu vida</h5>

</div>
<div class="typewriter">
    <h5>Compártela con Grial Wines</h5>
</div>
<hr>
    <a href="{{url('Vinos')}}" class="btn btn-success m-auto d-block" style="width: 100px;">Comprar</a>
        </div>
        <hr>
        <div class="products">
            <h1 class="text-center">Récien llegados</h1>
            <div class="owl-carousel owl-theme">
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>
          <a href="#" class="btn btn-success m-auto d-block" style="width:100px;">Tienda</a>
        </div>
        <hr>
        <div class="exclusivos">
            <h1 class="text-center">Exclusivos</h1>
            <div class="owl-carousel owl-theme">
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <img src="{{asset('productos/cabernet1.jpg')}}" width="100%" alt="">
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>
          <a href="#" class="btn btn-success m-auto d-block" style="width:100px;">Tienda</a>
        </div>
        <hr>
        <h1 class="text-center" style="color:black">Conoce nuestros viñedos</h1>
        <a href="#" class="btn btn-success m-auto d-block" style="width:100px">Viñedos</a>
        <br>
        <div class="uvas">
            <h3 class="text-center">Comentarios de los clientes</h3>
        </div>
        <hr>
       @include('footer')
       <script type="text/javascript">
             
            $( document ).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              });
            });
         
        </script>
    </body>
</html>
