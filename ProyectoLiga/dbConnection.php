<?php
    //Archivo php que contiene la conexión con la base de datos, es el único objeto de conexión para toda
    //la aplicación.
    require 'assets/database/Medoo/src/Medoo.php';
    use Medoo\Medoo;

    //Establecemos la conexión con la base de datos.
    //Crea una instancia de la clase Medoo. (Se crea un objeto)
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ligaBaloncesto',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'Libertas11?'
    ]);
?>