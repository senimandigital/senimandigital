<?php
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_tables = "SHOW TABLES";
$show_tables = mysql_query($query_show_tables, $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);
$totalRows_show_tables = mysql_num_rows($show_tables);

do { // } while ($row_show_tables = mysql_fetch_assoc($show_tables));
if ($row_show_tables[key($row_show_tables)] != $_GET['table']) continue;
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_columns = "SHOW COLUMNS FROM ". $_GET['table'];
$show_columns = mysql_query($query_show_columns, $senimandigital) or die(mysql_error());
$row_show_columns = mysql_fetch_assoc($show_columns);
$totalRows_show_columns = mysql_num_rows($show_columns);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

foreach (array_keys($_GET['column']) as $key => $value) {
$VALUE[$value] = "`". $value ."`='". $_POST[$value] ."'";
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_". $_GET['table'] ."_edit")) {
  $updateSQL = "UPDATE `". $_GET['table'] ."` SET ". implode(', ', $VALUE) ." WHERE ". $row_show_columns['Field'] ."='". $_GET['where'][$row_show_columns['Field']] ."'";

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($updateSQL, $senimandigital) or die(mysql_error());
}

$moduldatabasefieldid_show_data = "-1";
if (isset($_GET['where'][$row_show_columns['Field']])) {
  $moduldatabasefieldid_show_data = $_GET['where'][$row_show_columns['Field']];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_show_data = sprintf("SELECT * FROM ". $_GET['table'] ." WHERE ". $row_show_columns['Field'] ."=%s", GetSQLValueString($moduldatabasefieldid_show_data, "int"));
$show_data = mysql_query($query_show_data, $senimandigital) or die(mysql_error());
$row_show_data = mysql_fetch_assoc($show_data);
$totalRows_show_data = mysql_num_rows($show_data);
} while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); }

// aturan penulisan parameter => ?form[buidler]=edit&table=cms&column[cms_alias]&column[cms_nama]
?>
<table>
<tr>
<td role="article">
<section>
<h3>Popup Data Edit</h3>
<p role="deskripsi">Ini adalah fasilitas pengeditan cepat</p>
<div role="tabs" id="tabs">
  <ul>
    <li><a href="#tabs-1">Edit Data <?php echo ucfirst($TABLE_NAME); ?></a></li>
  </ul>
<div id="tabs-1">
<form method="POST" action="<?php echo $editFormAction; ?>">
<table>
<?php do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns));
ob_start();
if ($row_show_columns['Field'] == 'anggota_id') { ?>
<input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $_SESSION['anggota_id']; ?>" <?php echo ($row_show_columns['Null'] == 'NO') ? ' required="required" ' : ''; ?>>
<?php } else if ($row_show_columns['Extra'] == 'auto_increment') { ?>
<input type="hidden" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo $row_show_data[$row_show_columns['Field']]; ?>" <?php echo ($row_show_columns['Null'] == 'NO') ? ' required="required" ' : ''; ?>>
<?php }
$hidden[] = ob_get_contents(); ob_end_clean();
if ($row_show_columns['Extra'] == 'auto_increment') continue;
if ($row_show_columns['Field'] == 'anggota_id') continue;
if (isset($_REQUEST['column']) && !in_array($row_show_columns['Field'], array_keys($_REQUEST['column'])) ) continue;
?>
  <tr>
    <td><label for="<?php echo $row_show_columns['Field']; ?>"><?php
	echo str_replace($_GET['table'] .'_', '' , $row_show_columns['Field']);
	?></label></td>
  </tr>
  <tr>
    <td>
    <?php if (substr($row_show_columns['Type'], 0, 4) == 'enum') { eval('$array_enum = array('. substr($row_show_columns['Type'], 5, -1) .');'); ?>
      <select name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>>
      <?php foreach($array_enum as $option) { ?>
      <option><?php echo $option; ?></option>
      <?php } ?>
      </select>
    <?php } elseif (substr($row_show_columns['Type'], 0, 3) == 'set') { eval('$array_enum = array('. substr($row_show_columns['Type'], 4, -1) .');'); ?>
      <select multiple="multiple" size="<?php echo count($array_enum); ?>" name="<?php echo $row_show_columns['Field']; ?>" <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>>
      <?php foreach($array_enum as $option) { ?>
      <option><?php echo $option; ?></option>
      <?php } ?>
      </select>
    <?php } else if ($row_show_columns['Type'] == 'date') { ?>
    <input type="text" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo ($row_show_data[$row_show_columns['Field']]) ? $row_show_data[$row_show_columns['Field']] : $_REQUEST['column'][$row_show_columns['Field']]; ?>"  <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>/>
    <?php } else if ($row_show_columns['Type'] == 'text' or $_GET['column'][$row_show_columns['Field']] == 'textarea') {
	if (preg_match('<p>', $row_show_data[$row_show_columns['Field']], $match)) $attributes = 'data-format="html"';
	?>
    <textarea <?php echo $attributes; ?> name="<?php echo $row_show_columns['Field']; ?>"  <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>><?php echo ($row_show_data[$row_show_columns['Field']]) ? htmlentities($row_show_data[$row_show_columns['Field']]) : htmlentities($_REQUEST['column'][$row_show_columns['Field']]); ?></textarea>
    <?php
	unset($attributes);
	} else { ?>
    <input type="text" name="<?php echo $row_show_columns['Field']; ?>" value="<?php echo ($row_show_data[$row_show_columns['Field']]) ? $row_show_data[$row_show_columns['Field']] : $_REQUEST['column'][$row_show_columns['Field']]; ?>"  <?php if ($row_show_columns['Null'] == 'NO') { ?> required="required"<?php } ?>/>
    <?php } ?>
    </td>
  </tr>
<?php } while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); } ?>
  <caption align="bottom">
  <?php echo implode(" ", $hidden)?>
  <input type="hidden" name="MM_update" value="form_<?php echo $_GET['table']; ?>_edit" /> 
  <input type="submit" value="UPDATE" />
  <?php if (isset($_GET['popup'])) { ?>
  <input type="button" name="keluar" id="keluar" onclick="javascript:window.close()" value="KELUAR"/>
  <?php } else { ?>
  <input type="button" name="kembali" id="kembali" onclick="javascript:history.back()" value="KEHALAMAN SEBELUMNYA"/>
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
<h3>Konfigurasi Field</h3>
<form method="get" action="?form[builder]=edit&table=<?php echo $_GET['table']; ?>&<?php echo http_build_query($_GET['where']); ?>">
<table>
<?php do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns)); ?>
<tr>
  <td><input type="checkbox" name="column[<?php echo $row_show_columns['Field']; ?>]"/></td>
  <td><label for="<?php echo $row_show_columns['Field']; ?>"><?php echo $row_show_columns['Field']; ?></label></td>
</tr>
<?php } while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); } ?>
<caption align="bottom">
<input type="submit" value="SAVE FORM" />

</caption>
</table>
</form>
</section>
</td>
</tr>
</table>
<?php mysql_free_result($show_data); ?>