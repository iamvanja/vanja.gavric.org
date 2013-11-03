<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr-HR">
<head>
	<title>Zadatak za natječaj Front-End Engineer (ReversingLabs)</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="googlebot" content="noarchive, nofollow">
	
	<link href='css/natjecaj.css' rel='stylesheet' type='text/css' media="screen" />
  
	<script src="javascript/jquery-1.6.min.js" type="text/javascript"></script>		
	<script src="javascript/general.js" type="text/javascript" charset="utf-8"></script>
	
</head>
	
<body>
<div id="container">
	<h1 class="tc">Zadatak za natječaj Front-End Engineer (ReversingLabs)</h1>

	<div class="survey">
		<div id="" class="item">
			<p>
				Ovo je rješenje zadatka. Od tehnologija je korišten PHP (za čitanje direktorija u kojem se nalaze CSV-i) i pripremu HTML-a, a učitavanje odrađuje JavaScript (jQuery). Prvih 5 CSV-a se automatski učitava kod učitavanja stranice (broj je moguće promijeniti jednostavnom promijenom argumenta) dok se ostali dokumenti učitavaju prilikom scrolla, odnosno resizanja prozora.
				<br />Autor: <a href="http://vanja.gavric.org/" target="_blank">Vanja Gavrić</a>.
			</p>
		</div>
		<div id="files">
			<!-- <h2 style="text-align:center;">Loading...</h2> -->
			<?php 
				$string="";
				$fileCount=0;
				
				
				$filePath='csv/'; # Specify the path you want to look in. 
				$dir = opendir($filePath); # Open the path
				$names = array();
				
				while ($file = readdir($dir)) { 
				  if (eregi("\.txt",$file)) { # Look at only files with a .txt extension
					$names[] = $file;
				  }
				}
				
				sort($names);
				
				foreach ($names as &$value) {
				    //$fileCount = sprintf("%03d",$fileCount);
				    $string .= '<div id="f_'.$fileCount.'" class="item lazy" rel="'.$names[$fileCount].'"><h3>'.$names[$fileCount].'</h3><div class="question border7"><div class="text">Loading...</div></div></div> ' ;
				    $fileCount++;
				}
			
				
				
				if ($fileCount > 0) {
				  echo sprintf("%s",$string);
				}
				else {echo ("Nema CSV datoteka!");}
			?>
		</div>
		</div>
	</div>
	
</div>
</body>
</html>