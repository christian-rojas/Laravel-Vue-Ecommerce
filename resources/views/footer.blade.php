
 <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h1>Quieres saber mas de Grial Wines?</h1>
                        <a href="">Tienda</a>
                        <a href="">Viñas</a>
                        <a href="">Nosotros</a>
                        <a href="">Contacto</a>
                    </div>
                    <div class="col-md-4">
                        <h2>Ayuda</h2>
                        <hr>
                        <a href="">FAQ</a>
                        <a href="">Envios y retornos</a>
                        <a href="">Politica de la tienda</a>
                        <a href="">Metodos de pago</a>
                    </div>
                    <div class="col-md-4">
                        <h2>Siguenos</h2>
                        <hr>
                        <a href="">Facebook</a>
                        <a href="">Instagram</a>
                        <!--init contact-->
						<div class="container">
	@if(session('mensaje'))
	<div class='alert alert-success'>
		{{ session('mensaje') }}
	</div>
	@endif
	<div class="row">
		<h4 class="m-auto">Contactanos!</h4>
		<div class="col-sm-12">
			<!--<h1 class="text-center">Contacto</h1>-->
			<form class="form-horizontal" method="POST" action="">
			{{ csrf_field() }} 
			<div class="form-group">
			<input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
		</div>

		<div class="form-group">
			<input type="email" class="form-control" id="email" placeholder="juan@email.com" name="email" required>
		</div>

		<div class="form-group">
			
			<textarea type="text" class="form-control luna-message" id="message" placeholder="Mensaje.." name="message" required></textarea>
		</div>

			<div class="form-group">
				<button  type="submit" class="btn btn-primary d-block m-auto" value="Send">Enviar</button>
			</div>
		</form>
		</div>
	
		
	</div>
</div>
                        <!--end contact-->
                        
                    </div>
                </div>
            </div>
    <div class="container text-center">
      <small>Todos los derechos reservados &copy; grialwines</small>
    </div>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>