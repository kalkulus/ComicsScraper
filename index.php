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

$comics['gpf'] = new Comic(array(
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
				   return "<img onerror=\"this.src='images/comix-zone.jpg'\" src=\"http://www.gpf-comics.com/comics/gpf".$tmp[0];
		        }
	    	}
		}

		return false;
	}
));

$comics['garfield_es'] = new Comic(array(
        "name" => "garfield_esp",
        "url" => "http://www.gocomics.com/espanol/garfieldespanol",
        "homepage" => "http://www.gocomics.com/espanol/garfieldespanol",
        "title" => "Garfield Espanol",
        "scraper" => function($url, $params){
                if ($garfieldes = file($url)){
                        foreach($garfieldes as $bufer){
                                $lnk = stristr($bufer,"item-comic-image");
                                if ($lnk!=false){
                                        return "<img onerror=\"this.src='images/comix-zone.jpg'\" ".$lnk;
                                }
                        }
                }

                return false;

        }
));

$comics['garfield'] = new Comic(array(
	"name" => "garfield",	
	"url" => "",
	"homepage" => "http://www.garfield.com/",
	"title" => "Garfield",
	"scraper" => function($url, $params){		
		return "<img onerror=\"this.src='images/comix-zone.jpg'\" alt=\"Garfield\" src=\"https://d1ejxu6vysztl5.cloudfront.net/comics/garfield/".$params['year']."/".$params['y-m-d'].".gif\" width=\"600\" />";
	}
));

$comics['sinfest'] = new Comic(array(
	"name" => "sinfest",	
	"url" => "http://www.sinfest.net",
	"homepage" => "http://www.sinfest.net",
	"title" => "Sinfest",
	"scraper" => function($url, $params){
		return "<img onerror=\"this.src='images/comix-zone.jpg'\" alt=\"Sinfest\" border=0 src=\"http://www.sinfest.net/btphp/comics/".$params['y-m-d'].".gif\" />";
	}
));

$comics['licd'] = new Comic(array(
	"name" => "licd",	
	"url" => "http://leasticoulddo.com",
	"homepage" => "http://leasticoulddo.com",
	"title" => "Least I Could Do",
	"scraper" => function($url, $params){
		return "<img onerror=\"this.src='images/comix-zone.jpg'\" alt=\"Least I Could Do\" border=0 src=\"http://leasticoulddo.com/wp-content/uploads/".$params['year']."/".$params['month']."/".$params['_ymd'].".jpg\" />";
	}
));

$comics['glasbergen'] = new Comic(array(
	"name" => "glasbergen",	
	"url" => "http://www.glasbergen.com",
	"homepage" => "http://www.glasbergen.com",
	"title" => "Glasbergen",
	"scraper" => function($url){
		if ($glasbergen = file($url)){
			$next = false;
			foreach($glasbergen as $bufer){
				if ($next){
					return "<img onerror=\"this.src='images/comix-zone.jpg'\"".$bufer.">";
					break;
				};
				$lnk = stristr($bufer,"ngg-singlepic");
				if ($lnk!=false){
					$next = true;
					continue;					
				}
			}
		}

		return false;
	}
));

$comics['gg'] = new Comic(array(
	"name" => "girlGenius",	
	"url" => "http://www.girlgeniusonline.com",
	"homepage" => "http://www.girlgeniusonline.com",
	"title" => "Girl Genius",
	"scraper" => function($url, $params){
		return "<img onerror=\"this.src='images/comix-zone.jpg'\" src=\"http://www.girlgeniusonline.com/ggmain/strips/ggmain".$params['_ymd'].".jpg\" />";
	}
));

$comics['iamarg'] = new Comic(array(
	"name" => "iamarg",	
	"url" => "http://iamarg.com",
	"homepage" => "http://iamarg.com",
	"title" => "I Am Arg",
	"scraper" => function($url, $params){
		return "<img onerror=\"this.src='images/comix-zone.jpg'\" src=\"http://iamarg.com/comics/".$params['y-m-d'].".jpg\" />";
	}
));

$comics['cheerupemokid'] = new Comic(array(
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
					$line_exploded = explode('/>', $line);
					return $line_exploded[0].'/>';
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
));

