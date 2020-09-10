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
class Acteurs
{

    private $_idActeurs;
    private $_nom;
    private $_prenom;

    public function __construct(  $idActeurs = 0,  $nom,  $prenom)
    {
    
        $this->set_idActeurs($idActeurs);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
    }

    public function get_prenom()
    {
        return $this->_prenom;
    }

    public function get_nom()
    {
        return $this->_nom;
    }

    public function set_nom( string $nom)
    {
       /*  if (strlength($nom) < LONGUEUR_MAX) { */
            $this->_nom = $nom;
        /* } else {
            // Levée d'exception
        } */
    }

    public function set_prenom( string $prenom)
    {
        $this->_prenom = $prenom;
    }
    /**
     * Get the value of _id
     */
    public function get_idActeurs()
    {
        return $this->_idActeurs;
    }

    /**
     * Set the value of _id
     *
     */
    public function set_idActeurs(  $idActeurs)
    {
        $this->_idActeurs = $idActeurs;

    }
}