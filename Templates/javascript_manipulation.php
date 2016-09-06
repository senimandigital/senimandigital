<?php /* Otomatis mengambil konten meta title dan description halaman, kemudian menambahkan-nya sebagai judul formulir */ ?>
document.querySelectorAll('main header')[0].innerHTML  = '<h1>' + document.querySelectorAll('main header')[0].getAttribute('title') + '</h1>';
document.querySelectorAll('main header')[0].innerHTML += document.querySelectorAll('meta[name=description]')[0].getAttribute('content');


<?php /* Otomatis menambahkan karakter bintang untuk elemen input yang terdefinisi Requred. */ ?>
var $input = document.getElementsByTagName('input'); var $label = document.getElementsByTagName('label');
for(i = 0 ; i < $input.length ; i++) { if ($input.item(i).hasAttribute('required') !=true) continue;
for(l = 0 ; l < $label.length ; l++) { if ($label.item(l).getAttribute('for') != $input.item(i).getAttribute('name')) continue;
$label.item(l).innerHTML = $label.item(l).innerHTML + '<span class="required"> *</span>';
}}


// var $WEBSITE = new Array();
//    $WEBSITE['DOMAIN']['GAMBAR'] = 'http://senimandigital.kom/alat/gambar/';

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

var $meta = document.querySelectorAll('meta[name=action-success]');
for(m = 0 ; m < $meta.length ; m++) {
var $form = document.querySelectorAll('form[name=' + $meta.item(m).getAttribute('for') + ']');
for(i = 0 ; i < $form.length ; i++) { $form.item(i).outerHTML = '<div class="success">' + $meta.item(m).getAttribute('content') + '</div>' + $form.item(i).outerHTML;
}}

var $meta = document.querySelectorAll('meta[name=action-error]');
for(m = 0 ; m < $meta.length ; m++) {
var $form = document.querySelectorAll('form[name=' + $meta.item(m).getAttribute('for') + ']');
for(i = 0 ; i < $form.length ; i++) {
    $form.item(i).outerHTML = '<div class="error">' + $meta.item(m).getAttribute('content') + '</div>' + $form.item(i).outerHTML;
}}

var $meta = document.querySelectorAll('meta[name=action-information]');
for(m = 0 ; m < $meta.length ; m++) { var $form = document.querySelectorAll('form[name=' + $meta.item(m).getAttribute('for') + ']');
for(i = 0 ; i < $form.length ; i++) {     $form.item(i).outerHTML = '<div class="information">' + $meta.item(m).getAttribute('content') + '</div>' + $form.item(i).outerHTML; }}

var $input = document.querySelectorAll('ul[role=context]');
for(i = 0 ; i < $input.length ; i++) {
var $link = $input.item(i).document.querySelectorAll('li').item(1).document.querySelectorAll('a').item(1);
    $input.item(i).outerHTML  = '<ul class="MenuBarHorizontal"><li>'+ $link +'<ul data-align="right" class="drop">'
+ '<li>Dino</li>' + '</ul></li></ul>';
}

var $dom_search = ''; var $search  = document.querySelectorAll('meta[name=anggota_id]');
for(i = 0 ; i < $search.length ; i++) {
$dom_search = '<div style="float:left;">Home ></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_edit.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img src="/gambar/website/form_konfigurasi.png" width="20"></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_tambah.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img src="/gambar/website/form_plus.gif" width="20"></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_tambah.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img src="/gambar/website/form_cari.png" width="20"></div>'
+ '<div style="float:right;"><input type="text"></div>';
}

var $input  = document.querySelectorAll('td[role=article]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).innerHTML = '<article>' + $dom_search + $input.item(i).innerHTML + '</article>';
}

var $input = document.querySelectorAll('td[role=aside]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).innerHTML = '<aside>' + $input.item(i).innerHTML + '</aside>';
}

