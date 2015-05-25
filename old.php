<html>
<head>
       <title>[Comics ZONE]</title>
</head>
<body bgcolor=white color=black link=white alink=white vlink=white>
<?

set_time_limit(60);

//*********************
// socket verzija za konekcije preko proksija
//*********************

//$proxy="proxy.tmf.bg.ac.yu";
//$proxy="proxy.etf.bg.ac.yu";
//$proxy = "196.30.121.238";
$proxy = "161.116.153.5";
//$port = 80;
$port = 8080;

//$comics=array("uf","gpf","lfi","garfield","sinfest","glasbergen");
//$comics=array("gpf","lfi","garfield","sinfest","glasbergen","ctrl_alt_del","phd","applegeeks","mota","vg_cats");
$comics=array(
"gpf", //
"garfield", //
"garfield_esp", //
"sinfest", //
"licd", //
"glasbergen", //
"ctrl_alt_del", //
"cad_sillies", //
"lfg", //
"gg", //
"blic", //
//"oglaf",
"ma3", //
"arg", //
"bloop",
//"wtd",
//"phd",
"dilbert", //
"vg_cats");

//ime stripa i link
//$top[uf]="<a href=\"http://www.userfriendly.org/\"><b>User Friendly the Comic Strip</b></a>";
$top[gpf]="<a href=\"http://www.gpf-comics.com/\"><b>General Protection Fault--The Comic Strip</b></a>";
//$top[lfi]="<a href=\"http://www.lostandfoundcomic.com/\"><b>Lost &amp; Found Investigations</b></a>";
$top[garfield]="<a href=\"http://www.garfield.com/\"><b>Garfield</b></a>";
$top[garfield_esp]="<a href=\"http://www.garfield.com/\"><b>Garfield</b></a>";
$top[sinfest]="<a href=\"http://www.sinfest.net/\"><b>Sinfest</b></a>";
$top[glasbergen]="<a href=\"http://www.glasbergen.com\"><b>Glasbergen</b></a>";
$top[ctrl_alt_del]="<a href=\"http://www.ctrlaltdel-online.com\">CTRL_ALT_DEL</a>";
$top[cad_sillies]="<a href=\"http://www.cad-comic.com/sillies/\">CTRL_ALT_DEL Sillies</a>";
$top[phd]="<a href=\"http://www.phdcomics.com/\">Piled Higher and Deeper</a>";
$top[applegeeks]="<a href=\"http://www.applegeeks.com/\">Appleeeks</a>";
$top[applegeekslite]="<a href=\"http://www.applegeeks.com/lite/\">Applegeeks Lite</a>";
$top[mota]="<a href=\"http://mastersoftheart.com/\">Masters Of The Art</a>";
$top[vg_cats]="<a href=\"http://www.vgcats.com/comics/\">VG Cats</a>";
$top[dilbert]="<a href=\"http://www.dilbert.com/strips/\">Dilbert</a>";
//$top[dilbert_es]="<a href=\"http://www.unitedmedia.com/spanish/dilbert/\">Dilbert Espanol</a>";
$top[licd]="<a href=\"http://www.leasticoulddo.com/\">Least I Could Do</a>";
$top[lfg] = "<a href=\"http://lfgcomic.com/\">Looking For Group</a>";
$top[blic] = "<a href=\"http://www.blic.rs/Strip\">Blic</a>";
$top[cab] = "<a href=\"http://www.shoeboxblog.com/?cat=1279\">Shoebox: Chuck & Beans</a>";
$top[wtd] = "<a href=\"http://www.whattheduck.net/\">What The Duck</a>";
$top[oglaf] = "<a href=\"http://oglaf.com/\">Oglaf</a>";
$top[roosterteeth] = "<a href=\"http://roosterteeth.com/comics/today.php/\">Rooster Teeth<a/>";
$top[gg] = "<a href=\"http://www.girlgeniusonline.com/comic.php\">Girl Genius</a>";
$top[ma3] = "<a href=\"http://www.ma3comic.com/\">Menage a 3</a>";
$top[arg] = "<a href=\"http:\/\/iamarg.com\">I am ARG!</a>";
$top[bloop] = "<a href='http://jhallcomics.com/Bloop/'>Bloop</a>";


//postavljanje datuma  i slicno
$god=date("Y");
$mes=date("m");
$godmesdan=date("ymd");
$mesdangod=date("mdy");
$danas=date("Ymd");
$sfdatum=date("Y-m-d");


