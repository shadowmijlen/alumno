@extends('alumno.template')

@section('titulo')
	Alumno
@endsection

@section('content')
<style>
	.swal2-actions .swal2-confirm {
		margin-left: 5px;
	}
</style>
	<!-- Iniciamos el Header -->
	<section class="mt-4 mb-1">
		<div class="container">
	
			<div class="boxLogin mt-2 text-center">
				<h2 class="welcome">¡Bienvenido al CRUD del alumno!</h2>
			</div>
			<br>
			<div class="col-md-12">
				<a href="{{ route('crear_alumno')}}" class="btn btn-success">Crear Alumno</a>
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
				<table id="alumnos" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Ap Paterno</th>
							<th scope="col">Ap Materno</th>
							<th scope="col">Tipo Documento</th>
							<th scope="col">Número de Doc</th>
							<th scope="col">Sexo</th>
							<th scope="col">Correo</th>
							<th scope="col">Celular</th>
							<th scope="col">Registro</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($alumnos as $alumno)
						@php
							if($alumno->tipodoc == 1){$tipodoc = "DNI";}elseif ($alumno->tipodoc == 2) {$tipodoc = "Pasaporte";}else{$tipodoc = "Carnet de ext.";}
							if($alumno->sexo == 1){$sexo = "M";}else{$sexo ="F";}
						@endphp
						<tr>
							<th scope="row">{{$alumno->id}}</th>
							<td>{{$alumno->nombres}}</td>
							<td>{{$alumno->apaterno}}</td>
							<td>{{$alumno->amaterno}}</td>
							<td>{{$tipodoc}}</td>
							<td>{{$alumno->nrodoc}}</td>
							<td>{{$sexo}}</td>
							<td>{{$alumno->correo}}</td>
							<td>{{$alumno->celular}}</td>
							<td>{{$alumno->created_at->format('d/m/yy')}}</td>
							<td>
								<a href="{{route('editar_alumno', $alumno)}}" class="btn btn-info"><i class="fas fa-edit"></i></a> 
							</td>
							<td>
								<button class="btn btn-danger" onclick="eliminar_alumno({{$alumno->id}})" title="Eliminar Alumno"><i
										class="fa fa-trash"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		});

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

	        $('#alumnos').DataTable( {
	            pageLength: 10,
	            paging: true,
	            lengthChange: true,
	            searching: true,
	            ordering: true,
	            info: true,
	            autoWidth: true,
	            responsive: true,
	            dom: '<"html5buttons"B>lTfgitp',
	            buttons: ['excel']
	        } );
	    } );
	
	    $.extend( true, $.fn.dataTable.defaults, {
	        "language": {
	            "decimal": ",",
	            "thousands": ".",
	            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
	            "infoPostFix": "",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "loadingRecords": "Cargando...",
	            "lengthMenu": "Mostrar _MENU_ registros",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	            "processing": "Procesando...",
	            "search": "Buscar:",
	            "searchPlaceholder": "Término de búsqueda",
	            "zeroRecords": "No se encontraron resultados",
	            "emptyTable": "Ningún dato disponible en esta tabla",
	            "aria": {
	                "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                "sortDescending": ": Activar para ordenar la columna de manera descendente"
	            },
	            //only works for built-in buttons, not for custom buttons
	            "buttons": {
	                "create": "Nuevo",
	                "edit": "Cambiar",
	                "remove": "Borrar",
	                "copy": "Copiar",
	                "csv": "fichero CSV",
	                "excel": "Excel",
	                "pdf": "documento PDF",
	                "print": "Imprimir",
	                "colvis": "Visibilidad columnas",
	                "collection": "Colección",
	                "upload": "Seleccione fichero...."
	            },
	            "select": {
	                "rows": {
	                    _: '%d filas seleccionadas',
	                    0: 'clic fila para seleccionar',
	                    1: 'una fila seleccionada'
	                }
	            }
	        }
	    } );

		function eliminar_alumno(id) {
				
			swalWithBootstrapButtons.fire({
				title: '¿Estás seguro de eliminar al alumno?',
				text: "Si elimina al alumno, ya no podrá recuperar la información",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Si, estoy seguro',
				cancelButtonText: 'No, cancelado',
				reverseButtons: true
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: 'PUT',
						url:"{{route('eliminar_alumno')}}",
						data: { id : id},
						beforeSend:function(){
							$('.loader').show();
						},
						success:function(data){
							if(data.status == 1){
								swalWithBootstrapButtons.fire(
								'Eliminado',
								data.msg,
								'success'
								)
								location.reload();
							}else{
								swalWithBootstrapButtons.fire(
								'Eliminado',
								data.msg,
								'success'
								)
							}
						},
						complete:function(){
							$('.loader').hide();
						}
					});
				} else if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.cancel
				) {
					swalWithBootstrapButtons.fire(
					'Cancelado',
					'La operación ha sido cancelado',
					'error'
					)
				}
			})
		}
	
	</script>
@endsection
