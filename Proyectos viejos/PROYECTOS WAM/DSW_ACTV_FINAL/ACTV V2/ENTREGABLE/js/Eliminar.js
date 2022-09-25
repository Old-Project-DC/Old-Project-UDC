

	function alertaEliminar(id, controlador, nombre, relacion) {
		Swal.fire({
		  title: '¿Seguro que quiere eliminar el registro "'+nombre+'" ?',
		  text: "Esta accion no se podra revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, eliminalo!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
			parametros = { "id":id }
			$.ajax({
				url:'index.php?c='+controlador+'&a=delete',
				type:'POST',
				data:parametros,
				beforeSend:function(){},
				success:function(response){
					if (response == 1) {
				    Swal.fire(
				      'Eliminado!',
				      'El registro ha sido elimidado.',
				      'success'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c="+controlador;
						}else{
							window.location.href="index.php?c="+controlador;
						}
					})						

					}else{
					    Swal.fire(
					      'No eliminado!',
					      'El registro: '+nombre+', hace parte de otro(s) registro(s) en '+"'"+relacion+"'"+', para eliminarlo, debe eliminar la conexión con '+"'"+relacion+"'"+'.',
					      'error'
					    ).then((result) => {

							if (result.value) {
								window.location.href="index.php?c="+controlador;
							}else{
								window.location.href="index.php?c="+controlador;
							}
						})							

					}
				}
			});
		  }
		})
	}

		function alertaEliminarEmpleado(id1,id2,id3, controlador, nombre, relacion ) {
		Swal.fire({
		  title: '¿Seguro que quiere eliminar el registro "'+nombre+'" ?',
		  text: "Esta accion no se podra revertir!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, eliminalo!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
			parametros = { "id1":id1, "id2":id2, "id3":id3 }
			$.ajax({
				url:'index.php?c='+controlador+'&a=delete',
				type:'POST',
				data:parametros,
				beforeSend:function(){},
				success:function(response){
					if (response == 1) {
				    Swal.fire(
				      'Eliminado!',
				      'El registro ha sido elimidado.',
				      'success'
				    ).then((result) => {

						if (result.value) {
							window.location.href="index.php?c="+controlador;
						}else{
							window.location.href="index.php?c="+controlador;
						}
					})						

					}else{
					    Swal.fire(
					      'No eliminado!',
					      'El registro: '+nombre+', hace parte de otro(s) registro(s) en '+"'"+relacion+"'"+', para eliminarlo, debe eliminar la conexión con '+"'"+relacion+"'"+'.',
					      'error'
					    ).then((result) => {

							if (result.value) {
								window.location.href="index.php?c="+controlador;
							}else{
								window.location.href="index.php?c="+controlador;
							}
						})							

					}
				}
			});
		  }
		})
	}































/* <a class="btn btn-outline-danger" href="index.php?c=producto&a=delete&id='.$dato['id_producto'].'" title="ELIMINAR"
 onclick="return confirm(\'Desea Eliminar El Registro '.$dato['nom_producto'].'?\')" >Eliminar</a>*/
	


