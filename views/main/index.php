<?php require_once 'views/templates/header.php'; ?>

<script>
  //alert(window.screen.width, window.screen.height)
</script>

<div class="main">
  <div class="card">
    <h2 class="title">Niveles</h2>
  </div>
  <div class="card">
    <img src="<?= URL . 'views/public/img/card-inicial.png' ?>" alt="Inicial" />
    <div class="container">
      <h2 class="title">Inicial</h2>
      <p>
        En la educación inicial los niños aprenden a convivir con otros seres
        humanos a establecer vínculos afectivos con pares diferentes a los de su
        familia
      </p>
      <a class="btn" href="<?= URL . 'curso/inicial' ?>">Cursos</a>
    </div>
  </div>
  <div class="card">
    <img class="order-2" src="<?= URL . 'views/public/img/card-primaria.png' ?>" alt="Primaria" />
    <div class="container order-1">
      <h2 class="title">Primaria</h2>
      <p>
        Es la que asegura la correcta alfabetización, es decir, que enseña a
        leer, escribir, cálculo básico y algunos de los conceptos culturales
      </p>
      <a class="btn" href="<?= URL . 'curso/primaria' ?>">Cursos</a>
    </div>
  </div>
  <div class="card">
    <img src="<?= URL . 'views/public/img/card-secundaria.png' ?>" alt="Secundaria" />
    <div class="container">
      <h2 class="title">Secundaria</h2>
      <p>
        Tiene como objetivo capacitar al alumno para poder iniciar estudios de
        educación superior.
      </p>
      <a class="btn" href="<?= URL . 'curso/secundaria' ?>">Cursos</a>
    </div>
  </div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
