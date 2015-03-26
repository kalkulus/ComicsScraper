<?php

//	Use	Composer	autoloader
require	'vendor/autoload.php';

use kalkulus\Scraper\Scraper;
use kalkulus\Comics\Comic;

$scraper = new Scraper();

$scraper->setParams(array(
	'god' => date("Y"),
	'mes' => date("m"),
	'godmesdan' => date("ymd"),
	'mesdangod' => date("mdy"),
	'danas' => date("Ymd"),
	'sfdatum' => date("Y-m-d")
));

$scraper->setRender(function($comics){	
	
	include_once('comicsTable.php');
});

$scraper->addPage(new Comic(array(
	"name" => "gpf",	
	"url" => "http://www.gpf-comics.com",
	"homepage" => "http://www.gpf-comics.com",
	"title" => "General Protection Fault",
	"scraper" => function($url){
		if($gpfcomics = file($url)){
			foreach($gpfcomics as $bufer){
			    $lnk=stristr($bufer,"/comics/gpf");
			    if ($lnk!=false){
				   $tmp = explode("/comics/gpf",$bufer);
				   $tmp = explode("<br",$tmp[1]);
				   return "<img src=\"http://www.gpf-comics.com/comics/gpf".$tmp[0];
		        }
	    	}
		}

		return false;
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "garfield",	
	"url" => "",
	"homepage" => "http://www.garfield.com/",
	"title" => "Garfield",
	"scraper" => function($url, $params){		
		return "<img alt=\"Garfield\" src=\"http://images.ucomics.com/comics/ga/".$params['god']."/ga".$params['godmesdan'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "garfield_esp",	
	"url" => "",
	"homepage" => "http://www.garfield.com/",
	"title" => "Garfield Espanol",
	"scraper" => function($url, $params){
		return "<img alt=\"Garfield Espanol\" src=\"http://images.ucomics.com/comics/gh/".$params['god']."/gh".$params['godmesdan'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
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
)));

$scraper->addPage(new Comic(array(
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
)));

$scraper->show();