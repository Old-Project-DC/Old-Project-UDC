<%-- 
    Document   : index
    Created on : 22/05/2020, 01:25:40 PM
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
        <title>CRUD CREDENCIALES</title>
    </head>
    <body>
        <div name="contenerdor">
            <div>
                <h1>Listado de Credenciales</h1>
                <a href="Controlador?accion=add">Nueva Credencial</a>
                <table border="1">
                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>NOMBRE</th>
                            <th>PASSWORD</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <%
                    CredencialDAO dao=new CredencialDAO();
                    List<Credencial>list=dao.listar();
                    Iterator<Credencial> iter=list.iterator();
                    Credencial cre=null;
                    while (iter.hasNext()) {
                        cre=iter.next();
                            
                                 
                    %>
                    <tbody>
                        
                        <tr>
                            <td><%= cre.getUsuario() %></td>
                            <td><%= cre.getNombre() %></td>
                            <td><%= cre.getPassword() %></td> 
                            <td>
                                <a>Editar</a>
                                <a>Eliminar</a>
                            </td>
                        </tr>
                        <%}%>
                    </tbody>
                </table>

 
            </div>
            
        </div>
    </body>
</html>
