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
class Role
{

    private $_idRole;
    private $_personnage;
    private $_acteur;

    public function __construct(  $idRole = 0, string $personnage, Acteurs $acteur )
    {
      
        $this->set_idRole($idRole);
        $this->set_personnage($personnage);
        $this->set_acteur($acteur);
    }

    public function get_personnage()
    {
        return $this->_personnage;
    }


    public function set_personnage( string $personnage)
    {
        $this->_personnage = $personnage;
    }

    /**
     * Get the value of _id
     */
    public function get_idRole()
    {
        return $this->_idRole;
    }

    /**
     * Set the value of _id
     *
     */
    public function set_idRole(  $idRole)
    {
        $this->_idRole = $idRole;

    }

    /**
     * Get the value of _acteurs
     */ 
    public function get_acteur()
    {
        return $this->_acteur;
    }

    /**
     * Set the value of _acteurs
     *
     * @return  self
     */ 
    public function set_acteur($acteur)
    {
        $this->_acteur = $acteur;

        return $this;
    }
}