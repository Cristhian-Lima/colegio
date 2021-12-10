<table class="tabla">
	<thead class="head">
		<tr>
			<th>CI</th>
			<th>Nombre</th>
			<th>Paterno</th>
			<th>Materno</th>
			<th>Telefono</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody class="body">
		<?php foreach ($this->curso as $estudiante) : ?>
			<tr>
				<td> <?= $estudiante['ci_est'] ?></td>
				<td> <?= $estudiante['nombre_est'] ?></td>
				<td> <?= $estudiante['apellido_pat_est'] ?></td>
				<td> <?= $estudiante['apellido_mat_est'] ?></td>
				<td> <?= $estudiante['telefono_padre'] ?></td>
				<td><a href="<?= URL . "calificacion?ci={$estudiante['ci_est']}"  ?>">Calificacion</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
