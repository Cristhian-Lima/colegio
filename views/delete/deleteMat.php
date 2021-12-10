<?php require_once 'views/templates/header.php'; ?>
<div class="main">
	<div class="card">
		<h1 class="title">Eliminar Profesor</h1>
	</div>
	<div class="form">
		<div class="row">
			<p>Materia:</p>
			<p class="title">
				<?= "{$this->mat['nombre_mat']}" ?>
			</p>
		</div>
		<form action="<?= URL . "delete/ok" ?>" method="post">
			<div class="row">
				<input type="hidden" name="ok" value="materia">
				<input type="hidden" name="cod_mat" value="<?= $this->mat['cod_mat'] ?>">
				<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Eliminar</button>
			</div>
		</form>
	</div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
