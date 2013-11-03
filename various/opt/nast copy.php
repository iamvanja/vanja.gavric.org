	
<?php
if(isset($pero)){
if($pero=="kako se meni neda ovo raditi..."){
if($_SESSION["tip"]==1){
mysql_selectdb("$baza");
	echo "<center>Pregled po nastavnicima<br><hr witdth=40%>";





/* 	echo "<form action=$_SERVER[REQUEST_URI] method=post name=forma1><input type=hidden name=s1><input type=hidden name=s2><input type=hidden name=s3><input type=hidden name=s4><input type=hidden name=s5><input type=hidden name=s6>"; */

	$kveri="SELECT * from osoba where tip<1100 and backup LIKE '%$_SESSION[br_studij]%' order by prezime,ime";
	//echo $kveri;
	$obav12=mysql_query("$kveri");
	echo "<form method=post  action=unos2.php >";
	if(mysql_num_rows($obav11)){
		echo "<center>Izbor djelatnika:<br><table cellpadding=0 ><tr bgcolor=#e3e1e1><td class=ok>";
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
						echo "<center><br><br><table width=100% border=1>";

							if(mysql_num_rows($obav16)>0) {
								// ispiši blok tablica
								echo "<table width=100% border=2><tr><td class=ok >&nbsp;</td><td class=ok  colspan=3>Pred (h*gr*tj,S/P)</td><td class=ok  colspan=3>aud. (h*gr*tj,S/P)</td><td class=ok  colspan=3>lab (h*gr*tj,S/P)</td><td class=ok   colspan=3>sem. (h*gr*tj,S/P)</td><td class=ok  colspan=3>kons (h*gr*tj,S/P)</td><td  class=ok >broj stud.</td></tr>"; 
							}
						for($j=0;$j<mysql_num_rows($obav16);$j++){
							echo "<tr><td class=ok>";
								echo mysql_result($obav16,$j,"sifkat");
								echo "-";
								echo mysql_result($obav16,$j,"ime");
								$sifp= mysql_result($obav16,$j,"sifpre");
							$obav20=mysql_query("SELECT * FROM opt_tip where pripada<>0 order by redoslijed");
							
							for($k=0;$k<mysql_num_rows($obav20);$k++){
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

	echo "<input type=submit value=submit />";
echo "</form>";



}








}
}	
}
?>
