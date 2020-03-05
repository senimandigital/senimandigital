<?php
$subdomain_menu_deskripsi = "-1";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $subdomain_menu_deskripsi = $WEBSITE['DOMAIN']['SUB'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_menu_deskripsi = sprintf("SELECT * FROM menu WHERE menu.subdomain=%s", GetSQLValueString($subdomain_menu_deskripsi, "text"),GetSQLValueString($subdomain_menu_deskripsi, "text"));
$menu_deskripsi = mysql_query($query_menu_deskripsi, $senimandigital) or die(mysql_error());
$row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi);
$totalRows_menu_deskripsi = mysql_num_rows($menu_deskripsi);
?>
<table frame="void" rules="all" cols="2">
  <?php do { // } while ($row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi));  ?>
  <tr>
    <td><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/server_smtp.png" alt="Deskripsi" width="64" align="left" />
      <h4><?php echo $row_menu['menu_judul']; ?></h4>
      <p style="font-size:11px;" data-image=""><?php echo $row_menu['menu_judul']; ?></p>
      <p align="right">Latar Belakang - Dokumentasi - Tutorial</p></td>
  </tr>
  <?php } while ($row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi)); $rows = mysql_num_rows($menu_deskripsi); if($rows > 0) { mysql_data_seek($menu_deskripsi, 0); $row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi); } ?>
</table>
