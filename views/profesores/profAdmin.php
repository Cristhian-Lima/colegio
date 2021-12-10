<table class="tabla">
	<thead class="head">
		<tr>
			<th>CI</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Telefono</th>
			<th>Materia</th>
			<th colspan="2">Opciones</th>
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
				<td><a href="<?= URL . "edit/profesor?ci={$prof['ci_prof']}" ?>"><i class="fas fa-user-edit"></i></a></td>
				<td><a href="<?= URL . "delete/profesor?ci={$prof['ci_prof']}" ?>"><i class="fa fa-trash-alt"></i></a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
