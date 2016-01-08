<?php

class View {

    public $data;

   protected $path;

    public static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){

            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';
        return VIEW.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(),$path = null){
//default - layout
        if(!$path){
            $path = self::getDefaultViewPath();

        }
        if(!file_exists($path)){
            echo 'template file does not exist '.$path;
        }
        $this->path = $path;
        $this->data = $data;

    }
    public function render(){
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_get_clean();
        return $content;

    }
}
