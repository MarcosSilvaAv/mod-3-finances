<?php

	$mdl = bo3::mdl_load("templates/invoices.tpl");
	$mdl_menu = bo3::mdl_load("templates-e/invoices/menu.tpl");


	$mdl = bo3::c2r(
		[
			'mod-menu' => $mdl_menu,
		],
		$mdl
	);


	include "pages/module-core.php";
