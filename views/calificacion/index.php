<?php require_once "views/templates/header.php"; ?>

<?php $nombre_completo = "{$this->estudiante['nombre']} {$this->estudiante['paterno']} {$this->estudiante['materno']}" ?>
<div class="main">
	<div class="curso">
		<div class="card">
			<h3 class="title"><?= $this->estudiante['ci'] ?></h3>
			<h3 class="title"><?= $nombre_completo ?></h3>
		</div>

		<table class="tabla">
			<thead class="head">
				<tr>
					<th>Materia</th>
					<th>Tipo</th>
					<th>Nota</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody class="body">
				<?php foreach ($this->calificacion as $datos) : ?>
					<tr>
						<td> <?= $datos['materia'] ?></td>
						<td> <?= $datos['tipo_ev'] ?></td>
						<td> <?= $datos['nota'] ?></td>
						<td> <?= $datos['fecha'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<?php require_once "views/templates/footer.php"; ?>
