<!DOCTYPE html>
<html>
<head>
	<title>Comics Zone</title>
</head>
<style type="text/css">
	tr.comicTitle td {
		text-align: center;
		padding: 5px;
		font-size: 16px;
	    font-weight: bold;
	    background-color: silver;	    
	}

	tr.comicTitle td a {
		color: white;
		text-decoration: none;
		font-family: Verdana;		
	}
  
  tr.comicImg td {
		padding: 10px 0;
		text-align: center;
	}
</style>
<body>
	<table>		
		<?php
			foreach ($comics as $comic) {
				echo "<tr class='comicTitle'><td><a href='".$comic->getHomepage()."'>".$comic->getTitle()."</a></td></tr>\n";
				echo "<tr class='comicImg'><td>".$comic->getImgUrl()."</td></tr>\n";
			}
		?>
	</table>
</body>
</html>