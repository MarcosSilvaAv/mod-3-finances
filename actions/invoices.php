<?php

	$breadcrumb = [];

	$breadcrumb[] = [
		"name" => "Invoices",
		"link" => ""
	];

	$mdl = bo3::c2r(
		[

		],
		bo3::mdl_load("templates/invoices.tpl")
	);

	include "pages/module-core.php";
