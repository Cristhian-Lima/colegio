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

  <!-- Mis estilos -->
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/style.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/cards.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/cards-curso.css' ?>" />
  <link rel="stylesheet" href=" <?php echo URL . 'views/public/css/tabla.css' ?>" />
</head>

<body>
  <div class="root">
    <nav class="nav">
      <a class="link" href="<?= URL . 'main'; ?>">Inicio</a>
      <a class="link" href="<?= URL . 'inscripcion'; ?>">Inscripcion</a>
      <a class="link" href="<?= URL . 'materias'; ?>">Materias</a>
    </nav>
