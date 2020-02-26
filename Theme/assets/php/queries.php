<!-- Comprueba si se establece asi el meedo Jose que yo creo que si-->
<?php 
/**********************PRUEBAS:*/
require '../Medoo/Medoo.php';

//Importamos la clase de Medoo
use Medoo\Medoo;

// Con el Medoo creamos el objeto de la DB
$database = new Medoo([
    // required
	'database_type' => 'mysql',
	'database_name' => 'basketLeague',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
    ]);

getAllTeams($database);







/**********************FUNCIONES:*/
// Obtenemos todos los campos de la tabla equipo 
function getAllTeams($baseData){
    $datas = $baseData->select("equipo",["*"] );
    // Mostramos todos los datos
    foreach($datas as $data){
	    echo "codEquipo:" . $data["codEquipo"] . " - nombreEquipo:" . $data["nombreEquipo"] . "<br/>";
    }
}

?>