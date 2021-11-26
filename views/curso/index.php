<?php require_once 'views/templates/header.php'; ?>

<section class="main" data-url=' <?php echo URL; ?>'>
	<?php if (!empty($this->curso)) : ?>
		<div class="curso">
			<?php require_once 'views/curso/curso.php'; ?>
		</div>
	<?php else : ?>
		<div class="cursos">
			<?php require_once 'views/curso/cursos.php'; ?>
		</div>
		<div class="volver">
			<a href="<?= URL ?>">Volver</a>
		</div>
	<?php endif ?>
</section>
<?php require_once 'views/templates/footer.php'; ?>
