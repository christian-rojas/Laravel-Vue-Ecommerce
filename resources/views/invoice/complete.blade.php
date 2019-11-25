<style>
	h1{
		vertical-align: center;
		
	}
	footer{
		bottom: 0px !important;
		position: fixed !important;
	}
	.m{
		padding: 5vh;
		position: relative;
	}
	i{
		display: inline-flex;
		font-size: 60px;
		color:red;
	}
</style>
@include('layouts.app')
<div class="container m">
	<div class="row">
		<div class="col-sm-6 m-auto">
			<h1 class="text-center d-block">Genial! te avisaremos cuando tu pedido este listo.</h1>
		</div>
	</div>
		<div class="row">
		<div class="col-sm-6 m-auto text-center">
			<h3 class="d-inline-block">Gracias por tu preferencia!</h3>
			
		</div>	
		</div>
		<div class="row">
			<div class="col-sm-3 m-auto text-center">
				<i class="fas fa-clipboard-check d-block"></i>
			</div>
		</div>
		
	</div>

@include('footer')