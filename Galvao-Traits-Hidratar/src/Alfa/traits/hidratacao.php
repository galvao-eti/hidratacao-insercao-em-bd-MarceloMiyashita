<?php
namespace Alfa\traits;

trait Hidratacao
{
  public function exchangeArray($data) {
        $this->email = $data['email'];
        $this->senha = $data['senha'];
    }

     public function getArrayCopy() {
        return get_object_vars($this);
    }

  public function exchangeArray1($data) {
        $this->nome = $data['nome'];
        $this->valor = $data['valor'];
    }

     public function getArrayCopy1() {
        return get_object_vars($this);
    }


}






