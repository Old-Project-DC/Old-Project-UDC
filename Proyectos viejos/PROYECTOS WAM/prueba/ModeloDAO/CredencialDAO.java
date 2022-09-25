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
public class CredencialDAO implements CRUD{
    Conexion cn=new Conexion();
    Connection con;
    PreparedStatement ps;
    ResultSet rs;
    Credencial c=new Credencial();
    String mensaje;
    
    @Override
    public List listar() {
        
        List<Credencial> lista=null;
        String sql="SELECT * FROM credencial";
        con=cn.getConnection();
        if (con != null) {
            try {
                ps=con.prepareStatement(sql);
                rs=ps.executeQuery();
                lista= new LinkedList<>();
                while (rs.next()) {
                    Credencial cre = new Credencial();
                    cre.setUsuario(rs.getString(1));
                    cre.setNombre(rs.getString(2));
                    cre.setPassword(rs.getString(3));
                    lista.add(cre);        
                }
                ps.close();
            } catch (SQLException e) {
                setMensaje("Problema para listar: "+e.getMessage());
            }finally{
                try {
                    con.close();
                } catch (SQLException ex) {
                    setMensaje(ex.getMessage());
                }
            }
            
        }else{
            setMensaje("Error en conexion: "+cn.getMensaje());
        }
        return lista;
    }

    @Override
    public Credencial list(String usuario) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean agregar(Credencial cre) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean editar(Credencial cre) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean eliminar(String usuario) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public String getMensaje() {
        return mensaje;
    }
    
    public void setMensaje(String mensaje){
        this.mensaje=mensaje;
    }
    
}
