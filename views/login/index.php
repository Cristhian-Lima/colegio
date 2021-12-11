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
					<div class="pass">
						<input class="inputPass" id="pass" type="password" name="password" id="password">
						<span id="ico" class="ico"><i class="fas fa-eye"></i></span>
					</div>
				</div>
				<div class="row">
					<button class="btn" type="submit">Iniciar sesion</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script src=" <?= URL . "views/public/js/inputsUpdate.js" ?>"></script>
<?php require_once 'views/templates/footer.php'; ?>
