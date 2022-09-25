function agregarEnsayo(){

	var tipo_Ensayo = $('#tipo_EnsayoAdd').val();
	var medidas = $('#medidasAdd').val();
	var muestra = $('#id_MuestraAdd').val();
	var parametros = {"tipo_Ensayo":tipo_Ensayo,"medidas":medidas, "id_Muestra":muestra};
	if (tipo_Ensayo=="" || medidas =="" || muestra=="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=ensayo";
			}else{
				window.location.href="index.php?c=ensayo";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=ensayo&a=modalGuardar',
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
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'ensayo no registrado!',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})

				
			}
		}
	});
}

function listarById(id){
	var parametros={"id": id}
	$.ajax({

		url:'index.php?c=ensayo&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);
			console.log(data);
			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['id_ensayo']);
				$('#tipo_EnsayoEdit').val(data['tipo_ensayo']);
				$('#medidasEdit').val(data['medidas']);
				$('#id_MuestraEdit').val(data['id_muestra_fk']);			
			}
				
		}
	});
}
function actualizarEnsayo(){

	var id = $('#idEdit').val();
	var tipo_ensayo = $('#tipo_EnsayoEdit').val();
	var medidas = $('#medidasEdit').val();
	var id_muestra = $('#id_MuestraEdit').val();

	var parametros = {"id":id ,"tipo_ensayo":tipo_ensayo,"medidas":medidas, "id_muestra":id_muestra};
	if (tipo_ensayo=="" || medidas =="" || id_muestra=="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=ensayo";
			}else{
				window.location.href="index.php?c=ensayo";
			}
		})
				return false;
	}
	$.ajax({
		url:'index.php?c=ensayo&a=modificar',
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
						window.location.href="index.php?c=ensayo";
					}else{
						window.location.href="index.php?c=ensayo";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Ensayo no actualizado!<br>info: Verifique el id de la muestra',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=ensayo";
					}else{
						window.location.href="index.php?c=ensayo";
						}
				})	
			}
		}
	});
}
function alertaAprobarEnsayo(id) {
		var aprobar=1;
		Swal.fire({
		  title: '¿Seguro que quiere aprobar el ensayo "'+id+'" ?',
		  text: "Esta accion no se podra revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aprobar!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
			parametros = { "id":id, "n":aprobar}
			$.ajax({
				url:'index.php?c=ensayo&a=modificar',
				type:'POST',
				data:parametros,
				beforeSend:function(){},
				success:function(response){
					if(response==1){
						Swal.fire(
				      'Ensayo Aprobado!',
				      'Puede consultar su certificado',
				      'success'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})


					}else{
						Swal.fire(
				      'Ensayo No Pudo Ser Aprobado',
				      'Aun no existe un director que lo apruebe',
				      'warning'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})
					}
				    
				}
			});
		  }
		})
	}

function alertaRechazarEnsayo(id) {
		var rechazar=0;
		Swal.fire({
		  title: '¿Seguro que quiere rechazar el ensayo "'+id+'" ?',
		  text: "Este ensayo no estara certificado",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Rechazar!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
			parametros = { "id":id, "n":rechazar}
			$.ajax({
				url:'index.php?c=ensayo&a=modificar',
				type:'POST',
				data:parametros,
				beforeSend:function(){},
				success:function(response){
					if(response==1){
						Swal.fire(
				      'Ensayo Rechazado!',
				      'Este ensayo no podra ser certificado',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})


					}else{
						Swal.fire(
				      'Ensayo No Pudo Ser Rechazado',
				      'Aun no existe un director que lo rechace',
				      'warning'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=ensayo";
						}else{
							window.location.href="index.php?c=ensayo";
						}
					})
					}
				    
				}
			});
		  }
		})
	}
