function agregarDirector(){

	var nombre = $('#nombreAdd').val();
	var usuario = $('#usuarioAdd').val();
	var contraseña = $('#contraseñaAdd').val();
	var firma = $('#firmaAdd').val();
	var actual = $('#actualAdd').val();

	var parametros = {"nombre":nombre, "usuario":usuario, "contraseña":contraseña , "firma":firma, "actual":actual}
	if (nombre=="" || usuario =="" || contraseña =="" || firma =="" || actual =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=Director";
			}else{
				window.location.href="index.php?c=Director";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=Director&a=modalGuardar',
		data:parametros,
		datatype:'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			alert(response);
			if (response == 1) {
					Swal.fire(
				      'GUARDADO!',
				      'Se guardo con éxito!',
				      'success'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=Director";
						}else{
							window.location.href="index.php?c=Director";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'Director no registrado!<br>info: un laboratorio no puede tener 2 Directors<br>Ojo: El user no se puede repetir',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=Director";
						}else{
							window.location.href="index.php?c=Director";
						}
					})

				
			}
		}
	});
}
function listarById(id){
	var parametros={"id": id}

	$.ajax({

		url:'index.php?c=director&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);
			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['ID_DIRECTORES']);
				$('#nombreEdit').val(data['NOMBRES']);
				$('#usuarioEdit').val(data['USUARIOS']);
				$('#firmaEdit').val(data['FIRMAS']);
				$('#actualEdit').val(data['ACTUAL']);
			}

		}
	});
}
function actualizarDirector(){

	var id = $('#idEdit').val();
	var nombre = $('#nombreEdit').val();
	var usuario = $('#usuarioEdit').val();
	var firma = $('#firmaEdit').val();
	var actual = $('#actualEdit').val();

	var parametros = {"id":id , "nombre":nombre, "usuario":usuario, "firma":firma, "actual":actual}
	if (nombre=="" || usuario =="" || firma =="" || actual =="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=Director";
			}else{
				window.location.href="index.php?c=Director";
			}
		})
				return false;
	}

	$.ajax({
		url:'index.php?c=Director&a=modificar',
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
						window.location.href="index.php?c=Director";
					}else{
						window.location.href="index.php?c=Director";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Director no registrado!<br>info: un laboratorio no puede tener 2 Directors<br>Ojo: El user no se puede repetir',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=Director";
					}else{
						window.location.href="index.php?c=Director";
						}
				})	
			}
		}
	});
}