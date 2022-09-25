
package Modelo;

/**
 *
 * @author DIEGO CARDENAS
 */
public class Credencial {
    String usuario;
    String nombre;
    String password;

    public Credencial() {
    }

    public Credencial(String usuario, String nombre) {
        this.usuario = usuario;
        this.nombre = nombre;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
    
    
}
