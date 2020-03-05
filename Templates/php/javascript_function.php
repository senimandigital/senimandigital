<?php /* Menghitung karakter semisal pada textarea: fungsi otomatis menempatkan posisi count pada sudut kanan bawah textarea.
<div style="position:relative;">
  <textarea id="text" onKeyUp="hitung_karakter(this)" data-counter-id="counter"></textarea>
  <div id="counter" style=" position:absolute; right:10; bottom:5">12</div>
</div>
*/ ?>
function hitung_karakter($objek){ 
   document.getElementById($objek.getAttribute('data-counter-id')).innerHTML =  
   document.getElementById($objek.getAttribute('id')).value.length;
}


function getSelectedText(){
if      (window.getSelection)   { txt = window.getSelection(); }
else if (document.getSelection) { txt = document.getSelection(); }
else if (document.selection)    { txt = document.selection.createRange().text; }
else return; return txt;
}


var win=null;
function NewWindow(mypage, myname, w , h, scroll){
var winl = (screen.width-w)/2;
var wint = (screen.height-h)/2;
var settings ='height='+h+',';
settings +='width='+w+',';
settings +='top='+wint+',';
settings +='left='+winl+',';
settings +='scrollbars='+scroll+',';
settings +='resizable=yes';
win=window.open(mypage,myname,settings);
if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
}


function getUrlVars() {
var vars = [], hash;
var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

 for(var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }

    return vars;
}


function xmlhttpPost(strURL, strID) { var xmlHttpReq = false;   var self = this;
if(window.XMLHttpRequest)
  {  self.xmlHttpReq = new XMLHttpRequest(); }
     self.xmlHttpReq.open('GET', strURL, true);
     self.xmlHttpReq.send();
     self.xmlHttpReq.onreadystatechange = function() { if (self.xmlHttpReq.readyState == 4)
  { document.getElementById(''+ strID + '').outerHTML = self.xmlHttpReq.responseText; }}}


function MM_jumpMenu(targ, selObj, restore){ //v3.0
  if (selObj.hasAttribute("href"))    { eval(targ + ".location='" + selObj.getAttribute("href") + "?" + selObj.name + "=" + selObj.options[selObj.selectedIndex].value + "'"); }
  if (selObj.hasAttribute("request")) { var $request = selObj.getAttribute("request");
      eval(targ + ".location='" + document.getElementsByName($request)[0].getAttribute("href")
         + "?" + $request + "=" + document.getElementsByName($request)[0].options[document.getElementsByName($request)[0].selectedIndex].value
      + "&" + selObj.name + "=" + selObj.options[selObj.selectedIndex].value + "'");
  } if (restore) selObj.selectedIndex=0;
}


/*
var $_GET = new function(){
var fullUrl   = window.location.href.split('?');
var urlParams = fullUrl[1].split('&');  $_GET = new Array();
for(i=0 ; i<=urlParams.length-1 ; ++i) {
    var param = urlParams[i].split('=');
    var name  = param[0];
    var value = param[1];
   $_GET[name] = value;
}
return $_GET;
}
*/
