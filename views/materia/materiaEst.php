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
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
