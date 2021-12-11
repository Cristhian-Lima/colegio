<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Administrador</h1>
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
				<label for="nombre_user">Nombre de Usuario</label>
				<input required type="text" name="nombre_user" id="nombre_user" value="<?= $this->admin['nombre_user'] ?>">
			</div>
			<div class="row">
				<label for="correo">Correo Electronico</label>
				<input required type="email" name="correo" id="correo" value="<?= $this->admin['correo'] ?>">
			</div>
			<div class="row">
				<label for="password">Nueva contraseña</label>
				<input required type="password" name="password" id="password">
			</div>
			<div class="row">
				<input type="hidden" name="cod_admin" value="<?= $this->admin['cod_admin'] ?>">
				<input type="hidden" name="guardar" value="administrador">
				<a href="<?= URL . "administradores" ?>" class="btn">Volver</a>
				<button class="btn" type="submit">Actualizar</button>
			</div>
		</form>
	</div>

</div>
<?php require_once 'views/templates/footer.php'; ?>
