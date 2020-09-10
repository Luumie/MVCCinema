<?php 



if (isset($_POST['id'])) {
    $filmsDao = new FilmsDAO();
    $id_films = $_POST['id'];
    $delete = $filmsDao->deleteOne($id_films);

    if ($delete) {
        echo $twig->render('delete_offre.html.twig', ['delete' => "Suppression faite", "idoffre" => $idOffer]);
    } else {
        echo $twig->render('delete_offre.html.twig', ['delete' => "Erreur suppression"]);

    }
}