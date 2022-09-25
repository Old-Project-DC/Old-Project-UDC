<%-- 
    Document   : Agregar
    Created on : 24/05/2020, 01:27:49 PM
    Author     : DIEGO CARDENAS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Crear Credencial</title>
    </head>
    <body>
        <div class="container">
           
                <header> 
                    <h1>Guardar Credenciales</h1>
                </header>
            <div class="col-lg-6">
                <a href="Controlador?accion=Listar">Ver listado de Credenciales</a>
                <% 
                String msj= request.getParameter("msj");
                %>
                <div >
                    <%= (msj !=null && ! msj.isEmpty())? msj : "" %>
                </div>
                <h2>Credencial de Usuario</h2><hr>
                <form action="Controlador" >
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" required><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required><br>
                    <label for="primnom">Primer Nombre:</label>
                    <input type="text" name="primnom" id="primnom" required><br>
                    <label for="segnom">Segundo Nombre:</label>
                    <input type="text" name="segnom" id="segnom"required><br>
                    <label for="primapel">Primer Apellido:</label>
                    <input type="text" name="primapel" id="primapel"required><br>
                    <label for="segapel">Segundo Apellido:</label>
                    <input type="text" name="segapel" id="segapel"required><br>
                    
                    <input type="submit" name="accion" value="Guardar" class="btn btn-primary">

                </form>
            </div>
        </div>
    </body>
</html>
