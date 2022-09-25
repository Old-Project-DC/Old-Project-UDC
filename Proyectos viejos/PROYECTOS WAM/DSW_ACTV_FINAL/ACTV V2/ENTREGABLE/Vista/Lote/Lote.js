function agregarLote(){

	var cantidad_producto = $('#cantidad_productoAdd').val();
	var fecha_elaboracion = $('#fecha_elaboracionAdd').val();
	var fecha_vencimiento = $('#fecha_vencimientoAdd').val();
	var id_producto = $('#id_productoAdd').val();
	var parametros = {"cantidad_producto":cantidad_producto, "fecha_elaboracion":fecha_elaboracion, "fecha_vencimiento":fecha_vencimiento, "id_producto":id_producto}
	if (cantidad_producto=="" || fecha_elaboracion =="" || fecha_vencimiento=="" || id_producto=="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=lote";
			}else{
				window.location.href="index.php?c=lote";
			}
		})
				return false;
	}

	$.ajax({

		url:'index.php?c=lote&a=modalGuardar',
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
							window.location.href="index.php?c=lote";
						}else{
							window.location.href="index.php?c=lote";
						}
					})

			}else{
					Swal.fire(
				      'ERROR!',
				      'Lote no registrado!<br>info: la fecha_elaboracion no puede ser mayor a fecha_vencimiento <br> Ojo: Verifica que el producto que ingresas existe',
				      'error'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c=lote";
						}else{
							window.location.href="index.php?c=lote";
						}
					})

				
			}
		}
	});



}

function listarById(id){
	var parametros={"id": id}

	$.ajax({

		url:'index.php?c=lote&a=modalEditar',
		data:parametros,
		datatype: 'json',
		type:'POST',
		beforeSend:function(){},
		success:function(response){
			var data = $.parseJSON(response);

			if ( Object.keys(data).length != 0 ) {
				$('#idEdit').val(data['id_lote']);
				$('#cantidad_productoEdit').val(data['cantidad_producto']);
				$('#fecha_elaboracionEdit').val(data['fec_elaboracion']);
				$('#fecha_vencimientoEdit').val(data['fec_vencimiento']);
				$('#id_productoEdit').val(data['id_producto_fk']);						
			}
				
		}
	});
}

function actualizarLote(){

	var id = $('#idEdit').val();
	var cantidad_producto = $('#cantidad_productoEdit').val();
	var fecha_elaboracion = $('#fecha_elaboracionEdit').val();
	var fecha_vencimiento = $('#fecha_vencimientoEdit').val();
	var id_producto = $('#id_productoEdit').val();

	var parametros = {"id":id, "cantidad_producto":cantidad_producto, "fecha_elaboracion":fecha_elaboracion, "fecha_vencimiento":fecha_vencimiento, "id_producto":id_producto}
	if (cantidad_producto=="" || fecha_elaboracion =="" || fecha_vencimiento=="" || id_producto=="") {
		Swal.fire(
					 'Que mal!',
					 'Todos los campos son requeridos!',
					 'warning'
				).then((result) => {
					if (result.value) {
				window.location.href="index.php?c=lote";
			}else{
				window.location.href="index.php?c=lote";
			}
		})
				return false;
	}
	$.ajax({
		url:'index.php?c=lote&a=modificar',
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
						window.location.href="index.php?c=lote";
					}else{
						window.location.href="index.php?c=lote";
					}
				})
			}else{
				Swal.fire(
				    'ERROR!',
				    'Lote no registrado!<br>info: la fecha_elaboracion no puede ser mayor a fecha_vencimiento <br> Ojo: Verifica que el producto que ingresas existe',
				    'error'
				).then((result) => {
					if (result.value) {
						window.location.href="index.php?c=lote";
					}else{
						window.location.href="index.php?c=lote";
						}
				})	
			}
		}
	});
}