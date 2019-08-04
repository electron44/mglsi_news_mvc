<div id="menu">
	<h1>Catégories</h1><hr width="20%">
	<ul>
		<li><a href="index.php">Tout</a></li>
		<?php
			$controller= new Controller();
			$categories = $controller->allCategories;
			foreach ($categories as $categorie):?>
			<li><a href="categorie/<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
		<?php endforeach ?>
	</ul>
</div>