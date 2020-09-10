<?php 

$message = "";
$status = false;

if (isset($_POST['mail']) && $_POST['mail'] && isset($_POST['psw']) && $_POST['psw']) {
   

        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        $confirm_psw = $_POST['ressaisir_psw'];
        
        
        if (isset($psw)&& $psw &&isset($confirm_psw) && $confirm_psw) {
            if ($psw == $confirm_psw) {
               $userDao = new UserDAO();
                $newUser = new User(null,$mail,password_hash($psw,PASSWORD_ARGON2I));
                $status = $userDao->add($newUser);
               
                if ($status) {
                    $message = "Votre compte a été créer";
                    header('Refresh: 2;url=compte_connexion');
                } else {
                    $message="Erreur Ajout ";
                }
        }  else {
        
            $message = 'Les mots de passe doivent être les mêmes';
        }
                
            
        } else {
            $message = 'Veuillez remplir les mots de passe';

        }
    
} else {
    echo $twig->render('creer_compte.html.twig', ['status' => $status, 'message' => $message]);

}

          