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
      case 'login':
        require_once 'controllers/login.php';

        $login = new Login();

        $login->loadModel('login');
        $login->verificarLogin();

        $login->render();
        break;
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
      case 'profesores':
        require_once 'controllers/profesores.php';
        $controller = new Profesores();

        $controller->loadModel('profesores'); // llama al modelo
        $controller->getProfesores();
        $controller->getMaterias();
        if (isset($url[1])) {
          if ($url[1] === 'addProf') {
            $controller->addProf();
          }
        } else {
          $controller->render();
        }
        break;
      case 'administradores':
        require_once 'controllers/administrador.php';
        $controller = new Administrador();

        $controller->loadModel('administrador');
        $controller->getAdministradores();

        if (isset($url[1]) && $url[1] === 'add') {
          $controller->addAdmin();
        }
        $controller->render();
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

        if (isset($url[1]) && $url[1] === 'addMateria') {
          $controller->addMateria();
        } else {
          $controller->render();
        }
        break;
      case 'edit':
        require_once 'controllers/edit.php';
        $controller = new Edit();

        $controller->loadModel('edit');
        if (isset($url[1])) {
          if ($url[1] === 'estudiante') {
            $controller->getEstudiante();
          } elseif ($url[1] === 'profesor') {
            $controller->getProfesor();
          } elseif ($url[1] === 'materia') {
            $controller->getMateria();
          } elseif ($url[1] === 'guardar') {
            $controller->guardar();
          }
        } else {
          header('Location:' . URL);
        }
        break;
      case 'delete':
        require_once 'controllers/delete.php';
        $controller = new Delete();

        $controller->loadModel('delete');
        if (isset($url[1])) {
          if ($url[1] === 'estudiante') {
            $controller->getEstudiante();
          } elseif ($url[1] === 'profesor') {
            $controller->getProfesor();
          } elseif ($url[1] === 'materia') {
            $controller->getMateria();
          } elseif ($url[1] === 'ok') {
            $controller->ok();
          }
        } else {
          header('Location:' . URL);
        }
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
    new Errors($mensaje);
  }
}
