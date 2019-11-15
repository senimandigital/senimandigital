<?php
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_tables = "SHOW TABLES";
$show_tables = mysql_query($query_show_tables, $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);
$totalRows_show_tables = mysql_num_rows($show_tables);

$subdomain_anggota_landingpage = "-1";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $subdomain_anggota_landingpage = $WEBSITE['DOMAIN']['SUB'];
}
$sessionanggotaid_anggota_landingpage = "-1";
if (isset($_SESSION['anggota_id'])) {
  $sessionanggotaid_anggota_landingpage = $_SESSION['anggota_id'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_anggota_landingpage = sprintf("SELECT *  FROM anggota_landingpage WHERE anggota_landingpage.subdomain=%s AND anggota_landingpage.anggota_id=%s ORDER BY anggota_landingpage.anggota_landingpage_urutan", GetSQLValueString($subdomain_anggota_landingpage, "text"),GetSQLValueString($sessionanggotaid_anggota_landingpage, "text"));
$anggota_landingpage = mysql_query($query_anggota_landingpage, $senimandigital) or die(mysql_error());
$row_anggota_landingpage = mysql_fetch_assoc($anggota_landingpage);
$totalRows_anggota_landingpage = mysql_num_rows($anggota_landingpage);

mysql_select_db($database_senimandigital, $senimandigital);
$query_Recordset1 = "SELECT anggota_id AS landingpage_id, anggota_username AS landingpage_judul, anggota_deskripsi AS landingpage_deskripsi FROM anggota ORDER BY anggota.anggota_tanggal_daftar";
$Recordset1 = mysql_query($query_Recordset1, $senimandigital) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_senimandigital, $senimandigital);
$query_basisdata_tabel_konfigurasi = "SHOW FIELDS FROM basisdata_tabel_konfigurasi WHERE field = 'basisdata_konfigurasi'";
$basisdata_tabel_konfigurasi = mysql_query($query_basisdata_tabel_konfigurasi, $senimandigital) or die(mysql_error());
$row_basisdata_tabel_konfigurasi = mysql_fetch_assoc($basisdata_tabel_konfigurasi);
eval('$array_basisdata_konfigurasi = array'. substr($row_basisdata_tabel_konfigurasi['Type'], 4) .';');

$domainsub_halaman = "-1";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $domainsub_halaman = $WEBSITE['DOMAIN']['SUB'];
}
$requesturi_halaman = "-1";
if (isset($_SERVER['REQUEST_URI'])) {
  $requesturi_halaman = $_SERVER['REQUEST_URI'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_halaman = sprintf("SELECT *  FROM halaman WHERE halaman.domain_sub=%s AND halaman.request_uri=%s", GetSQLValueString($domainsub_halaman, "text"),GetSQLValueString($requesturi_halaman, "text"));
$halaman = mysql_query($query_halaman, $senimandigital) or die(mysql_error());
$row_halaman = mysql_fetch_assoc($halaman);
$totalRows_halaman = mysql_num_rows($halaman);
?>
<?php if ($totalRows_halaman > 0) { // Show if recordset not empty ?>
  <?php if ($row_halaman['halaman_presfektif'] == 'konten_accordions') { ?>
  <div role="accordion" id="accordion">
    <?php do { // } while ($row_halaman = mysql_fetch_assoc($halaman));  ?>
    <h3><?php echo $row_halaman['halaman_judul']; ?>
      <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
      <span style="float:right;" onclick="openDialogIframe('Edit Konten Halaman', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>halaman_edit.php?popup=dialog&halaman_id=<?php echo $row_halaman['halaman_id']; ?>#tabs-edit-halaman'); return false;"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR'] ?>website/form_edit.png" height="16" /></span>
      <?php } ?>
    </h3>
    <div><?php echo $row_halaman['halaman_konten']; ?></div>
    <?php } while ($row_halaman = mysql_fetch_assoc($halaman)); $rows = mysql_num_rows($halaman); if($rows > 0) { mysql_data_seek($halaman, 0); $row_halaman = mysql_fetch_assoc($halaman); } ?>
  </div>
  <?php } else { ?>
  <div role="tabs" id="tabs-auto">
  <ul>
    <?php if ($_SESSION['anggota_id'] > 0 && $_SERVER['REQUEST_URI'] == '/' && $_SERVER['QUERY_STRING'] == '') { ?>
    <li><a href="#tabs-landing-page" >Landing Page</a>
      <?php } /* endif ($_SESSION['anggota_id'] &gt; 0) () */ ?>
      <?php do { // } while ($row_halaman = mysql_fetch_assoc($halaman));  ?>
    <li><a href="#tabs-<?php echo $row_halaman['halaman_alias']; ?>" ><?php echo $row_halaman['halaman_judul']; ?></a>
      <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
      <span onclick="openDialogIframe('Edit Konten Halaman', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>halaman_edit.php?popup=dialog&halaman_id=<?php echo $row_halaman['halaman_id']; ?>#tabs-edit-halaman'); return false;"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR'] ?>website/form_edit.png" height="16" /></span>
      <?php } ?>
    </li>
    <?php } while ($row_halaman = mysql_fetch_assoc($halaman)); $rows = mysql_num_rows($halaman); if($rows > 0) { mysql_data_seek($halaman, 0); $row_halaman = mysql_fetch_assoc($halaman); } ?>
    <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
    <li><a title="Tambah Tab Baru Untuk Halaman Ini" onclick="openDialogIframe('Buat Tab Baru', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>halaman_tambah.php?popup=dialog&domain_sub=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&request_uri=<?php echo $_SERVER['REQUEST_URI']; ?>&query_string=<?php echo $_SERVER['QUERY_STRING']; ?>'); return false;"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR'] ?>website/form_buat.jpg" height="16" /></a></li>
    <?php } ?>
  </ul>
  <?php if ($_SESSION['anggota_id'] > 0 && $_SERVER['REQUEST_URI'] == '/' && $_SERVER['QUERY_STRING'] == '') { ?>
  <div id="tabs-landing-page">
<?php if ($totalRows_anggota_landingpage > 0) { // Show if recordset not empty ?>
<?php do { // } while ($row_anggota_landingpage = mysql_fetch_assoc($anggota_landingpage));  ?>
<h3><?php echo $row_anggota_landingpage['anggota_landingpage_judul']; ?>
    <a popup="dialog" href="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>anggota_landingpage_edit.php?anggota_landingpage_id=<?php echo $row_anggota_landingpage['anggota_landingpage_id']; ?>">
    <img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/form_konfigurasi.png" height="20" style="position:absolute; right:0; margin-right:6px;" /></a>
</h3>
<table frame="void" rules="all" column="3" cellpadding="10">
<?php do { // } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));  ?>
<tr><td>
<img data-inset="true" align="left" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/<?php echo $row_anggota_landingpage['table']; ?>/<?php echo $row_Recordset1['landingpage_id']; ?>.png" />
<h4><?php echo $row_Recordset1['landingpage_judul']; ?></h4>
<p><?php echo $row_Recordset1['landingpage_deskripsi']; ?></p>
</td>
</tr>
<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); $rows = mysql_num_rows($Recordset1); if($rows > 0) { mysql_data_seek($Recordset1, 0); $row_Recordset1 = mysql_fetch_assoc($Recordset1); } ?>
</table>
<?php } while ($row_anggota_landingpage = mysql_fetch_assoc($anggota_landingpage)); $rows = mysql_num_rows($anggota_landingpage); if($rows > 0) { mysql_data_seek($anggota_landingpage, 0); $row_anggota_landingpage = mysql_fetch_assoc($anggota_landingpage); } ?>
<?php } // Show if recordset not empty ?>
<h3>Apa yang penting buat kamu... ? Konfigurasikan pada Landing Page</h3>
<p role="deskripsi">Kita memiliki banyak data-data penting, tapi mana yang terpenting bagi anda kami tidak akan sok tau, anda dapat menentukan dan mendefinisikanya sendiri. Landingpage tersedia bagi masing-masing subdomain, sehingga anda bisa menampilkan apapun yang anda ingin tampilkan sesuai pada tempatnya.</p>
    <form>
      <table>
        <tr>
          <td><label for="anggota_landing_page_judul">Judul Container Landingpage</label></td>
          <td><label for="anggota_landingpage_model">Model</label></td>
          <td>Resource</td>
          <td>Tampilkan dalam</td>
        </tr>
        <tr>
          <td><input type="text" name="anggota_landing_page_judul" /></td>
          <td><select name="anggota_landingpage_model">
            <?php
foreach ($array_basisdata_konfigurasi as $key => $value) {
echo '<option value="'. $value .'">'. $value .'</option>';
}
?>
          </select></td>
          <td><select name="basisdata_tabel_konfigurasi_tabel" readonly-if="get" value="<?php echo $_REQUEST['basisdata_tabel_konfigurasi_tabel']; ?>" >
            <?php do {  ?>
            <option value="<?php echo $row_show_tables['Tables_in_'. $database_senimandigital]?>"<?php if (!(strcmp($row_show_tables['Tables_in_'. $database_senimandigital], $_GET['Tables_in_'. $database_senimandigital]))) {echo "selected=\"selected\"";} ?>><?php echo $row_show_tables['Tables_in_'. $database_senimandigital]?></option>
            <?php } while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); } ?>
          </select></td>
          <td><select name="column" id="column">
            <option value="1">1 Kolom dan 10 Baris</option>
            <option value="2">2 Kolom dan 5 Baris</option>
            <option value="3">3 Kolom dan 3 Baris</option>
            <option value="4">4 Kolom dan 2 Baris</option>
            <option value="5">5 Kolom dan 2 Baris</option>
          </select></td>
        </tr>
        <caption align="bottom">
          <input type="submit" value="Tambahkan KE Landingpage" />
        </caption>
      </table>
    </form>
  </div>
  <?php } /* endif ($_SESSION['anggota_id'] &gt; 0) () */ ?>
  <?php do { // } while ($row_halaman = mysql_fetch_assoc($halaman));  ?>
  <div id="tabs-<?php echo $row_halaman['halaman_alias']; ?>">
    <?php
	$pattern = '%<[\w].*?role="table_deskripsi".*?>([0-9,]+)</[\w]>%s';
    preg_match_all($pattern, $row_halaman['halaman_konten'], $match); 
	if      ($row_halaman['halaman_presfektif'] == 'source_generator_edml') { include $WEBSITE['DOMAIN']['TEMPLATES'] .'konten_generator.php'; } 
	else if ($row_halaman['halaman_presfektif'] == 'source_ator_edml') {	 echo $row_halaman['halaman_konten']; }
	elseif ($match[1][0]) {
mysql_select_db($database_senimandigital, $senimandigital);
$query_paragraph = "SELECT *  FROM paragraph WHERE paragraph_id IN (". $match[1][0] .")";
$paragraph = mysql_query($query_paragraph, $senimandigital) or die(mysql_error());
$row_paragraph = mysql_fetch_assoc($paragraph);
$totalRows_paragraph = mysql_num_rows($paragraph);
ob_start();
?>
    <table frame="void" rules="all" column="<?php echo $row_anggota_landingpage['anggota_landingpage_kolom']; ?>">
      <?php do { // } while ($row_paragraph = mysql_fetch_assoc($paragraph));  ?>
      <tr>
        <td><img data-inset="true" width="128" align="left" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/paragraph/<?php echo $row_paragraph['paragraph_id']; ?>.png" onerror="this.src='<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/paragraph/0.png'" />
          <h4 <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>ondblclick="openDialogIframe('Edit Paragraph', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>paragraph_edit.php?popup=dialog&paragraph_id=<?php echo $row_paragraph['paragraph_id']; ?>');"<?php } ?>><?php echo $row_paragraph['paragraph_judul'] ? $row_paragraph['paragraph_judul'] : 'Tidak ada judul Pargraph'; ?></h4>
          <?php echo $row_paragraph['paragraph_konten']; ?></td>
      </tr>
      <?php } while ($row_paragraph = mysql_fetch_assoc($paragraph)); $rows = mysql_num_rows($paragraph); if($rows > 0) { mysql_data_seek($paragraph, 0); $row_paragraph = mysql_fetch_assoc($paragraph); } ?>
    </table>
    <?php $konten = ob_get_contents(); ob_end_clean(); echo preg_replace($pattern, $konten, $row_halaman['halaman_konten']);
} else { ?>
    <?php echo $row_halaman['halaman_konten'];
	if ($row_halaman['halaman_presfektif'] == 'source_front_end') { ?>
    <h3>Source</h3>
    <textarea data-format="javascript" name="halaman_konten__source" mode="javascript"><?php echo htmlentities($row_halaman['halaman_konten']); ?></textarea>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } while ($row_halaman = mysql_fetch_assoc($halaman)); $rows = mysql_num_rows($halaman); if($rows > 0) { mysql_data_seek($halaman, 0); $row_halaman = mysql_fetch_assoc($halaman); } ?>
  </div>
  <?php } // presfektif ?>
  <?php } // Show if recordset not empty ?>
<?php if ($totalRows_halaman == 0) { // Show if recordset empty ?>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
<div role="tabs" id="tabs-insert">
<ul>
  <li><a href="#tabs-<?php echo $row_halaman['halaman_alias']; ?>">Judul Tabs</a></li>
</ul>
<div id="tabs-<?php echo $row_halaman['halaman_alias']; ?>">
<p role="deskripsi">Belum tersedia konten untuk halaman ini, anda ingin <a onclick="openDialogIframe('Buat Konten Halaman', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>halaman_tambah.php?domain_sub=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&request_uri=<?php echo $_SERVER['REQUEST_URI']; ?>&query_string=<?php echo $_SERVER['QUERY_STRING']; ?>'); return false;" href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>halaman_tambah.php?domain_sub=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>&popup=dialog&request_uri=<?php echo $_SERVER['REQUEST_URI']; ?>&query_string=<?php echo $_SERVER['QUERY_STRING']; ?>">Membuatnya... ?</a></p>
</div>
</div>
<?php } ?>
<?php } // Show if recordset empty ?>
<?php
mysql_free_result($halaman);

mysql_free_result($paragraph);

mysql_free_result($Recordset1);

mysql_free_result($anggota_landingpage);
?>