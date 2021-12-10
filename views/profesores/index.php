<?php require_once 'views/templates/header.php'; ?>

<div class="main">
	<div class="card">
		<h1 class="title">Profesores</h1>
	</div>
	<?php if (!empty($this->mensaje)) : ?>
		<div class=card "<?= $this->mensaje['type'] ?>">
			<p><?= $this->mensaje['mensaje'] ?></p>
		</div>
	<?php endif ?>
	<?php if (isset($_SESSION['admin'])) : ?>
		<?php require_once 'views/profesores/formProf.php'; ?>
		<?php require_once 'views/profesores/profAdmin.php'; ?>
	<?php else : ?>
		<?php require_once 'views/profesores/profEst.php'; ?>
	<?php endif ?>
</div>

<?php require_once 'views/templates/footer.php'; ?>
