<?php
session_start();
?>	
<html>
<head> 	
<?php
$vernet ="0.1";
$faksweb ="(c)2006";
$pero="kako se meni neda ovo raditi...";
include "config.php";

if(!isset($_SESSION["sifoso"])){
// default stanje
	$_SESSION["sifoso"]=0;
	$_SESSION["potpis"]="";
	$_SESSION["tip"]=0;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250; no-cashe; no-cache">
<meta http-equiv="Author" content="Davor Cafuta davor.cafuta@tzk.fer.hr">
<meta http-equiv="Keywords" content="<?php echo $keyword ?>">
<meta http-equiv="Description" content="<?php echo $puno_ime ?>>
<meta http-equiv="Language" content="hr">
<title><?php echo $puno_ime ?></title> 
<LINK REL="stylesheet"  TYPE="text/css" HREF="stil.php" >


<SCRIPT LANGUAGE="JavaScript" type="text/javascript" >
<function getsupport1(t1,t2,t3,t4,t5,t6) 
{ 
document.forma.s1.value = t1; 
document.forma.s2.value = t2; 
document.forma.s3.value = t3; 
document.forma.s4.value = t4;
document.forma.s5.value = t5;
document.forma.s6.value = t6;
document.forma.submit(); 
} 
</script>

</head>
<body>
<?php
//glavno otvaranje i IP KONTROLA
$link1=mysql_connect($baza_ip,$baza_login,$baza_pass);
mysql_query("SET CHARACTER SET 'cp1250'", $link1);
mysql_selectdb($baza,$link1);
// $prijenos=$_SERVER["REMOTE_ADDR"];
// $obav11=mysql_query("SELECT * FROM opt_ip WHERE ip='$prijenos'");
// if(mysql_num_rows($obav11)!=0){

//login
	if(isset($_POST['odjava'])){
	        $_SESSION["sifoso"]=0;
        	$_SESSION["potpis"]="";
		$_SESSION["tip"]=0;
	}
        if(isset($_POST['login'])){
                $login=$_POST["login"];
                $passwd=$_POST["passwd"];
                $obav11=mysql_query("SELECT * FROM opt_dozvole,osoba where opt_dozvole.sifoso=osoba.sifoso and login='$login' and webpass='$passwd' and opt_dozvole.sifkat='$_POST[studij]'");
echo mysql_error();
		$sif_o=0;
			if(mysql_num_rows($obav11)!=0){
                       		$_SESSION["sifoso"]=mysql_result($obav11,0,"sifoso");
                        	$potpis=mysql_result($obav11,0,"tispred");
                        	$potpis=$potpis . " " . mysql_result($obav11,0,"ime");
                        	$potpis=$potpis ." ". mysql_result($obav11,0,"prezime");
                        	$potpis=$potpis . " ".mysql_result($obav11,0,"tiza")."</a>";
                        	$_SESSION["potpis"]=$potpis;
				$_POST["s1"]="nast";
				$_POST["s2"]="";
				$_POST["s3"]="";
				$_POST["s4"]="";
				$_POST["s5"]="";
				$_POST["s6"]="";
				$_SESSION["tip"]=1;			
				$_SESSION["studij"]=$_POST["studij"];			
				$_SESSION["write"]=mysql_result($obav11,0,"write");	
                $obav11=mysql_query("SELECT * FROM studij where sifkate='$_POST[studij]'");
				$_SESSION["br_studij"]=mysql_result($obav11,0,"tezina");									
			}else{
				echo "<br><br><center><b>Nije Vam omogućen pristup obratite se administratoru";
			}
 	}
	if($_SESSION["sifoso"]==0){
?>
        	<br><br>
        	<table border=0 align=center><tr><td colspan=2 class=mokc valign=center>
        	<b>Administracija opterećenja
<?php echo $vernet;?>
        	</b><br><br>
	        </td></tr><tr><td  class=mokc valign=center>
        	<form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">
       	 	Korisnik:</td>
        	<td><input type="text" class=logiraj size=9 maxlength=12 name="login" value=""></td></tr>
        	<tr><td class=mokc>Zaporka:</td>
        	<td><input type="password"  class=logiraj  size=9 maxlength=10 name="passwd" value=""></td></tr>
        	<tr><td class=okc colspan=2 align=center>
        	
<?php
        $obav11=mysql_query("SELECT * FROM studij order by sifkate");
		echo "<select name=studij width=450>";
		for($i=0;$i<mysql_num_rows($obav11);$i++){
	       	echo "<option value=";
	       	echo mysql_result($obav11,$i,"sifkate");
			echo ">";
	       	echo mysql_result($obav11,$i,"sifkate");
			echo "</option>";
		}
		echo "</select>";
?>
        	<tr><td class=okc colspan=2 align=center><br><br>
        	<input type="submit" class=logiraj size=8 name="Ulogiraj se" value="Prijava"></td></tr>
        	</form>
        	</td></tr></table>
<?php
	}else{

		echo "<table  border=0 width=100% align=center>";
		echo "<tr><td class=okl valign=center>";
		echo "Dobrodošli u sustav administracije opterecenje-tvz $vernet :: $_SESSION[potpis] ";
		echo "</td><td class=okc>";
/* 		echo "<a  class=link1 href=\"javascript: getsupport1('glavna','','','','','');\">glavni izbornik...</a>"; */
		echo "</td><td class=okr>";
		echo "<form action=$_SERVER[PHP_SELF] method=post><input type=submit class=logiraj name=odjava value=Odjava>";
		echo "</td></tr>";
		echo "<tr><td class=okl colspan=3 valign=center>";
		echo "Dozvole: ";
        $obav11=mysql_query("SELECT * FROM opt_dozvole where sifoso=$_SESSION[sifoso] ORDER BY sifkat");
		for($i=0;$i<mysql_num_rows($obav11);$i++){
	       	echo "<b>";
	       	echo mysql_result($obav11,$i,"sifkat");
	       	if(mysql_result($obav11,$i,"write")==1){
				echo "</b>-dozvola čitanja/pisanja;";
			}else{
				echo "-dozvola čitanja;";
			}
		}
		echo "</td></tr>";
		echo "<tr><td class=okl colspan=3 valign=center>";
				
        $obav11=mysql_query("SELECT * FROM opt_postavke");
       	echo "Tekuća akademska godina: ";
       	$god= mysql_result($obav11,0,"godina");
		$god1=$god+1;
		echo $god."/".$god1;
		echo "</td></tr>";
		echo "</table>";
		echo "</form>";
	}

// end login
	echo "<table border=0 width=100%><tr><td class=ok>";
	if($_POST["s1"]!=""){
		include  $_POST["s1"].".php";	
	}
	echo "</td></tr></table>";



// }else{
// //IP KONTROLA
// 		echo "<center><br><br><b>Nemate pravo pristupiti stranicama sa ovoga računala, obratite se administratoru webadmin@tvz.hr ($prijenos)</b>";
// }
//echo "eto me ". $_POST["s1"]. " s2 ". $_POST["s2"];	
?>
</body>
</html> 

<?php
function show_array($array) { 
    foreach ($array as $key => $value) { 
        if (is_array($value)) { 
            show_array($value); 
        } else { 
            echo $key.":".$value . "<br>"; 
        } 
    } 
}
function ime_studija($array) {
	if($array==1){
		return "inf";
	}elseif($array==2){
		return "gra";
	}elseif($array==3){
                return "rac";
	}elseif($array==4){
                return "elo";
	}elseif($array==5){
                return "stro";
	}
}
?>
