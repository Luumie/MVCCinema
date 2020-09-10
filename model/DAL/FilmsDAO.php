<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author 1703728
 */
class FilmsDAO extends Dao
{

//Récupérer toutes les offres
    public function getAll($recherche)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT films.idFilm, films.titre, films.realisateur, films.annee, films.affiche, role.idRole,role.personnage, acteurs.idActeur,acteurs.nom, acteurs.prenom FROM films
                                        INNER JOIN role ON role.idFilm = films.idFilm
                                        INNER JOIN acteurs On acteurs.idActeur = role.idActeur
                                        WHERE upper(films.titre) LIKE :recherche");
        $query->execute(array(':recherche' => '%' . strtoupper($recherche) . '%'));
        $films = array();
        $id = 0;
        
        while ($data = $query->fetch()) {
            /* var_dump($data); */
                $acteur = new Acteurs($data['idActeur'],$data['nom'],$data['prenom']);
                $role = new Role($data['idRole'],$data['personnage'], $acteur);
            if ($id!=$data['idFilm']) {
                $films[] = new Films($data['idFilm'],$data['titre'],$data['realisateur'],$data['annee'],$data['affiche']);
                $id = $data['idFilm'];
                
            }
            $films[count($films)-1]->add_roles($role);
                /* var_dump($films); */
                /* var_dump($acteurs);
                var_dump($roles); */
        }
       /*  var_dump($films); */

        /* echo '<pre>';
        print_r ($films);
        echo'</pre>'; */
        
       return ($films);
    }
    

    //Ajouter une offre
    public function add($data)
    {
        try {
            $requete = 'INSERT INTO films (titre, realisateur, affiche,annee) VALUES (:titre , :realisateur, :affiche, :annee)';
            $insert = $this->_bdd->prepare(array( 
                'titre' => $data->get_titre(),
                'realisateur' => $data->get_realisateur(),
                'annee' => $data->get_annee(),
                'affiche' => $data->get_affiche()
            ));
            

            if (!$insert->execute($valeurs)) {
                //print_r($insert->errorInfo());
                return false;
            } else {
                return true;
            }

            
    
        } catch (\Throwable $th) {

        }
        
        
       
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($id_films)
    {

        $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilms = :id_films')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_films' => $id_films));
        $data = $query->fetch();
        $films = new Films($data);
        return ($films);
    }

    public function deleteOne($id_films): int { 
        $query = $this->_bdd->prepare('DELETE FROM films WHERE films.idFilms = :id_films'); 
        $query->execute(array(':id_films' => $id_films)); 
        return ($query->rowCount()); 
    }

}