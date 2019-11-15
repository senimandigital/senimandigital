function implodegroup($elemen) {
	  var $group = document.querySelectorAll('[id='+ $elemen.getAttribute('id') +']');
	  var $hasil = Array('');
	  for (g = 0 ; g < $group.length ; g++) {
		  if ($group.item(g).checked == true) {
		   $hasil[g] = $group.item(g).getAttribute('value');
		  }
	  }
    document.getElementsByName($elemen.getAttribute('implodegroup')).item(0).value = $hasil;
  }
  
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') { c = c.substring(1); }
        if (c.indexOf(name) == 0) { return c.substring(name.length,c.length); }
    }
    return "";
}

function MM_jumpMenu(targ, selObj, restore){ //v3.0
  if (selObj.hasAttribute("href")) {
  eval(targ + ".location='" + selObj.getAttribute("href") + "?" + selObj.name + "=" + selObj.options[selObj.selectedIndex].value 
	 + "'");
  }

  if (selObj.hasAttribute("request")) {
	  var $request = selObj.getAttribute("request");
	  eval(targ + ".location='"
	  + document.getElementsByName($request)[0].getAttribute("href") 
      + "?" + $request + "="
	  + document.getElementsByName($request)[0].options[document.getElementsByName($request)[0].selectedIndex].value 
      + "&" + selObj.name + "="
	  + selObj.options[selObj.selectedIndex].value 
	  + "'");
  }	  
  
  if (restore) selObj.selectedIndex=0;
}
