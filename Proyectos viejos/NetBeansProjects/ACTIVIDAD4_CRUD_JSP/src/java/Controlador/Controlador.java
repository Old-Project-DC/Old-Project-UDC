/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controlador;

import Modelo.Credencial;
import ModeloDAO.CredencialDAO;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author DIEGO CARDENAS
 */
public class Controlador extends HttpServlet {

    String listar="vistas/listar.jsp";
    String agregar="vistas/agregar.jsp";
    String editar="vistas/editar.jsp";
    Credencial c = new Credencial();
    CredencialDAO dao= new CredencialDAO();
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Controlador</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet Controlador at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String direccionar="";
        String action = request.getParameter("accion");
        
        if (action.equalsIgnoreCase("listar")) {
            direccionar=listar;
        }else if(action.equalsIgnoreCase("add")){
            direccionar=agregar;
        }else if(action.equalsIgnoreCase("Guardar")){
            
            /*Obtenemos el valor de los campos del Formulario
            de agregar.jsp
            */
            String usuario = request.getParameter("usuario");
            String pass = request.getParameter("password");
            String primnom = request.getParameter("primnom");
            
            String mensaje = "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">";
            mensaje += "<strong>Info!</strong> Registro Guardado.";
            mensaje += "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            mensaje += "<span aria-hidden=\"true\">&times;</span></button></div>";
            
            c.setUsuario(usuario);
            c.setPassword(pass);
            c.setNombre(primnom);
            dao.agregar(c);
            direccionar=agregar+"?msj="+mensaje;
            
        }else if(action.equalsIgnoreCase("Editar")){
            request.setAttribute("user",request.getParameter("Usuario"));
            direccionar=editar;
            
        }else if(action.equalsIgnoreCase("Actualizar")){
            String identifi= request.getParameter("identificador");
            String usuario = request.getParameter("usuario");
            String pass = request.getParameter("password");
            String primnom = request.getParameter("primnom");
            
            c.setUsuario(usuario);
            c.setPassword(pass);
            c.setNombre(primnom);
            dao.editar(c,identifi);
            direccionar=listar;
            
        }else if(action.equalsIgnoreCase("Eliminar")){
            String user = request.getParameter("Usuario");
            c.setUsuario(user);
            dao.eliminar(user);
            direccionar=listar;
            
        }
        
        RequestDispatcher vista = request.getRequestDispatcher(direccionar);
        vista.forward(request, response);
        
        
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