if($gpfcomics = file("http://www.gpf-comics.com/")){
//while (!feof($gpfcomics)){
//while($bufer=fgets($gpfcomics,4096)){
foreach($gpfcomics as $bufer){
    $lnk=stristr($bufer,"/comics/gpf");
    if ($lnk!=false){
	   $tmp = explode("/comics/gpf",$bufer);
	   $tmp = explode("<br",$tmp[1]);
	   $link[gpf]="<img src=\"http://www.gpf-comics.com/comics/gpf".$tmp[0];
       break;
       }
    }
if ($link[gpf]===false){ $link[gpf]="Doshlo je do greshke pri prikazivanju slike"; }

}



if(0 && $lostfound = file("http://www.lostandfoundcomic.com/")){
//while (!feof($lostfound)){
foreach($lostfound as $bufer){
 //   $bufer=fgets($lostfound,4096);
    $lnk=stristr($bufer,"<IMG ALT=\"comic\" BORDER=0 SRC=\"");
    if ($lnk!=false){
        /*
        $pocpoz=strpos($lnk,$god);
        $slika=substr($lnk,$pocpoz,14);
        $link[lfi]="<IMG alt=\"Lost &amp; Foun Investigations\" BORDER=0 SRC=\"http://www.lostandfoundcomic.com/comics/".$slika."\" >";
        */
$tmp=explode(">",$lnk);
$tmp=explode("SRC=\"",$tmp[0]);
$link[lfi]="<IMG alt=\"Lost &amp; Foun Investigations\" border=0 src=\"http://www.lostandfoundcomic.com".$tmp[1]." />";
break;}
    }
if ($link[lfi]===false){ $link[lfi]="Doshlo je do greshke pri prikazivanju slike"; }
//fclose($lostfound);
}


//garfield
$link[garfield]="<img alt=\"Garfield\" src=\"http://images.ucomics.com/comics/ga/".$god."/ga".$godmesdan.".gif\" />";
$link[garfield_esp]="<img alt=\"Garfield\" src=\"http://images.ucomics.com/comics/gh/".$god."/gh".$godmesdan.".gif\" />";


//sinfest
$type = "gif";
$link[sinfest]="<img alt=\"Sinfest\" border=0 src=\"http://www.sinfest.net/btphp/comics/".$sfdatum.".".$type."\" />";


//lcid
//$link[licd] = "<img alt=\"Least I Could Do\" border=0 src=\"http://cdn.leasticoulddo.com/comics/".$danas.".gif\" />";
$link[licd] = "<img alt=\"Least I Could Do\" border=0 src=\"http://leasticoulddo.com/wp-content/uploads/".$god."/".$mes."/".$danas.".gif\" />";


//glasbergen
//$link[glasbergen]="<img alt=\"glasbergen\" border=0 src=\"http://www.glasbergen.com/images/toon.gif\" />";
if ($glasbergen = file("http://www.glasbergen.com")){
	foreach($glasbergen as $bufer){
		$lnk = stristr($bufer,"ngg-singlepic");
		if ($lnk!=false){
			$tmp = explode('>',$lnk);
			$link['glasbergen'] = '<img class="'.$tmp[0];
		}

	}

}

//crtl_alt_del
if ($cad = file("http://www.cad-comic.com/cad/")){
	foreach($cad as $bufer){
		$lnk = strpos($bufer,"/comics/");
		if ($lnk != false){
			$tmp = explode('<',$bufer);
			$link[ctrl_alt_del]='<img '.$tmp[0];
			break;
		}
	}
}

//cad_sillis
if ($cads = file("http://www.cad-comic.com/sillies/")){
	foreach($cads as $bufer){
		$lnk = strpos($bufer,"/comics/");
		if ($lnk != false){
			$tmp = explode('<',$bufer);
			$link[cad_sillies]='<img '.$tmp[0];
			break;
		}
	}
}
//$link[ctrl_alt_del]="<img alt=\"ctrl_alt_del\" border=0 src=\"http://www.cad-comic.com/comics/cad/".$danas.".jpg\" />";



/*if($phdcomic = file("http://www.phdcomics.com/comics.php")){
//while (!feof($phdcomic)){
//    $bufer=fgets($phdcomic,4096);
foreach($phdcomic as $bufer){
    $lnk=stristr($bufer,"archive/");
    if ($lnk!=false){
//        $slika=substr($lnk,$pocpoz,14);
//        $link[lfi]="<IMG alt=\"Lost &amp; Foun Investigations\" BORDER=0 SRC=\"http://www.lostandfoundcomic.com/comics/".$slika."\" >";
        
	$tmp=explode("border=5 align=top>",$lnk);
	$tmp=explode("archive/",$tmp[0]);
	$link[phd]="<img alt=\"Piled Higher and Deeper\" border=0 src=http://www.phdcomics.com/comics/archive/".$tmp[1]." ";
	break;}
    }
if ($link[phd]===false){ $link[phd]="Doshlo je do greshke pri prikazivanju slike"; }
//fclose($phdcomic);
}
*/

