<%-- 
    Document   : agregar
    Created on : 23/05/2020, 06:11:16 PM
    Author     : DIEGO CARDENAS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>.::CREAR CREDENCIAL::.</title>
    </head>
    <body>  
        <div class="container">
            <header> 
                <h1>Guardar Credenciales</h1><br>
            </header>

            <div class="col-lg-6">
                <a href="Controlador?accion=listar">Ver listado de Credenciales</a>
                <% String msj = request.getParameter("msj");%><br>
                <div>
                    <%= (msj != null && !msj.isEmpty()) ? msj : ""%>
                </div>
                <h2>Credencial de Usuario</h2><hr>
                <form action="Controlador">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" required><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required><br>
                    <label for="primnom">Primer Nombre:</label>
                    <input type="text" name="primnom" id="primnom" required><br>

                    <input type="submit" name="accion" value="Guardar">

                </form>
            </div>

        </div>
    </body>
</html>
