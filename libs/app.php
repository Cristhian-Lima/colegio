<?php

class App
{

  public function __construct()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : 'main';
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    $tam = sizeof($url);

    if (empty($url[0]))  $url[0] = 'main';

    //las rutas de la pagina
    switch ($url[0]) {
      case 'main':
        if ($tam >= 1) {
          require_once 'controllers/main.php';
          $controller = new Main();
          $controller->render();
        }
        break;
      case 'curso':
        require_once 'controllers/curso.php';
        $controller = new Curso();

        if (isset($url[1])) {
          $controller->loadModel('curso');

          if (isset($_GET['curso'])) {
            $controller->getCurso($url[1]);
          } else {
            $controller->setTitle($url[1]);
            $controller->render();
          }
        } else {
          $controller->render();
        }
        break;
      case 'inscripcion':
        require_once 'controllers/inscripcion.php';
        $controller = new Inscripcion();

        // si en la url se passa el metodo se la llama
        if (isset($url[1]) && method_exists($controller, $url[1])) {
          $controller->loadModel('inscripcion'); // llama al modelo
          $controller->{$url[1]}();
        } else {
          $controller->render();
        }
        break;

      case 'calificacion':
        require_once 'controllers/calificacion.php';
        $controller = new Calificacion();
        $controller->loadModel('calificacion');

        if (!isset($_GET['ci'])) {
          header("Location: " . URL);
        }

        $controller->getCalificacion();
        $controller->render();
        break;
      case 'materias':
        require_once 'controllers/materia.php';
        $controller = new Materia();
        $controller->loadModel('materia');
        $controller->materias();
        $controller->render();
        break;
      case 'api':
        require_once 'controllers/api.php';
        $controller = new API();

        if (isset($url[1]) && method_exists($controller, $url[1])) {
          $controller->loadApi($url[1]);
          $controller->{$url[1]}();
        }
        break;
      default:
        $this->mostrarError("Direccion no localizada");
        break;
    }
  }

  private function mostrarError($mensaje)
  {
    require_once 'controllers/errors.php';
    $controller = new Errors($mensaje);
  }
}
