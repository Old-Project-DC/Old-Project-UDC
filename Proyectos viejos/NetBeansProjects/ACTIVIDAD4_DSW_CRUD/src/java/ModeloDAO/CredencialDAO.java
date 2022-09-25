/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ModeloDAO;

import Config.Conexion;
import Interfaces.CRUD;
import Modelo.Credencial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedList;
import java.util.List;

/**
 *
 * @author DIEGO CARDENAS
 */
public class CredencialDAO implements CRUD {

    Conexion cn = new Conexion();
    Connection con;
    PreparedStatement ps;
    ResultSet rs;
    Credencial c = new Credencial();

    @Override
    public List Listar() {

        LinkedList<Credencial> lista = new LinkedList<>();
        String sql = "select * from credencial";
        con = cn.getConnection();

        if (con != null) {

            try {
                
                ps = con.prepareStatement(sql);
               
                rs = ps.executeQuery();

                while (rs.next()) {
                    Credencial cre = new Credencial();
                    cre.setUsuario(rs.getString(1));
                    cre.setPassword(rs.getString(2));
                    cre.setPrimnom(rs.getString(3));
                    cre.setSegnom(rs.getString(4));
                    cre.setPrimapel(rs.getString(5));
                    cre.setSegapel(rs.getString(6));
                    lista.add(cre);
                }
                ps.close();
            } catch (SQLException ex) {
                System.out.println("Error linea 58: " + ex.getMessage());
            } finally {
                try {
                    con.close();
                    System.out.println("Cerrando BD en el metodo LISTAR - Linea61");
                } catch (Exception e) {
                    System.out.println("Error: " + e.getMessage() + " Linea62 Metodo listar");
                }
            }

        } else {
            System.err.println("PROBLEMAS AL CONECTAR A LA BD");
        }

        return lista;
    }

    @Override
    public Credencial list(String user) {
        String sql ="select * from credencial where usuario=?";
        con = cn.getConnection();
        if (con != null) {
            try {
                ps = con.prepareStatement(sql);
                ps.setString(1, user);
                rs = ps.executeQuery();
                while (rs.next()) {
                    
                    c.setUsuario(rs.getString("usuario"));
                    c.setPassword(rs.getString("password"));
                    c.setPrimnom(rs.getString("primnom"));
                    c.setSegnom(rs.getString("segnom"));
                    c.setPrimapel(rs.getString("primapel"));
                    c.setSegapel(rs.getString("segapel"));  
                }
            } catch (SQLException e) {
                System.err.println("error: "+e.getMessage());
            }
        }else{
            System.out.println("Error al conectar a la BD");
        }
        
        
        return c;
    }

    @Override
    public boolean Agregar(Credencial cre) {
        String sql = "insert into credencial(usuario, password, primnom, segnom, primapel, segapel) values (?,?,?,?,?,?)";
        con = cn.getConnection();
        if (con != null) {

            try {

                ps = con.prepareStatement(sql);
                ps.setString(1, cre.getUsuario());
                ps.setString(2, cre.getPassword());
                ps.setString(3, cre.getPrimnom());
                ps.setString(4, cre.getSegnom());
                ps.setString(5, cre.getPrimapel());
                ps.setString(6, cre.getSegapel());
                int exec = ps.executeUpdate();
                if (exec == 0) {
                    System.out.println("No se ejecuto el insert");
                    throw new SQLException();

                }
                ps.close();
            } catch (SQLException e) {
                System.out.println("Problemas al insertar: " + e.getMessage());
            }

        } else {
            System.out.println("Error al conectar a la BD");
        }

        return false;
    }

    @Override
    public boolean Editar(Credencial cre, String user) {
        String sql = "update credencial set usuario=?, password=?, primnom=?, segnom=?, primapel=?, segapel=? where usuario=?";
        con = cn.getConnection();
        if (con != null) {

            try {
                ps = con.prepareStatement(sql);
                ps.setString(1, cre.getUsuario());
                ps.setString(2, cre.getPassword());
                ps.setString(3, cre.getPrimnom());
                ps.setString(4, cre.getSegnom());
                ps.setString(5, cre.getPrimapel());
                ps.setString(6, cre.getSegapel());
                ps.setString(7, user);
                int exec = ps.executeUpdate();
                if (exec == 0) {
                    System.out.println("No se ejecuto el insert");
                    throw new SQLException();

                }
            } catch (SQLException e) {
                System.err.println("Error: "+e.getMessage());
            }
        }else{
            System.out.println("Error al conectar a la BD");
        }

        return false;
    }

    @Override
    public boolean Eliminar(String user) {
        String sql ="delete from credencial where usuario=?";
        con=cn.getConnection();
        if (con != null) {
            try {
                ps = con.prepareStatement(sql);
                ps.setString(1, user);
                ps.executeUpdate();
            } catch (SQLException e) {
                System.out.println("Error al eliminar: "+e.getMessage());
            }
        }
        
        return false;
    }

}
