<div class="card">
	<?php
	$paralelo = $this->paralelo == '%' ? "" : strtoupper($this->paralelo);
	$nivel = strtoupper($this->titulo);
	?>
	<h2>Curso <?= "{$this->nro_curso}º {$paralelo} {$nivel}" ?></h2>
</div>
<?php if (isset($_SESSION['admin'])) : ?>
	<?php require_once 'views/curso/cursoAdmin.php'; ?>
<?php else : ?>
	<?php require_once 'views/curso/cursoEst.php'; ?>
<?php endif ?>
<div class="volver">
	<a href="<?= URL . "curso/{$this->titulo}" ?>">Volver</a>
</div>
