<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h3 class="title">Materias</h3>
	</div>
	<?php if (isset($this->mensaje['type'])) : ?>
		<div class="card <?= $this->mensaje['type'] ?>">
			<p><?= $this->mensaje['mensaje'] ?></p>
		</div>
	<?php endif ?>
	<?php if (isset($_SESSION['admin'])) : ?>
		<?php require_once 'views/materia/materiaForm.php'; ?>
	<?php endif ?>
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
