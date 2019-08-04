<?php
  /*include("./Controller/Router.php");
  $router = new Router();
  $router->run();*/
  require_once("Model/Entity/Authentificator.class.php");
  require_once("Model/service/Validator.class.php");
  #header('Location:./Views/index.php');
   $auth= new  Authentificator();
   echo $auth->authentificate("adminer","adminer");

   
?>