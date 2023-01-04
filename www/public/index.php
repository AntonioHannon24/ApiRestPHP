<?php
require "../vendor/autoload.php";
require "../routes/router.php";


try{
    $uri=parse_url($_SERVER["REQUEST_URI"])['path']; // uri da url
    $request=$_SERVER["REQUEST_METHOD"]; // metodo da requisição
   
    if(! isset($router[$request])){ // Verifica se não existe o metodo no array router dentro de router.php
        echo "O metodo da requisição não existe!!";
    }
    if(! array_key_exists($uri,$router[$request])){// verifica se não existe a rota/requisição
        echo "Erro em enviar/solicitar a requisição!!";
    }

    // se passar das verificações, 
   $controller = $router[$request][$uri]; // recebe os dados
   $controller(); 
}catch(Exception $e){
    $e->getMessage();
}

?>