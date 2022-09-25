function agregarProducto(){

	var nombre = $('#nombreAdd').val();
	var tipo = $('#tipo_ProductoAdd').val();
	var parametros = {"nombre":nombre, "tipo":tipo}
	if (nombre=="" || tipo =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=producto";
			}else{
				window.location.href="index.php?c=producto";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=producto&a=modalGuardar',
		data:parametros,
		datatype:'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			if (response == 1) {
					Swal.fire(
				      'GUARDADO!',
				      'Se guardo con éxito!',
				      'success'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=producto";
						}else{
							window.location.href="index.php?c=producto";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'Producto no registrado!<br>info: 2 producto no pueden tener el mismo nombre',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=producto";
						}else{
							window.location.href="index.php?c=producto";
						}
					})

				
			}
		}
	});



}

function listarById(id){
	var parametros={"id": id}

	$.ajax({

		url:'index.php?c=producto&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);

			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['id_producto']);
				$('#nombreEdit').val(data['nom_producto']);
				$('#tipo_ProductoEdit').val(data['tipo_producto']);				
			}
				
		}
	});
}

function actualizarProducto(){

	var id = $('#idEdit').val();
	var nombre = $('#nombreEdit').val();
	var tipo = $('#tipo_ProductoEdit').val();
	var parametros = {"id":id, "nombre":nombre, "tipo":tipo}
	if (nombre=="" || tipo =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=producto";
			}else{
				window.location.href="index.php?c=producto";
			}
		})
				return false;
	}
	$.ajax({
		url:'index.php?c=producto&a=modificar',
		data:parametros,
		datatype:'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			if (response == 1) {
				Swal.fire(
					'ACTUALIZADO!',
				    'Se actualizo con éxito!',
				    'success'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=producto";
					}else{
						window.location.href="index.php?c=producto";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Producto no actualizado!<br>info: 2 producto no pueden tener el mismo nombre',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=producto";
					}else{
						window.location.href="index.php?c=producto";
						}
				})	
			}
		}
	});
}