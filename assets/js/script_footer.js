
/*
function getSelectedText(){
if      (window.getSelection){    txt = window.getSelection(); }
else if (document.getSelection) { txt = document.getSelection(); }
else if (document.selection){     txt = document.selection.createRange().text; }
else return; return txt;
}
*/

// Memodifikasi jquery agar blank argumen  attr()  bisa mengahsilkan output seluruh attribute // cara penggunaan   alert(JSON.stringify($('[name=anggota_level]').attr()));
(function(old) { $.fn.attr = function() { if(arguments.length === 0) { if (this.length === 0) { return null; } var obj = {}; $.each(this[0].attributes, function() { if(this.specified) { obj[this.name] = this.value; } }); return obj;    } return old.apply(this, arguments); }; })($.fn.attr);

function url_change_parameter ($parameter, $value){
var searchParams = new URLSearchParams(window.location.search); searchParams.set($parameter, $value);
window.location.href = document.querySelectorAll('meta[name=PHP_SELF]').item(0).getAttribute('content') +'?'+ searchParams.toString();
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


var $metarequesturl = document.querySelectorAll('[name=REQUESTURL]').item(0).getAttribute('content');
var $NextMasterPage = '';
var $dom_search = '';

for (r = 1 ; r <= 3; r++) {
var $input = document.querySelectorAll('[data-array]');
for(i = 0 ; i < $input.length ; i++) {
var $varname = $input.item(i).getAttribute('data-array'); $input.item(i).removeAttribute('data-array');
var $source  = $input.item(i).outerHTML; var $source_temp = ''; 
for ($json = 0; $json < eval($varname).length; $json++) {
var $source_replace = $source; var $array_key = Object.keys(eval($varname)[$json]);
if (eval($varname)[$json][$array_key[0]] == undefined) continue;
for($rows = 0; $rows < $array_key.length;  $rows++) { 
$source_replace = $source_replace.split($varname + "["+ $array_key[$rows] +"]").join(eval($varname)[$json][$array_key[$rows]]); 
$source_replace = $source_replace.split("$key").join($json); 
}
$source_temp = $source_temp + $source_replace;
} $input.item(i).outerHTML = $source_temp;
}
}

var $input = document.querySelectorAll('[checked-if-value]');
for(i = 0 ; i < $input.length ; i++) {
	if (eval($input.item(i).getAttribute('checked-if-value')) == $input.item(i).getAttribute('value')) { $input.item(i).setAttribute('checked', 'checked'); }
}

// jquery auto - awal
function openDialog(title, url) {
$('.opened-dialogs').dialog("close"); $('.opened-dialogs-iframe').dialog("close");
$('<div class="opened-dialogs">').html('Tunggu Masih Loading...').dialog({
   title: title,  minHeight:500,  width: 1000,
   show: { effect: "blind", duration: 1000 },
   hide: { effect: "explode", duration: 1000 },
   open: function () { $(this).load(url); },
   close: function(event, ui) { $(this).remove(); },
 });
return false;
}

function openDialogImage(title, content) {
$('.opened-dialogs').dialog("close"); $('.opened-dialogs-iframe').dialog("close");
var $input = document.querySelectorAll('img[src]'); 
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(i).hasAttribute('abaikan')) continue;
if ($input.item(i).hasAttribute('width') && $input.item(i).getAttribute('width') < 64) continue;
if (!$input.item(i).getAttribute("src").match(/gambar.senimandigital.(?:kom|com)\//g)) continue;
$img[i] = '<div><img abaikan="true" src="'+ $input.item(i).getAttribute("src") +'"></div>';
}

$('<div class="opened-dialogs">').html('<container role="slideshow">'+ $img.join(' ') +'</containter>').dialog({
   title: title,  minHeight:500,  width: 1000,
   show: { effect: "blind", duration: 1000 },
   hide: { effect: "explode", duration: 1000 },
   //open: function () { $(this).load(url); },
   close: function(event, ui) { $(this).remove(); },
 });
return false;
}

function openDialogIframe(title, url) {
$('.opened-dialogs-iframe').dialog("close"); $('.opened-dialogs').dialog("close");
$('<div class="opened-dialogs-iframe" style="width:100%">').html('<iframe id="myIframe" frameborder="0" height="700"  width="1000" marginheight="0" marginwidth="0" src="" style="width:100%; height:95%; min-height:700px;">').dialog({
   title: title,  minHeight:700,  width: 1024,
   show: { effect: "blind", duration: 1000 },
   hide: { effect: "explode", duration: 1000 },
   open:  function(ev, ui) {  $('#myIframe').attr('src', url);  },
   close: function(event, ui) { $(this).remove(); },
 });

$('#myIframe').ready(function(){
var o = $('#myIframe');
    o.contentWindow.postMessage('Hello B', 'http://administrator.senimandigital.kom');
});


return false;
}

var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent"; var eventer = window[eventMethod]; var messageEvent = eventMethod === "attachEvent" ? "onmessage" : "message";
	eventer(messageEvent, function (e) { // if (e.origin !== 'http://the-trusted-iframe-origin.com') return;
 if (e.data === "remove-dialog" || e.message === "remove-dialog")  $('.opened-dialogs-iframe').dialog("close"); $('.opened-dialogs').dialog("close"); console.log(e);
});

var $input = document.querySelectorAll('td[role=aside]');
var $aside_width = 0; 	
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).innerHTML = '<aside>' + $input.item(i).innerHTML + '</aside>';
$aside_width = $aside_width + $input.item(i).clientWidth;
}

