<?php
class Router{

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $method_prefix;

    protected $route;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

//wil look localhost/main/(hidden)index/params

    public function __construct($uri){

        $this->uri = urldecode(trim($uri,'/'));
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        $uri_path = explode('?',$this->uri);

        $path = $uri_path[0];


        $path_parts = explode('/',$path);

        if(count($path_parts)){


        if(in_array(strtolower(current($path_parts)),array_keys($routes))){
            $this->route = current($path_parts);
            $this->method_prefix = $routes[$this->route];
            array_shift($path_parts);
            }
            if(current($path_parts)){
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            if(current($path_parts)){
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            $this->params = $path_parts;



        }
    }
}


