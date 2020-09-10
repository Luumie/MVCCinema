<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//On appelle la fonction getAll()
$filmsDAO = new FilmsDAO();
$php_errormsg = "";
if (isset($_POST['recherche']) && $_POST['recherche']){
    
    $recherche = $_POST['recherche'];
    $allFilms = $filmsDAO->getAll($recherche);
    
} else {
    $recherche = '';
    $allFilms = $filmsDAO->getAll($recherche);

}

//On affiche le template Twig correspondant
if($allFilms == false){
    $php_errormsg = "Ce film n'existe pas";
} 
    echo $twig->render('films.html.twig', ['allfilms' => $allFilms, 'php_errormsg' => $php_errormsg]);