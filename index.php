<?php

//	Use	Composer	autoloader
require	'vendor/autoload.php';

use kalkulus\Scraper\Scraper;
use kalkulus\Comics\Comic;

$scraper = new Scraper();

$scraper->setRender(function($comics){	
	foreach ($comics as $comic) {
		echo $comic->getImgUrl()."\n";
	}
});

$comic = new Comic(array(
	"name" => "dilbert",	
	"url" => "http://www.dilbert.com/strips/",
	"homepage" => "http://www.dilbert.com/strips",
	"title" => "Dilbert",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		$page = file($url);
		if (!$page){
			return false;
		}

		foreach($page as $line){
		    $marker=strpos($line,"img-responsive img-comic");
		    if ($marker!=false){		
		        return trim($line);
			}
		}

		return false;
	}
));
$scraper->addPage($comic);

$comic = new Comic(array(
	"name" => "blicStrip",	
	"url" => "http://www.blic.rs/Strip",
	"homepage" => "http://www.blic.rs/Strip",
	"title" => "Blic Strip",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		$blic=fopen("http://www.blic.rs/Strip","r");
		while (!feof($blic)){
		    $bufer=fgets($blic,4096);
		    preg_match("~(data/files/[^>]+\.jpg)\" title=\"Strip broj[^>]+~",$bufer,$lnk);
		    if (!empty($lnk)){
		        return "<img src=\"http://www.blic.rs/".$lnk[1]."\">";
		        
		    }
	    }		
		fclose($blic);

		return false;
	}
));
$scraper->addPage($comic);

$scraper->show();