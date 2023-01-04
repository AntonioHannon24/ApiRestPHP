<?php

function load(string $controller, string $action){
    try{
        // se o controller existe
        $controllerNamespace="app\\controllers\\{$controller}";
        //var_dump($controller);

        if(!class_exists($controllerNamespace)){
           echo "O controller {$Controller} não existe";
        }
        $controllerInstance = new $controllerNamespace();
        
        if(!method_exists($controllerInstance,$action)){
            echo "O metodo {$action} não existe no controller {$controller}";
        }
        $controllerInstance->$action((object)$_REQUEST);   
    }catch(Exception $e){
        
        "O método {$action} não existe no controller {$controller}";
        echo $e->getMessage();
    }
}
$router=[
    "GET"=>[
        "/"  => fn()=> load("HomeController","index"),
        "/contact" =>fn()=> load("ContactController","index"),
    ],
    "POST"=>[
        "/contact" =>fn()=> load("ContactController","store"),
    ]
];
?>