<?php
require '../autoloader.php';



$id = $_GET['idproduto'];

$dsn = 'mysql:dbname=trabalho_pos_2017; host=localhost';

$dbh = new PDO($dsn, 'root', '');

//select para listar usuario
$sql = "select nome, valor from produto where idproduto=:idproduto";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':idproduto', $id, PDO::PARAM_STR);

$stmt->execute();
while($registro = $stmt->fetchObject()){
echo sprintf('Produto: %s <br>',$registro->nome);
echo sprintf('Valor: %s <br>',$registro->valor);
}

$dbh = NULL;