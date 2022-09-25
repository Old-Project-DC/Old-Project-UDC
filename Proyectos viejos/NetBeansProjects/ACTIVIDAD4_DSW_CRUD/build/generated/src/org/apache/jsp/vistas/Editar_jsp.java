package org.apache.jsp.vistas;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import Modelo.Credencial;
import ModeloDAO.CredencialDAO;

public final class Editar_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>Editar Credencial</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        <div>\n");
      out.write("            <div>\n");
      out.write("                ");

                    CredencialDAO dao = new CredencialDAO();
                    String user = String.valueOf(request.getAttribute("user"));
                    Credencial c = (Credencial) dao.list(user);
                
      out.write("\n");
      out.write("\n");
      out.write("                <header> \n");
      out.write("                    <h1>Guardar Credenciales</h1>\n");
      out.write("                </header>\n");
      out.write("                <a href=\"Controlador?accion=Listar\">Ver listado de Credenciales</a>\n");
      out.write("\n");
      out.write("                <h2>Credencial de Usuario</h2><hr>\n");
      out.write("                <form action=\"Controlador\" >\n");
      out.write("                    <label for=\"usuario\">Usuario:</label>\n");
      out.write("                    <input type=\"text\" name=\"usuario\" id=\"usuario\"  value=\"");
      out.print( c.getUsuario() );
      out.write("\" required><br>\n");
      out.write("                    <label for=\"password\">Password:</label>\n");
      out.write("                    <input type=\"password\" name=\"password\" id=\"password\" value=\"");
      out.print( c.getPassword() );
      out.write(" required><br>\n");
      out.write("                    <label for=\"primnom\">Primer Nombre:</label>\n");
      out.write("                    <input type=\"text\" name=\"primnom\" id=\"primnom\" value=\"");
      out.print( c.getPrimnom() );
      out.write(" required><br>\n");
      out.write("                    <label for=\"segnom\">Segundo Nombre:</label>\n");
      out.write("                    <input type=\"text\" name=\"segnom\" id=\"segnom\" value=\"");
      out.print( c.getSegnom() );
      out.write(" required><br>\n");
      out.write("                    <label for=\"primapel\">Primer Apellido:</label>\n");
      out.write("                    <input type=\"text\" name=\"primapel\" id=\"primapel\" value=\"");
      out.print( c.getPrimapel() );
      out.write(" required><br>\n");
      out.write("                    <label for=\"segapel\">Segundo Apellido:</label>\n");
      out.write("                    <input type=\"text\" name=\"segapel\" id=\"segapel\" value=\"");
      out.print( c.getSegapel() );
      out.write(" \" required><br>\n");
      out.write("                    <input type=\"hidden\" name=\"identificador\" value=\"");
      out.print( c.getUsuario());
      out.write("\">\n");
      out.write("                    \n");
      out.write("                    <input type=\"submit\" name=\"accion\" value=\"Actualizar\">\n");
      out.write("\n");
      out.write("                </form>\n");
      out.write("            </div>\n");
      out.write("        </div>\n");
      out.write("    </body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
