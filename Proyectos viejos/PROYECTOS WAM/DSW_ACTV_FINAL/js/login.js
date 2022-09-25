$('#formLogin').submit(function(e){
	
	e.preventDefault();
	var user = $.trim($("#userlogin").val());
	var pass = $.trim($("#userpassword").val());	

	if (user.length == "" || pass.length =="") {
		Swal.fire({
			icon:'warning',
			title:'Advertencia',
			text:'Debe ingresar usuario y/o contraseña',
		});
		return false;
	} else {
		$.ajax({
			url:"index.php?c=login&a=ingresar",
			type:"POST",
			datatype:"json",
			data:{user:user, pass:pass},
			success:function(data){
				if (data == "null") {
					Swal.fire({
						icon:'error',
						title:'Que mal :(',
						text:'Usuario y/o contraseña incorrecta'
					});
				}else{
					Swal.fire({
						icon:'success',
						title:'Excelente :)',
						text:'Conexión exitosa',
						confirmButtonColor:'#3085d6',
						confirmButtonText:'Ingresar'
					}).then((result) => {

						if (result.value) {
							window.location.href="index.php";
						}else{
							window.location.href="index.php";
						}
					})
				}
			}
		});
	}
});



