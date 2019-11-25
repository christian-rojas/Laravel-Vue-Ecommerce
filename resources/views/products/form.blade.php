{!! Form::open(['url' => $url, 'method' => $method]) !!}

	<div class="form-group">
		{{ Form::text('nombreProd',$product->nombreP, ['class' => 'form-control', 'placeholder' => 'Nombre producto']) }}
	</div>
	
	<div class="form-group">
		{{ Form::number('precio',$product->precio,['class' => 'form-control', 'placeholder' => 'precio','min'=>1000,'max'=>100000]) }}
	</div>
	<div class="form-group">
		{{ Form::number('stock',$product->stock,['class' => 'form-control','placeholder' => 'stock','min'=>1,'max'=>100]) }}
	</div>
	<div class="form-group">
		{{ Form::textarea('descripcion',$product->descripcion,['class' => 'form-control', 'placeholder' => 'descripcion','maxlength' => 255]) }}
	</div>

	<div class="form-group text-right">
		<a href="{{url('/products')}}">Regresar al listado</a>
		<input type="submit" value="enviar" class="btn btn-success">
	</div>
	{!! Form::close() !!} 