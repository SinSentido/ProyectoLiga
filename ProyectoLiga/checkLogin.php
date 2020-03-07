<?php
    if(isset($_POST['login'])){
        require 'assets/database/queries.php';
        
        $users = getAllUsers();
        $correctLogin = false;

        foreach($users as $user){
            //Si el usuario y la contraseña coinciden con algun usuario de la base de datos
            if($user['nombreUsuario'] == $_POST['user'] && $user['pass'] == $_POST['pass']){
                $correctLogin = true;
                //establece la cookie para guardar la sesión
                setcookie('correctLogin', true);
                header("Location: index.php");
            }
        }
        
        //Si el usuario y la contraseña no coinciden con ninún usuario de la base de datos
        if(!$correctLogin){
            header("Location: login.php?error=1");
        }
    }
    else{
        header("Location: login.php");
    }
?>