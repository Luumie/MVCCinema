<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author Vince
 */
class Films
{

    private $_idFilm;
    private $_titre;
    private $_realisateur;
    private $_annee;
    private $_affiche;
    private $_roles = array();

    public function __construct($idFilm = 0, $titre, $realisateur, $annee, $affiche, $roles = array())
    {
        
        $this->set_idFilm($idFilm);
        $this->set_titre($titre);
        $this->set_annee($annee);
        $this->set_affiche($affiche);
        $this->set_realisateur($realisateur);
        $this->set_roles($roles);
        

    }

    public function get_titre()
    {
        return $this->_titre;
    }

    public function get_annee()
    {
        return $this->_annee;
    }

    public function get_affiche()
    {
        return $this->_affiche;
    }

    public function set_titre($titre)
    {
        $this->_titre = $titre;
    }

    public function set_annee($annee)
    {
        $this->_annee = $annee;
    }

    public function set_affiche($affiche)
    {
        $this->_affiche = $affiche;
    }
    /**
     * Get the value of _id
     */
    public function get_idFilm()
    {
        return $this->_idFilm;
    }

    /**
     * Set the value of _id
     *
     */
    public function set_idFilm($idFilm)
    {
        $this->_idFilm = $idFilm;

    }

    /**
     * Get the value of _realisateur
     */ 
    public function get_realisateur()
    {
        return $this->_realisateur;
    }

    /**
     * Set the value of _realisateur
     *
     * @return  self
     */ 
    public function set_realisateur($realisateur)
    {
        $this->_realisateur = $realisateur;

        return $this;
    }

   

    /**
     * Get the value of _roles
     */ 
    public function get_roles()
    {
        return $this->_roles;
    }

    /**
     * Set the value of _roles
     *
     * @return  self
     */ 
    public function set_roles(array $roles)
    {
        $this->_roles = $roles;

        return $this;
    }

    public function add_roles($roles)
    {
        $this->_roles[] = $roles;

        return $this;
    }

}