function agregarMuestra(){

	var codigo = $('#codigoAdd').val();
	var id_Jefe = $('#id_jefe_labAdd').val();
	var id_Lote = $('#id_loteAdd').val();

	var parametros = {"codigo":codigo, "id_Jefe":id_Jefe, "id_Lote":id_Lote}
	if (codigo=="" || id_Jefe =="" || id_Lote=="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=muestra";
			}else{
				window.location.href="index.php?c=muestra";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=muestra&a=modalGuardar',
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
							window.location.href="index.php?c=muestra";
						}else{
							window.location.href="index.php?c=muestra";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'Muestra no registrado!<br>info: Verifique que id del jefe y lote sean correctos',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=muestra";
						}else{
							window.location.href="index.php?c=muestra";
						}
					})

				
			}
		}
	});



}
function listarById(id){
	var parametros={"id": id}
	$.ajax({

		url:'index.php?c=muestra&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);

			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['id_muestra']);
				$('#codigoEdit').val(data['cod_muestra']);
				$('#id_jefe_labEdit').val(data['id_jefe_lab_fk']);
				$('#id_loteEdit').val(data['id_lote_fk']);				
			}
				
		}
	});
}

function actualizarMuestra(){

	var id = $('#idEdit').val();
	var codigo = $('#codigoEdit').val();
	var id_Jefe = $('#id_jefe_labEdit').val();
	var id_Lote = $('#id_loteEdit').val();

	var parametros = {"id":id, "codigo":codigo, "id_Jefe":id_Jefe, "id_Lote":id_Lote}
	if (codigo=="" || id_Jefe =="" || id_Lote=="") {
		Swal.fire(
				 'Que mal!',
				 'Todos los campos son requeridos!',
				 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=muestra";
			}else{
				window.location.href="index.php?c=muestra";
			}
		})
				return false;
	}
	$.ajax({
		url:'index.php?c=muestra&a=modificar',
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
						window.location.href="index.php?c=muestra";
					}else{
						window.location.href="index.php?c=muestra";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Muestra no actualizado!<br>info: Verifique que id del jefe y lote sean correctos',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=muestra";
					}else{
						window.location.href="index.php?c=muestra";
						}
				})	
			}
		}
	});
}