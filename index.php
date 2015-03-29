<?php

//	Use	Composer	autoloader
require	'vendor/autoload.php';

use kalkulus\Scraper\Scraper;
use kalkulus\Comics\Comic;

$scraper = new Scraper();

$scraper->setParams(array(
	'year' => date("Y"),
	'month' => date("m"),
	'ymd' => date("ymd"),
	'mdy' => date("mdy"),
	'_ymd' => date("Ymd"),
	'y-m-d' => date("Y-m-d")
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
		return "<img alt=\"Garfield\" src=\"http://images.ucomics.com/comics/ga/".$params['year']."/ga".$params['ymd'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "garfield_esp",	
	"url" => "",
	"homepage" => "http://www.garfield.com/",
	"title" => "Garfield Espanol",
	"scraper" => function($url, $params){
		return "<img alt=\"Garfield Espanol\" src=\"http://images.ucomics.com/comics/gh/".$params['year']."/gh".$params['ymd'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "sinfest",	
	"url" => "http://www.sinfest.net",
	"homepage" => "http://www.sinfest.net",
	"title" => "Sinfest",
	"scraper" => function($url, $params){
		return "<img alt=\"Sinfest\" border=0 src=\"http://www.sinfest.net/btphp/comics/".$params['y-m-d'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "licd",	
	"url" => "http://leasticoulddo.com",
	"homepage" => "http://leasticoulddo.com",
	"title" => "Least I Could Do",
	"scraper" => function($url, $params){
		return "<img alt=\"Least I Could Do\" border=0 src=\"http://leasticoulddo.com/wp-content/uploads/".$params['year']."/".$params['month']."/".$params['_ymd'].".gif\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "girlGenius",	
	"url" => "http://www.girlgeniusonline.com",
	"homepage" => "http://www.girlgeniusonline.com",
	"title" => "Girl Genius",
	"scraper" => function($url, $params){
		return "<img src=\"http://www.girlgeniusonline.com/ggmain/strips/ggmain".$params['_ymd'].".jpg\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "iamarg",	
	"url" => "http://amarg.com",
	"homepage" => "http://amarg.com",
	"title" => "I Am Arg",
	"scraper" => function($url, $params){
		return "<img src=\"http://iamarg.com/comics/".$params['y-m-d'].".jpg\" />";
	}
)));

$scraper->addPage(new Comic(array(
	"name" => "cheerUpEmoKid",	
	"url" => "http://www.cheerupemokid.com/",
	"homepage" => "http://www.cheerupemokid.com/",
	"title" => "Cheer Up Emo Kid",
	"scraper" => function($url, $params){
		if (empty($url)){
			return false;
		}

		$page = file($url);
		if (!$page){
			return false;
		}

		$comicDivStarted = false;
		$imgCode = '';
		foreach($page as $line){
			if ($comicDivStarted){				
				$imgCode .= $line;
				if (stristr($line, '/>') !== false){
					return $imgCode;
				}	
			} else {
			    $marker=stristr($line,"comic-area");		    
			    if ($marker!=false){		
			        $comicDivStarted = true;
				}
			}
		}

		return false;
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