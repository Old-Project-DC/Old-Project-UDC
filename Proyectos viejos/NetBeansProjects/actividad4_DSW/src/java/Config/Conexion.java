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
    String mensaje="";

    public Conexion() {
        String bd = "prueba";
        String user = "root";
        String password = "";
        String url = "jdbc:mysql://localhost:3308/" + bd;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver").newInstance();
            conn = DriverManager.getConnection(url+"?user="+user+"&password"+password+"="+"&serverTimezone=UTC");
            System.out.println("Conecto a la base de datos");
        } catch (ClassNotFoundException | IllegalAccessException | InstantiationException e) {
            System.out.println("No conecto a la base de datos: "+e.getMessage());
            setMensaje(e.getMessage());
        } catch (SQLException ex) {
            System.out.println("No conecto a la base de datos: "+ex.getMessage());
            setMensaje(ex.getMessage());
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
                System.out.println("Error: "+e.getMessage());
                setMensaje(e.getMessage());
            }
        }
    }

    public String getMensaje() {
        return mensaje;
    }

    public void setMensaje(String mensaje) {
        this.mensaje = mensaje;
    }

}