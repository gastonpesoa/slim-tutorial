<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function () {
    echo 'Hola Mundo!';    
});

$app->get('/users', function (Request $request, Response $response) {    
    $this->logger->addInfo('User list'); 
    $params = $request->getQueryParams();
    var_dump($params);
    $userORM = new \App\Models\User();    
    $users = $userORM::all();
    // return $response->withStatus(200)->getBody()->write($users->toJson());    
});

$app->get('/users/{sort}/{order}', function (Request $request, Response $response) {        
    $this->logger->addInfo('User list sort order'); 
    $userORM = new \App\Models\User();    
    $users = $userORM::all();
    // return $response->withStatus(200)->getBody()->write($users->toJson());    
});

$app->get('/users/{id}', function(Request $request, Response $response, $args){
    $this->logger->addInfo('User by id'); 
    $userId = (int)$args['id'];
    $userORM = new \App\Models\User();    
    $user = $userORM->find($userId);
    return $response->withStatus(200)->getBody()->write($user->toJson());    
});
    
$app->group('/orm', function () {
        
    $this->get('/', function () {
                
        echo  "Traer todos los user <br>";
        $users = Userorm::all();
        echo $users->toJson();
        
        //die();
        echo "<br><br><br>";
        echo "Agregar un user<br>";
        $user = new \App\Models\User();
        $user->nombre="Albano";
        $user->password="Matalico";
        
        $user->save();

        echo $user->toJson();
        echo "<br><br><br>";
        echo "Traer un user<br>";

        $otrouser =$user->find(5);
        echo $otrouser->toJson();

        echo "<br><br><br>";
        echo 'Modificar un user<br>';
        $otrouser->nombre="cambiado";
        $otrouser->password="Matalico";

        $otrouser->save();
        echo $otrouser->toJson();
        echo "<br><br><br>";
        echo 'buscar los  users<br>';
        $respuesta= $user->where('password', "=","Matalico")->get();
        echo $respuesta->toJson();

        echo "<br><br><br>";
        echo 'buscar el primero un user<br>';
        $respuesta= $user->where('nombre', "=","Albano")->first();
        echo $respuesta->toJson();
        
        echo "<br><br><br>";
        echo 'buscar el primero un user $user->where(nombre,Albano)->first() <br>';
        $respuesta= $user->where('nombre',"Albano")->first();
        echo $respuesta->toJson();

        echo "<br><br><br>";
        echo 'buscar el wherenombre <br>';
        $respuesta= $user->wherenombre("Albano")->first();
        echo $respuesta->toJson();



        echo "<br><br><br>";
        echo 'borrar un user<br>';

        $respuesta->delete();
        echo $respuesta->toJson();
    });     
  });
  
?>