var $input  = document.querySelectorAll('td[role=article]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).setAttribute('style', 'max-width:'+ $aside_width +'px;');	 
$input.item(i).innerHTML = '<article>' + $dom_search + $input.item(i).innerHTML + '</article>';
}

$("img").each(function(){ if ($(this).width() > $('article').width()){ $(this).width('100%'); } });

$("img[width=64] ~ h4" ).css( "margin-top", "0px" ).css('padding-top', '5px');

$('a[href="="]').each(function( index ) { $(this).attr('href', $(this).html() )});
$('a[addhref]').each(function( index ) { $(this).attr('href', $(this).attr('addhref') + $(this).attr('href') ); });
$('[active="="]').each(function( index ) { $(this).attr('active', $(this).text() )});

$('h3').each(function( index ) { if ($(this).html() == '') $(this).html( $('meta[name=domain_sub]').attr('content') ) });

var $input = document.querySelectorAll('img[src]'); var $img = Array();
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(i).getAttribute('abaikan') == 'true') continue;
if (!$input.item(i).getAttribute("src").match(/gambar.senimandigital/g)) continue;
if ($input.item(i).naturalWidth < 64) continue;
if ($input.item(i).hasAttribute('width') && $input.item(i).getAttribute('width') < 64) continue;
$input.item(i).setAttribute("onclick", "openDialogImage('Image Slideshow', 'option')");
}

$(document).ready(function(){
  $("[role=slider]").css('text-align', 'center').css('margin','0 auto');
  slide_sub = $("[role=slider]>div").length; slide_id  = $("[role=slider]").attr("id");
  $('[role=slider]>div').each(function (index, value) { $(this).attr('id', 'slider-'+ (index+1)); }); $("[role=slider]>div").css('display', 'none');
  kontrol = '<ul style="height: 30px; margin: 0; height: 60px; padding: 0; text-align: center; font-size: 70px;">';  for (ulang = 1; ulang <= slide_sub; ulang++) { kontrol = kontrol + '<li id="controle-'+ slide_id +'-'+ ulang +'" style="margin: 0 0.2em; display: inline;"><a href="#">•</a></li>';  } kontrol = kontrol +'</ul>';  $("[role=slider]").html( kontrol + $("[role=slider]").html() );
  $("#" +slide_id+ "-1").fadeIn(500);
  for (ulang = 1; ulang <= slide_sub; ulang++) {
  $("#controle-" +slide_id+ "-" + ulang).click(function(e){
	slide_sub = $("[role=slider]>div").length; $("[role=slider]").attr("id"); slide_id  = $("[role=slider]").attr("id");
	for (ulang_slide = 1; ulang_slide <= slide_sub; ulang_slide++) { if   ($(this).attr('id').replace ( /[^\d.]/g, '' ) == ulang_slide) { $("#" +slide_id+ "-" +ulang_slide ).fadeIn(); }  else { $("#" +slide_id+ "-" +ulang_slide ).hide(); }	}
	});
  } /* end for (ulang) */
});

var $input = document.querySelectorAll('img[table]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).setAttribute("ondblclick", "openDialogIframe('Edit Image','http://senimandigital.kom/Templates/php/image_upload.php?table="+ $input.item(i).getAttribute('table') +"&data_id="+ $input.item(i).getAttribute('data_id') +"')");
}

var $input = document.querySelectorAll('[role=dialog-opener]');
for(i = 0 ; i < $input.length ; i++) {
eval('$( function() {  $( "#'+ $input.item(i).getAttribute('dialog-id') +'" ).dialog({  autoOpen: true,  width: 1014,  show: {  effect: "blind",  duration: 1000  },  hide: {  effect: "explode",  duration: 1000  }  });  $( "#'+ $input.item(i).getAttribute('id') +'" ).on( "click", function() {  $( "#'+ $input.item(i).getAttribute('dialog-id') +'" ).dialog( "open" );  });  } );');
}

var $input = document.querySelectorAll('[role=draggable]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $(function() {  $("#'+ $input.item(i).getAttribute('id') +'").draggable({ handle: "#handle-'+ $input.item(i).getAttribute('id') +'", containment: "parent", cursor: "move" });  }); ');
}

var $input = document.querySelectorAll('[role=accordion]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $(function() {  $("#'+ $input.item(i).getAttribute('id') +'").accordion();  }); ');
}

var $input = document.querySelectorAll('[role=menu]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $(function() {  $("#'+ $input.item(i).getAttribute('id') +'").menu();  }); ');
}

var $input = document.querySelectorAll('[role=tabs]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $(function() {  $("#'+ $input.item(i).getAttribute('id') +'").tabs();  }); ');
}

var $input = document.querySelectorAll('[role=sortable]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $(function() {  $("#'+ $input.item(i).getAttribute('id') +'").sortable({ cursor: "move" });  }); ');
}

function flip(id) { $('#'+ id).toggleClass('flipped'); }
$('[role=flip]').children(this).attr(  {ondblclick: 'flip(this.id)', title: 'Klik ganda untuk membalik'} );

$("nav").parents('td').css({"position": "relative"});

var $input = document.querySelectorAll('[jquery-plugins=form-builder]');
for(i = 0 ; i < $input.length ; i++) {
eval(' jQuery($ => { const fbTemplate = document.getElementById(\''+ $input.item(i).getAttribute("id") +'\');  $(fbTemplate).formBuilder(); }); ');
}

