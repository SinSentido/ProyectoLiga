<?php
    if(isset($_COOKIE['correctLogin'])){
        //Destruye la cookie
        setcookie('correctLogin', "", time() -3600);
    }
    //Vuelve al login
    header("Location: login.php");
?>