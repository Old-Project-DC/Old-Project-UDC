/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Config;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author DIEGO CARDENAS
 */
public class Conexion {
    private Connection conn = null;

    public Conexion() {
        String bd = "datos";
        String user = "root";
        String password = "";
        String url = "jdbc:mysql://localhost:3308/" + bd;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
            conn = DriverManager.getConnection(url + "?user=" + user + "&password" + password + "=" + "&serverTimezone=UTC");
            System.out.println("Conecto a la base de datos, msj clase=Conexio.java");
        } catch (ClassNotFoundException | SQLException e) {
            System.out.println("problemas al conectar");
            System.out.println(e.getMessage());
        } catch (InstantiationException | IllegalAccessException ex) {
            System.out.println("problemas al conectar: "+ex);
            System.out.println(ex.getMessage());
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
