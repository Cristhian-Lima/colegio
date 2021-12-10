<form action=" <?= URL . "administradores/add" ?>" method="post">
	<div class="form">
		<div class="row hidden">
			<label for="user">Nombre de Usuario</label>
			<input required type="text" name="user" id="user">
		</div>
		<div class="row hidden">
			<label for="email">Correo electronico</label>
			<input required type="text" name="email" id="email">
		</div>
		<div class="row hidden">
			<label for="password">Contraseña</label>
			<input required type="text" name="password" id="password">
		</div>
		<div class="row">
			<button class="btn" type="submit">Agregar</button>
		</div>
	</div>
</form>

<script src="<?= URL . "views/public/js/inputsUpdate.js" ?>"></script>
