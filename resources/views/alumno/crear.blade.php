@extends('alumno.template')

@section('titulo')
	Alumno | Crear
@endsection

@section('content')
	<!-- Iniciamos el Header -->
	<section class="mt-4 mb-1">
		<div class="container">
	
			<div class="boxLogin mt-2 text-center">
				<h2 class="welcome">¡Bienvenido al CRUD del alumno!</h2>
			</div>
			<br>
			<div class="col-md-12">
				<a href="{{ route('alumno')}}" class="btn btn-danger">Regresar</a>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					@include('includes.form-error')
					@include('includes.mensajes')
				</div>
			</div>
			<br>
			<div class="col-md-12">
				<form class="needs-validation" novalidate action="{{ route('registrar_alumno')}}" method="POST">
					@csrf
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="nombres">Nombres</label>
								<input type="text" class="form-control" id="nombres" name="nombres" value="{{old('nombres')}}" required>
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apaterno">Apellido paterno</label>
								<input type="text" class="form-control" id="apaterno" name="apaterno" value="{{old('apaterno')}}" required>
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="amaterno">Apellido materno</label>
							<input type="text" class="form-control" id="amaterno" name="amaterno" value="{{old('amaterno')}}" required>
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="tipodoc">Tipo documento</label>
							<select class="custom-select" id="tipodoc" name="tipodoc" required>
								<option selected disabled value="">:: Seleccione ::</option>
								<option value="1" @if (old('tipodoc') == 1) selected @endif>DNI</option>
								<option value="2" @if (old('tipodoc') == 2) selected @endif>Pasaporte</option>
								<option value="3" @if (old('tipodoc') == 3) selected @endif>Carnet Extranjería</option>
							</select>
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="nrodoc">Número de documento</label>
							<input type="text" class="form-control" id="nrodoc" name="nrodoc" value="{{old('nrodoc')}}" required maxlength="11">
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="correo">Correo</label>
							<input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" required>
							<div class="invalid-feedback">
								El campo es requerido y formato mail
							</div>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-md-4 mb-3">
							<label for="celular">Celular</label>
							<input type="text" class="form-control valnumero" id="celular" name="celular" value="{{old('celular')}}" required maxlength="11">
							<div class="invalid-feedback">
								El campo es requerido
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="sexo"></label>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="sexomas" value="1" name="sexo" class="custom-control-input" required @if (old('sexo') == 1) checked @endif>
								<label class="custom-control-label" for="sexomas">Masculino</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="sexofem" value="2" name="sexo" class="custom-control-input" required @if (old('sexo') == 2) checked @endif>
								<label class="custom-control-label" for="sexofem">Femenino</label>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Registrar</button>
				</form>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
			});
		}, false);
		})();
	
	</script>
@endsection
