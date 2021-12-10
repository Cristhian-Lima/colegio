<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<h1 class="title">Administradores</h1>
	<?php if (isset($this->mensaje['type'])) : ?>
		<div class=card "<?= $this->mensaje['type'] ?>">
			<p><?= $this->mensaje['mensaje'] ?></p>
		</div>
	<?php endif ?>

	<?php require_once 'views/administrador/adminForm.php'; ?>

	<table class="tabla">
		<thead class="head">
			<tr>
				<th>Nº</th>
				<th>Nombre de usuario</th>
				<th>Correo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody class="body">
			<?php foreach ($this->admins as $admin) : ?>
				<tr>
					<td><?= $admin['cod_admin'] ?></td>
					<td><?= $admin['nombre_user'] ?></td>
					<td><?= $admin['correo'] ?></td>
					<td><a href="<?= URL . "delete/admin?id={$admin['cod_admin']}" ?>"><i class="fas fa-trash-alt"></i></a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<?php require_once 'views/templates/footer.php'; ?>