var $input = document.querySelectorAll('form[target-id]');
for(i = 0 ; i < $input.length ; i++) {
$("#"+ $input.item(i).getAttribute('id')).submit(function(event){ event.preventDefault(); 
var id_target = $(this).attr("target-id");     var post_url = $(this).attr("action");     var request_method = $(this).attr("method");     var form_data = $(this).serialize();
$.ajax({ url : post_url, type: request_method, data : form_data }).done(function(response){ $("#"+ id_target).html(response);  });
});
}

$('a[target-id]').click(function(event){ event.preventDefault();
var   request = $.ajax({ url: $(this).attr("href"),	method: "GET" }); 
eval('request.done(function(msg) { $("#'+ $(this).attr("target-id") +'").html( msg ); }); ');
      request.fail(function(jqXHR, textStatus ) {	alert( "Request failed: " + textStatus );  });
});

// jquery auto = akhir

var inputs = document.getElementsByName('anggota_id');
for(var i = 0; i < inputs.length; i++) {
if (inputs.item(i).getAttribute('value') == '') inputs.item(i).form.innerHTML = '<p class="error">Anda Belum Login, Usaha manipulasi tidak akan berhasil dan Data tidak akan tersimpan. Silahkan login sebelum melanjutkan pekerjaan. Terimakasih</p>' + inputs.item(i).form.innerHTML;
}

var $input = document.querySelectorAll('[role=deskripsi]:not([ondblclick])');
for(i = 0 ; i < $input.length ; i++) {
 $input.item(i).setAttribute("ondblclick", "openDialogIframe('Edit Deskripsi', 'http://administrator.senimandigital.kom/deskripsi_file_edit.php?popup=dialog&filename='+ document.querySelectorAll('meta[name=HOSTING_SCRIPT_FILENAME]').item(0).getAttribute('content') ); return false;");
}

var $input = document.querySelectorAll('pre[data-format]');
for(i = 0 ; i < $input.length ; i++) {  eval(' dp.SyntaxHighlighter.HighlightAll("'+ $input.item(i).getAttribute('name') +'");  ');  }

$input = document.querySelectorAll('label[for]');
for(var i=0; i< $input.length; i++) {
if ($input.item(i).innerHTML.substring($input.item(i).innerHTML.length -3, $input.item(i).innerHTML.length) == '_id') {
$input.item(i).innerHTML = $input.item(i).innerHTML.substring(0, $input.item(i).innerHTML.length -3); }
$input.item(i).innerHTML = $input.item(i).innerHTML.replace(/_/ig, ' ');
}

var $input = document.getElementsByTagName('input'); var $label = document.getElementsByTagName('label');
for(i = 0 ; i < $input.length ; i++) { if ($input.item(i).hasAttribute('required') !=true) continue;
for(l = 0 ; l < $label.length ; l++) { if ($label.item(l).getAttribute('for') != $input.item(i).getAttribute('name')) continue;
$label.item(l).innerHTML = $label.item(l).innerHTML + '*';
}}

var $input = document.querySelectorAll('[nameadd]');
for(i = 0 ; i < $input.length ; i++) {
      $input.item(i).name = $input.item(i).getAttribute('name') + $input.item(i).getAttribute('nameadd');
}

var $input = document.querySelectorAll('input,select,textarea');
for(i = 0 ; i < $input.length ; i++) { 
 if ($input.item(i).hasAttribute('id')) continue;
     $input.item(i).setAttribute("id", $input.item(i).getAttribute('name') );
}

var $input = document.querySelectorAll('input,select,textarea');
for(i = 0 ; i < $input.length ; i++) { 
if ( String(new URLSearchParams(window.location.search)).indexOf($input.item(i).getAttribute('name') +'=') >= 0
&&   String(new URLSearchParams(window.location.search)).indexOf('form[builder]') == 0) $input.item(i).readOnly = true;;
}

var $input = document.querySelectorAll('[role=editable]');
for(i = 0 ; i < $input.length ; i++) {
eval(' $("#'+ $input.item(i).getAttribute("id") +'").editableSelect(); ');
}

var $input = document.querySelectorAll('[slug-from]');
for(i = 0 ; i < $input.length ; i++) { var $temp_sumber = $input.item(i).getAttribute("slug-from");  var $temp_target = $input.item(i).getAttribute("id"); window.addEventListener('load',function(){
document.getElementById($temp_sumber).addEventListener("keyup", function(){	document.getElementById($temp_target).value = document.getElementById($temp_sumber).value.replace(/\s+/g, '-').toLowerCase(); });
}); }

var $input = document.querySelectorAll('[unslug-from]');
for(i = 0 ; i < $input.length ; i++) { var $temp_sumber = $input.item(i).getAttribute("unslug-from");  var $temp_target = $input.item(i).getAttribute("id"); window.addEventListener('load',function(){
document.getElementById($temp_sumber).addEventListener("keyup", function(){	document.getElementById($temp_target).value = document.getElementById($temp_sumber).value.split('_').map(function(x) { return x.charAt(0).toUpperCase() + x.slice(1); }).join(' '); });
}); }

var $input  = document.querySelectorAll('[currency]');
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(i).innerHTML.match(/\d{1,3}/g)) { 
$input.item(i).innerHTML = '<table border="0" cellpadding="0" cellspacing="0"><tr><td>Rp.</td><td align="right">' + $input.item(i).innerHTML.toString().split('').reverse().join('').match(/.{1,3}/g).join('.').split('').reverse().join('') + ',00</td></tr></table>';
$input.item(i).removeAttribute('currency');
}}

