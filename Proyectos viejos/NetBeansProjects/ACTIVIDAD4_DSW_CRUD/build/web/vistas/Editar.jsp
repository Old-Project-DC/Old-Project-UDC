<%-- 
    Document   : Editar
    Created on : 24/05/2020, 01:29:03 PM
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
        <title>Editar Credencial</title>
    </head>
    <body>
        <div>
            <div  class="container">
                <%
                    CredencialDAO dao = new CredencialDAO();
                    String user = String.valueOf(request.getAttribute("user"));
                    Credencial c = (Credencial) dao.list(user);
                %>
                
                
                <header> 
                    <h1>Editar Credenciales</h1>
                </header>
                <a href="Controlador?accion=Listar">Ver listado de Credenciales</a>
                <div class="col-lg-6">
                <h2>Credencial de Usuario</h2><hr>
                <form action="Controlador" >
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario"  value="<%= c.getUsuario() %>" required><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="<%= c.getPassword() %>" required><br>
                    <label for="primnom">Primer Nombre:</label>
                    <input type="text" name="primnom" id="primnom" value="<%= c.getPrimnom() %>" required><br>
                    <label for="segnom">Segundo Nombre:</label>
                    <input type="text" name="segnom" id="segnom" value="<%= c.getSegnom() %>" required><br>
                    <label for="primapel">Primer Apellido:</label>
                    <input type="text" name="primapel" id="primapel" value="<%= c.getPrimapel() %>" required><br>
                    <label for="segapel">Segundo Apellido:</label>
                    <input type="text" name="segapel" id="segapel" value="<%= c.getSegapel() %> " required><br>
                    <input type="hidden" name="identificador" value="<%= c.getUsuario()%>">
                    
                    <input type="submit" name="accion" value="Actualizar" class="btn btn-primary">

                </form>
                </div>
            </div>
        </div>
    </body>
</html>
