<?php

if (isset($_SESSION['user'])) {
    /* setcookie("nom",NULL,0); */
   unset ($_SESSION['user']);
    header('location:films');
}