var $concat = document.querySelectorAll('[concat]');
for(c=0; c<$concat.length; c++) {
	var $concatgroup = $concat.item(c).getAttribute('concat-group').split($concat.item(c).getAttribute('concat'));
		for (cg = 0; cg < $concatgroup.length; cg++) {
			 $concat.item(c).innerHTML = $concat.item(c).innerHTML + '<input type="hidden" name="'+ $concat.item(c).getAttribute('concat-output') +'__'+ $concatgroup[cg] +'">';
		}
   }


var $input = document.querySelectorAll('[values]');
for(i = 0 ; i < $input.length ; i++) {
  $input.item(i).setAttribute('onchange', "this.value = this.value + \'&\' + this.getAttribute(\'values\')");
  $input.item(i).setAttribute('onfocus',  "this.value = \'\'");
}

var $input = document.querySelectorAll('[prefix]');
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(i).value == '') {
  $input.item(i).setAttribute('onfocus',  "this.value = this.getAttribute(\'prefix\')");
}}

var $input = document.querySelectorAll('textarea[data-rows]');
for(i = 0 ; i < $input.length ; i++) {
var $rows = $input.item(i).innerHTML.split(/\r\n|\r|\n/).length + 2;
$input.item(i).setAttribute('rows', $rows);
}

function innerHTMLlength(e) { document.getElementById(e.name +"__count").innerHTML = (e.getAttribute('maxlength') > 0) ? e.value.length +' / ' + e.getAttribute('maxlength') : e.value.length;  }
$input = document.querySelectorAll('[count]');
for(var i=0; i< $input.length; i++) {
$input.item(i).setAttribute('onkeyup', 'innerHTMLlength(this)');
$input.item(i).outerHTML = $input.item(i).outerHTML + '<span id="'+ $input.item(i).name +'__count"></span>';
}

var $input = document.querySelectorAll('select[data-var]');
for(i = 0 ; i < $input.length ; i++) {
var option = eval($input.item(i).getAttribute('data-var'));
if ($input.item(i).hasAttribute('group-filter') == true) {
    option = option.match('<optgroup label="' + $input.item(i).getAttribute('group-filter') + '".*?</optgroup>');
}
$input.item(i).innerHTML = $input.item(i).innerHTML + option;
$input.item(i).removeAttribute('data-var')
}

var $input = document.querySelectorAll('select[redirect]');
for(i = 0 ; i < $input.length ; i++) {
 $input.item(i).setAttribute('onchange', 'location = \''+ $input.item(i).getAttribute('redirect') + '\'+ this.options[this.selectedIndex].value');
}

var $input = document.querySelectorAll('select[multiple]');
for(i = 0 ; i < $input.length ; i++) {
var $name =  $input.item(i).getAttribute('name'); $input.item(i).removeAttribute('name');
$input.item(i).outerHTML = $input.item(i).outerHTML + '<input type="hidden" name="' + $name + '" />';
}

var $input = document.querySelectorAll('select[value]');
for(i = 0 ; i < $input.length ; i++) { var option;
    for (o = 0; o < $input.item(i).options.length; o++) { option = $input.item(i).options[o];
     if (option.value == $input.item(i).getAttribute('value')) { option.setAttribute('selected', true); } 
}}

var $input = document.querySelectorAll('[repeat]');
for(i = 0 ; i < $input.length ; i++) {
    var $source = $input.item(i).outerHTML;
    var $jumlah = $input.item(i).getAttribute('repeat'); $input.item(i).removeAttribute('repeat');
    $input.item(i).outerHTML = $source.repeat($jumlah);
}

var $input = document.querySelectorAll('[label-left]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<table border="0" cellpadding="0" cellspacing="0"><tr><td><label for="' + $input.item(i).getAttribute('name') + '">' + $input.item(i).getAttribute('label-left') + '</label></td><td>' + $input.item(i).outerHTML + '</td></tr></table>';
}

var $input = document.querySelectorAll('select[href-blank]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<table border="0" cellpadding="0" cellspacing="0"><tr><td>' + $input.item(i).outerHTML + '</td><td valign="middle" width="27" title="Klik Untuk Melihat di Jendela Baru" style="padding-top:2px; padding-left:5px;"><a href="' + $input.item(i).getAttribute('href-blank') +'" target="_new"><img src="http://gambar.senimandigital.kom/website/form-select-windows-new.gif" height="27" /><a></td></tr></table>';
}

var $input = document.querySelectorAll('select[href-insert]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<table border="0" cellpadding="0" cellspacing="0"><tr><td>' + $input.item(i).outerHTML + '</td><td valign="middle" width="27" title="Merasa data ini kurang... ? Tambah data referensi baru" style="padding-top:2px; padding-left:5px;"><a href="' + $input.item(i).getAttribute('href-insert') +'" target="_new"><img src="http://gambar.senimandigital.kom/website/form-select-add.png" height="27" /><a></td></tr></table>';
}

var $input = document.querySelectorAll('select[href-popup]');
for(i = 0 ; i < $input.length ; i++) {
var $hrefpopup = $input.item(i).getAttribute("href-popup"); $input.item(i).removeAttribute('href-popup');
    $input.item(i).outerHTML  = '<table border="0" cellspacing="0" cellpadding="0"><tr><td>' + $input.item(i).outerHTML + '</td><td valign="middle" width="32"><a onclick="window.open(\'' + $hrefpopup + '&popup\', \'Detail\', \'top=200, left= 100, height=600, width=800\');" title="Silahkan menambah dari sini jika tidak menemukan data referensi"><img src="http://gambar.senimandigital.kom/website/form-select-add.png" height="27" style="margin-top:2px; margin-left:3px;"></a></td></tr></table>';
}

