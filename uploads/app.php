<?php

    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();
    use App\Connect;


    $router->get("/prueba",function(){
        $db= new Connect();
        $res= $db->con->prepare("SELECT * FROM pais");
        $res->execute();    
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    });


    $router->run();