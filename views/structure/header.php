<nav>
	<ul>
		<?php foreach ($G_config['menu'] as $route){ ?>
			<li><a href="<?= $route['href'] ?>" title="<?= $route['title'] ?>"><?= $route['html'] ?></a></li>
		<?php } ?>
	</ul>
</nav>
