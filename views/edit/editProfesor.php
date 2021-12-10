<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Profesor</h1>
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
				<label for="ci_prof">CI</label>
				<input type="text" name="ci_prof" id="ci_prof" disabled required value="<?= $this->prof['ci_prof'] ?>">
			</div>
			<div class="row">
				<label for="nombre_prof">Nombre</label>
				<input type="text" name="nombre_prof" id="nombre_prof" required value="<?= $this->prof['nombre_prof'] ?>">
			</div>
			<div class="row">
				<label for="apellido_pat_prof">Apellido paterno</label>
				<input type="text" name="apellido_pat_prof" id="apellido_pat_prof" required value="<?= $this->prof['apellido_pat_prof'] ?>">
			</div>
			<div class="row">
				<label for="apellido_mat_prof">Apellido materno</label>
				<input type="text" name="apellido_mat_prof" id="apellido_mat_prof" required value="<?= $this->prof['apellido_mat_prof'] ?>">
			</div>
			<div class="row">
				<label for="telefono_prof">Telefono</label>
				<input type="text" name="telefono_prof" id="telefono_prof" required value="<?= $this->prof['telefono_prof'] ?>">
			</div>
			<div class="row">
				<label for="cod_mat">materia</label>
				<select name="cod_mat" id="cod_mat">
					<option disabled>Elija materia</option>
					<?php foreach ($this->mat as $mat) : ?>
						<?php if ($mat['cod_mat'] === $this->prof['cod_mat']) : ?>
							<option selected value="<?= $mat['cod_mat'] ?>"><?= $mat['nombre_mat'] ?></option>
						<?php else : ?>
							<option value="<?= $mat['cod_mat'] ?>"><?= $mat['nombre_mat'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="row">
				<input type="hidden" name="ci_prof" value="<?= $this->prof['ci_prof'] ?>">
				<input type="hidden" name="guardar" value="profesor">
				<a href=" <?= URL . "profesores" ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Guardar</button>
			</div>
		</div>
	</form>
</div>

<?php require_once 'views/templates/footer.php'; ?>
