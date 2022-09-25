/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modelo;

/**
 *
 * @author DIEGO CARDENAS
 */
public class Credencial {
    private String usuario;
    private String password;
    private String primnom;
    private String segnom;
    private String primapel;
    private String segapel;

    public Credencial() {
    }

    public Credencial(String usuario, String password, String primnom, String segnom, String primapel, String segapel) {
        this.usuario = usuario;
        this.password = password;
        this.primnom = primnom;
        this.segnom = segnom;
        this.primapel = primapel;
        this.segapel = segapel;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getPrimnom() {
        return primnom;
    }

    public void setPrimnom(String primnom) {
        this.primnom = primnom;
    }

    public String getSegnom() {
        return segnom;
    }

    public void setSegnom(String segnom) {
        this.segnom = segnom;
    }

    public String getPrimapel() {
        return primapel;
    }

    public void setPrimapel(String primapel) {
        this.primapel = primapel;
    }

    public String getSegapel() {
        return segapel;
    }

    public void setSegapel(String segapel) {
        this.segapel = segapel;
    }
    
    
}
