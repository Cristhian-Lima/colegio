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
<table class="tabla">
	<thead class="head">
		<tr>
			<th>Materia</th>
		</tr>
	</thead>
	<tbody class="body">
		<?php foreach ($this->materias as $materia) : ?>
			<tr>
				<td><?= $materia['nombre_mat'] ?></td>
				<td><a href=" <?= URL . "edit/materia?cod={$materia['cod_mat']}" ?>"><i class="far fa-edit"></i></a></td>
				<td><a href=" <?= URL . "delete/materia?cod={$materia['cod_mat']}" ?>"><i class="far fa-trash-alt"></i></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script src="<?= URL . "views/public/js/inputsUpdate.js" ?>"></script>
