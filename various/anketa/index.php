<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr-HR">
<head>
	<title>Anketa o WEB uporabljivosti e-learning rješenja</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="googlebot" content="noarchive, nofollow">
	
	<link href='css/anketa.css' rel='stylesheet' type='text/css' media="screen" />
	<link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />	
  
	<script src="javascript/jquery-1.6.min.js" type="text/javascript"></script>	
	<script src="javascript/jquery.validationEngine-hr.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>	
	<script src="javascript/general.js" type="text/javascript" charset="utf-8"></script>
	
</head>
	
<body>
<div id="container">
	<h1 class="tc">Anketa o WEB uporabljivosti e-learning rješenja</h1>

	<div class="survey">
		<div id="" class="item">
			<p>
				Mi, <a href="https://www.facebook.com/profile.php?id=1147906791" target="_blank">Ivan Gaura</a> i <a href="http://vanja.gavric.org/" target="_blank">Vanja Gavrić</a> smo studenti specijalističkog studija Informatike na Tehničkom veleučilištu u Zagrebu. Za izradu seminarskog rada iz kolegija Organizacija i upravljanje obrazovanjem na daljinu potrebna nam je vaša pomoć. Mnogi od vas su bivše, odnosno sadašnje kolege s Fakulteta organizacije i informatike i Grafičkog fakulteta. <br />
				Molimo vas da &quot;poklikate&quot; našu anketu s iskrenim odgovorima jer ćemo te rezultate koristiti kao referencu za naš seminarski rad.<br />
