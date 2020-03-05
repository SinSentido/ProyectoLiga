<?php
    if(isset($_POST['login'])){
        require './assets/database/queries.php';
        
        $users = getAllUsers();

        foreach($users as $user){
            if($user['nombreUsuario'] == $_POST['user'] && $user['pass'] == $_POST['pass']){
                header("Location: index.php");
            }
        }

        print_r($usuarios);
    }
?>