<?php

	// recupère route demandée
	function getCurrentRoute(){
		$arr = explode('.',$_SERVER['REQUEST_URI']);
		$route = $arr[0];
		if($route == '/'){
			$route = '/index';
		}
		return $route;
	}
