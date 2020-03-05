<?php require_once('../../Connections/senimandigital.php'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>jquery-plugins/imgareaselect/0.9.10/css/imgareaselect-default.css" />
<script type="text/javascript" src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>jquery-plugins/imgareaselect/0.9.10/scripts/jquery.imgareaselect.pack.js"></script>
<table>
<tr>
<td role="article" valign="top">
<section>
<h3>UPLOAD GAMBAR</h3>
<?php include $WEBSITE['HOSTING']['TEMPLATES'] .'php/deskripsi.php'; ?>
<?PHP
if(!empty($_FILES['uploaded_file']))
  {
    $path = $WEBSITE['HOSTING']['GAMBAR'] .'data-icon/'. $_GET['table'] .'/';
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      rename ($path, $WEBSITE['HOSTING']['GAMBAR'] .'data-icon/'. $_GET['table'] .'/'. $_GET['data_id'] .'.png');
	  echo $path;
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>
  <h3>Pilih File</h3>
   <form method="POST" enctype="multipart/form-data" action="">
    <input type="file" name="uploaded_file"><input type="submit" value="Upload" style="float:right;">
  </form>
  <h3>Preview</h3> <img id="photo" src="/gambar/data-icon/<?php echo $_GET['table']; ?>/<?php echo $_GET['data_id']; ?>.png" onError="this.src='<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/knowledge/0.png';"/>
</section>
</td>
</tr>
</table>
