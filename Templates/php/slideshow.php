<?php require_once('../../Connections/senimandigital.php'); ?>
<style>
[role=slideshow] {
  max-width: 100%; position: relative;  margin: auto;
}
[role=slideshow]>div {  display: none; }
[role=slideshow] .prev, [role=slideshow] .next {
  cursor: pointer;  position: absolute;  top: 50%;  user-select: none;  transition: 0.6s ease;
  width: auto;  margin-top: -22px;  padding: 16px;  border-radius: 0 3px 3px 0;
  color: white;  font-weight: bold;  font-size: 18px;
}
[role=slideshow] .next {  right: 0;  border-radius: 3px 0 0 3px;  }
[role=slideshow] .prev:hover, [role=slideshow] .next:hover {  background-color: rgba(0,0,0,0.8);  }
[role=slideshow] .fade {  -webkit-animation-name: fade; -webkit-animation-duration: 1.5s;  animation-name: fade;         animation-duration: 1.5s;  }
@-webkit-keyframes [role=slideshow] fade {  from {opacity: .4}   to {opacity: 1}  }
@keyframes fade {  from {opacity: .4}   to {opacity: 1}  }
nav .dot {
  border-radius: 50%;  cursor: pointer;  display: inline-block;
  height: 25px;  width: 25px;  margin: 0 2px;  background-color: #bbb;
  transition: background-color 0.6s ease;
}
nav .active, nav .dot:hover {  background-color: #717171;  }
</style>
<table>
<tr>
<td role="article" valign="top">
<section>
<h3>Slideshow</h3>
<p role="deskripsi">Script ini baru dimodifikasi agar dapat menampilkan kontrol secara dinamis, belum dipastikan untuk perulangan/multiple slide</p>
<div>
<div role="slideshow" id="slideshow">
  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>

  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>

  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>
</div>
<div role="slideshow" id="slideshow2">
  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>

  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>

  <div class="fade">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>artikel/website/dreamweaver-genarate-behavior-connection.png" style="width:100%">
  </div>
</div>
</div>
</section>
</td>
<td role="aside">
<section>
<h3>Menu</h3>
<script language="JavaScript" type="text/javascript">
function plusSlides(n, id)   {  showSlides(slideIndex += n, id);  }
function currentSlide(n, id) {  showSlides(slideIndex = n, id);   }
function showSlides(n, id)   {  var i = Array();  
var slides = document.querySelectorAll('[role=slideshow][id='+ id +']>div');  var dots = document.querySelectorAll("nav[for="+ id +"]>span[class*=dot]");
if (n > slides.length) {slideIndex = 1}   if (n < 1) {slideIndex = slides.length}
for (i[id] = 0; i[id] < slides.length; i[id]++) { slides[i[id]].style.display = "none";   }
for (i = 0; i < dots.length; i++) {   dots[i].className = dots[i].className.replace(" active", "");  }
  slides[slideIndex-1].style.display = "block";   dots[slideIndex-1].className += " active";
}

$input = document.querySelectorAll('[role=slideshow]'); var $dot = Array(''); 
for (var i=0; i< $input.length; i++) {
 $dot[$input.item(i).getAttribute('id')] = '';
 $count = document.querySelectorAll('[role=slideshow][id='+ $input.item(i).getAttribute('id') +']>div');
 for(var d=1; d<= $count.length; d++) {
  $dot[$input.item(i).getAttribute('id')] = $dot[$input.item(i).getAttribute('id')] +'<span class="dot" onclick="currentSlide('+ d +', \''+ $input.item(i).getAttribute('id') +'\')"></span>';
 }
}

for(var i=0; i<$input.length; i++) {
$input.item(i).innerHTML = $input.item(i).innerHTML + '<a class="prev" onclick="plusSlides(-1, \''+ $input.item(i).getAttribute('id') +'\')">&#10094;</a><a class="next" onclick="plusSlides(1, \''+ $input.item(i).getAttribute('id') +'\')">&#10095;</a>';
$input.item(i).outerHTML = $input.item(i).outerHTML + '<br><nav for="'+ $input.item(i).getAttribute('id') +'" style="text-align:center">'+ $dot[$input.item(i).getAttribute('id')] +'</nav>';
}
var slideIndex = 1;
for(var i=0; i<$input.length; i++) {
   showSlides(slideIndex, $input.item(i).getAttribute('id'));
}
</script>
</section>
</td>
</tr>
</table>
