<STYLE> 
	<!-- glavni linkovi (meni sastrane) --!>
	A:ACTIVE.link1 {font-family : "Arial";font-size : 13px;color :  #3038be;text-decoration : none;}
	A:VISITED.link1 {font-family : "Arial";font-size : 13px;color :  #3038be;text-decoration : none;}
	A:LINK.link1 {font-family : "Arial";font-size : 13px;color : #3038be;text-decoration : none;}
	A:HOVER.link1 {font-family : "Arial";font-size : 13px;color :  #6c6c6c;text-decoration : none;}

	A:ACTIVE.jakomalilink1 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:VISITED.jakomalilink1 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:LINK.jakomalilink1 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:HOVER.jakomalilink1 {font-family : "Arial";font-size : 10px;color : #6c6c6c;text-decoration : none;}

	A:ACTIVE.mlink1 {font-family : "Arial";font-size : 12px;color :  #6c6c6c;text-decoration : none;}
	A:VISITED.mlink1 {font-family : "Arial";font-size : 12px;color :  #6c6c6c;text-decoration : none;}
	A:LINK.mlink1 {font-family : "Arial";font-size : 12px;color : #6c6c6c;text-decoration : none;}
	A:HOVER.mlink1 {font-family : "Arial";font-size : 12px;color :  #6c6c6c;text-decoration : none;}

	A:ACTIVE.glink1 {text-align : left;font-family : "Arial";font-size : 12px;color :  #3038be;font-weight:bold;text-decoration : none;}
	A:VISITED.glink1 {text-align : left;font-family : "Arial";font-size : 12px;color :  #3038be;font-weight:bold;text-decoration : none;}
	A:LINK.glink1 {text-align : left;font-family : "Arial";font-size : 12px;color : #3038be;font-weight:bold;text-decoration : none;}
	A:HOVER.glink1 {text-align : left;font-family : "Arial";font-size : 12px;color :  #6c6c6c;font-weight:bold;text-decoration : none;}

	<!-- ostali linkovi --!>
	A:ACTIVE.link2 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:VISITED.link2 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:LINK.link2 {font-family : "Arial";font-size : 10px;color : #3038be;text-decoration : none;}
	A:HOVER.link2 {font-family : "Arial";font-size : 10px;color : #6c6c6c;text-decoration : none;}

	<!-- veci linkovi  --!>
	A:LINK.link3 {font-family : "Arial";font-size : 15px;color : #6c6c6c;text-decoration : none;}
	A:HOVER.link3 {font-family : "Arial";font-size : 15px;color : #6c6c6c;text-decoration : none;}
	A:VISITED.link3 {font-family : "Arial";font-size : 15px;color : #6c6c6c;text-decoration : none;}
	A:ACTIVE.link3 {font-family : "Arial";font-size : 15px;color : #6c6c6c;text-decoration : none;}


	select.combo_pred{valign:top;font-family : "Arial";width: 200px;font-size : 12px;color : #6c6c6c;background-color:#b1e4ff;}
	input.logiraj {valign:top;font-family : "Arial";font-size : 12px;color : #6c6c6c;background-color:#b1e4ff;}
	div.lajt{position: width:80%; height:30;filter:dropshadow(color="silver",offx="5",offy="5",Positive=1)}
	td.pozadina{background:url(pozadina.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	td.vrh{background:url(vrh.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : navy;} 
	td.lijevi{background:url(lijevi.jpg) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.desni{background:url(desni.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	td.desni_gore{background:url(desni_gore.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	td.desni1{background:url(desni1.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	table.kalendar{background:url(kalendar.png) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	td.sredina{background:url(sredina.jpg) top left;text-align : center;font-family : "Arial";font-size : 12px;color : black;} 
	td.dolje{background:url(dolje.jpg) top left;text-align : right;font-family : "Arial";font-size : 12px;color : black;} 
	td.dolje_lijevo{background:url(dolje_lijevo.jpg) no-repeat top left;text-align : right;font-family : "Arial";font-size : 12px;color : black;} 
	td.linkic{text-valign:bottom;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.desni_gore{background:url(desni_gore.jpg) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_gore{background:url(plahta_gore.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_gorekal{background:url(vrhkalendaric.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_gorelog{background:url(vrhlogin.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_goregal{background:url(vrhgalerija.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_gorerep{background:url(vrhrepozit.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta_dolje{background:url(plahta_dolje.jpg) no-repeat top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.plahta{background:url(plahta.jpg) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.ank_g{background:url(ank_g.gif) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.ank_b{background:url(ank_b.gif) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	td.ank_d{background:url(ank_d.gif) top left;text-align : left;font-family : "Arial";font-size : 12px;color : black;} 
	table.mart1{background:url(tzk/slike/5_1.jpg) no-repeat top left} 
	table.crtkano{BORDER: black 1px dashed;} 
	td.crtkano2{text-align : left;background-color=#b1e4ff;font-family : "Arial";font-size : 12px;color : black;BORDER-RIGHT: black 1px solid; BORDER-TOP: black 1px solid; BORDER-LEFT: black 1px solid; BORDER-BOTTOM: black 1px solid;} 
	td.crta_glavna{text-align : left;font-family : "Arial";font-size : 12px;color : black;BORDER-RIGHT: #b1e4ff 1px solid; BORDER-LEFT: #b1e4ff 1px solid;} 
	tr.crtkano1{BORDER-RIGHT: black 1px dashed; BORDER-TOP: black 1px dashed; BORDER-LEFT: black 1px dashed; BORDER-BOTTOM: black 1px dashed;} 
	td.naslov_vijesti {text-align : left;font-family : "Arial";font-size : 12px;color : #3038be;font-weight:bold;}
	td.okr {text-align : right;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.mokr {text-align : right;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.okc {text-align : center;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.mokc {text-align : center;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	p.sveostalo {text-align : center;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.ok {text-align : justify;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.okl {text-align : left;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.mok {text-align : justify;font-family : "Arial";font-size : 12px;color : #6c6c6c;}
	td.jakomali {text-align : center;font-family : "Arial";font-size : 10px;color : #6c6c6c;}
	td.jakomalil {text-align : left;font-family : "Arial";font-size : 10px;color : #6c6c6c;}
	td.mjakomali {text-align : center;font-family : "Arial";font-size : 10px;color : #6c6c6c;}
	td.jakomalid {text-align : right;font-family : "Arial";font-size : 10px;color : #6c6c6c;}

	<!-- veci linkovi  --!>

</STYLE> 
