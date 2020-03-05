<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_informasi_panel_tambah_1")) {
echo 'bisa bisa bisa';
print_r($_POST);
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_informasi_panel_tambah_1")) {
  $insertSQL = sprintf("INSERT INTO informasi_panel (informasi_panel_judul, informasi_panel_kategori, `informasi_panel_attribute`, subdomain) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['informasi_panel_judul'], "text"),
                       GetSQLValueString($_POST['informasi_panel_kategori'], "text"),
                       GetSQLValueString($_POST['informasi_panel_attribute'], "text"),
                       GetSQLValueString($_POST['subdomain'], "text"));

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($insertSQL, $senimandigital) or die(mysql_error());
}

mysql_select_db($database_senimandigital, $senimandigital);
$query_show_tables = "SHOW TABLES";
$show_tables = mysql_query($query_show_tables, $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);
$totalRows_show_tables = mysql_num_rows($show_tables);

$kategoritabel_informasi_panel_kategori = "informasi_panel";
if (isset($_GET['kategori_tabel'])) {
  $kategoritabel_informasi_panel_kategori = $_GET['kategori_tabel'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_informasi_panel_kategori = sprintf("SELECT *  FROM kategori WHERE kategori.kategori_tabel=%s", GetSQLValueString($kategoritabel_informasi_panel_kategori, "text"));
$informasi_panel_kategori = mysql_query($query_informasi_panel_kategori, $senimandigital) or die(mysql_error());
$row_informasi_panel_kategori = mysql_fetch_assoc($informasi_panel_kategori);
$totalRows_informasi_panel_kategori = mysql_num_rows($informasi_panel_kategori);

$subdomain_informasi_panel = "". $_GET['subdomain'] ."";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $subdomain_informasi_panel = $WEBSITE['DOMAIN']['SUB'];
}
$MMUserGroup_informasi_panel = "publik";
if (isset($_SESSION['MM_UserGroup'])) {
  $MMUserGroup_informasi_panel = $_SESSION['MM_UserGroup'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_informasi_panel = sprintf("SELECT * FROM informasi_panel WHERE informasi_panel.subdomain=%s AND informasi_panel.MM_UserGroup REGEXP %s ORDER BY informasi_panel.informasi_panel_urutan", GetSQLValueString($subdomain_informasi_panel, "text"),GetSQLValueString($MMUserGroup_informasi_panel, "text"));
$informasi_panel = mysql_query($query_informasi_panel, $senimandigital) or die(mysql_error());
$row_informasi_panel = mysql_fetch_assoc($informasi_panel);
$totalRows_informasi_panel = mysql_num_rows($informasi_panel);

mysql_select_db($database_senimandigital, $senimandigital);
$query_data_terbaru = "SELECT *  FROM anggota ORDER BY anggota.anggota_tanggal_aktif DESC";
$data_terbaru = mysql_query($query_data_terbaru, $senimandigital) or die(mysql_error());
$row_data_terbaru = mysql_fetch_assoc($data_terbaru);
$totalRows_data_terbaru = mysql_num_rows($data_terbaru);

mysql_select_db($database_senimandigital, $senimandigital);
$query_anggota_level = "SELECT *  FROM anggota_level";
$anggota_level = mysql_query($query_anggota_level, $senimandigital) or die(mysql_error());
$row_anggota_level = mysql_fetch_assoc($anggota_level);
$totalRows_anggota_level = mysql_num_rows($anggota_level);
?>
<?php if ($totalRows_informasi_panel < 1) { ?>
<section>
  <h3>Menu</h3>
  <script language="JavaScript" type="text/javascript">
$input = document.querySelectorAll('[role=tabs]>ul');
$temp = $input;
for(var i=0; i< $input.length; i++) {
$temp[i] = $temp[i].setAttribute('tabs-kontrol', $temp[i].parentNode.getAttribute('id'));
document.write($temp.item(i).outerHTML);
$input.item(i).removeAttribute('tabs-kontrol');
}
</script>
</section>
<?php } ?>
<?php do { // } while ($row_informasi_panel = mysql_fetch_assoc($informasi_panel));  ?>
<?php if ($row_informasi_panel['informasi_panel_kategori'] == 'paragraph') { ?>
<section>
<h3 <?php if ($SESSION['MM_UserGroup'] == "admin") { ?> ondblclick="openDialogIframe('Edit Panel Informasi', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>informasi_panel_edit.php?popup=dialog&subdomain=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&informasi_panel_id=<?php echo $row_informasi_panel['informasi_panel_id']; ?>');" <?php } ?>><?php echo $row_informasi_panel['informasi_panel_judul']; ?></h3>
<?php echo $row_informasi_panel['informasi_panel_attribute']; ?>
</section>
<?php } ?>
<?php if ($row_informasi_panel['informasi_panel_kategori'] == 'terbaru') { ?>
<section>
  <h3><?php echo $row_informasi_panel['informasi_panel_judul'] ? $row_informasi_panel['informasi_panel_judul'] : $row_informasi_panel['informasi_panel_attribute'] .' Terbaru'; ?></h3>
</section>
<?php } ?>
<?php if ($row_informasi_panel['informasi_panel_kategori'] == 'array-php') { ?>
<section>
  <h3 title><?php echo $row_informasi_panel['informasi_panel_judul'] ? $row_informasi_panel['informasi_panel_judul'] : $row_informasi_panel['informasi_panel_attribute'] .' Terbaru'; ?></h3>
<ul>
<?php
eval('$array = $array_'. $row_informasi_panel['informasi_panel_attribute'] .';');
foreach($array as $key => $value) { ?>
  <li><?php echo $value; ?></li>
<?php } ?>
</ul>
</section>
<?php } ?>

<?php } while ($row_informasi_panel = mysql_fetch_assoc($informasi_panel)); $rows = mysql_num_rows($informasi_panel); if($rows > 0) { mysql_data_seek($informasi_panel, 0); $row_informasi_panel = mysql_fetch_assoc($informasi_panel); } ?>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
<section>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
<span style="position:absolute; margin-top:40px; font-size:9px;">Location: /Template/menu_samping.php</span>
<?php } ?>
<h3>Buat Panel Baru Disini</h3>
<form action="?" method="post" name="form_informasi_panel_tambah_1">
  <table width="100%" border="0" cellpadding="0" cellspacing="3">
    <tbody>
      <tr>
        <td>
        <label for="informasi_panel_kategori">Model Panel Informasi</label>
        <select name="informasi_panel_kategori">
          <?php do { // } while ($row_informasi_panel_kategori = mysql_fetch_assoc($informasi_panel_kategori));  ?>
          <option value="<?php echo $row_informasi_panel_kategori['kategori_alias']; ?>" title="<?php echo $row_informasi_panel_kategori['kategori_deskripsi']; ?>"><?php echo $row_informasi_panel_kategori['kategori_judul']; ?></option>
          <?php } while ($row_informasi_panel_kategori = mysql_fetch_assoc($informasi_panel_kategori)); $rows = mysql_num_rows($informasi_panel_kategori); if($rows > 0) { mysql_data_seek($informasi_panel_kategori, 0); $row_informasi_panel_kategori = mysql_fetch_assoc($informasi_panel_kategori); } ?>
</select></td>
        </tr>
      <tr>
        <td>
        <label for="informasi_panel_judul">Judul Panel</label>
        <input type="text" name="informasi_panel_judul" required /></td>
      </tr>
      <tr show-option="informasi_panel_kategori" selected="paragraph link">
        <td>Konten Panel
          <textarea name="informasi_panel_attribute"></textarea></td>
      </tr>
      <tr show-option="informasi_panel_kategori" selected="terbaru,array-php">
        <td>
        <label for="informasi_panel_attribute">Sumber Data</label>
        <select name="informasi_panel_attribute">
          <?php do {  ?>
          <option value="<?php echo $row_show_tables['Tables_in_senimandigital']?>"><?php echo $row_show_tables['Tables_in_senimandigital']?></option>
          <?php } while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); } ?>
        </select>
        </td>
        </tr>
      <tr>
        <td><label for="MM_UserGroup">Level Akses</label>
        <select name="MM_UserGroup" size="<?php echo $totalRows_anggota_level + 2; ?>" multiple="multiple">
        <option value="publik" selected="selected" title="Dapat diakses semua orang tanpa login">-- Publik --</option>
        <option value="login" title="Dapat diakses semua orang yang sudah login">-- Login --</option>
          <?php do {  ?>
          <option value="<?php echo $row_anggota_level['anggota_level_alias']?>" title="<?php echo $row_anggota_level['anggota_level_deskripsi']; ?>"><?php echo $row_anggota_level['anggota_level_nama']?></option>
          <?php } while ($row_anggota_level = mysql_fetch_assoc($anggota_level)); $rows = mysql_num_rows($anggota_level); if($rows > 0) { mysql_data_seek($anggota_level, 0); $row_anggota_level = mysql_fetch_assoc($anggota_level); } ?>
        </select></td>
      </tr>
    </tbody>
    <caption align="bottom">
      <input type="hidden" name="subdomain" value="<?php echo $WEBSITE['DOMAIN']['SUB']; ?>" />
      <input type="hidden" name="MM_insert" value="form_informasi_panel_tambah_1" />
      <input type="submit" value="SIMPAN" />
      </caption>
  </table>
</form>
</section>
<?php } // if ()?>
<?php
mysql_free_result($informasi_panel_kategori);
mysql_free_result($informasi_panel);
mysql_free_result($data_terbaru);

mysql_free_result($anggota_level);
?>
