<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_laporan_development")) {
  $insertSQL = sprintf("INSERT INTO paragraph (paragraph_judul, paragraph_konten, paragraph_tanggaljam, paragraph_presfektif, paragraph_untuk, paragraph_path, paragraph_query, script_name, anggota_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['paragraph_judul'], "text"),
                       GetSQLValueString($_POST['paragraph_konten'], "text"),
                       GetSQLValueString($_POST['paragraph_tanggaljam'], "date"),
                       GetSQLValueString($_POST['paragraph_presfektif'], "text"),
                       GetSQLValueString($_POST['paragraph_untuk'], "text"),
                       GetSQLValueString($_POST['paragraph_path'], "text"),
                       GetSQLValueString($_POST['paragraph_query'], "text"),
                       GetSQLValueString($_POST['script_name'], "text"),
                       GetSQLValueString($_POST['anggota_id'], "int"));

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($insertSQL, $senimandigital) or die(mysql_error());
}

$paragraphuntuk_paragraph_laporan = "-1";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $paragraphuntuk_paragraph_laporan = $WEBSITE['DOMAIN']['SUB'];
}
$scriptname_paragraph_laporan = "-1";
if (isset($_SERVER['SCRIPT_NAME'])) {
  $scriptname_paragraph_laporan = $_SERVER['SCRIPT_NAME'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_paragraph_laporan = sprintf("SELECT * FROM paragraph WHERE paragraph.paragraph_untuk=%s AND paragraph.script_name=%s", GetSQLValueString($paragraphuntuk_paragraph_laporan, "text"),GetSQLValueString($scriptname_paragraph_laporan, "text"));
$paragraph_laporan = mysql_query($query_paragraph_laporan, $senimandigital) or die(mysql_error());
$row_paragraph_laporan = mysql_fetch_assoc($paragraph_laporan);
$totalRows_paragraph_laporan = mysql_num_rows($paragraph_laporan);

$modulproyekid_get_owner_modul_proyek = "-1";
if (isset($_GET['modul_proyek_id'])) {
  $modulproyekid_get_owner_modul_proyek = $_GET['modul_proyek_id'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_get_owner_modul_proyek = sprintf("SELECT anggota_id  FROM modul_proyek WHERE modul_proyek.modul_proyek_id=%s", GetSQLValueString($modulproyekid_get_owner_modul_proyek, "int"));
$get_owner_modul_proyek = mysql_query($query_get_owner_modul_proyek, $senimandigital) or die(mysql_error());
$row_get_owner_modul_proyek = mysql_fetch_assoc($get_owner_modul_proyek);
$totalRows_get_owner_modul_proyek = mysql_num_rows($get_owner_modul_proyek);
?>
<div id="tabs-informasi">
  <h3>Informasi</h3>
  <p role="deskripsi">Tab ini menginformasikan perubahan dari sisi teknologi.</p>
  <table>
  <thead>
    <tr>
      <th align="left">Tanggal</th>
      <th align="left">Progress Deskripsi</th>
      <th align="left">Progress</th>
      </tr>
    </thead>
    <?php do { ?>
      <tr>
        <th width="160" align="left" valign="top"><?php echo date($row_paragraph_laporan['paragraph_tanggaljam']); ?></th>
        <td><b><?php echo $row_paragraph_laporan['paragraph_judul']; ?> : </b><?php echo $row_paragraph_laporan['paragraph_konten']; ?></td>
        <td><?php parse_str($row_paragraph_laporan['paragraph_query'], $paragraph_query); echo $paragraph_query['progress']; ?></td>
      </tr>
      <?php } while ($row_paragraph_laporan = mysql_fetch_assoc($paragraph_laporan)); print_r();?>
  </table>
  <?php if ($_SESSION['anggota_id'] == $row_get_owner_modul_proyek['anggota_id'] OR $_SESSION['MM_UserGroup'] == 'admin') { // Show if recordset empty ?>
  <h3>Progress Baru</h3>
  <p role="deskripsi">Hanya anda sebagai pengembang yang dapat mengisi formulir, selain anda tidak ada yang akan mendapat formulir atau dengan kata lain formulir ini tidak akan ditampilkan.</p>
  <form method="post" name="form_laporan_development" action="<?php echo $editFormAction; ?>">
    <table>
    <tr>
      <td width="160">Progress</td>
      <td nowrap="nowrap">
      <table>
  <tr>
    <td width="150px;"><select name="paragraph_query">
        <option value="progress=ide">IDE</option>
        <option value="progress=wacana">WACANA</option>
        <option value="progress=implementasi">IMPLEMENTASI</option>
        <option value="progress=tuntas">TUNTAS</option>
      </select></td>
    <td><input type="text" name="paragraph_judul" placeholder="Ex. Membuat Judul Halaman" /></td>
  </tr>
</table>
</td>
      </tr>
    <tr>
      <td>Deskripsi</td>
      <td><textarea name="paragraph_konten" placeholder="Dengan fitur ini pengguna akan dimudahkan dalam bla-bla-bla"></textarea></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
      </tr>
  </table>
  <input type="hidden" name="paragraph_presfektif" value="development" />
  <input type="hidden" name="paragraph_tanggaljam" value="<?php echo date('Y-m-d H:i:s'); ?>" />
  <input type="hidden" name="paragraph_untuk" value="<?php echo $WEBSITE['DOMAIN']['SUB'] ?>" />
  <input type="hidden" name="paragraph_path" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
  <input type="hidden" name="query_string" value="<?php echo $_SERVER['QUERY_STRING']; ?>" />
  <input type="hidden" name="script_name" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
  <input type="hidden" name="anggota_id" value="<?php echo $_SESSION['anggota_id']; ?>" />
  <input type="hidden" name="MM_insert" value="form_laporan_development" />
</form>
  <?php } // Show if recordset empty ?>
</div>
<?php
mysql_free_result($paragraph_laporan);

mysql_free_result($get_owner_modul_proyek);
?>
