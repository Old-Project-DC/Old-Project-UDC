
package ModeloDAO;

import Config.Conexion;
import Interfaces.CRUD;
import Modelo.Credencial;
import static java.lang.System.out;
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
    
    Conexion cn= new Conexion();
    Connection con;
    PreparedStatement ps;
    ResultSet rs;
    Credencial c = new Credencial();
    
    
    
    @Override
    public List listar() {
        ArrayList<Credencial> list= new ArrayList<>();
        String sql ="select * from credencial";
        try {
            con=cn.getConnection();
            ps=con.prepareStatement(sql);
            rs=ps.executeQuery();
            while (rs.next()) {                
                Credencial cre = new Credencial();
                cre.setUsuario(rs.getString("usuario"));
                cre.setNombre(rs.getString("nombre"));
                cre.setPassword(rs.getString("password"));
                list.add(cre);
            }
        } catch (Exception e) {out.print("linea44-- "+e+" --linea44");}{
        } 
        return list;
    }

    @Override
    public Credencial list(String usuario) {

        String sql ="select * from credencial where usuario='"+usuario+"'";
        try {
            con=cn.getConnection();
            ps=con.prepareStatement(sql);
            rs=ps.executeQuery();
            while (rs.next()) {                
                c.setUsuario(rs.getString("usuario"));
                c.setNombre(rs.getString("nombre"));
                c.setPassword(rs.getString("password"));
            }
        } catch (SQLException e) {out.print("linea61-- "+e+" --linea61");}{
        } 
        return c;
    }

    @Override
    public boolean agregar(Credencial cre) {
        String sql="insert into credencial(usuario, nombre, password)values('"+cre.getUsuario()+"','"+cre.getNombre()+"','"+cre.getPassword()+"')";
        try {
            con=cn.getConnection();
            ps=con.prepareStatement(sql);
            ps.executeUpdate();
        } catch (Exception e){out.print("linea74-- "+e+" --linea74");} {
        }
        
        return false;
    }

    @Override
    public boolean editar(Credencial cre, String id) {
        
        String sql="update credencial set usuario='"+cre.getUsuario()+"',nombre='"+cre.getNombre()+"',password='"+cre.getPassword()+"' where usuario='"+id+"'";
        try {
        con=cn.getConnection();
        ps=con.prepareStatement(sql);
        ps.executeUpdate();
        } catch (SQLException e){out.print("linea87-- "+e+" --linea87");}
{
        }
        return false;
    }

    @Override
    public boolean eliminar(String usuario) {
        String sql ="delete from credencial where usuario='"+usuario+"'";
        try {
            con= cn.getConnection();
            ps=con.prepareStatement(sql);
            ps.executeUpdate();
        } catch (Exception e) {out.print("linea100-- "+e+" --100linea");}{
        }
        
        return false;
    }
    
}
