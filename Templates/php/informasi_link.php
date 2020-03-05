<?php
mysql_select_db($database_senimandigital, $senimandigital);
$query_link = "SELECT * FROM link";
$link = mysql_query($query_link, $senimandigital) or die(mysql_error());
$row_link = mysql_fetch_assoc($link);
$totalRows_link = mysql_num_rows($link);
?>
<section>
<h3>Link</h3>
<ul>
<?php do { ?>
    <li><a target="_blank" href="<?php echo $row_link['link_href']; ?>"><?php echo $row_link['link_judul']; ?></a></li>
<?php } while ($row_link = mysql_fetch_assoc($link)); ?>
</ul>
</section>