var $input = document.querySelectorAll('select[href-dialog]');
for(i = 0 ; i < $input.length ; i++) {
var $hrefpopup = $input.item(i).getAttribute("href-dialog"); $input.item(i).removeAttribute('href-dialog');
    $input.item(i).outerHTML  = '<table border="0" cellspacing="0" cellpadding="0"><tr><td>' + $input.item(i).outerHTML + '</td><td valign="middle" width="32"><a onclick="openDialogIframe(\'Tambah\', \'' + $hrefpopup + '&popup=dialog\');" title="Silahkan menambah dari sini jika tidak menemukan data referensi"><img src="http://gambar.senimandigital.kom/website/form-select-add.png" height="27" style="margin-top:2px; margin-left:3px;"></a></td></tr></table>';
}

var $input = document.querySelectorAll('select[option-nav]');
/* Jump to next option :: Request: url-change="parameter" */
for(i = 0 ; i < $input.length ; i++) {
var $ketemu = 0; var $input_option = $input.item(i).querySelectorAll('option');
for(sub_i = 0 ; sub_i < $input_option.length ; sub_i++) { 
if ( ($input_option.item(sub_i).getAttribute('value') == $input.item(i).getAttribute('value')) || ($ketemu < 1)) { 
    if ( $input_option.item(sub_i).getAttribute('value') == $input.item(i).getAttribute('value')) {
		 $input.item(i).setAttribute('value-next', $input.item(i).getAttribute('value'));
	} else if ( $input.item(i).hasAttribute('value-next') ) { $ketemu = $ketemu + 1; 
			 $input.item(i).setAttribute('value-next', $input_option.item(sub_i).getAttribute('value'));
    }
   }
  }
 $input.item(i).outerHTML  = '<table border="0" cellspacing="0" cellpadding="0"><tr><td>' + $input.item(i).outerHTML + '</td><td valign="middle" width="32"><a href="javascript:url_change_parameter(\''+ $input.item(i).name +'\',\''+ $input.item(i).getAttribute('value-next') +'\');" subdomain="'+ $input.item(i).getAttribute('value-next') +'" onclick="$(\'[name='+ $input.item(i).getAttribute('name') +']\').val(\''+ $input.item(i).getAttribute('value-next') +'\').attr(\'value\', \''+ $input.item(i).getAttribute('value-next') +'\');" title="Klik, Untuk Melompat ke opsi selanjutnya {'+ $input.item(i).getAttribute('value-next') +'}"><img src="http://gambar.senimandigital.kom/website/form-select-next.png" height="27" style="margin-top:2px; margin-left:3px;"></a></td></tr></table>';
}

var $input = document.querySelectorAll('ul[tabs-kontrol]>li>a');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).setAttribute('onclick', '$(\'#tabs\').tabs({active:'+ i +'});');
}

var $input = document.querySelectorAll('li[data-url]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).innerHTML = '<a target="_new" href="'+ $input.item(i).innerHTML +'">' + $input.item(i).innerHTML + '</a>';
}

var $input = document.querySelectorAll('button[align=center]');
for(i = 0 ; i < $input.length ; i++) { $input.item(i).outerHTML = '<center>' + $input.item(i).outerHTML + '</center>'; }

var $input = document.querySelectorAll('[data-post=optional]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).removeAttribute('data-post');
$input.item(i).outerHTML = '<table border="0" cellpadding="0" cellspacing="0"><tr><td style="width:50px; margin-right:0;"><input type="checkbox" checked-if="'+ $input.item(i).getAttribute('name') +'.disabled" onchange="document.getElementsByName(\''+ $input.item(i).getAttribute('name') +'\')[0].disabled = !this.checked;" style="zoom:1.8" title="Centang Jika ingin mengirimkan data" /></td><td>'+ $input.item(i).outerHTML +'</td></tr></table>';
}

if (window.location.href.indexOf('?') !== -1) {
var $_GET = new function(){ var fullUrl   = window.location.href.split('?'); var urlParams = fullUrl[1].split('&');  $_GET = new Array();
for(i=0 ; i<=urlParams.length-1 ; ++i) { var param = urlParams[i].split('='); var name  = param[0]; var value = param[1]; $_GET[name] = value; }
return $_GET; } }

var $MenuNavigasi = new Array();
$MenuNavigasi.push('<li><a href="' + $metarequesturl.substring(0, $metarequesturl.indexOf("/", 15)) + '>Home</a><li>');
$MenuNavigasi.push('<li><a href="' + $metarequesturl.substring(0, $metarequesturl.lastIndexOf("?")) + '>Query String<<li>');
$MenuNavigasi.push('<li><a href="' + $metarequesturl.substring(0, $metarequesturl.lastIndexOf("&")) + '>Query String<<li>');
$MenuNavigasi = '<ul>' + $MenuNavigasi.join(' ') + '</ul>';
// alert($MenuNavigasi);

$input = document.querySelectorAll('section[editor]');
for(var i=0; i< $input.length; i++) {
$input.item(i).innerHTML = '<img align="right" height="16" title="Edit Menu Konten" src="'+ document.querySelectorAll('meta[name=domain_gambar]').item(0).getAttribute('content') +'website/form_engine.png" onclick="openDialogIframe(\'Edit Menu Konten\', \''+ $input.item(i).getAttribute('editor') +'\');" />'+ $input.item(i).innerHTML;
}

var $input = document.querySelectorAll('h3');
    $input.item(0).setAttribute("ondblclick", "window.location.href ='"+ $metarequesturl +"';");
