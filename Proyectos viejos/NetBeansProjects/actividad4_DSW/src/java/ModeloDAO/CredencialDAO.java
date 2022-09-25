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
import java.util.ArrayList;
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
    String mensaje="";
    
    @Override
    public List listar() {
        
        ArrayList<Credencial>list=new ArrayList<>();
        String sql="select * from persona";
        try {
            con=cn.getConnection();
            ps=con.prepareStatement(sql);
            rs=ps.executeQuery();
            while(rs.next()){
                Credencial cre=new Credencial();
                cre.setUsuario(rs.getString("usuario"));
                cre.setNombre(rs.getString("nombre"));
                cre.setPassword(rs.getString("password"));
                list.add(cre);
            }
        } catch (Exception e) {
        }
        return list;
    }

    @Override
    public Credencial list(String usuario) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean agregar(Credencial cre) {
               String sql="insert into persona(usuario, nombre, password)values('"+cre.getUsuario()+"','"+cre.getNombre()+"','"+cre.getPassword()+"')";
        try {
            con=cn.getConnection();
            ps=con.prepareStatement(sql);
            ps.executeUpdate();
        } catch (Exception e) {
        }
       return false;
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
