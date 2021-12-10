<table class="tabla">
	<thead class="head">
		<tr>
			<th>CI</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Telefono</th>
			<th>Materia</th>
		</tr>
	</thead>
	<tbody class="body">
		<?php foreach ($this->prof as $prof) : ?>
			<tr>
				<td><?= $prof['ci_prof'] ?></td>
				<td><?= $prof['nombre_prof'] ?></td>
				<td><?= $prof['apellido_pat_prof'] . " " . $prof['apellido_mat_prof'] ?></td>
				<td><?= $prof['telefono_prof'] ?></td>
				<td><?= $prof['nombre_mat'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