var $input = document.getElementsByTagName('input'); var $label = document.getElementsByTagName('label');
for(i = 0 ; i < $input.length ; i++) { if ($input.item(i).hasAttribute('required') !=true) continue;
for(l = 0 ; l < $label.length ; l++) { if ($label.item(l).getAttribute('for') != $input.item(i).getAttribute('name')) continue;
$label.item(l).innerHTML = $label.item(l).innerHTML + '*';
}}

var $input = document.querySelectorAll('img[data-icon]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('src', '/gambar/website/' + $input.item(i).getAttribute('data-icon') + '.png');
}

var $input = document.querySelectorAll('[data-filter=true]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<input type="text" id="'+ $input.item(i).getAttribute('id') +'_search_input" placeholder="Filter Data">' + $input.item(i).outerHTML;
}

var $input = document.querySelectorAll('[data-split-icon]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('src', '/gambar/split-icon/' + $input.item(i).getAttribute('data-split-icon') + '.png');
}

var $input = document.querySelectorAll('a[rev]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute("onclick", "window.open('" + $input.item(i).getAttribute('href') + "&popup', 'Detail', 'top=200, left= 100, height=600, width=600'); return false;");
}

var $input = document.querySelectorAll('a[href]');
for(i = 0 ; i < $input.length ; i++) {
    if ($input.item(i).getAttribute('href').indexOf('edit.php?') != -1
    ||  $input.item(i).getAttribute('href').indexOf('tambah.php?') != -1)
    { $input.item(i).setAttribute("onclick", "window.open('" + $input.item(i).getAttribute('href') + "&popup', 'Detail', 'top=200, left= 100, height=600, width=600'); return false;"); }
}

var $input = document.querySelectorAll('div[href], img[href]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute("onclick", "window.location.href ='" + $input.item(i).getAttribute('href') + "';");
}

var $input = document.querySelectorAll('button[align=center]');
for(i = 0 ; i < $input.length ; i++) { $input.item(i).outerHTML = '<center>' + $input.item(i).outerHTML + '</center>'; }

var $input = document.querySelectorAll('select[href-insert]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML  = '<table border="0" cellspacing="0" cellpadding="0"><tr><td>' + $input.item(i).outerHTML + '</td>'
+ '<td valign="middle">'
+ '<a onclick="window.open(\'' + $input.item(i).getAttribute("href-insert") + '?popup\', \'Detail\', \'top=200, left= 100, height=600, width=600\');" title="Silahkan menambah dari sini jika tidak menemukan data referensi"><img src="/gambar/website/form_tambah.png" align="left" data-inset="true" width="20px" style="margin-bottom:0px; margin-left:5px;"></a>'
+ '</td></tr></table>';
}

var $tem   = '';
var $input = document.querySelectorAll('article>h3');
var $meta  = document.querySelectorAll('meta[name=data-search]');
if ($input && $meta ) {
var $array_meta = $meta.item(0).getAttribute("content").split(',');
for(var i = 0; i < $array_meta.length; i++) { $tem = $tem
+ '<li style="width:25%; float:left;"><table border="0" cellpadding="0" cellspacing="0"><tr><td>' + document.querySelectorAll('label[for=' + $array_meta[i] + ']').item(0).innerHTML + '</td></tr>'
+ '<tr><td><input type="text" name="' + $array_meta[i] + '" style="width:100%;" /></td></tr></table></li>';
}
$input.item(0).outerHTML = $input.item(0).outerHTML
+ '<form name="smart-search"><ul style="list-style-type:none; padding:0px;">' + $tem
+ '</ul><div role="caption" style="padding-left: 10px; clear:both;"><input type="submit" name="cari" value="CARI" /> <input type="button" name="reset" value="KOSONGKAN" /></div></form>';
}

/*
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

var win=null;
function NewWindow(mypage,myname,w,h,scroll){
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

function getSelectedText(){
if      (window.getSelection){    txt = window.getSelection(); }
else if (document.getSelection) { txt = document.getSelection(); }
else if (document.selection){     txt = document.selection.createRange().text; }
else return; return txt;
}
*/
