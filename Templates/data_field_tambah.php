<?php
$option_file_function['data_field_master']  = 'Master';
$option_file_function['data_field_tambah']  = 'Tambah';
$option_file_function['data_field_replace'] = 'Replace';
$option_file_function['data_field_update']  = 'Update';
$option_file_function['data_field_edit']    = 'Edit';
if (in_array($_GET['file_function'], array_keys($option_file_function)))  {
 $script = file_get_contents($WEBSITE['HOSTING']['SCRIPT_FILENAME']);
 preg_match_all('%<[\?]php include [$]WEBSITE[\[][\']HOSTING[\'][\]][\[][\']TEMPLATES[\'][\]] .[\']php/([a-zA-Z_]+).php[\']; [\?]>%s', $script, $match_halaman_type);
 $script = str_replace($match_halaman_type[1][0], $_GET['file_function'], $script);
 $script = file_put_contents($WEBSITE['HOSTING']['SCRIPT_FILENAME'], $script);
 header('Location: '. $_SERVER['SCRIPT_NAME']);
 exit;
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_tables = "SHOW TABLES";
$show_tables = mysql_query($query_show_tables, $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);
$totalRows_show_tables = mysql_num_rows($show_tables);

do { // } while ($row_show_tables = mysql_fetch_assoc($show_tables));
$TABLE_NAME = str_replace(array('_tambah.php', '_edit.php', '_hapus.php', '.php'), array('', '', '', ''), end(explode('/', $_SERVER['SCRIPT_NAME'])));
if (isset($_GET['table'])) {
$TABLE_NAME = $_GET['table'];
}
if ($TABLE_NAME  != $row_show_tables['Tables_in_senimandigital']) continue; $aman = true;
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_columns = "SHOW COLUMNS FROM ". $TABLE_NAME;
$show_columns = mysql_query($query_show_columns, $senimandigital) or die(mysql_error());
$row_show_columns = mysql_fetch_assoc($show_columns);
$totalRows_show_columns = mysql_num_rows($show_columns);
 } while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); } ?>

<div role="tabs" id="tabs">
  <ul>
    <li><a href="#tabs-1">Buat <?php echo ucwords(basename($_SERVER['SCRIPT_NAME'], ".php")); ?> Baru</a></li>
    <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
    <li><a href="#tabs-konfigurasi">Konfigurasi</a></li>
    <?php } ?>
    <li style="float:right;"><a href="#tabs-diskusi">Diskusi</a></li>
    <li style="float:right;"><a href="#tabs-informasi">Informasi</a></li>
  </ul>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
<div id="tabs-konfigurasi">
<p role="deskripsi">Tidak puas dengan desain formulir disamping...? klik pada formulir dibawah untuk meload saran kode program</p>
<textarea data-format="php" mode="php" name="source_online"></textarea>
<script>
$(document).ready(function(e) {
$.post( "?cURL&modul_proyek_id=1&getElementsByTagName=div", { path: "\anggota\administrator\anggota_edit.php" })
 .done(function( data ) {
 editor_source_online.setValue(data);
});  });
</script>
</div>  

<?php ob_start(); ?>
<form id="form1" name="form1" method="post" action="">
<?php
$script = file_get_contents($WEBSITE['HOSTING']['SCRIPT_FILENAME']);
preg_match_all('%<[\?]php include [$]WEBSITE[\[][\']HOSTING[\'][\]][\[][\']TEMPLATES[\'][\]] .[\']php/(data_field_tambah).php[\']; [\?]>%s', $script, $match_halaman_type);
?>
<table>
<caption align="top">Konfigurasi halaman</caption>
  <tr>
    <td width="200">Fungsi Halaman</td>
    <td><label for="table">Pilih Tabel</label></td>
  </tr>
  <tr>
    <td><select name="file_function" url-change="parameter" value="<?php echo $match_halaman_type[1][0]; ?>">
    <?php foreach($option_file_function as $key => $row_file_function) { ?>
      <option value="<?php echo $key; ?>"><?php echo $row_file_function; ?></option>
    <?php } ?>
    </select></td>
    <td><select name="table" url-change="parameter" value="<?php echo $TABLE_NAME; ?>">
  <option>-- Tabel Belum Dipilih --</option>
  <?php do {  ?>
  <option value="<?php echo $row_show_tables['Tables_in_senimandigital']?>"><?php echo $row_show_tables['Tables_in_senimandigital']?></option>
  <?php } while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); } ?>
