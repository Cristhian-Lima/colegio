<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Estudiante</h1>
	</div>
	<?php if (isset($_SESSION['msg'])) : ?>
		<div class="card alerta">
			<p>
				<?= $_SESSION['msg'] ?>
				<?php $_SESSION['msg'] = null ?>
			</p>
		</div>
	<?php endif ?>

	<div class="form">
		<form action="<?= URL . "edit/guardar" ?>" method="post">
			<div class="row">
				<label for="nombre_mat">Nombre</label>
				<input required type="text" name="nombre_mat" id="nombre_mat" value="<?= $this->mat['nombre_mat'] ?>">
			</div>
			<div class="row">
				<input type="hidden" name="cod_mat" value="<?= $this->mat['cod_mat'] ?>">
				<input type="hidden" name="guardar" value="materia">
				<a href="<?= URL . "materias" ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Actualizar</button>
			</div>
		</form>
	</div>

</div>
<?php require_once 'views/templates/footer.php'; ?>
