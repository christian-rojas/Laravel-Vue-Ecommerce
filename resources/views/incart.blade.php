@include('layouts.app')
<br>
<div class="container cart">
  <div class="row">   
    
@if(Auth::check())
@if($incarts==null)
<div class="noprod">
<h1 class="text-center">No existen productos aún</h1><br>
<a class="btn btn-warning" href="{{url('Vinos')}}">Ir a la Tienda</a>
</div>
@else
@foreach($incarts as $incart)
<div class="col-md-4">
  <div class="card text-center" style="width: 100%">
    <div class="card-header success-color">
    <h5 class="card-title">{{$incart->nombreP}} cantidad {{ $cantidad[$loop->index] }}</h5>
    </div>
    <div class="card-body ">
  <div id="{{ $incart->nombreP}}" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'1.jpg')}}" alt="">
    </div>
    @if(file_exists('piks/'.$incart->nombreP.'2.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'2.jpg')}}" alt="">
    </div>
    @endif
    @if(file_exists('piks/'.$incart->nombreP.'3.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'3.jpg')}}" alt="">
    </div>
    @endif
  </div>
  @if(file_exists('piks/'.$incart->nombreP.'2.jpg'))
  <a class="carousel-control-prev" href="#{{$incart->nombreP}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#{{$incart->nombreP}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
        <!--end-->
    </div>
    <!--body-->
    <br>
    <h3 class="card-text">${{number_format($incart->precio,0)}}</h3>
    <!--fin body-->
    <div class="card-footer text-muted success-color white-text">
         <form action="{{action('CartController@delete')}}" method="POST">
         	{{ csrf_field() }}
         	<input type="hidden" name="product_id" value="{{$incart->product_id}}">         	
         	<button type="submit" class="btn btn-danger">Eliminar</button>
         </form>
    </div>
</div>
</div>
@endforeach
@endif
<!--termino de usuario-->
<a href="{{url('pagar')}}" class="btn btn-outline-primary">Pagar</a>
@elseif(!Auth::check())
@if($items==null)
<div class="noprod">
<h1 class="text-center">No existen productos aún</h1><br>
<a class="btn btn-warning" href="{{url('Vinos')}}">Ir a la Tienda</a>
</div>
@else
@foreach($items as $s)
 @foreach($s as $incart ) 
  

<div class="col-md-4">
  <div class="card text-center" style="width: 100%">
    <div class="card-header success-color">
    <h5 class="card-title">{{$incart->nombreP}} </h5>
    
    </div>
    <div class="card-body ">
<div id="{{ $incart->nombreP}}" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">

    <div class="carousel-item active">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'1.jpg')}}" alt="">
    </
    @if(file_exists('piks/'.$incart->nombreP.'2.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'2.jpg')}}" alt="">
    </div>
    @endif
    

    @if(file_exists('piks/'.$incart->nombreP.'3.jpg'))
    <div class="carousel-item">
      <img class="d-block imagen"  width="auto" style="margin: 0 auto" height="300px" src="{{url('piks/'.$incart->nombreP.'3.jpg')}}" alt="">
    </div>
    @endif
    
  </div>
  @if(file_exists('piks/'.$incart->nombreP.'2.jpg'))
  <a class="carousel-control-prev" href="#{{$incart->nombreP}}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#{{$incart->nombreP}}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
        <!--end-->
    </div>
    <!--body-->
    <br>
    <!--<h3 class="card-text">${{number_format($incart->precio,0)}}</h3>-->
    <!--fin body-->
    <div class="card-footer text-muted success-color white-text">
         <form action="{{action('CartController@delete')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="product_id" value="{{$incart->id}}">
          
          <button type="submit" class="btn btn-danger">Eliminar</button>
         </form>
    </div>
</div>
</div>

@endforeach
@endforeach
<!--<button type="submit" class="btn btn-success m-auto d-block">Pagar ${{$total}}</button>-->
<a href="{{url('pagar')}}" class="btn btn-outline-primary">Pagar</a>
@endif
@endif
  </div>
</div>

<br>
@include('footer')