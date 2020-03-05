<?php
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

mysql_select_db($database_senimandigital, $senimandigital);
$query_show_datas[$TABLE_NAME] = "SELECT * FROM hosting";
$show_datas[$TABLE_NAME] = mysql_query($query_show_datas[$TABLE_NAME], $senimandigital) or die(mysql_error());
$row_show_datas[$TABLE_NAME] = mysql_fetch_assoc($show_datas[$TABLE_NAME]);
$totalRows_show_datas[$TABLE_NAME] = mysql_num_rows($show_datas[$TABLE_NAME]);

} while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); }
if ($totalRows_show_columns > 0) {
?>
<div role="tabs" id="tabs">
  <ul>
    <li><a href="#tabs-master">Master</a></li>
    <li><a href="#tabs-template">Template</a></li>
  </ul>
  <div id="tabs-master">
<table frame="box">
  <thead>
    <tr>
      <th width="16" scope="col">
<?php if (file_exists(dirname($WEBSITE['HOSTING']['SCRIPT_FILENAME']) .'/'. $TABLE_NAME .'_tambah.php')) { ?>
<a href="<?php echo '../'. $TABLE_NAME .'_tambah.php?'; ?>"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>icon/form_tambah.png" height="16" /></a>
<?php } else { ?>
<a popup href="?form[builder]=tambah&table=<?php echo $TABLE_NAME; ?>"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>icon/form_tambah.png" height="16" /></a></th>
<?php } ?>
</th>
<?php foreach (array_keys($row_show_datas[$TABLE_NAME]) as $key => $row_value) { ?>
      <th scope="col"><?php echo str_replace(array($TABLE_NAME .'_', '_id', '_'), array('', ' ', ' '), $row_value); ?></th>
<?php } ?>
      <th colspan="2">AKSI</th>
    </tr>
  </thead>
  <tbody rules="rows">
<?php do { // } while ($row_show_datas[$TABLE_NAME] = mysql_fetch_assoc($show_columns[$TABLE_NAME]));  ?>
<tr>
  <td>&nbsp;</td>
  <?php foreach (array_keys($row_show_datas[$TABLE_NAME]) as $key => $row_value) { ?>
  <td><?php echo $row_show_datas[$TABLE_NAME][$row_value]; ?></td>
  <?php } ?>
  <td align="center" width="10px"><a data-icon="update">E</a></td>
  <td align="center" width="10px"><a data-icon="delete">H</a></td>
</tr>
<?php } while ($row_show_datas[$TABLE_NAME] = mysql_fetch_assoc($show_datas[$TABLE_NAME])); $rows = mysql_num_rows($show_datas[$TABLE_NAME]); if($rows > 0) { mysql_data_seek($show_datas[$TABLE_NAME], 0); $row_show_datas[$TABLE_NAME] = mysql_fetch_assoc($show_datas[$TABLE_NAME]); } ?>
  </tbody>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
  <caption align="bottom">
  <input type="submit" value="SIMPAN PEMBAHARUAN DATA" />
  </caption>
<?php } ?>
</table>
  </div>
  <div id="tabs-template">
  </div>
</div>
<?php
mysql_free_result($show_datas);
} // end if ($totalRows_show_columns > 0) { */
?>
