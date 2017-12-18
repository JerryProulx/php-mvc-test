<?php

class Bootstrap {
  private $controller;
  private $action;
  private $request;

  public function __construct($request){
    $this->request = $request;

    //Assign home to the controller if home request
    if($this->request['controller'] == ''){
      $this->controller = 'home';
    } else {
      $this->controller = $this->request['controller'];
    }

    //Assign index to the controller if home request
    if($this->request['action'] == ''){
      $this->action = 'index';
    } else {
      $this->action = $this->request['action'];
    }
  }

  //Function to build the controller
  public function createController(){
    //Check Class
    if(class_exists($this->controller)){
      $parents = class_parents($this->controller);

      //Check if Extended
      if(in_array('Controller', $parents)){
        if(method_exists($this->controller, $this->action)){
          return new $this->controller($this->action, $this->request);
        }else{
          //Method Does not Exist
          echo '<h1>Method does not exist</h1>';
          return;
        }
      }else{
        //Base Controller does not exist
        echo '<h1>Base controller not found</h1>';
        return;
      }
    }else{
      //Controller Class does not exist
      echo '<h1>Controller Class does not exist</h1>';
      return;
    }
  }
}

 ?>