Pitanja označena <em>*</em> su obvezna.
				<br /><br />
				Hvala!
			</p>
		

			
			
			<h3>Za početak nekoliko informacija o tebi.</h3>
		</div>
		<form id="anketa" action="formProcess.php" method="post">	
			<div id="q_01" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_01" class="number">1)</span> 
						Koji <abbr title="Learning management system">LMS</abbr> tvoj fakultet koristi? <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="checkbox" id="questions[01][00]" value="0" class="validate[minCheckbox[1]]" name="questions[01]"> Moodle (FOI)</li>
						<li><input type="checkbox" id="questions[01][01]" value="1" class="validate[minCheckbox[1]]" name="questions[01]"> Claroline (GRF)</li>
						<li><input type="checkbox" id="questions[01][02]" value="2" class="validate[minCheckbox[1]]" name="questions[01]"> Merlin (GRF)</li>
						<li><input type="checkbox" id="questions[01][03]" value="3" class="validate[minCheckbox[1]]" name="questions[01]" > Neki drugi</li>
					</ul>
				</div>
			</div>
			
			<div id="q_02" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_02" class="number">2)</span> 
						Koja si godina studiranja?
					</div>
					<select size="1" name="questions[02]">
					  <option value="">Odaberite...</option>
					  <option value="0">Prva</option>
					  <option value="1">Druga</option>
					  <option value="2">Treća</option>
					  <option value="3">Četvrta (diplomski studij)</option>
					  <option value="4">Peta (diplomski studij)</option>
					</select>
				</div>
			</div>
			
			<div id="q_03" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_03" class="number">3)</span> 
						Koliko predmeta/tečaja si preko LMS pohađao/la? <em>*</em>
					</div>
					<select size="1" name="questions[03]" id="questions[03]"  class="validate[required]">
					  <option value="">Odaberite...</option>
					  <option value="0">1</option>
					  <option value="1">2-3</option>
					  <option value="2">4-5</option>
					  <option value="3">6-7</option>
					  <option value="4">8-9</option>
					  <option value="5">10 ili više</option>
					</select>
				</div>
			</div>
			
			<div id="q_04" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_03" class="number">4)</span> 
						Koliko često posjećujete LMS? <em>*</em>
					</div>
					<select size="1" name="questions[03]" id="questions[04]"  class="validate[required]">
					  <option value="">Odaberite...</option>
					  <option value="0">Svaki dan po nekoliko puta</option>
					  <option value="1">Jednom dnevno</option>
					  <option value="2">Nekoliko puta tjedno</option>
					  <option value="3">Jednom tjedno</option>
					  <option value="4">Nekoliko puta mjesečno</option>
					  <option value="5">1Jednom mjesečno</option>
					</select>
				</div>
			</div>
			
			<div id="q_05" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_05" class="number">5)</span> 
						Kada se spojite koliko vremena provedete na LMS-u? <em>*</em>
					</div>
					<select size="1" name="questions[05]" id="questions[05]" class="validate[required]">
					  <option value="">Odaberite...</option>
					  <option value="0">30 min</option>
					  <option value="1">30-60 min</option>
					  <option value="2">1-2 h</option>
					  <option value="3">2-4 h</option>
					  <option value="4">4 i više sati</option>
					</select>
				</div>
			</div>
	
			<div id="" class="item">
				<h3>Odgovori koliko se slažeš sa sljedećim tvrdnjama.</h3>
				<h4>Dizajn</h4>
			</div>
		
			<div id="q_06" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_06" class="number">6)</span> 
							Nepoznate riječi su podvučene i objašnjene. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[06]" id="questions[06][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[06]" id="questions[06][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[06]" id="questions[06][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[06]" id="questions[06][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[06]" id="questions[06][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="q_07" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_07" class="number">7)</span> 
						Sve stranice je moguće printati. Isprintane stranice su točne i potpune. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[07]" id="questions[07][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[07]" id="questions[07][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[07]" id="questions[07][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[07]" id="questions[07][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[07]" id="questions[07][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="q_08" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_08" class="number">8)</span> 
							Prilikom isključivanja grafičkih elemenata struktura prikaza informacija se nije promijenila. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[08]" id="questions[08][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[08]" id="questions[08][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[08]" id="questions[08][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[08]" id="questions[08][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[08]" id="questions[08][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="q_09" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_09" class="number">9)</span> 
						Učitavanje stranice traje kraće od 10 sekundi.. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[09]" id="questions[09][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[09]" id="questions[09][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[09]" id="questions[09][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[09]" id="questions[09][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[09]" id="questions[09][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="q_10" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_10" class="number">10)</span> 
						Ekrani iskorištavaju prednosti praznog prostora kako bi vodili oko polaznika kroz informacije na stranici. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[10]" id="questions[10][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[10]" id="questions[10][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[10]" id="questions[10][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[10]" id="questions[10][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[10]" id="questions[10][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="" class="item">
				<h4>Navigacija</h4>
			</div>
			
			
			<div id="q_11" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_11" class="number">11)</span> 
						Stranica predmeta (tečaja) ima vodič ili mapu koja prikazuje sve glavne sekcije <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[11]" id="questions[11][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[11]" id="questions[11][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[11]" id="questions[11][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[11]" id="questions[11][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[11]" id="questions[11][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_12" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_12" class="number">12)</span> 
						Svi linkovi su ispravni <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[12]" id="questions[12][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[12]" id="questions[12][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[12]" id="questions[12][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[12]" id="questions[12][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[12]" id="questions[12][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_13" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_13" class="number">13)</span> 
						Navigacijske opcije su jasne i konzistentne ( daju polazniku tečaja informacije gdje vode i što je sljedeći korak) <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[13]" id="questions[13][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[13]" id="questions[13][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[13]" id="questions[13][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[13]" id="questions[13][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[13]" id="questions[13][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_14" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_14" class="number">14)</span> 
						Linkovi za natrag su vidljivi, uvijek na istom mjestu dajući mogućnost povratka na prethodnu stranicu <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[14]" id="questions[14][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[14]" id="questions[14][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[14]" id="questions[14][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[14]" id="questions[14][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[14]" id="questions[14][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			
			<div id="" class="item">
				<h4>Organizacija sadržaja</h4>
			</div>
						

			
			<div id="q_15" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_15" class="number">15)</span> 
						Ciljevi/ishodi učenja su jasno naznačeni u svakom poglavlju. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[15]" id="questions[15][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[15]" id="questions[15][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[15]" id="questions[15][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[15]" id="questions[15][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[15]" id="questions[15][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_16" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_16" class="number">16)</span> 
						Svako poglavlje ima organizator koji opisuje buduće aktivnosti, ishode učenja, razlog za učenje i procjenu koliko će biti potrebno vremena da se to poglavlje obradi <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[16]" id="questions[16][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[16]" id="questions[16][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[16]" id="questions[16][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[16]" id="questions[16][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[16]" id="questions[16][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_17" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_17" class="number">17)</span> 
						Najčešće korišteni sadržaj-nastavni materijal je jasno istaknut <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[17]" id="questions[17][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[17]" id="questions[17][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[17]" id="questions[17][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[17]" id="questions[17][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[17]" id="questions[17][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_18" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_18" class="number">18)</span> 
						Sadržaj nužan za uspješno polaganje je jasno istaknut <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[18]" id="questions[18][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[18]" id="questions[18][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[18]" id="questions[18][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[18]" id="questions[18][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[18]" id="questions[18][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_19" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_19" class="number">19)</span> 
						Ciljevi/ishodi učenja su jasno naznačeni u svakom poglavlju. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[19]" id="questions[19][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[19]" id="questions[19][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[19]" id="questions[19][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[19]" id="questions[19][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[19]" id="questions[19][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_20" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_20" class="number">20)</span> 
						Sadržaj koji je manje bitan nalazi se na manje istaknutim "Referenca" ili "Više o" linkovima. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[20]" id="questions[20][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[20]" id="questions[20][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[20]" id="questions[20][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[20]" id="questions[20][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[20]" id="questions[20][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			
			<div id="" class="item">
				<h4>Tekstualni aspekt</h4>
			</div>
			
			<div id="q_21" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_21" class="number">21)</span> 
						Blokovi teksta su dovoljno mali za eliminiraju potrebu za scrolanjem, čak i na manjim ekranima <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[21]" id="questions[21][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[21]" id="questions[21][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[21]" id="questions[21][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[21]" id="questions[21][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[21]" id="questions[21][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_22" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_22" class="number">22)</span> 
						Fontovi su ograničeni na dva (ili najviše 3) po stranici.  <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[22]" id="questions[22][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[22]" id="questions[22][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[22]" id="questions[22][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[22]" id="questions[22][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[22]" id="questions[22][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_23" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_23" class="number">23)</span> 
						Fontovi (stil, boja, kontrast) su lagani za čitanje, na isprintanoj tako i na e-verziji. <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[23]" id="questions[23][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[23]" id="questions[23][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[23]" id="questions[23][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[23]" id="questions[23][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[23]" id="questions[23][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="q_24" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_24" class="number">24)</span> 
						Linije teksta su dovoljno kratke da čitatelj ne treba okretati glavu lijevo-desno kako bi pročitao cijelu liniju teksta, čak i na jako velikim ekranim (24" na više) <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[24]" id="questions[24][00]" class="validate[required]"> Izrazito se ne slažem</li>
						<li><input type="radio" value="2" name="questions[24]" id="questions[24][01]"  class="validate[required]"> Ne slažem se</li>
						<li><input type="radio" value="4" name="questions[24]" id="questions[24][02]"  class="validate[required]"> Slažem se</li>
						<li><input type="radio" value="5" name="questions[24]" id="questions[24][03]"  class="validate[required]"> Izrazito se slažem</li>
						<li><input type="radio" value="6" name="questions[24]" id="questions[24][04]"  class="validate[required]"> Ne znam (nisam isprobao/la)</li>
					</ul>
				</div>
			</div>
			<div id="" class="item">
				<h3>Odgovori koliko si zadovoljan/na.</h3>
			</div>
			

			<div id="q_25" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_25" class="number">25)</span> 
						Svekupno zadovoljstvo korištenja LMS-a <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[25]" id="questions[25][00]" class="validate[required]"> Izrazito nezadovoljan/na</li>
						<li><input type="radio" value="2" name="questions[25]" id="questions[25][01]"  class="validate[required]"> Nezadovoljan/na</li>
						<li><input type="radio" value="4" name="questions[25]" id="questions[25][02]"  class="validate[required]"> Neutralan/na</li>
						<li><input type="radio" value="5" name="questions[25]" id="questions[25][03]"  class="validate[required]"> Zadovoljan/na</li>
						<li><input type="radio" value="6" name="questions[25]" id="questions[25][04]"  class="validate[required]"> Izrazito zadovoljan/na</li>
					</ul>
				</div>
			</div>
			<div id="q_26" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_26" class="number">26)</span> 
						Mislite li da će Vam je ovaj tečaj pomogao i obogatio vaše znanje? <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[26]" id="questions[26][00]" class="validate[required]"> Nije pomogao</li>
						<li><input type="radio" value="2" name="questions[26]" id="questions[26][01]"  class="validate[required]"> Malo je pomogao</li>
						<li><input type="radio" value="3" name="questions[26]" id="questions[26][04]"  class="validate[required]"> Neutralan/na</li>
						<li><input type="radio" value="4" name="questions[26]" id="questions[26][02]"  class="validate[required]"> Pomogao je</li>
						<li><input type="radio" value="5" name="questions[26]" id="questions[26][03]"  class="validate[required]"> Uvelike mi je pomogao</li>

					</ul>
				</div>
			</div>
			<div id="q_27" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_27" class="number">27)</span> 
						Da li biste preporučili ovaj tečaj i drugima? <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[27]" id="questions[27][00]" class="validate[required]"> Ne bih preporučio</li>
						<li><input type="radio" value="2" name="questions[27]" id="questions[27][01]"  class="validate[required]"> Možda</li>
						<li><input type="radio" value="4" name="questions[27]" id="questions[27][02]"  class="validate[required]"> Preporučio bi</li>
						<li><input type="radio" value="5" name="questions[27]" id="questions[27][03]"  class="validate[required]"> Zadovoljan/na</li>
						<li><input type="radio" value="6" name="questions[27]" id="questions[27][04]"  class="validate[required]"> Izrazito zadovoljan/na</li>
					</ul>
				</div>
			</div>
			<div id="q_28" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_28" class="number">28)</span> 
						Ukoliko ste sudjelovali na drugima tečajima koji rade sa nekim drugim LMS sustavom kako bi ste ocijenili ovaj sustav u odnosu na onaj drugi? <em>*</em>
					</div>
					
			<ul class="radio options">
						<li><input type="radio" value="1" name="questions[28]" id="questions[28][00]" class="validate[required]"> Vrlo loše</li>
						<li><input type="radio" value="2" name="questions[28]" id="questions[28][01]"  class="validate[required]"> Loše</li>
						<li><input type="radio" value="4" name="questions[28]" id="questions[28][02]"  class="validate[required]"> Dobro</li>
						<li><input type="radio" value="5" name="questions[28]" id="questions[28][03]"  class="validate[required]"> Vrlo dobro</li>
						<li><input type="radio" value="6" name="questions[28]" id="questions[28][04]"  class="validate[required]"> Odlično</li>
					</ul>
				</div>
			</div>
			<div id="q_29" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_29" class="number">29)</span> 
						Svekupno zadovoljstvo korištenja LMS-a: <em>*</em>
					</div>
					<ul class="radio options">
						<li><input type="radio" value="1" name="questions[29]" id="questions[29][00]" class="validate[required]"> Izrazito nezadovoljan/na</li>
						<li><input type="radio" value="2" name="questions[29]" id="questions[29][01]"  class="validate[required]"> Nezadovoljan/na</li>
						<li><input type="radio" value="4" name="questions[29]" id="questions[29][02]"  class="validate[required]"> Neutralan/na</li>
						<li><input type="radio" value="5" name="questions[29]" id="questions[29][03]"  class="validate[required]"> Zadovoljan/na</li>
						<li><input type="radio" value="6" name="questions[29]" id="questions[29][04]"  class="validate[required]"> Izrazito zadovoljan/na</li>
					</ul>
				</div>
			</div>



			<div id="" class="item">
				<h3>Komentari? (nije obavezno)</h3>
			</div>
			


			<div id="q_30" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_30" class="number">30)</span> 
						Komentirajte što vam se NE sviđa u LMS-u kojeg koristite
					</div>
					<textarea name="questions[30]" style="width: 700px" rows="5"></textarea>
				</div>
			</div>
			<div id="q_31" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_31" class="number">31)</span> 
						Komentirajte što vam se sviđa u LMS-u kojeg koristite
					</div>
					<textarea name="questions[30]" style="width: 700px" rows="5"></textarea>
				</div>
			</div>
			<div id="q_32" class="item">
				<div class="question border7">
					<div class="text">
						<span id="q_32" class="number">32)</span> 
						Komentirajte što biste željeli promijeniti (i kako?) u LMS-u kojeg koristite
					</div>
					<textarea name="questions[30]" style="width: 700px" rows="5"></textarea>
				</div>
			</div>
			<!-- 		<a href="" id="submit" class="button save fr">Spremi</a> -->
			<input type="submit" value="Pošalji" tabindex="5" id="submit_btn" class="button fr" name="submit">
		</form>
	</div>
	
</div>
</body>
</html>