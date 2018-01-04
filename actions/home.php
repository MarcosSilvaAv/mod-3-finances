<?php

	$mdl = bo3::mdl_load("templates/home.tpl");
	$mdl_menu = bo3::mdl_load("templates-e/home/menu.tpl");


	$mdl = bo3::c2r(
		[
			'mod-menu' => $mdl_menu,
		],
		$mdl
	);


	include "pages/module-core.php";
