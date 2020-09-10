<?php 

class UserDAO extends Dao
{
    public function getAll($recherche)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idUser, email, password FROM user");
        $query->execute();
        $table_user = array();

        while ($data = $query->fetch()) {
            $table_user[] = new User($data);
        }
        return ($table_user);
    }
    
    
    public function add($data)
    {

        //vérification email
        $requete_verif= $this->_bdd->prepare('SELECT email FROM user WHERE email= :mail');
        $requete_verif->execute(array(':mail'=>$data->get_mail()));

        $compteur = $requete_verif->rowCount();
        //print $compteur;
            if ($compteur <1){
                $requete = 'INSERT INTO user (email, password) VALUES (:mail , :password)';
                $insert = $this->_bdd->prepare($requete);
                if (!$insert->execute(array(
                    'mail'  => $data->get_mail(),
                    'password' => $data->get_psw()
                ))) {
                    //print_r($insert->errorInfo());
                    return false;
                } else {
                    return true;
                }
        } 
    }
    
    public function getOne($id_user)
    {

        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.idUser = :id_user')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_user' => $id_user));
        $data = $query->fetch();
        $user = new User($data);
        return ($user);
    }

    public function connectUser($mail){
        
            $user = null;
            $req = $this->_bdd->prepare('SELECT idUser ,email, password FROM user WHERE email = :mail');
            $req->execute(array(
            'mail' => $mail
            ));
            $resultat = $req->fetch();

            if($resultat){
                $user = new User ($resultat['idUser'],$resultat['email'],$resultat['password']);
            }
            return ($user);
        
        
       
    }

}