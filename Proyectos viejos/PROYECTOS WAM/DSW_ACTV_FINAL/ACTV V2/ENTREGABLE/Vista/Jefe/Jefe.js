function agregarJefe(){

	var nombre = $('#nombreAdd').val();
	var usuario = $('#usuarioAdd').val();
	var contraseña = $('#contraseñaAdd').val();
	var laboratorio = $('#laboratorioAdd').val();
	var actual = $('#actualAdd').val();
	var parametros = {"nombre":nombre, "usuario":usuario, "contraseña":contraseña , "laboratorio":laboratorio, "actual":actual}
	if (nombre=="" || usuario =="" || contraseña =="" || laboratorio =="" || actual =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=jefe";
			}else{
				window.location.href="index.php?c=jefe";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=Jefe&a=modalGuardar',
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
							window.location.href="index.php?c=jefe";
						}else{
							window.location.href="index.php?c=jefe";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'Jefe no registrado!<br>info: un laboratorio no puede tener 2 Jefes<br>Ojo: El user no se puede repetir',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=jefe";
						}else{
							window.location.href="index.php?c=jefe";
						}
					})

				
			}
		}
	});
}

function listarById(id){
	var parametros={"id": id}
	$.ajax({

		url:'index.php?c=jefe&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);

			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['ID_JEFES']);
				$('#nombreEdit').val(data['NOMBRES']);
				$('#usuarioEdit').val(data['USUARIOS']);
				$('#laboratorioEdit').val(data['LABORATORIOS']);
				$('#actualEdit').val(data['ACTUAL']);

			}	
		}
	});
}

function actualizarJefe(){

	var id = $('#idEdit').val();
	var nombre = $('#nombreEdit').val();
	var usuario = $('#usuarioEdit').val();
	var laboratorio = $('#laboratorioEdit').val();
	var actual = $('#actualEdit').val();

	var parametros = {"id":id ,"nombre":nombre, "usuario":usuario, "laboratorio":laboratorio, "actual":actual}
	if (nombre=="" || usuario =="" || laboratorio =="" || actual =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=jefe";
			}else{
				window.location.href="index.php?c=jefe";
			}
		})
				return false;
	}
	$.ajax({
		url:'index.php?c=jefe&a=modificar',
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
						window.location.href="index.php?c=jefe";
					}else{
						window.location.href="index.php?c=jefe";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Jefe no registrado!<br>info: un laboratorio no puede tener 2 Jefes<br>Ojo: El user no se puede repetir',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=jefe";
					}else{
						window.location.href="index.php?c=jefe";
						}
				})	
			}
		}
	});
}