<?php
$deskripsi_halamanuntuk_deskripsi_halaman = "-1";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $deskripsi_halamanuntuk_deskripsi_halaman = $WEBSITE['DOMAIN']['SUB'];
}
$deskripsi_halamanpath_deskripsi_halaman = "-1";
if (isset($_SERVER['REQUEST_URI'])) {
  $deskripsi_halamanpath_deskripsi_halaman = $_SERVER['REQUEST_URI'];
}
$scriptname_deskripsi_halaman = "-1";
if (isset($_SERVER['SCRIPT_NAME'])) {
  $scriptname_deskripsi_halaman = $_SERVER['SCRIPT_NAME'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_deskripsi_halaman = sprintf("SELECT * FROM paragraph WHERE paragraph.paragraph_untuk=%s AND (paragraph.script_name=%s OR paragraph.request_uri=%s)", GetSQLValueString($deskripsi_halamanuntuk_deskripsi_halaman, "text"),GetSQLValueString($scriptname_deskripsi_halaman, "text"),GetSQLValueString($deskripsi_halamanpath_deskripsi_halaman, "text"));
$deskripsi_halaman = mysql_query($query_deskripsi_halaman, $senimandigital) or die(mysql_error());
$row_deskripsi_halaman = mysql_fetch_assoc($deskripsi_halaman);
$totalRows_deskripsi_halaman = mysql_num_rows($deskripsi_halaman);
?>
<?php if ($totalRows_deskripsi_halaman > 0) { // Show if recordset not empty ?>
<p role="deskripsi" title="<?php echo strip_tags($row_deskripsi_halaman['paragraph_judul']); ?>"
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
 ondblclick="openDialogIframe('Edit Deskripsi', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>deskripsi_edit.php?popup=dialog&paragraph_id=<?php echo $row_deskripsi_halaman['paragraph_id']; ?>');" 
<?php } ?>
>
<?php echo strip_tags($row_deskripsi_halaman['paragraph_konten']); ?>
</p>
<?php } // Show if recordset not empty ?>
<?php if ($totalRows_deskripsi_halaman == 0 or $row_deskripsi_halaman['paragraph_konten'] == '') { // Show if recordset not empty ?>
<?php if ($_SESSION['MM_UserGroup']) { ?>
<p role="deskripsi" title="<?php echo strip_tags($row_deskripsi_halaman['paragraph_judul']); ?>">Belum tersedia deskripsi untuk halaman ini, anda ingin <a onclick="openDialogIframe('Edit Deskripsi', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>deskripsi_tambah.php?paragraph_untuk=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&script_name=<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>&request_uri=<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>&script_name=<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>&query_string=<?php echo htmlentities($_SERVER['QUERY_STRING']); ?>'); return false;" href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>deskripsi_tambah.php?paragraph_untuk=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&popup=dialog&request_uri=<?php echo $_SERVER['REQUEST_URI']; ?>&script_name=<?php echo htmlentities($_SERVER['SCRIPT_NAME']); ?>&query_string=<?php echo $_SERVER['QUERY_STRING']; ?>">mengusulkan</a></p>
<?php } ?>
<?php } // Show if recordset not empty ?>
<?php
mysql_free_result($deskripsi_halaman);
?>
