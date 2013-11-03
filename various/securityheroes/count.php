<?php 

// $directory = "csv/";
// // $folder=dir("./csv");
// if (glob($directory . "*.txt") != false)
// {
//  $filecount = count(glob($directory . "*.txt"));
//  echo $filecount;
// }
// else
// {
//  echo 0;
//}

// while($folderEntry=$folder->read())
// {
// echo $folderEntry.", ";
// }
// $folder->close();

?>

<?php 
	$string="";
	$fileCount=0;
	$filePath='csv/'; # Specify the path you want to look in. 
	$dir = opendir($filePath); # Open the path
	while ($file = readdir($dir)) { 
	  if (eregi("\.txt",$file)) { # Look at only files with a .php extension
	    $string .= "$file, ";
	    $fileCount++;
	  }
	}
	if ($fileCount > 0) {
	  echo sprintf("<div id='total'>%s</div><div id='filenames'>%s</div>", $fileCount,$string);
	}
	else {echo ($filePath." ".$string." ".$fileCount);}
?>