<?php
	
	
	//functions concernant la config
	include __DIR__ . '/functions/config.php';
	// functions concernant le routing
	include __DIR__ . '/functions/router.php';
	// functions sql
	include __DIR__ . '/functions/sql.php';
	// get config
	$G_config = getAllConfig();
	
	// stock les bouts de html
	$G_html = [];
	
	// stock les variables dynamiques
	$G_variables = [];
	
	// connection sql
	$G_SQL = getSqlConnection($G_config['sql']['user'], $G_config['sql']['pass']);
	
	
	
	
	
	// on trouve la page demandée
	$current_route = getCurrentRoute();
	
	// si route n'existe pas => 404
	if(!in_array($current_route, $G_config['allowed_routes'])) {
		$current_route = '404';
	}
	
	
	
	
	
	// on charge le controller qui remplie $G_variables
	include __DIR__ . '/controllers/' . $current_route . '.php';
	
	// on se déconnecte
	unset($G_SQL);
	
	
	
	
	
	// on génère la structure du html
	ob_start();
	include __DIR__ . '/views/structure/header.php';
	$G_html['header'] = ob_get_clean();
	ob_start();
	include __DIR__ . '/views/structure/footer.php';
	$G_html['footer'] = ob_get_clean();
	
	// on génère le html
	ob_start();
	include __DIR__ . '/views/pages/' . $current_route . '.php';
	$G_html['main'] = ob_get_clean();
	
	
	
	
	
	// on affiche le html
	header('Content-Type: text/html; charset=utf-8');
	header('Content-language: fr');
	include './views/index.php';
	exit();