$comics['dilbert'] = new Comic(array(
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

$comics['upto4players'] = new Comic(array(
	"name" => "upto4players",	
	"url" => "http://www.uptofourplayers.com/",
	"homepage" => "http://www.uptofourplayers.com/",
	"title" => "Up to Four players",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		$page = file($url);
		if (!$page){
			return false;
		}

		$comicDivStarted = false;		
		foreach($page as $line){
			if ($comicDivStarted){								
				$tmp = explode('/>', $line);
				return $tmp[0].'/>';				
			} else {
			    $marker=stristr($line,'div id="comic"');
			    if ($marker!=false){		
			        $comicDivStarted = true;
				}
			}
		}

		return false;
	}
));

$comics['blicStrip'] = new Comic(array(
	"name" => "blicStrip",	
	"url" => "http://www.blic.rs",
	"homepage" => "http://www.blic.rs",
	"title" => "Blic Strip",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		$blic=fopen($url,"r");
		while (!feof($blic)){			
		    $bufer=fgets($blic,4096);
		    $lnk=stristr($bufer,'http://www.blic.rs/blicstrip');
		    if ($lnk!=false){
		    	$e = explode('"', $lnk);
				$blicStrip = fopen($e[0], "r");
				while (!feof($blicStrip)){
				    $bufer=fgets($blicStrip,4096);
				    $lnk=stristr($bufer,'class="mainPhotoImg"');
				    if ($lnk!=false){
				    	$lnk = str_replace("//", "http://", $lnk);
				    	return "<img ".$lnk;
				    }
		    	}
				break;
		    }		    
	    }		
		fclose($blic);

		return false;
	}
));

$comics['lfg'] = new Comic(array(
	"name" => "lookingForGroup",	
	"url" => "http://www.lfg.co/latest-comic/",
	"homepage" => "http://www.lfgcomic.com/",
	"title" => "Looking For Group",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		$lfg=fopen($url,"r");
		$next = false;
		while (!feof($lfg)){
		    $bufer=fgets($lfg,4096);
		    if($next){		
				return $bufer;
		        break;
		    }

		    $lnk=stristr($bufer,'class="tda-peek"');
		    if ($lnk!=false){
				$next = true;
				continue;
		    }					    
		}
		fclose($lfg);
		return false;
	}
));

$comics['menageA3'] = new Comic(array(
	"name" => "menageA3",	
	"url" => "http://www.ma3comic.com/",
	"homepage" => "http://www.ma3comic.com/",
	"title" => "Menage a 3",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		if ($ma3 = file($url)){
			foreach($ma3 as $bufer){
		        $lnk=strpos($bufer,'cc-comic');
		        if ($lnk!=false){
	                return $bufer;
	                break;
		        }
			}
		}
		fclose($ma3);
		return false;
	}
));

$comics['cad'] = new Comic(array(
	"name" => "cad",	
	"url" => "http://www.cad-comic.com/cad/",
	"homepage" => "http://www.ctrlaltdel-online.com",
	"title" => "CTRL ALT DEL",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		if ($cad = file($url)){
			foreach($cad as $bufer){
				$lnk = strpos($bufer,"/comics/");
				if ($lnk != false){
					$tmp = explode('<',$bufer);
					return "<img onerror=\"this.src='images/comix-zone.jpg'\" ".$tmp[0];
					break;
				}
			}
		}
		fclose($cad);
		return false;
	}
));

$comics['cad_sillies'] = new Comic(array(
	"name" => "cad_sillies",	
	"url" => "http://www.cad-comic.com/sillies/",
	"homepage" => "http://www.cad-comic.com/sillies/",
	"title" => "CTRL ALT DEL",
	"scraper" => function($url){
		if (empty($url)){
			return false;
		}

		if ($cads = file($url)){
			foreach($cads as $bufer){
				$lnk = strpos($bufer,"/comics/");
				if ($lnk != false){
					$tmp = explode('<',$bufer);
					return "<img onerror=\"this.src='images/comix-zone.jpg'\" ".$tmp[0];
					break;
				}
			}
		}
		fclose($cads);
		return false;
	}
));

$active = [
'gpf',
'garfield_es',
'garfield',
'sinfest',
'licd',
'glasbergen',
'dilbert',
'blicStrip',
'menageA3',
'lfg',
'cheerupemokid',
'upto4players'
];

foreach ($active as $comic_name) {
	$scraper->addPage($comics[$comic_name]);
}

$scraper->show();