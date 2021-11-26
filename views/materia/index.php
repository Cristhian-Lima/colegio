<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h3 class="title">Materias</h3>
	</div>
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
</div>

<?php require_once 'views/templates/footer.php'; ?>