if (document.querySelectorAll('meta[name=anggota_level_alias]').item(0).getAttribute('content') == 'admin') $input.item(0).innerHTML = $input.item(0).innerHTML + '<img src="'+ document.querySelectorAll('meta[name=domain_gambar]').item(0).getAttribute('content') +'website/form_create_menu.png" height="22" style="float:right; margin-left:5px; margin-top:-1px;" title="Klik untuk membuat menu bagi halaman ini" onclick="openDialogIframe(\'Buat menu untuk halaman ini\', \''+ document.querySelectorAll('meta[name=domain_administrator]').item(0).getAttribute('content') +'menu_tambah.php?menu_upline_id=0&subdomain='+ document.querySelectorAll('meta[name=domain_sub]').item(0).getAttribute('content') +'&menu_link='+ document.querySelectorAll('meta[name=REQUEST_URL]').item(0).getAttribute('content') +'&popup=dialog\')"/></a>';

/* var $tem   = '';
var $meta  = document.querySelectorAll('meta[name=data-search]');
if ($input.length && $meta.length ) {
var $array_meta = $meta.item(0).getAttribute("content").split(',');
for(var i = 0; i < $array_meta.length; i++) { $tem = $tem
+ '<li style="width:25%; float:left;"><table border="0" cellpadding="0" cellspacing="0"><tr><td>' + document.querySelectorAll('label[for=' + $array_meta[i] + ']').item(0).innerHTML + '</td></tr>'
+ '<tr><td><input type="text" name="' + $array_meta[i] + '" style="width:100%;" /></td></tr></table></li>';
}
$input.item(0).outerHTML = $input.item(0).outerHTML
+ '<form name="smart-search"><ul style="list-style-type:none; padding:0px;">' + $tem
+ '</ul><div role="caption" style="padding-left: 10px; clear:both;"><input type="submit" name="cari" value="CARI" /> <input type="button" name="reset" value="KOSONGKAN" /></div></form>';
} */

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

/*
var $search  = document.querySelectorAll('meta[name=anggota_id]'); var $dom_search = '';
for(i = 0 ; i < $search.length ; i++) {
$dom_search = '<div style="float:left;">&nbsp;/<a href="/'+ window.location.href.split('/')[3] +'/">'+ window.location.href.split('/')[3] +'</a></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_edit.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img data-inset="true" src="http://gambar.senimandigital.kom/website/form_konfigurasi.png" width="20"></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_tambah.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img data-inset="true" src="http://gambar.senimandigital.kom/website/form_plus.gif" width="20"></div>'
+ '<div style="float:right;" href="/meta/htm/meta_htm_tambah.php?meta_htm_name=description&meta_htm_location='+ location.href.substr(location.href.indexOf('om/') + 2, location.href.indexOf('.php') + 4).split('?')[0] +'"><img data-inset="true" src="http://gambar.senimandigital.kom/website/form_cari.png" width="20"></div>'
+ '<div style="float:right;"><input type="text"></div>';
}
/* */
var $input = document.querySelectorAll('[show-if-value]');
for(i = 0 ; i < $input.length ; i++) {
 if ($input.item(i).hasAttribute('check-innerHTML') && $input.item(i).innerHTML.toString().match(eval($input.item(i).getAttribute('check-innerHTML'))) === null) { $input.item(i).setAttribute('value', 0);};
 if ($input.item(i).getAttribute('show-if-value') !== $input.item(i).getAttribute('value')) { $input.item(i).outerHTML = ""; }
}
$('[show-option]').each(function( index ) { $(this).hide();     $('#'+ $(this).attr('show-option') ).on('change', function(){  $('[show-option]').hide();  $('[selected*='+ $(this).val() +']').show();  });     });

var $input = document.querySelectorAll('[data-active]>li');
for(i = 0 ; i < $input.length ; i++) {
if  ($_GET[$input.item(0).parentNode.getAttribute('data-active')] == $input.item(i).getAttribute('data-id')) {
           $input.item(i).setAttribute('class', 'active');
} else if ($input.item(0).parentNode.getAttribute('data-active') == $input.item(i).getAttribute('data-id')) {
           $input.item(i).setAttribute('class', 'active');
}}

var $input = document.querySelectorAll('[active]>li');
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(0).parentNode.getAttribute('active') == $input.item(i).getAttribute('active')) {
           $input.item(i).setAttribute('class', 'active');
}}

var $UlDataField = document.querySelectorAll('ul[data-field]>li');
for(i = 0 ; i < $UlDataField.length ; i++) {
if ($UlDataField.item(i).getAttribute('data-id') == $_GET[$UlDataField.item(i).parentNode.getAttribute('data-field')] ) {
if ($UlDataField.item(i + 1) !== null) { 
var $NextMasterPage = $UlDataField.item(i + 1).innerHTML;
}}}

var $input = document.querySelectorAll('article');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).innerHTML = '<div><div style="margin: auto; width:100%; position:relatif;"><img style="float:left;" src="http://gambar.senimandigital.kom/website/action-back.png" width="16" alt="<<" title="Kembali kehalaman sebelumnya" onclick="javascript:history.back()"/><div title="Halaman Selanjutnya" style="float:right">'+ $NextMasterPage +'</div></div></div>' + $input.item(i).innerHTML;
}

$('[url-remove-parameter],[url-delete-parameter]').click(function(){ var searchParams = new URLSearchParams(window.location.search);
    searchParams.delete( $(this).attr('url-remove-parameter') );
    window.location = document.querySelectorAll('meta[name=PHP_SELF]').item(0).getAttribute('content') +'?'+ searchParams.toString();
});

