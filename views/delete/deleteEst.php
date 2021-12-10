<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Eliminar estudiante</h1>
	</div>
	<div class="form">
		<div class="row">
			<p>Nombre</p>
			<p>
				<?= "{$this->est['nombre_est']} {$this->est['apellido_pat_est']} {$this->est['apellido_mat_est']}" ?>
			</p>
		</div>
		<form action="<?= URL . "delete/ok" ?>" method="post">
			<div class="row">
				<input type="hidden" name="ok" value="estudiante">
				<input type="hidden" name="ci_est" value="<?= $this->est['ci_est'] ?>">
				<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Eliminar</button>
			</div>
		</form>
	</div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
