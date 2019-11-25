@include('layouts.app')
<div class="container">
	<h1>Nuevo producto</h1>

	@include("products.form",["product"=>$products, "url" => "/products","method" => "POST"])

</div>