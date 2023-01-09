<?php
namespace app\controllers;
use app\database\Database;
use \PDO;

class UsuariosController{

    public function index(){
      
      $fields = ['*'];
      
      $teste =(new Database('usuarios'))->select($fields)->fetchAll(PDO::FETCH_CLASS,self::class);
      echo "<pre>";
      var_dump($teste);
      echo "</pre>";
    }
    public function show(){
      echo "Show usuários!";

    }
    public function update(){
      echo "Update usuários";
    }
    public function destroy(){
      echo "Deletar usuário";
    }
}

?>