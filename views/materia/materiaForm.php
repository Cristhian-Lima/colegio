<form action="<?= URL . "materias/addMateria" ?>" method="post">
	<div class="form">
		<div class="row hidden">
			<label for="cod">Codigo</label>
			<input required type="text" name="cod" id="cod">
		</div>
		<div class="row hidden">
			<label for="nombre">Nombre de materia</label>
			<input required type="text" name="nombre" id="nombre">
		</div>
		<div class="row">
			<button class="btn" type="submit">Agregar</button>
		</div>
	</div>
</form>

<script src="<?= URL . "views/public/js/inputsUpdate.js" ?>"></script>
