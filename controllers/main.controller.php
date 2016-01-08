<?php

class MainController extends Controller{
public function __construct($data = array()){
    parent::__construct($data);
    $this->model = new Message;
}


    public function index(){

  }
//   I am working on it
    public function admin_index(){

        require_once(VIEW.DS.'main'.DS.'admin_login.html');
        if(isset($_POST['login']) && isset($_POST['password'])){
        if(Config::get('login') === $_POST['login'] && Config::get('password') == md5($_POST['password'])){
            Session::set('login',$_POST['login']);

            $this->data = $this->model->getMessages();
        }
      }
    }
  }
