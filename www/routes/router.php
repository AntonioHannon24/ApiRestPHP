<?php

function load(string $controller, string $action){
    try{
        // se o controller existe
        $controllerNamespace="app\\controllers\\{$controller}";
        //var_dump($controller);

        if(!class_exists($controllerNamespace)){//Verifica se existe o controller da solicitação
           echo "O controller {$controller} não existe";
        }
        $controllerInstance = new $controllerNamespace();
        
        if(!method_exists($controllerInstance,$action)){// verifica se existe o metodo no Controller!!
            echo "O metodo {$action} não existe no controller {$controller}";
        }
        $controllerInstance->$action((object)$_REQUEST);// executa a solicitação!!
    }catch(Exception $e){
        
        "O método {$action} não existe no controller {$controller}";
        echo $e->getMessage();
    }
}
$router=[

    "GET"=>[
        "/usuarios"  => fn()=> load("UsuariosController","index"),
    ],
    "POST"=>[
        "/usuarios"  => fn()=> load("UsuariosController","post"),
    ],
    "PATCH"=>[
        "/usuarios"=>fn()=>load("UsuariosController","patch"),
    ]
];
?>