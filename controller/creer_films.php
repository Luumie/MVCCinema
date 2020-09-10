<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//$offre->set_title("JEE Developpeur");
//$offre->set_description("Super job de développeur");

if (isset($_POST['titre']) && isset($_POST['realisateur'])) {
    
     $filmsDao = new FilmsDAO();
    $newfilms = new Films(null,$_POST['titre'], $_POST['realisateur'], $_POST['affiche'],$_POST['annee']);
    
    $personnage = $_POST['personnage'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    var_dump($prenom);
    var_dump($nom);
    
   foreach( $personnage as $key => $value) {

       $acteur = new Acteurs(null, $nom[$key], $prenom[$key]);
       $role = new Role(null, $value, $acteur);
       $newfilms->add_roles($role);
       
       print $key;
       print $value;
       
   }
   print_r ($newfilms);

   
    $status = $filmsDao->add($newfilms); 
     
         if ($status) {
            echo $twig->render('creer_films.html.twig', ['status' => "Ajout OK", 'films' => $newfilms]);
        } else {
            echo $twig->render('creer_films.html.twig', ['status' => "Erreur Ajout"]);
        }
     
        
} elseif (isset($_SESSION['user'])) {
         echo $twig->render('creer_films.html.twig');
} else {
    header('location:compte_connexion');
}