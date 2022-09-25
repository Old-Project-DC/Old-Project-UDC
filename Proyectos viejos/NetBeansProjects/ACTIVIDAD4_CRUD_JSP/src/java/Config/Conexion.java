package Config;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author DIEGO CARDENAS
 */
public class Conexion {

    private Connection conn = null;

    public Conexion() {
        String bd = "datosdb";
        String user = "root";
        String password = "";
        String url = "jdbc:mysql://localhost:3308/" + bd;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
            conn = DriverManager.getConnection(url + "?user=" + user + "&password" + password + "=" + "&serverTimezone=UTC");
            System.out.println("Conecto a la base de datos");
        } catch (ClassNotFoundException | SQLException e) {
            System.out.println("problemas al conectar");
            System.out.println(e.getMessage());
        } catch (InstantiationException | IllegalAccessException ex) {
            Logger.getLogger(Conexion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public Connection getConnection() {
        return conn;
    }

    public void disconnect() {
        System.out.println("Cerrando la base de "
                + "datos");
        if (conn != null) {
            try {
                conn.close();
            } catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }
    }

}