</select>
</td>
  </tr>
  <caption align="bottom">
  <input type="submit" value="SIMPAN PEMBAHARUAN KONFIGURASI HALAMAN" />
  </caption>
</table>
</form>
<?php $form_konfigurasi = ob_get_contents(); ob_end_clean(); ?>
<?php } ?>
<div id="tabs-1">
<?php if ($aman) {?>
<?php echo $form_konfigurasi .'<h3>Preview</h3>'; ?>
<form method="post" name="form_<?php echo $TABLE_NAME; ?>_tambah" id="form_<?php echo $TABLE_NAME; ?>_tambah">
<table frame="box">
<caption align="top"></caption>
<tbody>
  <?php do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns));  ?>
  <?php if ($row_show_columns['Extra'] == 'auto_increment' or $row_show_columns['Default'] != '') continue; ?>
  <?php if ($row_show_columns['Field'] == 'anggota_id') { $_REQUEST['anggota_id'] = $_SESSION['anggota_id']; ob_start(); ?>
<input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $_SESSION['anggota_id']; ?>" />
<?php $HIDDEN[] =  ob_get_contents(); ob_end_clean(); continue;
        } elseif ( substr($row_show_columns['Field'], -11) == '_tanggaljam') { ?>
<input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo date('Y-m-d H:i:s'); ?>" />
<?php continue; } ?>
  <tr>
    <td width="200"><label for="<?php echo $row_show_columns['Field']; ?>"><?php echo ucfirst(str_replace(array($TABLE_NAME .'_', '_'), array('', ' '), $row_show_columns['Field'])); ?></label></td>
    <td>
    <?php if (substr($row_show_columns['Type'], 0, 4) == 'enum') { eval('$array_enum = array('. substr($row_show_columns['Type'], 5, -1) .');'); ?>
      <select name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>>
      <?php foreach($array_enum as $option) { ?>
      <option><?php echo $option; ?></option>
      <?php } ?>
      </select>
    <?php } elseif (substr($row_show_columns['Type'], 0, 3) == 'set') { eval('$array_enum = array('. substr($row_show_columns['Type'], 4, -1) .');'); ?>
      <select name="<?php echo $row_show_columns['Field']; ?>" multiple="multiple" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>>
      <?php foreach($array_enum as $option) { ?>
      <option><?php echo $option; ?></option>
      <?php } ?>
      </select>
    <?php } else if ($row_show_columns['Type'] == 'text' or substr($row_show_columns['Field'], -10) == '_deskripsi') { ?>
    <textarea name="<?php echo $row_show_columns['Field']; ?>" rows="7" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> /></textarea>
    <?php } else if ($row_show_columns['Type'] == 'date') { ?>
    <input type="date" name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> />
    <?php } else if ($row_show_columns['Type'] == 'datetime') { ?>
    <input type="datetime-local" name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> value="<?php echo date('Y-m-d H:i:s'); ?>" />
    <?php } else { ?>
    <input type="text" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $_REQUEST['anggota_id']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> />
    <?php } ?>
    </td>
  </tr>
  <?php } while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); } ?>
</tbody>
<caption align="bottom">
<?php echo implode("\n", $HIDDEN); ?>
<input type="submit" value="SIMPAN" />
<?php if (isset($_GET['popup'])) { ?>
<input type="button" name="keluar" id="keluar" onclick="javascript:window.close()" value="KELUAR"/>
<?php } else { ?>
<input type="button" name="kembali" id="kembali" onclick="javascript:history.back()" value="KEHALAMAN SEBELUMNYA"/>
<?php } /* endif */ ?>
</caption>
</table>
</form>
<?php } else { ?>
<p role="deskripsi">Selamat datang dihalaman baru, halaman ini sama sekali belum dikonfigurasi</p>
<?php echo $form_konfigurasi; ?>
<?php } ?>
  </div>
<?php include $WEBSITE['HOSTING']['TEMPLATES'] .'php/development.php'; ?>
<?php include $WEBSITE['HOSTING']['TEMPLATES'] .'php/diskusi.php'; ?>
</div>
