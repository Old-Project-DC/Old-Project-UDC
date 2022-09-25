
package Controlador;

import Modelo.Credencial;
import ModeloDAO.CredencialDAO;
import java.io.IOException;
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
    
    String listar = "vistas/listar.jsp";
    String agregar = "vistas/Agregar.jsp";
    String editar = "vistas/Editar.jsp";
    Credencial c = new Credencial();
    CredencialDAO dao= new CredencialDAO();
    

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
       
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String acceso="";
        String accion= request.getParameter("accion");
        if (accion.equalsIgnoreCase("listar")) {
            acceso=listar;
        }else if(accion.equalsIgnoreCase("add")){
            acceso=agregar;
        }else if(accion.equalsIgnoreCase("Guardar")){
            String mensaje="";
            String usuario=request.getParameter("usuario");
            String nombre=request.getParameter("nom");
            String pass=request.getParameter("password");
            c.setUsuario(usuario);
            c.setNombre(nombre);
            c.setPassword(pass);
            dao.agregar(c);
            
                   mensaje="<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">";
                   mensaje +="<strong>Info!</strong> Registro Guardado.";
                   mensaje +="<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
                   mensaje +="<span aria-hidden=\"true\">&times;</span></button></div>";
                
            acceso=agregar+"?msj="+mensaje;
        }
        RequestDispatcher vista=request.getRequestDispatcher(acceso);
        vista.forward(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