//applegeeks
if($applegeeks = file("http://www.applegeeks.com/")){
//while (!feof($applegeeks)){
//    $bufer=fgets($applegeeks,4096);
foreach($applegeeks as $bufer){
    $lnk=stristr($bufer,"comic\"><img src=\"/comics/issue");
    if ($lnk!=false){
        $tmp=explode("\" width",$lnk);
$tmp=explode("src=\"",$tmp[0]);
$link[applegeeks]="<img alt=\"aplegeeks\" border=0 src=\"http://www.applegeeks.com".$tmp[1]."\" />";
break;}
    }
if ($link[applegeeks]===false){ $link[applegeeks]="Doshlo je do greshke pri prikazivanju slike"; }
//fclose($applegeeks);
}

//looking for group
$lfg=fopen("http://www.lfgcomic.com/latest-comic/","r");
$next = false;
while (!feof($lfg)){
    $bufer=fgets($lfg,4096);
    $lnk=stristr($bufer,'id="comic"');
    if ($lnk!=false){
	$next = true;
	continue;
    }
	
    if($next){
/*	$lnk = explode('http://www.lfgcomic.com/page/',$bufer);
	$lurl = explode('/',$lnk[1]);
	
	$latest = file_get_contents('http://www.lfgcomic.com/page/'.$lurl[0]);

	preg_match('~<img width="700" height="1000" src="([^"]+)"~',$latest,$match);
        $link[lfg]=$match[0]." alt=\"Looking for group\" />";
*/
	$link[lfg] = $bufer;
        break;
    }
}
if ($link[lfg]===false){ $link[lfg]="Doshlo je do greshke pri prikazivanju slike"; }
fclose($lfg);

//BLIC Strip
$blic=fopen("http://www.blic.rs/Strip","r");
while (!feof($blic)){
    $bufer=fgets($blic,4096);
    preg_match("~(data/files/[^>]+\.jpg)\" title=\"Strip broj[^>]+~",$bufer,$lnk);
    if (!empty($lnk)){
        $link[blic]="<img src=\"http://www.blic.rs/".$lnk[1]."\">";
        break;}
    }
if ($link[blic]===false){ $link[blic]="Doshlo je do greshke pri prikazivanju slike"; }
fclose($blic);

//masters of the art
/*
if($mota=fsockopen($proxy,$port))
{
fputs($mota,"GET http://mastersoftheart.com/ HTTP/1.0\r\n\r\n");

while (!feof($mota)){
    $bufer=fgets($mota,4096);
    $lnk=stristr($bufer,"<img src=\"images/comics/comic");
    if ($lnk!=false){
        $tmp=explode("\" height",$lnk);
$tmp=explode("src=\"",$tmp[0]);
$link[mota]="<img alt=\"mota\" border=0 src=\"http://mastersoftheart.com/".$tmp[1]."\" />";
break;
}
    }
if ($link[mota]===false){ $link[mota]="Doshlo je do greshke pri prikazivanju slike"; }
fclose($mota);
}
*/



//VG Cats
/*if($vg_cats=fsockopen($proxy,$port))
{
fputs($vg_cats,"GET http://www.vgcats.com/comics/ HTTP/1.0\r\n\r\n");

while (!feof($vg_cats)){
    $bufer=fgets($vg_cats,4096);
*/
if($vg_cats = file("http://www.vgcats.com/comics/")){
foreach($vg_cats as $bufer){
    $lnk=stristr($bufer,"<img src=\"images");
    if ($lnk!=false){
        $tmp=explode("\" width",$lnk);
$tmp=explode("src=\"",$tmp[0]);
$link[vg_cats]="<img alt=\"vg_cats\" border=0
src=\"http://www.vgcats.com/comics/".$tmp[1]."\" />";
break;
}
    }
if ($link[vg_cats]===false){ $link[vg_cats]="Doshlo je do greshke pri prikazivanju slike"; }
//fclose($vg_cats);
}


// dilbert
if($dilbert = file("http://www.dilbert.com/strips/")){
foreach($dilbert as $bufer){
    $lnk=strpos($bufer,"img-responsive img-comic");
    if ($lnk!=false){
//        $tmp=explode("src=",$bufer);
//        $tmp=explode('"',$tmp[1]);
        $link[dilbert]=$bufer;
        break;
}
}
}

