<?php
if(isset($pero))
{
	if($pero=="kako se meni neda ovo raditi...")
	{
		if($_SESSION["tip"]==1)
		{
			mysql_selectdb("$baza");
			echo "<center>Pregled po nastavnicima<br/><hr width=\"40%\">";
			
/* 				echo "<form action=$_SERVER[REQUEST_URI] method=post name=forma1><input type=hidden name=s1><input type=hidden name=s2><input type=hidden name=s3><input type=hidden name=s4><input type=hidden name=s5><input type=hidden name=s6>"; */
			
			$query1="SELECT * FROM osoba WHERE tip<1100 AND backup LIKE '%$_SESSION[br_studij]%' ORDER BY prezime,ime";
			$obavi1=mysql_query("SELECT * FROM osoba WHERE tip<1100 AND backup LIKE '%$_SESSION[br_studij]%' ORDER BY prezime,ime");
			if (mysql_num_rows($obav11)>0)
			{
				echo "<center>Izbor djelatnika (od ".mysql_num_rows($obavi1)."):<br/><table cellpadding=\"0\" border=\"2\"><tr bgcolor=\"#e3e1e1\"><td class=\"ok\"></center>";
				echo " WebSifra ";
				echo "</td><td class=\"ok\">&nbsp;";
				echo " Djelatnik";
				echo "</td><td class=\"ok\">&nbsp;";
				echo " E-mail ";
		 		echo "</td><td class=\"ok\" colspan=\"3\">&nbsp;";
				echo " Ukupna norma ";
				echo "</td></tr>";

				for($i=0;$i<mysql_num_rows($obavi1);$i++)
				{
					if($i%2==0) 
					{
						echo "<tr bgcolor=\"#d1fffd\"><td class=\"ok\">";
					}
					else
					{
						echo "<tr ><td class=ok>";
					}
	
					echo mysql_result($obavi1,$i,"sifoso");
			
					echo "</td><td class=ok><b>";
	
					$sifo=mysql_result($obavi1,$i,"sifoso");
							
					echo mysql_result($obavi1,$i,"tispred");
					echo " ";
					echo mysql_result($obavi1,$i,"prezime");
					echo " ";
					echo mysql_result($obavi1,$i,"ime");
					echo " ";
					echo mysql_result($obavi1,$i,"tiza");
					echo " ";

		
					echo "</b></td><td class=ok>";
					echo mysql_result($obavi1,$i,"email");
					echo "</td><td class=ok>"; //norma
					echo "</td></tr>";
					echo "<tr><td colspan=4>";

					$obavi2=mysql_query("SELECT * FROM predmet,zaposlen where predmet.sifpre=zaposlen.sifpred and sifoso=$sifo and sifkat='$_SESSION[studij]' order by sifkat,ime"); //izvlacimo predmete za dane profe, sifo=258, studij=inf
						//echo $sifo;echo $_SESSION[studij];
					echo "<center><br/><br/><table width=100% border=1>";

					if(mysql_num_rows($obavi2)>0) 
					{
						echo "<table width=100% border=2><tr><td class=ok >&nbsp;</td><td class=ok  colspan=3>Pred (h*gr*tj,S/P)</td><td class=ok  colspan=3>aud. (h*gr*tj,S/P)</td><td class=ok  colspan=3>lab (h*gr*tj,S/P)</td><td class=ok   colspan=3>sem. (h*gr*tj,S/P)</td><td class=ok  colspan=3>kons (h*gr*tj,S/P)</td><td  class=ok colspan=2>broj stud./zaklj.</td></tr>"; 
					} //end if mysql_num_rows(obavi2)
					
					echo "broj predmeta:".mysql_num_rows($obavi2); // broj predmeta
					for($j=0;$j<mysql_num_rows($obavi2);$j++)

					{
						echo "<tr><td class=ok>";
						echo mysql_result($obavi2,$j,"sifkat");
						echo "-";
						echo mysql_result($obavi2,$j,"ime")." ";
						$sifpre=mysql_result($obavi2,$j,"sifre");
						echo "(".$sifpre.")";
						
						$obavi3=mysql_query("SELECT * FROM opt_tip where pripada>0 order by redoslijed");
						
					/* 	echo "<form action=\"javascript: getsupport1('unos','','','','','');\" method=post>"; */
						//echo "<form action=\"unos2.php\" method=\"post\">";
						
						for($k=0;$k<mysql_num_rows($obavi3);$k++)
						{
							$vrsta= mysql_result($obavi3,$k,"vrsta");
							$tp= mysql_result($obavi3,$k,"tip");
							
							$obavi4=mysql_query("SELECT * FROM opt_unos WHERE predmet=$sifpre and sifoso=$sifo and tip=$tp order by vrsta");
							
							echo "</td><td class=ok >";
							echo "<input type=text maxlength=3 size=2 name=\"sql[]\"";
							if(mysql_num_rows($obavi4)!=0)
							{
								echo "value=".mysql_result($obavi4,0,"iznos"); //norma
							}
							echo "><br>";

							echo "<input type=text maxlength=3 size=2 name=\"sql[]\"";
							if(mysql_num_rows($obavi4)>1)
							{
								echo "value=".mysql_result($obavi4,1,"iznos"); //odrzano
							}
							echo ">";
echo $tp;

/*
							if ($tp==110) //checkbox
							{
								echo "<td class=ok><input type=checkbox name=sql[]";
								$obavi5=mysql_query("SELECT * FROM opt_unos WHERE predmet=$sifpre and sifoso=$sifo order by vrsta");
								if (mysql_result($obavi5,0,"zakljucan")==1) {echo " checked";};
								echo "/><br>";
								echo "<input type=checkbox name=sql[]";
								if (mysql_result($obavi5,1,"zakljucan")==1) {echo " checked";};					
								echo "/></td>";
							}
*/
							
							if($k==mysql_num_rows($obavi3)-1)
							{
								echo "</td></tr>";
							}

						} //end for mysql_num_rows($obavi3)

						echo "";
						
					} //end for mysql_num_row($obavi2)
					
					$obavi4=mysql_query("SELECT * FROM zav_mentor where sifosoba=$sifo");
					//echo $obav21;
	
				} //end for mysql_num_rows($obavi1)
				
				echo "</table><br>";
				
				echo "</td></tr>";

			} //end if mysql_num_rows($obav11)>0
		echo "</table>";


	echo "<input type = \"submit\" name=\"Submit\" value = \"Submit\">";
	/*
	mysql_selectdb("$baza");
	$obavi5 = mysql_query("INSERT INTO opt_unos VALUES (godina, tip) VALUES (2004, 1710)");
	if ($obavi5){echo "uspjesnp";}else{echo "nije";}
*/
	echo "</form>";
		} //tip==1

	} //pero==kako mi se ne da
	
} //if(isset)
?>