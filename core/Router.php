<?php
namespace App\Core;
Class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        
        require $file;
        
        return $router;
    }

     
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

 

    public function direct($uri, $requestType)
    {
        //example : about.com/cutl..
        // $uri -> google.com
        // routes -> /anhdep/everything/everybody

        if(array_key_exists($uri, $this->routes[$requestType])){
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception("No router defined for this URI.");
    }

    protected function callAction($controller, $action)
    {   
        $controller = "App\\Controller\\{$controller}";
        $controller = new $controller;
        // die($controller);
        if(! method_exists($controller, $action)){
            throw new Exception(
                "{$controller} does not respond to the {$action} action ."
            );
        }
         return $controller->$action();
    }
}


?>