<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chañocahua</title>

  <!--fuentes-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet" />

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Mis estilos -->
  <link rel="shortcut icon" href="<?= URL . "favicon.ico" ?>" type="image/x-icon">
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/style.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/cards.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/cards-curso.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/tabla.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/forms.css' ?>" />
</head>

<body>
  <div class="root">
    <nav class="nav">
      <a class="link" href="<?= URL . 'main'; ?>">Inicio</a>
      <a class="link" href="<?= URL . 'profesores'; ?>">Profesores</a>
      <a class="link" href="<?= URL . 'materias'; ?>">Materias</a>
      <?php if (isset($_SESSION['admin'])) : ?>
        <a class="link" href="<?= URL . 'administradores'; ?>">Administradores</a>
        <a class="link" href="<?= URL . 'inscripcion'; ?>">Inscripcion</a>
        <a class="link" href="<?= URL . 'login?logout=1'; ?>">Cerrar session</a>
        <span class="link"><?= $_SESSION['admin']['nombre_user'] ?></span>
      <?php else : ?>
        <a href="<?= URL . 'login'; ?>" class="link">Administrar</a>
      <?php endif ?>
    </nav>
