<?php 
$usuario = 'root';
$senha = '123456';
$database = 'login-php';
$host = 'localhost';


$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
  die("falha de conexão" .$mysqli->error);
}

?>
