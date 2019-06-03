<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/user', function()
{
    $this->get('/welcome', \UserApi::class . ':Welcome');
    $this->get('/', \UserApi::class . ':GetAll');
    $this->get('/{id}', \UserApi::class . ':GetById');
    $this->post('/new', \UserApi::class . ':RegisterUser');
    $this->post('/login', \UserApi::class . ':LoginUser');
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