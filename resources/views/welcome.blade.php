@extends('layouts/app')

@section('content')
<section class="hero-index" id="inicio">
			<div class="content-center title-index">	
				<h1 class="">THE BEST TRIP</h1>
				<p>Viaja y conoce lugares asombrososen todo mexico</p>
			</div>
			<div class="btn-sesion">
				<div class="form-registro">
				<button type="button" class="btn btn-blanco topmargin-md" data-toggle="modal" data-target="#exampleModal">
	  					Registrate
				</button>
				</div>
			</div>
			<div class="form-login content-center">	
				<button type="button" class="btn btn-blanco topmargin-md" data-toggle="modal" data-target="#exampleModal1">
	  					Iniciar Sesión
				</button>
			</div>
		</section>
<section class ="info">
			<div class="container-fluid content-viajes">
				<div class="content-center2">
					<h2 class="topmargin-lg">Viajes que pueden gustarte</h2>
				</div>
			</div>
			<div class="row content-row">
				<div class="col-sm-12 col-md-4 im-principal">
					<div class="img-content">
						<div class="detalles-img">
							<a href="#inicio"> <h2>El Almacén, Oaxaca</h2></a>
						</div>
						<img class="img" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_1024/https://rutopia.com/wp-content/uploads/2020/07/DSC00885-Copy-1024x576.jpg">
					</div>
				</div>
				<div class="col-sm-12 col-md-4 im-principal">
					<div class="img-content">
						<div class="detalles-img">
							<a href="#inicio"> <h2>Sierra Morena, Chiapas</h2></a>
						</div>
						<img class="img" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_1024/https://rutopia.com/wp-content/uploads/2020/07/f8cff502-d902-4152-a07e-b4ff4cca0537-1024x678.jpg">
					</div>
				</div>
				<div class="col-sm-12 col-md-4 im-principal">
					<div class="img-content">
						<div class="detalles-img">
							<a href="#inicio"> <h2>Acaxochitlán, Hidalgo</h2></a>
						</div>
						<img class="img" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_1024/https://rutopia.com/wp-content/uploads/2020/06/acaxochitlan-vive-textiles-nahuas-1024x683.jpg">
					</div>
				</div>
		</section>
@stop