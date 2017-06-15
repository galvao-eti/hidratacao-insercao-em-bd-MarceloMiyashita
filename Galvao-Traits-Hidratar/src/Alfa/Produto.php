<?php
namespace Alfa;


//classe produto
class Produto {

    protected $nome;
    protected $valor;

    public function getNome() {
        return $this->nome;
    }
   public function getValor() {
        return $this->valor;
    }

  
//utilizacao de traits  
use Traits\hidratacao;

 

//metodo criado para salvar o usuario no banco de dados
  public function saveProduto(\PDO $dbh)
  {
    $sql = "INSERT INTO produto (nome, valor) VALUES (:nome, :valor)";

    $stmt = $dbh->prepare($sql);

    if($this->nome and $this->valor)
    {
      $stmt->bindParam(':nome', $this->nome, \PDO::PARAM_STR);
      $stmt->bindParam(':valor', $this->valor, \PDO::PARAM_STR);
      $stmt->execute();
      return true;
    } else {
      return false;
    }
  }
}











