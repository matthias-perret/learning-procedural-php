<?php
	
	// récupère toutes les configs
	function getAllConfig(){
		return [
			'title' => 'Portfolio Jesus Rivas',
			'allowed_routes' => getAllowedRoutesConfig(),
			'menu' => getMenuConfig(),
			'sql' => getSqlConfig(),
		];
	}
	
	// liste des routes possibles
	function getAllowedRoutesConfig(){
		return ['/index', '/test'];
	}
	
	// config menu
	function getMenuConfig(){
		return [
			'index' => [
				'href' => '/',
				'title' => 'Accueil',
				'html' => 'Accueil',
			],
			'test' => [
				'href' => '/test',
				'title' => 'Test',
				'html' => 'Test',
			],
		];
	}
	
	// config sql
	function getSqlConfig(){
		$arr = [];
		$f = fopen(__DIR__ . '/../sql.conf','r');
		while($row = fgetcsv($f,0,':')){
			$row = array_map('trim',$row);
			$arr[$row[0]] = $row[1];
		}
		return $arr;
	}
