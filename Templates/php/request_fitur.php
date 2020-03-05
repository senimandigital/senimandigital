<?php require_once('Connections/senimandigital.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_request_tambah_1")) {
  $insertSQL = sprintf("INSERT INTO request (request_judul, request_domain, request_file, request_kontent, anggota_id) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['request_judul'], "text"),
                       GetSQLValueString($_POST['request_domain'], "text"),
                       GetSQLValueString($_POST['request_file'], "text"),
                       GetSQLValueString($_POST['request_kontent'], "text"),
                       GetSQLValueString($_POST['anggota_id'], "int"));

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($insertSQL, $senimandigital) or die(mysql_error());
}
?>
<table>
<tr>
<td role="article">
<section>
<h3>Request Fitur</h3>
<p role="deskripsi">Selamat datang di fasilitas Request Fitur, Anda dapat merequest fitur apapun yang menurut anda seharusnya tersedia pada layanan kami.
Dalam waktu singkat fitur yang anda minta akan segera kami sediakan, namun anda harus melengkapi formulir yang kami sediakan  terlebih dahulu</p>
<div role="tabs" id="tabs">
  <ul>
    <li><a href="#tabs-1">Formulir</a></li>
  </ul>
<div id="tabs-1">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form_request_tambah_1" id="form_request_tambah_1">
    <table class="insert" width="100%" border="0" cellpadding="0" cellspacing="3">
      <tbody>
        <tr>
          <td colspan="2" nowrap="nowrap"><label for="request_judul">Judul</label></td>
        </tr>
        <tr>
          <td colspan="2"><input type="text" name="request_judul" placeholder="Judul" value="<?php if ($_GET['request_judul']) { $_POST['request_judul'] = $_GET['request_judul']; } echo $_POST['request_judul']; ?>"  /></td>
        </tr>
        <tr>
          <td nowrap="nowrap"><label for="request_domain">Domain</label></td>
          <td nowrap="nowrap">Path / File</td>
        </tr>
        <tr>
          <td width="250"><select name="request_domain">
          <?php foreach ($WEBSITE['DOMAIN'] as $key => $value) { ?>
            <option value="<?php echo $value; ?>" ><?php echo $value; ?></option>
          <?php } ?>
          </select></td>
          <td><input type="text" name="request_file" placeholder="manajemen/nama_fitur_yang_anda_request.php" value="<?php if ($_GET['request_file']) { $_POST['request_file'] = $_GET['request_file']; } echo $_POST['request_file']; ?>"  /></td>
        </tr>
        <tr>
          <td colspan="2" valign="top" nowrap="nowrap"><label for="request_kontent">Deskripsikan, bagaimana harusnya fitur ini bekerja.</label></td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="request_kontent" rows="5" style="width:100%" class="textarea"><?php if ($_GET['request_kontent']) { $_POST['request_kontent'] = $_GET['request_kontent']; } echo $_POST['request_kontent']; ?>
  </textarea></td>
        </tr>
      </tbody>
      <tfoot>
      </tfoot>
      <caption align="bottom">
        <input type="hidden" name="anggota_id" value="" />
        <input type="hidden" name="MM_insert" value="form_request_tambah_1" />
        <input type="submit" value="SIMPAN DATA" />
        <?php if (isset($_GET['popup']) && $_GET['popup'] == 'dialog') { ?>
        <input type="button" name="keluar"  onclick="parent.document.body.querySelector('[role=dialog]').remove();" value="KELUAR"/>
        <?php } elseif (isset($_GET['popup'])) { ?>
        <input type="button" name="keluar"  onclick="javascript:window.close();" value="TUTUP"/>
        <?php } else { ?>
        <input type="button" name="kembali" onclick="javascript:history.back();" value="KEHALAMAN SEBELUMNYA"/>
        <?php } /* endif */ ?>
        </caption>
  </table>
  </form>
</div>
</div>
</section>
</td>
<td role="aside">
<section>
<h3>Proyek Anda</h3>
<ul>
<?php do { ?>
<li><a href="?table=<?php echo $row_show_tables['Tables_in_senimandigital']; ?>"><?php echo $row_show_tables['Tables_in_senimandigital']; ?></a></li>
<?php } while ($row_show_tables = mysql_fetch_assoc($show_tables)); ?>
</ul>
</section>
</td>
</tr>
</table>
<?php
mysql_free_result($show_columns);
mysql_free_result($show_tables);
?>
