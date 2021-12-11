<?php require_once 'views/templates/header.php'; ?>
<div class="main">
	<div class="card">
		<h1 class="title">Eliminar Administrador</h1>
	</div>
	<div class="form">
		<div class="row">
			<p>Nombre:</p>
			<p>
				<?= "{$this->admin['nombre_user']}" ?>
			</p>
		</div>
		<div class="row">
			<p>Correo:</p>
			<p>
				<?= "{$this->admin['correo']}" ?>
			</p>
		</div>
		<?php if (isset($this->isAdmin) && $this->isAdmin['isSession']) : ?>
			<div class="row alerta">
				<p> <?= $this->isAdmin['mensaje'] ?></p>
			</div>
			<div class="row">
				<a href="<?= URL . "administradores" ?>" class="btn">Volver</a>
			</div>

		<?php else : ?>
			<form action="<?= URL . "delete/ok" ?>" method="post">
				<div class="row">
					<input type="hidden" name="ok" value="administrador">
					<input type="hidden" name="cod_admin" value="<?= $this->admin['cod_admin'] ?>">
					<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn">Volver</a>
					<button class="btn" type="submit">Eliminar</button>
				</div>
			</form>
		<?php endif ?>
	</div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