// Chuck & Beans
if ($cab = file("http://www.shoeboxblog.com/?cat=1279")){
$comic_line = false;
foreach($cab as $bufer){
	if ($comic_line){
		$tmp=explode("src",$bufer);
		$tmp=explode(">",$tmp[1]);
		$link[cab]='<img src'.$tmp[0].'>';
		break;
	}
	$lnk=stristr($bufer,"post_content");
	if ($lnk!=false){
		$comic_line = true;
		continue;
	}
}
}

// What The Duck
if ($wtd = file("http://www.whattheduck.net")){
foreach($wtd as $bufer){
	$lnk=stristr($bufer,'<div><img src="/sites/default/files');
	if ($lnk!=false){
		$tmp=explode("src=\"",$bufer);
		$tmp=explode("</div>",$tmp[1]);
		$link[wtd]='<img alt="What The Duck" src="http://www.whattheduck.net'.$tmp[0];
		break;
	}
}
}

// Oglaf
if ($oglaf = file("http://oglaf.com")){
file_put_contents('oglaf_dump',$oglaf);
foreach($oglaf as $bufer){
	$lnk=stristr($bufer,'<img id="strip');
	// <img id="strip" src="http://media.oglaf.com/comic/shaft_of_drama.jpg" alt="let&#39;s just communicate in grunts and whimpers." title="I hate arguing with my dildo, but I love the make-up sex." /></b>
	if(preg_match('~<img id="strip" src="[^>]+>"~',$bufer,$m)){
		var_dump($m);
	}
/*	if ($lnk!=false){
echo $lnk;
		$tmp=explode("src=\"",$bufer);
		$tmp=explode("</b>",$tmp[1]);
		$link[oglaf]='<img src="'.$tmp[0];
		break;
	}*/
}
}

// Rooster Teeth
if ($rt = file("http://roosterteeth.com/comics/today.php")){
foreach($rt as $bufer){
	$lnk=stristr($bufer,"max-width:575px;'");
	if ($lnk!=false){
		$tmp=explode("src='",$bufer);
		//$tmp=explode("</b>",$tmp[1]);
		$link[roosterteeth]='<img src=\''.$tmp[1];
		break;
	}
}
}

// Applegeeks Lite
/*if ($agl = file("http://www.applegeeks.com/lite/")){
foreach($agl as $bufer){
	$lnk=stristr($bufer,"strips/aglite");
	if ($lnk!=false){
		$tmp=explode("strips",$bufer);
		$link[applegeekslite]="<img src=\"http://www.applegeeks.com/lite/strips".$tmp[1];
		break;
	}
}
}
*/

$link[gg]="<img src=\"http://www.girlgeniusonline.com/ggmain/strips/ggmain".$danas.".jpg\" />";

// Menage a 3
if ($ma3 = file("http://www.ma3comic.com/")){
foreach($ma3 as $bufer){
        $lnk=strpos($bufer,'938');
        if ($lnk!=false){
                $link[ma3]=$bufer;
                break;
        }
}
}

$link[arg]="<img src=\"http://iamarg.com/comics/".$sfdatum.".jpg\" />";

/*
if($dilbert_es = file("http://www.unitedmedia.com/spanish/dilbert/")){
foreach($dilbert_es as $bufer){
    $lnk=strpos($bufer,"archive/images/dilbert");
    if ($lnk!=false){
        $tmp=explode("SRC=",$bufer);
        $tmp=explode('"',$tmp[1]);
        $link[dilbert_es]="<IMG alt=\"Dilbert Espanol\" border=0 src=\"http://www.unitedmedia.com".$tmp[1]."\" />";
        break;
}
}
}
*/

// Bloop
if ($bloop = file("http://jhallcomics.com/bloop/")){
foreach($bloop as $bufer){
        $lnk=strpos($bufer,'comic/public');
        if ($lnk!=false){
		$tmp = explode('src="', $bufer);
                $link[bloop]='<img src="http://jhallcomics.com'.$tmp[1];
                break;
        }
}
}


?>

<table name="comics" cellspacing="0" cellpadding="0">
<tr><td>
<? $rodjusi=shell_exec('/home/kalkulus/www/comics/rodj.pl'); 
echo "<pre>$rodjusi\n\n</pre>"; ?>
</td></tr>
<tr><td>
<?
//$drupal=shell_exec('/users/etf/kalkulus/www/dp_back');
//echo $drupal;
?>
</td></tr>
<?
reset ($comics);
while (list($key, $value) = each ($comics))
//while ($comic=each($comics))
      {
        echo "<tr><td align=center valign=middle BGCOLOR=\"green\"><font size=\"-1\" face=\"arial\">$top[$value]</font><br></td></tr>\n";
        echo "<tr><td align=center><br>$link[$value]<br><br></td></tr>\n";
       }


?>

</table>
</body>
</html>
