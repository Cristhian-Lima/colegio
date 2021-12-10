<?php require_once 'views/templates/header.php'; ?>
<div class="main">
	<div class="card">
		<h1 class="title">Eliminar Profesor</h1>
	</div>
	<div class="form">
		<div class="row">
			<p>Nombre:</p>
			<p class="title">
				<?= "{$this->prof['nombre_prof']} {$this->prof['apellido_pat_prof']} {$this->prof['apellido_mat_prof']}" ?>
			</p>
		</div>
		<div class="row">
			<p>Materia</p>
			<p class="title">
				<?= $this->mat['nombre_mat'] ?>
			</p>
		</div>
		<form action="<?= URL . "delete/ok" ?>" method="post">
			<div class="row">
				<input type="hidden" name="ok" value="profesor">
				<input type="hidden" name="ci_prof" value="<?= $this->prof['ci_prof'] ?>">
				<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Eliminar</button>
			</div>
		</form>
	</div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
