{!! Form::open(['url' =>'/products/'.$product->id, 'method' => 'DELETE', 'class' => 'inline-block' ]) !!}
<div class="d-inline-block">
	<input type="submit" class="btn btn-danger d-inline-block" value="Eliminar">
</div>

{!! Form::close() !!}