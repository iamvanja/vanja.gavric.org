<?php
session_start();
?> 

<?php
include "config.php";
include "index.php";

/*
$con=mysql_connect(localhost,root,uymklfwd); 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_selectdb("wwwtvz",$con);
*/

mysql_selectdb("$baza");

$obav11=mysql_query("SELECT * FROM opt_postavke");

$god= mysql_result($obav11,0,"godina");
//echo "Tekuca akademska godina: ".$god." ";
       	
$obavi1=mysql_query("SELECT * FROM osoba WHERE tip<1100 AND backup LIKE '%$_SESSION[br_studij]%' ORDER BY prezime,ime");
//echo "Broj profesora: ".mysql_num_rows($obavi1)."<br /><br />";

if (mysql_num_rows($obavi1)>0)
{
	for($i=0;$i<mysql_num_rows($obavi1);$i++) //broj profesora za dani smjer
	{
		//echo "Sifoso: ".mysql_result($obavi1,$i,"sifoso");
		$sifo=mysql_result($obavi1,$i,"sifoso"); //sifra osobe (sifoso)
		
		$obavi2=mysql_query("SELECT * FROM predmet,zaposlen where predmet.sifpre=zaposlen.sifpred and sifoso=$sifo and sifkat='$_SESSION[studij]' order by sifkat,ime"); //za svakog profa predmeti
		
		//echo " - ".mysql_num_rows($obavi2)." predmeta <br />";
		if(mysql_num_rows($obavi2)>0) 
		{
			for($j=0;$j<mysql_num_rows($obavi2);$j++) //predmeta za profa
			{

				$sifpre=mysql_result($obavi2,$j,"sifre");
				
				$obavi3=mysql_query("SELECT * FROM opt_tip where pripada>0 order by redoslijed");
				
				for($k=0;$k<mysql_num_rows($obavi3);$k++) //16
				{
					$vrsta= mysql_result($obavi3,$k,"vrsta");
					$tp= mysql_result($obavi3,$k,"tip");
					
					$obavi4=mysql_query("SELECT * FROM opt_unos WHERE predmet=$sifpre and sifoso=$sifo and tip=$tp order by vrsta");
					//echo $obavi4."<br>";
					
					
					////// PRVI RED //////
					$sql0=$_POST["sql0_".$i."_".$k."_".$j];		
					if ($sql0) //norma prvi red inputi
					{
						//echo "sql0_".$i."_".$k."_".$j."=".$sql0."<br/> ";	
						$queryD = mysql_query("DELETE FROM opt_unos WHERE godina='$god' AND tip='$tp' AND predmet='$sifpre' AND vrsta='norma' AND sifoso='$sifo'");
						$queryI = mysql_query("INSERT INTO opt_unos VALUES ('$god', '$tp', '$sql0', '$sifpre', 'norma', '$sifo', 0)");
						if ((!$queryD) || (!$queryI)) {die('Pogreska: ' . mysql_error());$uspjeh0=0;} else {$uspjeh0=1;}
						
					}
					
					$sql0c=$_POST["sql0c_".$i."_".$k."_".$j];
					if ($sql0c) //norma prvi red checkbox
					{
						//echo "sql0c_".$i."_".$k."_".$j."=".$sql0c."<br/> ";	
						$queryU = mysql_query("UPDATE opt_unos SET zakljucan=1 WHERE godina=$god AND predmet=$sifpre AND sifoso=$sifo");
						if (!$queryU) {die('Error: ' . mysql_error());$uspjeh0c=0;} else{$uspjeh0c=1;}
					}
					
					
					////// DRUGI RED /////
					$sql1=$_POST["sql1_".$i."_".$k."_".$j];		
					if ($sql1) //odrzano drugi red inputi
					{
						//echo "sql1_".$i."_".$k."_".$j."=".$sql1."<br/> ";	
						$queryD = mysql_query("DELETE FROM opt_unos WHERE godina='$god' AND tip='$tp' AND predmet='$sifpre' AND vrsta='odrzano' AND sifoso='$sifo'");
						$queryI = mysql_query("INSERT INTO opt_unos VALUES ('$god', '$tp', '$sql1', '$sifpre', 'odrzano', '$sifo', 0)");
						if ((!$queryD) || (!$queryI)) {die('Pogreska: ' . mysql_error());$uspjeh1=0;} else {$uspjeh1=1;}
						//echo $uspjeh1;
					}
					
/*
					$sql1c=$_POST["sql1c_".$i."_".$k."_".$j];
					if ($sql1c) //odrzano drugi red checkbox
					{
						//echo "sql1c_".$i."_".$k."_".$j."=".$sql1c."<br/> ";	
						$queryU = mysql_query("UPDATE opt_unos SET zakljucan=1 WHERE tip=$tp AND godina=$god AND predmet=$sifpre AND vrsta='odrzano' AND sifoso=$sifo");
						if (!$queryU) {die('Error: ' . mysql_error());$uspjeh1c=0;} else{$uspjeh1c=1;} 
					}
*/
					

					


					
				}
			}
		}
					
	}
}
if (($uspjeh0)&&($uspjeh0c)&&($uspjeh1)&&($uspjeh1c)){echo "<center>Obavljeno!<br />";}
echo "<a href=\"index.php\">Povratak</a></center>";

?>