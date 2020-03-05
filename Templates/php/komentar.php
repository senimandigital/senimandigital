<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_paragraph_edit_1")) {
  $updateSQL = sprintf("UPDATE paragraph SET paragraph_upline_id=%s, paragraph_judul=%s, paragraph_konten=%s, paragraph_tanggaljam=%s, paragraph_presfektif=%s, paragraph_untuk=%s, paragraph_path=%s, paragraph_query=%s, request_uri=%s, query_string=%s WHERE paragraph_id=%s",
                       GetSQLValueString($_POST['paragraph_upline_id'], "int"),
                       GetSQLValueString($_POST['paragraph_judul'], "text"),
                       GetSQLValueString($_POST['paragraph_konten'], "text"),
                       GetSQLValueString($_POST['paragraph_tanggaljam'], "date"),
                       GetSQLValueString($_POST['paragraph_presfektif'], "text"),
                       GetSQLValueString($_POST['paragraph_untuk'], "text"),
                       GetSQLValueString($_POST['paragraph_path'], "text"),
                       GetSQLValueString($_POST['paragraph_query'], "text"),
                       GetSQLValueString($_POST['request_uri'], "text"),
                       GetSQLValueString($_POST['query_string'], "text"),
                       GetSQLValueString($_POST['paragraph_id'], "int"));

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($updateSQL, $senimandigital) or die(mysql_error());

  $updateGoTo = "/";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_senimandigital, $senimandigital);
$query_paragraph = "SELECT `paragraph`.*, `anggota`.`anggota_id`, `anggota`.`anggota_realname` FROM `paragraph` INNER JOIN `anggota` ON `anggota`.`anggota_id` = `paragraph`.`anggota_id`";
$paragraph_komentar = mysql_query($query_paragraph, $senimandigital) or die(mysql_error());
$row_paragraph_komentar = mysql_fetch_assoc($paragraph_komentar);
$totalRows_paragraph = mysql_num_rows($paragraph_komentar);
?>
<form method="post" action="<?php echo $editFormAction; ?>" name="form_paragraph_edit_1">
  <table frame="box">
    <tr>
      <td nowrap="nowrap"><label for="paragraph_judul">Judul</label></td>
      <td nowrap="nowrap">Komentar ditujukan Untuk</td>
      <td nowrap="nowrap">Anda melihat dari Presfektif </td>
    </tr>
    <tr>
      <td><input type="text" name="paragraph_judul" placeholder="Judul" value="<?php echo htmlentities($row_paragraph_komentar['paragraph_judul'], ENT_COMPAT, ''); ?>" /></td>
      <td><select name="paragraph_untuk">
        <option value="programmer">Programmer</option>
        <option value="analis">Analisis</option>
        <option value="desainer">Desainer</option>
      </select></td>
      <td><select name="paragraph_presfektif">
        <option value="pengguna">Pengguna</option>
        <option value="pimpinan">Pimpinan</option>
      </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap" valign="top"><label for="paragraph_konten">Konten</label></td>
      <td nowrap="nowrap" valign="top">&nbsp;</td>
      <td nowrap="nowrap" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><textarea name="paragraph_konten" rows="5" style="width:100%" class="textarea"><?php echo htmlentities($row_paragraph_komentar['paragraph_konten'], ENT_COMPAT, ''); ?></textarea></td>
    </tr>
    <caption align="bottom">
      <input type="hidden" name="paragraph_id" value="<?php echo $row_paragraph_komentar['paragraph_id']; ?>" />
      <input type="hidden" name="paragraph_upline_id" value="<?php echo $row_paragraph_komentar['paragraph_upline_id']; ?>" />
      <input type="hidden" name="paragraph_tanggaljam" value="<?php echo $row_paragraph_komentar['paragraph_tanggaljam']; ?>" />
      <input type="hidden" name="paragraph_path" value="<?php echo htmlentities($row_paragraph_komentar['paragraph_path'], ENT_COMPAT, ''); ?>" />
      <input type="hidden" name="paragraph_query" value="<?php echo htmlentities($row_paragraph_komentar['paragraph_query'], ENT_COMPAT, ''); ?>" />
      <input type="hidden" name="request_uri" value="<?php echo htmlentities($row_paragraph_komentar['request_uri'], ENT_COMPAT, ''); ?>" />
      <input type="hidden" name="query_string" value="<?php echo htmlentities($row_paragraph_komentar['query_string'], ENT_COMPAT, ''); ?>" />
      <input type="hidden" name="anggota_id" value="<?php echo htmlentities($row_paragraph_komentar['anggota_id'], ENT_COMPAT, ''); ?>" />
      <input type="hidden" name="MM_update" value="form_paragraph_edit_1" />
      <input type="hidden" name="paragraph_id" value="<?php echo $row_paragraph_komentar['paragraph_id']; ?>" />
      <input type="submit" value="SIMPAN PEMBAHARUAN DATA" />
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
