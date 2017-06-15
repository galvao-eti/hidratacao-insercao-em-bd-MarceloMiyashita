<?php
require '../autoloader.php';



$id = $_GET['id'];

$dsn = 'mysql:dbname=trabalho_pos_2017; host=localhost';

$dbh = new PDO($dsn, 'root', '');

//select para listar usuario
$sql = "select email,senha from usuario where id=:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

$stmt->execute();
while($registro = $stmt->fetchObject()){
echo sprintf('Email: %s <br>',$registro->email);
echo sprintf('Senha: %s <br>',$registro->senha);
}

$dbh = NULL;