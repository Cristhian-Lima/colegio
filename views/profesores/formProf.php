<form action="<?= URL . "profesores/addProf" ?>" method="post">
	<div class="form">
		<div class="row hidden">
			<label for="ci_prof">CI</label>
			<input type="text" name="ci_prof" id="ci_prof" required>
		</div>
		<div class="row hidden">
			<label for="nombre_prof">Nombre</label>
			<input type="text" name="nombre_prof" id="nombre_prof" required>
		</div>
		<div class="row hidden">
			<label for="apellido_pat_prof">Apellido paterno</label>
			<input type="text" name="apellido_pat_prof" id="apellido_pat_prof" required>
		</div>
		<div class="row hidden">
			<label for="apellido_mat_prof">Apellido materno</label>
			<input type="text" name="apellido_mat_prof" id="apellido_mat_prof" required>
		</div>
		<div class="row hidden">
			<label for="telefono_prof">Telefono</label>
			<input type="text" name="telefono_prof" id="telefono_prof" required>
		</div>
		<div class="row hidden">
			<label for="cod_mat">materia</label>
			<select name="cod_mat" id="cod_mat">
				<option selected disabled>Elija materia</option>
				<?php foreach ($this->mat as $mat) : ?>
					<option value="<?= $mat['cod_mat'] ?>"><?= $mat['nombre_mat'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="row">
			<button class="btn" type="submit">Agregar</button>
		</div>
	</div>
</form>

<script src="<?= URL . "views/public/js/inputsUpdate.js" ?>">
</script>
