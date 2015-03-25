<?php

//	Use	Composer	autoloader
require	'vendor/autoload.php';

use kalkulus\Scraper\Scraper;

$scraper = new Scraper();

$scraper->setRender(function($comics){
	echo "render\n";
});

$scraper->show();