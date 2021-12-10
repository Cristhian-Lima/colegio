<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Administrador</h1>
	</div>
	<?php if (!empty($this->mensaje)) : ?>
		<div class="alerta">
			<p><?= $this->mensaje ?></p>
		</div>
	<?php endif ?>
	<div class="card-curso">
		<form action="<?= URL . "login" ?>" method="post">
			<div class="form">
				<div class="row">
					<label for="email">Correo electronico</label>
					<input type="email" name="email" id="email">
				</div>
				<div class="row">
					<label for="password">Contraseña</label>
					<input type="password" name="password" id="password">
				</div>
				<div class="row">
					<button class="btn" type="submit">Iniciar sesion</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php require_once 'views/templates/footer.php'; ?>
