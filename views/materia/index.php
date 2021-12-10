<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h3 class="title">Materias</h3>
	</div>
	<?php if (isset($this->mensaje['type'])) : ?>
		<div class="card <?= $this->mensaje['type'] ?>">
			<p><?= $this->mensaje['mensaje'] ?></p>
		</div>
	<?php endif ?>
	<?php if (isset($_SESSION['admin'])) : ?>
		<?php require_once 'views/materia/materiaForm.php'; ?>
	<?php else : ?>
		<?php require_once 'views/materia/materiaEst.php'; ?>
	<?php endif ?>
</div>

<?php require_once 'views/templates/footer.php'; ?>
