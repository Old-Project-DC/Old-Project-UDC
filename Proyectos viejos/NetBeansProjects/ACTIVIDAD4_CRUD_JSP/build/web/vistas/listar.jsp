<%-- 
    Document   : listar
    Created on : 23/05/2020, 06:10:06 PM
    Author     : DIEGO CARDENAS
--%>

<%@page import="java.util.Iterator"%>
<%@page import="java.util.List"%>
<%@page import="Modelo.Credencial"%>
<%@page import="ModeloDAO.CredencialDAO"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>.::CRUD JSP::.</title>
    </head>
    <body>
        <div class="container">
   
            <h1>Credencial Usuarios</h1>
            <a class="btn btn-primary" href="Controlador?accion=add">Guardar Credencial</a>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>NOMBRE USUARIO</th>
                        <th>PASSWORD</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <%
                CredencialDAO dao = new CredencialDAO();
                List<Credencial> list = dao.listar();
                Iterator<Credencial>iter = list.iterator();
                Credencial cre = null;
                
                while(iter.hasNext()){
                    cre=iter.next();
                
                %>
                <tbody>

                    <tr>
                        <td><%= cre.getUsuario() %></td>
                        <td><%= cre.getNombre() %></td>
                        <td><%= cre.getPassword() %></td>
                        <td>
                    
                            <a class="btn btn-outline-warning" href="Controlador?accion=Editar&Usuario=<%= cre.getUsuario() %>" title="EDITAR" >Editar</a>
                            <a class="btn btn-outline-danger" href="Controlador?accion=Eliminar&Usuario=<%= cre.getUsuario() %>" onclick="return confirm('¿Desea eliminar el registro?')" title="ELIMINAR">Eliminar</a>
                        </td>
                    </tr>
                    <%}%>
                </tbody>
            </table>

        </div>
    </body>
</html>
