<?php
namespace Alfa;


//classe usuario
class Usuario {

    protected $email;
    protected $senha;

    public function getSenha() {
        return $this->senha;
    }
   public function getEmail() {
        return $this->email;
    }

  
//utilizacao de traits  
use Traits\hidratacao;

 

//metodo criado para salvar o usuario no banco de dados
  public function saveUsuario(\PDO $dbh)
  {
    $sql = "INSERT INTO usuario (email, senha) VALUES (:email, :senha)";

    $stmt = $dbh->prepare($sql);

    if($this->email and $this)
    {
      $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR);
      $stmt->bindParam(':senha', $this->senha, \PDO::PARAM_STR);
      $stmt->execute();
      return true;
    } else {
      return false;
    }
  }
}











