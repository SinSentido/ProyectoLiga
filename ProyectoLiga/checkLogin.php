<?php
    if(isset($_POST['login'])){
        require './assets/database/queries.php';
        
        $users = getAllUsers();
        $correctLogin;

        foreach($users as $user){
            if($user['nombreUsuario'] == $_POST['user'] && $user['pass'] == $_POST['pass']){
                $correctLogin = true;
                setcookie('correctLogin', true);
                header("Location: index.php");
            }
        }

        if(!$correctLogin){
            header("Location: login.php?error=1");
        }

    }
    else{
        //header("Location: login.php");
    }
?>