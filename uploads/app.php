<?php

    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();
    use App\Connect;


    $router->get("/prueba",function(){
        new Connect();
    });


    $router->run();