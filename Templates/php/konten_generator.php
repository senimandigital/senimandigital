<pre>
<?php
$xml = simplexml_load_string($row_halaman['halaman_konten']) or die("Error: Cannot create object");
//$xml = $row_halaman['halaman_konten'] or die("Error: Cannot create object");
function object2array($object) { return @json_decode(@json_encode($object),1); } 
print_r(object2array($xml));
?>
</pre>
<html>
<head>
  <title>VueJs Instance</title>
 <script src="http://senimandigital.kom/assets/vue/vue.js"></script>
</head>
<body>
<div id="app">
<table frame="box">
  <thead>
    <tr>
      <th v-for="column in columns">{{column.title}}</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody rules="rows">
    <tr v-for="variabel in variabels">
      <td>{{variabel}}</td>
      <td>{{judul}}</td>
    </tr>
  </tbody>
</table>

  <p>{{ variabel }}</p>
</div>
<script type = "text/javascript">
new Vue({
  el: '#app',
  data: {
	columns: [
		{ title: 'variabel' },
		{ title: 'judul' },
		{ title: 'placeholder' },
		{ title: 'tooltip' },
		{ title: 'input' }
	  ],
	variabels: ['connectionname', 'connectionapa'],
	judul:     ['Database', 'Tabel']
  }
})
</script>
</body>
</html>
