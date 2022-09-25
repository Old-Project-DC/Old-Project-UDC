<%-- 
    Document   : Agregar
    Created on : 22/05/2020, 01:29:02 PM
    Author     : DIEGO CARDENAS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Guardar Credenciales</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <div>
	<div>
		<header> 
			<h1>Guardar Credenciales</h1>
		</header>
		<a href="Controlador?accion=listar">Ver listado de Credenciales</a>
            
                    <%
                    String msj= request.getParameter("msj");
                    %>
                <div>
                    <%= 
                        (msj != null && ! msj.isEmpty())?msj:""
                        %>
                </div>
		<h2>Credencial de Usuario</h2><hr>
                <form action="Controlador" >
			<label for="usuario">Usuario:</label>
			<input type="text" name="usuario" id="usuario" required><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required><br>
			<label for="primnom">Nombre:</label>
			<input type="text" name="nom" id="nom" required><br>

                        <input type="submit" name ="accion" value="Guardar">
			
		</form>
	</div>
</div>
    </body>
</html>
