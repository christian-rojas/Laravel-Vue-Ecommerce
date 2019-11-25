@include('layouts.app')
<br>
<div class="big-padding text-center blue-grey white-text">
	<h1>Productos</h1>
</div>
<div class="container index">
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>Id</td>
				<td>nombre</td>
				<td>precio</td>
				<td>Stock</td>
				<td>descripcion</td>
				<td>Acciones</td>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>{{$product->nombreP}}</td>
				<td>{{$product->precio}}</td>
				<td>{{$product->stock}}</td>
				<td>{{$product->descripcion}}</td>
				
				
				
				<td class="d-flex">
					
						<a class="btn btn-info " href="{{url('/products/'.$product->id.'/edit')}}">editar</a>
				@include('products.delete',['product' => $product])
					
				
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="floating">
	<a href="{{url('/products/create')}}" class="btn btn-primary btn-fab">
		Agregar
	</a>
</div>