$('[url-change=parameter],[url-update=parameter]').change(function(){ var searchParams = new URLSearchParams(window.location.search);
    searchParams.set( $(this).attr('name'), $(this).val() );
    window.location = document.querySelectorAll('meta[name=PHP_SELF]').item(0).getAttribute('content') +'?'+ searchParams.toString();
});

$('[url-change]>li>a').each(function(){ var searchParams = new URLSearchParams(window.location.search);
    searchParams.set( $(this).parent().parent().attr('url-change'), $(this).attr('href') );
	$(this).attr('href', document.querySelectorAll('meta[name=PHP_SELF]').item(0).getAttribute('content') +'?'+ searchParams.toString());
});

$('input[type=radio][checked-if-value]').each(function() {   if ( $(this).attr('checked-if-value') == $(this).attr('value') )  {  $(this).removeAttr('checked-if-value'); $(this).setAttr('checked'); }  });

var $input = document.querySelectorAll('textarea[data-format]');
for(i = 0 ; i < $input.length ; i++) {
if ($input.item(i).hasAttribute('mode')) {
if ($input.item(i).getAttribute('id').indexOf("-") > 0) alert('Gunakan Karakter Underscore untuk ID dan Bukan Karakter/Operator Minus');
eval('var editor_' + $input.item(i).getAttribute('id') + ' = CodeMirror.fromTextArea(document.getElementById("' + $input.item(i).getAttribute('id') + '"), { lineNumbers: true, lineWrapping: true, mode: "' + $input.item(i).getAttribute('mode') + '", matchBrackets: true });');
} else {
var $level = document.querySelectorAll('meta[name=anggota_level_alias]').item(0).getAttribute('content');
if ($level == 'admin') {
tinyMCE.init({ selector: '#'+ $input.item(i).getAttribute('name'),  height: 500,                  plugins: 'code table autolink directionality visualblocks visualchars fullscreen image link media template codesample charmap hr pagebreak nonbreaking anchor toc advlist lists imagetools textpattern', toolbar1: 'code formatselect numlist bullist | bold italic strikethrough forecolor backcolor  | link image media | alignleft aligncenter alignright alignjustify  | outdent indent | removeformat', templates : 'index.php?TinyMCE', convert_urls: false, extended_valid_elements : 'table[*]'  });
} else {
tinymce.init({ selector: '#'+ $input.item(i).getAttribute('name'),  height: 300,  menubar: false, plugins: ['advlist autolink lists link image charmap print preview anchor textcolor', 'searchreplace visualblocks code fullscreen', 'insertdatetime media table paste code help wordcount'], toolbar: 'formatselect | bold italic | link image media | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help' });
}}}

var $input = document.querySelectorAll('[data-replace=javascript]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<table><tr><td><input type="text" id="'+ $input.item(i).name +'-cari"  placeholder="kata yang dicari"/></td><td><input type="text" id="'+ $input.item(i).name +'-ganti" placeholder="kata pengganti" /></td><td align="right"><input type="button" name="button_proses" value="Terapkan Perubahan" onclick="document.getElementById(\''+ $input.item(i).name +'\').value = document.getElementById(\''+ $input.item(i).name +'\').value.split(document.getElementById(\''+ $input.item(i).name +'-cari\').value).join(document.getElementById(\''+ $input.item(i).name +'-ganti\').value)" /></td></tr></table>' + $input.item(i).outerHTML;
}

var $input = document.querySelectorAll('thead[role=lock]');
for(i = 0 ; i < $input.length ; i++) {
  $input.item(i).parentNode.outerHTML = '<div style=" margin: 0 0 0 0; margin-top:-2px; position:fixed;"><table frame="box" border="1">' + $input.item(i).outerHTML +'</table></div>' + $input.item(i).parentNode.outerHTML;
}

var $input = document.querySelectorAll('ul[role=context]');
for(i = 0 ; i < $input.length ; i++) {
var $link = $input.item(i).document.querySelectorAll('li').item(1).document.querySelectorAll('a').item(1);
    $input.item(i).outerHTML  = '<ul class="MenuBarHorizontal"><li>'+ $link +'<ul data-align="right" class="drop">' + '<li>Dino</li>' + '</ul></li></ul>';
}

var $input = document.querySelectorAll('[data-filter=true]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<input type="text" id-target="'+ $input.item(i).getAttribute('id') +'" id="'+ $input.item(i).getAttribute('id') +'_search_input" placeholder="Filter Data" style="left:-30px; background-image: url(http://gambar.senimandigital.kom/website/form_cari.png); background-position: 7px 4px; background-repeat: no-repeat; text-indent: 2em; margin-bottom:10px;">' + $input.item(i).outerHTML;
    $("#"+ $input.item(i).getAttribute('id') +"_search_input").on("keyup", function() { var value = $(this).val().toLowerCase();  $("#" + $(this).attr('id-target') + " li").filter(function() { $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) });  });
}

var $input = document.querySelectorAll('img[data-icon]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('src', '/gambar/website/' + $input.item(i).getAttribute('data-icon') + '.png');
}

var $input = document.querySelectorAll('[data-split-icon]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('src', '/gambar/split-icon/' + $input.item(i).getAttribute('data-split-icon') + '.png');
}

var $input = document.querySelectorAll('[margin]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).outerHTML = '<div style="padding:'+ $input.item(i).getAttribute('margin') + ';">'+ $input.item(i).outerHTML +'</div>';
}

