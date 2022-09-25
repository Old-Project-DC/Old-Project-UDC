<%-- 
    Document   : editar
    Created on : 23/05/2020, 06:11:04 PM
    Author     : DIEGO CARDENAS
--%>

<%@page import="Modelo.Credencial"%>
<%@page import="ModeloDAO.CredencialDAO"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>..::Editar Credencial::..</title>
    </head>
    <body>
        <div class="container">
            <%
                CredencialDAO dao = new CredencialDAO();
                String user = String.valueOf(request.getAttribute("user"));

                Credencial c = (Credencial) dao.list(user);

            %>
            <header> 
                <h1>Editar Credenciales</h1><br>
            </header>
            <div class="col-lg-6">
                
                <a href="Controlador?accion=listar">Ver listado de Credenciales</a>
                <h2>Credencial de Usuario</h2><hr>
                <form action="Controlador">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario" value="<%= c.getUsuario()%>" required><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="<%= c.getPassword()%>" required><br>
                    <label for="primnom">Primer Nombre:</label>
                    <input type="hidden" name="identificador" value="<%= c.getUsuario()%>">
                    <input type="text" name="primnom" id="primnom" value="<%= c.getNombre()%>" required><br>

                    <input type="submit" name="accion" value="Actualizar">

                </form>
            </div>
        </div>
    </body>
</html>
