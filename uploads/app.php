<?php

    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();
    use App\Connect;

    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods: GET, POST,PUT,DELETE");
    header("Access-Control-Allow-Headers: Content-Type");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header("HTTP/1.1 200 OK");
        exit;
    }


    $router->mount('/camper', function() use($router){
        $router->get("/",function(){
            $db= new Connect();
            $res= $db->con->prepare("SELECT c.idCamper, c.nombreCamper,c.apellidoCamper, p.nombrePais,d.nombreDep,r.nombreReg , c.fechaNac
            FROM campers c
            JOIN region r ON r.idReg = c.idReg
            JOIN departamento d ON d.idDep=r.idDep
            JOIN pais p ON p.idPais=d.idPais 
            ");
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        });

        $router->delete('/',function(){
        
            $db= new Connect();
            $_DATA=json_decode(file_get_contents("php://input"),true);
            $res= $db->con->prepare("DELETE FROM campers WHERE idCamper=:id");
            $res->bindValue('id',$_DATA['id']);
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);

        });

        $router->get("/paises",function(){
            $db= new Connect();
            $res= $db->con->prepare("SELECT nombrePais,idPais FROM pais");
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        });


        $router->get("/departamentos",function(){
            $db= new Connect();
            $res= $db->con->prepare("SELECT nombreDep,idDep FROM departamento");
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        });
    });

    $router->run();