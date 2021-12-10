<?php require_once 'views/templates/header.php'; ?>

<div class="main" data-url=" <?php echo URL; ?>">
	<div class="card">
		<h1 class="title">Estudiante</h1>
	</div>
	<?php if (isset($_SESSION['msg'])) : ?>
		<div class="card alerta">
			<p>
				<?= $_SESSION['msg'] ?>
				<?php $_SESSION['msg'] = null ?>
			</p>
		</div>
	<?php endif ?>

	<form action="<?= URL . "edit/guardar" ?>" method="post">
		<div class="form">
			<div class="row">
				<label for="ci_est">Cedula de Identidad</label>
				<input type="text" name="ci_est" id="ci_est" disabled value="<?= $this->est['ci_est'] ?>">
			</div>
			<div class="row">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" value="<?= $this->est['nombre_est'] ?>">
			</div>
			<div class="row">
				<label for="paterno">Apellido Paterno</label>
				<input type="text" name="paterno" id="paterno" value="<?= $this->est['apellido_pat_est'] ?>">
			</div>
			<div class="row">
				<label for="materno">Apellido Materno</label>
				<input type="text" name="materno" id="materno" value="<?= $this->est['apellido_mat_est'] ?>">
			</div>
			<div class="row">
				<label for="telefono">Telefono del padre o madre</label>
				<input type="text" values="" name="telefono" maxlength="8" id="telefono" value="<?= $this->est['telefono_padre'] ?>">
			</div>
			<div class="row">
				<label for="nivel">Nivel</label>
				<select name="nivel" required id="nivel">
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
				<input type="hidden" name="ci_est" value="<?= $this->est['ci_est'] ?>">
				<input type="hidden" name="guardar" value="estudiante">
				<button class="btn" type="submit">Enviar</button>
			</div>
		</div>
	</form>
</div>
<script src=" <?php echo URL . 'views/public/js/fetch.js'; ?>">
</script>

<?php require_once 'views/templates/footer.php'; ?>
