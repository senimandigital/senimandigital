<script>
<?php /* Menghitung karakter semisal pada textarea, fungsi otomatis menempatkan posisi count pada sudut kanan bawah textarea.
<div style="position:relative;">
  <textarea id="text" onKeyUp="hitung_karakter(this)" data-counter-id="counter"></textarea>
  <div id="counter" style=" position:absolute; right:10; bottom:5">12</div>
</div>
*/ ?>
function hitung_karakter($objek){ 
   document.getElementById($objek.getAttribute('data-counter-id')).innerHTML =  
   document.getElementById($objek.getAttribute('id')).value.length; }
</script>
