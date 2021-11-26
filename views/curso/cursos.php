<div class="card">
	<h2 class="title"><?= strtoupper($this->titulo) ?></h2>
</div>
<?php
$num = 1;
$limite = 6;
if ($this->titulo === 'inicial')
	$limite = 1;
?>
<?php for ($num = 1; $num <= $limite; $num++) : ?>
	<div class="card-curso">
		<a href="<?= URL . "curso/{$this->titulo}?curso={$num}" ?>" class="card-link">
			<img src="<?= URL . "views/public/img/{$num}.png" ?>" alt="">
		</a>
		<div class="container">
			<a class="btn" href='<?= URL . "curso/{$this->titulo}?curso={$num}&paralelo=a" ?>'>A</a>
			<a class="btn" href='<?= URL . "curso/{$this->titulo}?curso={$num}&paralelo=b" ?>'>B</a>
		</div>
	</div>
<?php endfor ?>
