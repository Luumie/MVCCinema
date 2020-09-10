<?php


$message = "";

$PasswordCorrect = true;
if (isset($_POST['mail']) && $_POST['mail']) {
    if (isset($_POST['psw']) && $_POST['psw']) {
        
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        
        
        $connectDAO = new UserDAO();
        $connect = $connectDAO->connectUser($mail);
        
        
        // Comparaison du pass envoyé via le formulaire avec la base
        if ( !is_null($connect)) {
            
            $PasswordCorrect = password_verify($psw, $connect->get_psw());
 
        
            if ($PasswordCorrect == false)
            {
                $message = 'Mauvais identifiant ou mot de passe !';
                
            }
            elseif ($PasswordCorrect == true)
            {
                $_SESSION['user'] = $mail;
                header('location:films'); 

            }
        } else {
            $PasswordCorrect = false;
            $message = 'Mauvais identifiant ou mot de passe !';        }
            
       
    }
}

echo $twig->render('compte_connexion.html.twig', ['message' => $message, 'password' => $PasswordCorrect]);