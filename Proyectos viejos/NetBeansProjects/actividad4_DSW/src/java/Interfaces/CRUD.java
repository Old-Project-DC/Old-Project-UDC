
package Interfaces;

import Modelo.Credencial;
import java.util.List;


/**
 *
 * @author DIEGO CARDENAS
 */
public interface CRUD {
    public List listar();
    public Credencial list(String usuario);
    public boolean agregar(Credencial cre);
    public boolean editar(Credencial cre);
    public boolean eliminar(String usuario);
    public String getMensaje();
}