var $input = document.querySelectorAll('[hrefadd]');
for(i = 0 ; i < $input.length ; i++) {
var $ul = new DOMParser().parseFromString($input.item(i).outerHTML, "text/html");
var $href = $ul.querySelectorAll('[href]');
	for($ulang = 0 ; $ulang < $href.length ; $ulang++) {
		$href.item($ulang).setAttribute("href", $href.item($ulang).getAttribute('href') + $input.item(i).getAttribute('hrefadd')); 
	}
    $input.item(i).outerHTML = $ul.querySelectorAll($input.item(i).tagName).item(0).outerHTML ;
}

var $input = document.querySelectorAll('a[rev], a[popup]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute("onclick", "window.open('" + $input.item(i).getAttribute('href') + "&popup', 'Detail', 'top=200, left= 100, height=600, width=800'); return false;");
}

var $input = document.querySelectorAll('a[href]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).setAttribute("href", $input.item(i).getAttribute('href').replace('//','/').replace('http:/','http://'));
    if ($input.item(i).getAttribute('href').indexOf('edit.php?') != -1
    ||  $input.item(i).getAttribute('href').indexOf('tambah.php?') != -1)
    { $input.item(i).setAttribute("onclick", "window.open('" + $input.item(i).getAttribute('href') + "&popup', 'Detail', 'top=200, left= 100, height=600, width=1024'); return false;"); }
}

var $input = document.querySelectorAll('div[href], img[href]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute("onclick", "window.location.href ='" + $input.item(i).getAttribute('href') + "';");
}

var $input = document.getElementsByTagName('td');
for(i = 0 ; i < $input.length ; i++) {
if (Number.isInteger(parseInt($input.item(i).innerHTML)) == true && $input.item(i).innerHTML.substr(0, 1) !== '0' || $input.item(i).innerHTML == '0') {
    $input.item(i).setAttribute('align', 'right');
}}

var $input = document.querySelectorAll('[href-popup]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('onclick', 'window.open(\'' + $input.item(i).getAttribute("href-popup").replace('?', '?popup&') + '\', \'Detail\', \'top=200, left= 100, height=600, width=800\');');
}

var $input = document.querySelectorAll('[href-dialog]');
for(i = 0 ; i < $input.length ; i++) {
    $input.item(i).setAttribute('onclick', 'openDialogIframe(\'Edit\', \'' + $input.item(i).getAttribute("href-dialog").replace('?', '?popup=dialog&') +'\');');
}

var $table = document.querySelectorAll('table[column] > tbody');
for(t = 0 ; t < $table.length; t++) {
var $tdtemp = '';
var $td    = $table.item(t).querySelectorAll('table[column]>tbody>tr>td');
for(i = 0 ; i < $td.length ; i++) {
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '10') { var $width = 100 / 10; var $column = 10; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '9') { var $width = 100 / 9; var $column = 9; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '8') { var $width = 100 / 8; var $column = 8; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '7') { var $width = 100 / 7; var $column = 7; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '6') { var $width = 100 / 6; var $column = 6; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '5') { var $width = 100 / 5; var $column = 5; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '4') { var $width = 100 / 4; var $column = 4; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '3') { var $width = 100 / 3; var $column = 3; }
if ($td.item(i).parentNode.parentNode.parentNode.getAttribute('column') == '2') { var $width = 100 / 2; var $column = 2; }
 $td.item(i).setAttribute('width', $width + '%');
 $td.item(i).setAttribute('margin-bottom', '10px');
 $tdtemp = $tdtemp + $td.item(i).outerHTML;
 if ((i+1) %$column == 0 ) { $tdtemp = $tdtemp + '</tr><tr>'; }
if ((i+1) == $td.length) {
$td.item(i).parentNode.parentNode.parentNode.removeAttribute('column');
$td.item(i).parentNode.parentNode.innerHTML = '<tr>' + $tdtemp; + '</tr>';
}}}


var tableData = document.querySelectorAll('table[data-order-by-column]');
if (tableData.length) {
    tableData = tableData.item(0).getElementsByTagName('tbody').item(0);
var rowData = tableData.getElementsByTagName('tr');
for(var i = 0; i < rowData.length - 1; i++) {
  for(var j = 0; j < rowData.length - (i + 1); j++) {
     if(rowData.item(j).getElementsByTagName('td').item(tableData.parentNode.getAttribute("data-order-by-column")).innerHTML > rowData.item(j+1).getElementsByTagName('td').item(tableData.parentNode.getAttribute("data-order-by-column")).innerHTML) {
                    tableData.insertBefore(rowData.item(j+1),rowData.item(j));
       }
  }
}}

$(document).ready(function(e) {  $("[data-post]").on( "focusout", function(e) {
var post = new Object({});     post[$(this).attr('name')] = $(this).val();     var $field = $(this).attr('data-post').split(',');     var gambar = $(this).attr('name');
$(this).after(function() { eval('$("[name='+ gambar +'_loading]").remove();'); return '<img name="'+ $(this).attr('name') +'_loading" src="'+  $('meta[name=domain_gambar]').attr('content') +'website/form_loading.gif" width="16" height="16" />'; });
for(var i=0; i< $field.length; i++) { post[$field[i]] = $(this).attr($field[i]);   if (post[$field[i]] === undefined)  post[$field[i]] = $(this).val(); }
$.post( $('meta[name=ajax_edit_url]').attr('content'), post )  .done(function( data ) {  eval('$([name='+ gambar +'_loading]).remove();');  })  .always(function( data ) { eval('$([name='+ gambar +'_loading]).remove();'); });
}); });
