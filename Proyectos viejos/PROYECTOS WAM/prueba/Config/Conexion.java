
package Config;


import java.sql.*;


/**
 *
 * @author DIEGO CARDENAS
 */
public class Conexion {
    Connection con;
    String mensaje;
    public Conexion(){
        String bd = "prueba";
        String usuario = "root";
        String password = "";
        String url = "jdbc:mysql://localhost:3308/" + bd;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con=(Connection) DriverManager.getConnection(url,usuario,password);
        } catch (ClassNotFoundException | SQLException e) {
            setMensaje("Error: "+e);
        }
    }
    public Connection getConnection(){
        return con;
    }

    public String getMensaje() {
        return mensaje;
    }

    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }
    
}
