	
<?php
if(isset($pero)){
if($pero=="kako se meni neda ovo raditi..."){
if($_SESSION["tip"]==1){
mysql_selectdb("$baza");
	echo "<center>Pregled po nastavnicima<br><hr width=40%>";





/*
$con=mysql_connect(localhost,root,uymklfwd); 
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_selectdb("wwwtvz",$con);
*/

//mysql_selectdb("$baza");

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







	/* echo "<form action=$_SERVER[REQUEST_URI] method=post name=forma1><input type=hidden name=s1><input type=hidden name=s2><input type=hidden name=s3><input type=hidden name=s4><input type=hidden name=s5><input type=hidden name=s6>"; */

	$kveri="SELECT * from osoba where tip<1100 and backup LIKE '%$_SESSION[br_studij]%' order by prezime,ime";
	//echo $kveri;
	$obav12=mysql_query("$kveri");
	echo "<form method=post  action=$_SERVER[REQUEST_URI] ><input type=hidden name=s1 value=nast>";
	if(mysql_num_rows($obav11)){
		echo "<center>Izbor djelatnika:<br/><br><table cellpadding=0 ><tr bgcolor=#e3e1e1><td class=ok>";
		echo " WebSifra ";
		echo "</td><td class=ok>&nbsp;";
		echo " Djelatnik";
		 echo "</td><td class=ok>&nbsp;";
		echo " E-mail ";
		 echo "</td><td class=ok colspan=3>&nbsp;";
		echo " Ukupna norma ";
		echo "</td></tr>";
		for($i=0;$i<mysql_num_rows($obav12);$i++){
			if($i%2==0){
				echo "<tr bgcolor=#d1fffd><td class=ok>";
			}else{
				echo "<tr ><td class=ok>";
			}

			echo mysql_result($obav12,$i,"sifoso");
			echo "</td><td class=ok><b>";
			$sifo=mysql_result($obav12,$i,"sifoso");
			//echo "&nbsp;&nbsp;&nbsp;&nbsp;<a  class=link1 href=\"javascript: getsupport1('nast','$sifo','','','','');\">";

			echo mysql_result($obav12,$i,"tispred");
			echo " ";
			echo mysql_result($obav12,$i,"prezime");
			echo " ";
			echo mysql_result($obav12,$i,"ime");
			echo " ";
			echo mysql_result($obav12,$i,"tiza");
			echo " ";
			//echo "</a>";

			echo "</b></td><td class=ok>";
			echo mysql_result($obav12,$i,"email");
			echo "</td><td class=ok>";
			echo "</td></tr>";
			echo "<tr><td colspan=4>";
						$obav16=mysql_query("SELECT * FROM predmet,zaposlen where predmet.sifpre=zaposlen.sifpred and sifoso=$sifo and sifkat='$_SESSION[studij]' order by sifkat,ime");
						echo "<center><br><br><table width=100% border=0>";

							if(mysql_num_rows($obav16)>0) {
								// ispiši blok tablica
								echo "<table width=100% border=1><tr><td class=ok >&nbsp;</td><td class=ok  colspan=3>Pred (h*gr*tj,S/P)</td><td class=ok  colspan=3>aud. (h*gr*tj,S/P)</td><td class=ok  colspan=3>lab (h*gr*tj,S/P)</td><td class=ok   colspan=3>sem. (h*gr*tj,S/P)</td><td class=ok  colspan=3>kons (h*gr*tj,S/P)</td><td  class=ok colspan=2>br. stud./zak.</td></tr>"; 
							}
						for($j=0;$j<mysql_num_rows($obav16);$j++){
							echo "<tr><td class=ok>";
								echo mysql_result($obav16,$j,"sifkat");
								echo "-";
								echo mysql_result($obav16,$j,"ime");
								$sifp= mysql_result($obav16,$j,"sifpre");
							$obav20=mysql_query("SELECT * FROM opt_tip where pripada<>0 order by redoslijed");
							
							for($k=0;$k<mysql_num_rows($obav20);$k++)
							{
									$krat= mysql_result($obav20,$k,"vrsta");
									$tp= mysql_result($obav20,$k,"tip");
									$obav21=mysql_query("SELECT * FROM opt_unos WHERE predmet=$sifp and sifoso=$sifo and tip=$tp order by vrsta");
										echo "</td><td class=ok >";
									//echo $krat;
									echo "<INPUT type=text maxlength=3 size=2 name=sql0_".$i."_".$k."_".$j." ";
									if(mysql_num_rows($obav21)!=0){
										echo "value=".mysql_result($obav21,0,"iznos");
									}
									echo "><br>";
									echo "<INPUT type=text maxlength=3 size=2 name=sql1_".$i."_".$k."_".$j." ";
									if(mysql_num_rows($obav21)>1){
										echo "value=".mysql_result($obav21,1,"iznos");
									}
									echo ">";
									//echo mysql_result($obav20,$k,"mjera");
									

									if($k==mysql_num_rows($obav20)-1){
										echo "<td class=ok><input type=checkbox name=sql0c_".$i."_".$k."_".$j." ";
										$obavi5=mysql_query("SELECT * FROM opt_unos WHERE predmet=$sifp and sifoso=$sifo order by vrsta");
										if (mysql_num_rows($obavi5)!=0)
										{
											if (mysql_result($obavi5,0,"zakljucan")==1) {echo " checked";};
										}
										echo "/>";
										
										echo "</td></tr>";
									}
									
							}
																				
							echo "";
						}

						$obav21=mysql_query("SELECT * FROM zav_mentor where sifosoba=$sifo");


						echo "</table><br>";


			echo "</td></tr>";
		}

		echo "</table>";

	echo "<input type=\"submit\" class=\"logiraj\" size=\"8\" name=\"Spremi\" value=\"Spremi\">";
echo "</form>";



}








}
}	
}
?>
