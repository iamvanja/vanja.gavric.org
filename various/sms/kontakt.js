function insert(objVal) {
var objList = document.getElementById("voip");
for(var i = 0; i < objList.length; i++) {
if(objList.elements[i].name == 'to') {
switch(objVal) {
case "0": objList.elements[i].value = text0(); break;
case "1": objList.elements[i].value = mama(); break;
case "2": objList.elements[i].value = nikola(); break;
case "3": objList.elements[i].value = banko(); break;
case "4": objList.elements[i].value = jan(); break;
case "5": objList.elements[i].value = ivan(); break;
case "6": objList.elements[i].value = bruno(); break;
case "7": objList.elements[i].value = luka(); break;
case "8": objList.elements[i].value = olivia(); break;
case "9": objList.elements[i].value = vanja(); break;
}
}
}
}
function text0() {
var tt = ""
return tt; }

function mama() {
var tt = "+385912517253";
return tt; }

function nikola() {
var tt = "+385915708677";
return tt; }


function banko() {
var tt = "+385915411011";
return tt; }

function jan() {
var tt = "+38598289940";
return tt; }

function ivan() {
var tt = "+38598393599";
return tt; }

function bruno() {
var tt = "+38598815742";
return tt; }

function luka() {
var tt = "+385959039127";
return tt; }

function olivia() {
var tt = "+385915244030";
return tt; }

function vanja() {
var tt = "+385915047194";
return tt; }