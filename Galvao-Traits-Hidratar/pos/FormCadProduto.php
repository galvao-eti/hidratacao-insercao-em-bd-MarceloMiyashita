<?php

require "../autoloader.php";
use Alfa\Produto;

use Traits\hidratacao;
$dsn = 'mysql:dbname=trabalho_pos_2017;host=localhost';

$dbh = new PDO($dsn, 'root', '');

//$u = new Usuario();

//$u->setEmail('gust');
//$u->setSenha('1234562');

//echo $u->saveUsuario($dbh) ? 'Inserido' : 'Não Inserido';
class ArraySerializable {

    public function hydrate(array $data, $object) {
        if (is_callable(array($object, 'exchangeArray1'))) {
            $object->exchangeArray1($data);
        } else {
            throw new Exception('exchangeArray expected1');
        }
        return $object;
    }

    public function extract($object) {
        if (!is_callable(array($object, 'getArrayCopy1'))) {
            throw new Exception('getArrayCopy expected1');
        }
        return $object->getArrayCopy1();
    }
}

$array = array('nome' => 'laranja', 'valor' => '6');

$hydrator = new ArraySerializable();

// hydrate the array as a usuario object
$object = $hydrator->hydrate($array, new Produto());

echo sprintf('Nome do produto: %s <br>',$object->getNome());
echo sprintf('Valor: %s <br>',$object->getValor());

echo $object->saveProduto($dbh) ? 'Produto Inserido' : 'Produto Não Inserido';
