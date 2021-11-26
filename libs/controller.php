<?php

class Controller
{
  function __construct()
  {
    $this->view = new View();
  }

  function loadModel($model)
  {
    $url = "models/{$model}model.php";
    if (file_exists($url)) {
      require $url;

      $modelName = "{$model}Model";
      $this->model = new $modelName();
    }
  }
  function loadApi($api)
  {
    $url = "models/cursoapi.php";

    if (file_exists($url)) {
      require $url;

      $niveles = "{$api}Api";
      $this->api = new $niveles();
    }
  }
}
