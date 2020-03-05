<?php
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_tables = "SHOW TABLES";
$show_tables = mysql_query($query_show_tables, $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);
$totalRows_show_tables = mysql_num_rows($show_tables);

$TABLE_NAME = str_replace(array('_tambah.php', '_edit.php', '_hapus.php', '.php'), array('', '', '', ''), end(explode('/', $_SERVER['SCRIPT_NAME'])));
if (isset($_GET['table'])) {
$TABLE_NAME = $_GET['table'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_columns = "SHOW COLUMNS FROM ". $TABLE_NAME;
$show_columns = mysql_query($query_show_columns, $senimandigital) or die(mysql_error());
$row_show_columns = mysql_fetch_assoc($show_columns);
$totalRows_show_columns = mysql_num_rows($show_columns);

$proyekid_show_data = "-1";
if (isset($_GET['proyek_id'])) {
  $proyekid_show_data = $_GET['proyek_id'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_data = sprintf("SELECT * FROM `". $TABLE_NAME ."` WHERE `". $TABLE_NAME ."_id`=%s", GetSQLValueString($proyekid_show_data, "int"));
$show_data = mysql_query($query_show_data, $senimandigital) or die(mysql_error());
$row_show_data = mysql_fetch_assoc($show_data);
$totalRows_show_data = mysql_num_rows($show_data);
?>
<div role="tabs" id="tabs">
  <ul>
    <li><a href="#tabs-1">Edit Data <?php echo ucwords(basename($_SERVER['SCRIPT_NAME'], ".php")); ?></a></li>
    <li style="float:right;"><a href="#tabs-diskusi">Diskusi</a></li>
    <li style="float:right;"><a href="#tabs-informasi">Informasi</a></li>
  </ul>
<div id="tabs-1">
<form method="post" name="form_<?php echo $TABLE_NAME; ?>_tambah" id="form_<?php echo $TABLE_NAME; ?>_tambah">
<table frame="box">
<tbody>
  <?php do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns));  ?>
  <?php if ($row_show_columns['Extra'] == 'auto_increment') { ob_start(); ?>
  <input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $row_show_data[$row_show_columns['Field']]; ?>" />
  <?php $HIDDEN[] =  ob_get_contents(); ob_end_clean(); continue; } ?>
  <?php if ($row_show_columns['Extra'] == 'auto_increment' or $row_show_columns['Default'] != '') continue; ?>
  <?php if ($row_show_columns['Field'] == 'anggota_id') { $_REQUEST['anggota_id'] = $_SESSION['anggota_id']; ob_start(); ?>
<input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $_SESSION['anggota_id']; ?>" />
<?php $HIDDEN[] =  ob_get_contents(); ob_end_clean(); continue; } ?>
<?php if (substr($row_show_columns['Field'], -6) != '_judul' 
      and substr($row_show_columns['Field'], -10) != '_deskripsi') continue; ?>
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
    <textarea name="<?php echo $row_show_columns['Field']; ?>" rows="7" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> ><?php echo $row_show_data[$row_show_columns['Field']]; ?></textarea>
    <?php } else if ($row_show_columns['Type'] == 'date') { ?>
    <input type="date" name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> />
    <?php } else if ($row_show_columns['Type'] == 'datetime') { ?>
    <input type="datetime-local" name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> value="<?php echo date('Y-m-d H:i:s'); ?>" />
    <?php } else { ?>
    <input type="text" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $row_show_data[$row_show_columns['Field']]; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?> />
    <?php } ?>
    </td>
  </tr>
  <?php } while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); } ?>
</tbody>
<caption align="bottom">
<?php echo implode("\n", $HIDDEN); ?>
  <input type="hidden" name="MM_update" value="formulir_edit_otomatis" />
  <input type="submit" value="SIMPAN PEMBAHARUAN" />
  <?php if (isset($_GET['popup']) && $_GET['popup'] == 'dialog') { ?>
  <input type="button" name="keluar"  onclick="parent.postMessage('remove-dialog', '*')" value="TUTUP"/>
  <?php } elseif (isset($_GET['popup'])) { ?>
  <input type="button" name="keluar"  onclick="javascript:window.close();" value="TUTUP"/>
  <?php } else { ?>
  <input type="button" name="kembali" onclick="javascript:history.back();" value="KEHALAMAN SEBELUMNYA"/>
  <?php } /* endif */ ?>
</caption>
</table>
</form>
  </div>
<?php include $WEBSITE['HOSTING']['TEMPLATES'] .'php/development.php'; ?>
<?php include $WEBSITE['HOSTING']['TEMPLATES'] .'php/diskusi.php'; ?>
</div>
<?php
mysql_free_result($show_data);
?>
