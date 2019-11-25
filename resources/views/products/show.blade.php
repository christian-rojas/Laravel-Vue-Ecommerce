@include('inicio.nav')
<br>
<div class="container">
	<div class="row">
	<div class="col-lg-6 ">
		@include('in_shopping_carts.carousel')
	</div>
  
	<div class="col-lg-6 ">
		<div class="card border-dark mb-3" style="">
  <div class="card-header text-show">{{$product->nombreProd}}
    </div>
  <div class="card-body text-dark">
    <h5 class="card-title text-center text-show">${{$product->precio}}</h5>
    <p class="card-text c-black text-show">{{$product->descripcion}}</p>

      
    <form class="inline-block" method="POST" action="{{action('CartController@add')}}">
    <input type="hidden" name="nombreProd" value="{{$product->nombreProd}}">

		{{csrf_field()}}
    <!---->
    
     <div class="form-group col-md-4 m-auto">
      <br>
      @if($cuentaCamisa==null && $esCamiseria==null)
      {{ Form::select('size', array('S' => 'S', 'M' => 'M','L' => 'L', 'XL' => 'XL'), null ,array('class'=>'form-control','style'=>'' )) }}

      <!--<h5 class="text-center">Si necesitas una talla especial ingresa tus medidas</h5>

      <h6 class="text-center ">Esta opción tiene un costo agregado de $3.000</h6>-->

      @elseif($cuentaCamisa!=null && $cat!=null)
<select name="size" id="categories" class="m-auto" >
  @foreach($camisas as $item)
    <option value="{{ $item->talla }}">{{ $item->talla }}</option>
  @endforeach
</select>

      @elseif($esCamiseria!=null)
      <h3 class="text-center">Selecciona tu talla</h3>
      <select class="d-block m-auto" name="size" id="categories" class="m-auto">
    @foreach($camiseria as $item)
    <option value="{{ $item->talla }}">{{ $item->talla }}</option>
    @endforeach
      </select>
      @else
      <h3>No hay stock</h3>
      @endif  

      @if($product->id==112 || $product->id==113 || $product->id==114 || $product->id==115)
      <label for="inputState"><span class="text-show">Selecciona el tipo de prenda</span></label>
    <div class="form-group col-md-4">
      <select name="cartera" class="mdb-select md-form">
  <option value="con-cartera">con cartera</option>
  <option value="sin-cartera">sin cartera</option>
      </select>
    </div>
      @endif

      <!--init color-->
    @if($esColor)
    <div class="form-group col-md-4">
  <br>
      <label for="inputState"><span class="text-show">Selecciona tu Color</span></label>
      <select name="color" id="categories" class="">
  @foreach($colors as $color)
    <option value="{{ $color->color }}">{{ $color->color }}</option>
  @endforeach
</select>
    </div>

    @if($product->id == 103)
    <label for="inputState"><span class="text-show">Selecciona el tipo de prenda</span></label>
    <div class="form-group col-md-4">
      <select name="tipo" class="mdb-select md-form">
  
  <option value="completo">cierre completo</option>
  <option value="medio">medio cierre</option>
  
      </select>
    </div>
    @endif
    @endif

    <!--fin color-->

      @if($categoria!=0 && $cat==null)
      
      <a class="btn btn-info" data-toggle="modal" data-target="#tallas" href="">Guia de Tallas</a>
      @include('inicio.guia')
      
      @endif
    </div>
    <br>
    <h3 class="text-center">Elige un método de envío</h3>
    <h6 class="text-center">(En cualquier caso se envía por pagar)</h6>
<div class="form-check">

  <input class="form-check-input" type="radio" name="envio" id="exampleRadios1" value="Chileexpress" checked>
  <!--<label class="form-check-label" for="exampleRadios1">
    Chileexpress
  </label>-->
  <img src="{{asset('fotos/chileexpress.jpg')}}" width="120px" alt="">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="envio" id="exampleRadios2" value="Starken">
  <!--<label class="form-check-label" for="exampleRadios2">
    Starken
  </label>-->
  <img src="{{asset('fotos/starken.jpg')}}" width="120px" alt="">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="envio" id="exampleRadios2" value="Metro">
  <!--<label class="form-check-label" for="exampleRadios2">
    Estación de Metro
  </label>-->
  <img src="{{asset('fotos/metro.png')}}" width="50px" alt="">


</div>

    <!---->
      </div>

      

      
      @if($product->id == 87)
      @include('products.87')

      @elseif($product->id == 103)
      @include('products.casaca')
      
      @elseif($product->id == 88)
      @include('products.88')
      
      @elseif($product->id == 89)
      @include('products.89')
      
      @elseif($product->id == 90 || $product->id == 92 || $product->id == 93)
      @include('products.90')

      @elseif($product->id == 112 || $product->id == 113 || $product->id == 114 || $product->id == 115)
      @include('products.camiseria')
      
      @elseif($product->id == 91)
      @include('products.91')

      @elseif($product->id == 119)
      @include('products.119')

      @elseif($product->id == 116)
      @include('products.cor')
      @endif


      <hr>
      <!--include('products.guia')-->
      
      <div class="modal-footer">
  
	<input type="hidden" name="product_id" value="{{$product->id}}">
	<input type="hidden" name="talla" value="{{$product->id}}">
  
  
	<button type="submit" class="btn btn-success">
    <i class="fas fa-shopping-cart"></i>Agregar
	</button>
  
  <a class="btn btn-info d-block" href="{{ URL::previous() }}">Volver</a>
	 </form>
  </div>
</div>
	</div>	
	</div>
	
</div>
<br>
@include('inicio.footer')