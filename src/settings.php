<?php
class Settings
{
    public $ubicacion;
    public $dependencies;
    public $ormModels;
    public $routes;
    public $public;
    public $src;    
    public $config;

    public $vendor;
    public $clases;
    public $funciones;
    public $archivos;
    public $fotos;
    public $fotosBackup;
    public $urlEstampa;

    function __construct()
    {
        $this->config = [

            'settings' => [
                'displayErrorDetails' => true,       
                'addContentLengthHeader' => false,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => __DIR__.'/../logs/app.log', 
                ],
                'db' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' => 'utn_prog_III',
                    'username' => 'root',
                    'password' => '',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                ],
            ],                
        ];

        $this->ubicacion = '..';
        $this->vendor = $this->ubicacion . '/vendor';
        $this->public = $this->ubicacion . '/public';
        $this->src = $this->ubicacion . '/src';     
        $this->dependencies = $this->src . '/dependencies.php';  
        $this->routes = $this->src . '/routes.php';
        $this->ormModels = $this->ubicacion . '/app/models'; 

        $this->clases = $this->ubicacion . '/clases';        
        $this->funciones = $this->ubicacion . '/funciones';        
        $this->archivos = $this->ubicacion . '/archivos';        
        $this->fotos = $this->ubicacion . '/fotos';        
        $this->fotosBackup = $this->ubicacion . '/fotosBackup';        
        $this->urlEstampa = $this->archivos . 'urlEstampa';        
    } 
}
?>