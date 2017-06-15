<?php

require "../autoloader.php";
use Alfa\Usuario;

use Traits\hidratacao;
$dsn = 'mysql:dbname=trabalho_pos_2017;host=localhost';

$dbh = new PDO($dsn, 'root', '');

//$u = new Usuario();

//$u->setEmail('gust');
//$u->setSenha('1234562');

//echo $u->saveUsuario($dbh) ? 'Inserido' : 'Não Inserido';
class ArraySerializable {

    public function hydrate(array $data, $object) {
        if (is_callable(array($object, 'exchangeArray'))) {
            $object->exchangeArray($data);
        } else {
            throw new Exception('exchangeArray expected');
        }
        return $object;
    }

    public function extract($object) {
        if (!is_callable(array($object, 'getArrayCopy'))) {
            throw new Exception('getArrayCopy expected');
        }
        return $object->getArrayCopy();
    }
}

$array = array('email' => 'traitsHidratacao@gmail.com', 'senha' => '123456');

$hydrator = new ArraySerializable();

// hydrate the array as a usuario object
$object = $hydrator->hydrate($array, new Usuario());

echo sprintf('Senha: %s <br>',$object->getSenha());
echo sprintf('Email: %s <br>',$object->getEmail());

echo $object->saveUsuario($dbh) ? 'Usuario Inserido' : ' Usuario Não Inserido';
