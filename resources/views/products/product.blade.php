@include('layouts.app')
<br><br>
<div class="container cart">
  <div class="row">
    @if($count==null)
<div class="noprod">
  <h1 class="text-center">aun no hay productos</h1>
</div>
  
@else

@foreach($products as $product)


<div class="col-md-4">
  <div class="card text-center" style="width: 100%">
    <div class="card-header success-color">
    <h5 class="card-title">{{$product->nombreP}}</h5>
    </div>
    <div class="card-body ">
<div id="{{ $product->nombreP}}" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">

    <div class="carousel-item active">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$product->nombreP.'1.jpg')}}" alt="">
    </div>
    
    
    @if(file_exists('piks/'.$product->nombreP.'2.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$product->pnombreP.'2.jpg')}}" alt="">
    </div>
    @endif
    

    @if(file_exists('piks/'.$product->nombreP.'3.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$product->pnombreP.'3.jpg')}}" alt="">
    </div>
    @endif
    


   
  </div>
  @if(file_exists('piks/'.$product->nombreP.'2.jpg'))
  <a class="carousel-control-prev" href="#{{$product->nombreP}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#{{$product->nombreP}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
        <!--end-->
    </div>
    <!--body-->
    <br>
    <h4 class="card-text">{{$product->descripcion}}</h4>
    <h3 class="card-text">${{number_format($product->precio,0)}}</h3>
    <!--fin body-->
    <div class="card-footer text-muted success-color white-text">
      <form method="post" action="{{action('CartController@add')}}">
        {{ csrf_field() }}
        <input type="hidden" name="id_product" value="{{$product->id}}">
        <input type="number" name="cantidad" placeholder="1" value="1">
        <input type="hidden" name="nombreP" value="{{$product->nombreP}}">
        <button type="submit" class="btn btn-success">Agregar</button>  
      </form>    
    </div>
</div>
</div>
@endforeach
@endif
  </div>
</div>
<br>

@include('footer')


	
