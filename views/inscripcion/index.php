<?php require_once 'views/templates/header.php'; ?>

<div class="main" data-url=" <?php echo URL; ?>">

  <div class="card">
    <h3 class="title">Inscripcion</h3>
  </div>
  <div id="message">
    <?php if (!empty($this->message)) : ?>
      <p class="succes"> <?php echo $this->message; ?></p>
    <?php endif ?>
  </div>

  <form id="form" action=" <?php echo URL . 'inscripcion/registrarEstudiante'; ?>" method="post">
    <div class="form">
      <div class="row">
        <label for="ci">Cedula de Identidad</label>
        <input type="text" name="ci" id="ci">
      </div>
      <div class="row">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
      </div>
      <div class="row">
        <label for="paterno">Apellido Paterno</label>
        <input type="text" name="paterno" id="paterno">
      </div>
      <div class="row">
        <label for="materno">Apellido Materno</label>
        <input type="text" name="materno" id="materno">
      </div>
      <div class="row">
        <label for="telefono">Telefono del padre o madre</label>
        <input type="text" values="" name="telefono" maxlength="8" id="telefono">
      </div>
      <div class="row">
        <label for="nivel">Nivel</label>
        <select name="nivel" id="nivel">
          <option disabled selected>Seleccione nivel</option>
        </select>
      </div>
      <div class="row">
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
          <option selected disabled>Seleccione curso</option>
        </select>
      </div>
      <div class="row">
        <label for="paralelo">Paralelo</label>
        <select name="paralelo" id="paralelo">
          <option selected disabled>Seleccione paralelo</option>
        </select>
      </div>
      <div class="row">
        <button class="btn" type="submit">Enviar</button>
      </div>
    </div>
  </form>

</div>

<script src=" <?php echo URL . 'views/public/js/fetch.js'; ?>">
</script>

<?php require_once 'views/templates/footer.php'; ?>
