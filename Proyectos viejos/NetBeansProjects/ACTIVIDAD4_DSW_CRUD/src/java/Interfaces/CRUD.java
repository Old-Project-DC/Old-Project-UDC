/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Interfaces;

import Modelo.Credencial;
import java.util.List;

/**
 *
 * @author DIEGO CARDENAS
 */
public interface CRUD {
    
    
    public List Listar();
    public Credencial list(String user);
    public boolean Agregar(Credencial cre);
    public boolean Editar(Credencial cre, String user);
    public boolean Eliminar(String user);
    
}
