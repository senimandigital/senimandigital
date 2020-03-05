<?php ob_start(); ?>
<?php include $WEBSITE['HOSTING']['ROOT'] .'shared/query/modul_proyek_my_all.php'; ?>
<?php
switch ($WEBSITE['DOMAIN']['SUB']) {
case 'startup': $WEBSITE['META']['DESCRIPTION']  = 'Dukungan terbaik bagi startup Indonesia'; break;
default:        $WEBSITE['META']['DESCRIPTION']  = 'Memberikan penawaran dan pelayanan terbaik dibidang jasa penyedia solusi teknologi informasi yang menjurus kepada penanggulangan krisis perangkat lunak nasional.'; break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Senimandigital" />
<meta name="robots" content="index,follow,all" />
<meta name="description" content="<?php echo $WEBSITE['META']['DESCRIPTION']; ?>" />
<meta property="og:image" content="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/senimandigital-logo.png">
<meta name="domain_site" content="<?php echo $WEBSITE['DOMAIN']['SITE']; ?>" />
<meta name="domain_sub" content="<?php echo $WEBSITE['DOMAIN']['SUB']; ?>" />
<meta name="domain_gambar" content="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>" />
<meta name="PHP_SELF" content="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; ?>" />
<meta name="REQUESTURL" content="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
<meta name="REQUEST_URL" content="<?php echo $_SERVER['REQUEST_URI']; ?>" />
<meta name="date" content="<?php echo date('d-m-Y'); ?>" />
<meta name="anggota_id" content="<?php echo $_SESSION['anggota_id']; ?>" />
<meta name="anggota_level_alias" content="<?php echo $_SESSION['MM_UserGroup']; ?>" />
<?php if ($_SESSION['anggota_id']) { ?>
<meta name="ajax_edit_url" content="<?php echo $WEBSITE['DOMAIN']['SITE']; ?>?ajax=edit" />
<?php } ?>
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
<meta name="database"                content="<?php echo $database_senimandigital; ?>" />
<meta name="domain_administrator"    content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>" />
<meta name="HOSTING_SCRIPT_FILENAME" content="<?php echo $WEBSITE['HOSTING']['SCRIPT_FILENAME']; ?>" />
<meta name="SERVER_SCRIPT_FILENAME"  content="<?php echo $_SERVER['SCRIPT_FILENAME']; ?>" />
<meta name="EDITOR_SCRIPT_FILENAME"  content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>source_edit.php?filename=<?php echo $WEBSITE['HOSTING']['SCRIPT_FILENAME']; ?>" />
<meta name="EDITOR_SCRIPT"           content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>source_edit.php" />
<meta name="FORM_BUILDER"            content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>form_builder.php?filename=<?php echo $WEBSITE['HOSTING']['SCRIPT_FILENAME']; ?>" />
<meta name="FORM_EDIT"               content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>form_edit.php?filename=<?php echo $WEBSITE['HOSTING']['SCRIPT_FILENAME']; ?>" />
<meta name="FORM_SARAN"              content="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>form_saran.php?filename=<?php echo $WEBSITE['HOSTING']['SCRIPT_FILENAME']; ?>" />
<?php } ?>
<title><?php echo ($WEBSITE['DOMAIN']['SUB'] == 'www') ? '' : ucfirst($WEBSITE['DOMAIN']['SUB']); ?> Senimandigital</title>
<link href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
<link href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>css/style.css" rel="stylesheet" type="text/css" />
<?php echo $WEBSITE['STYLE']['HEADER']; ?>

<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>jquery/3.3.1.js" type="text/javascript"></script>
<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>js/script_header.js" type="text/javascript"  /></script>
<?php echo $WEBSITE['SCRIPT']['HEADER']; ?>
<script position="head"></script>
<script>// $( function() { $( document ).tooltip({ content: function(callback) { callback($(this).prop('title').split('|').join('<br/>')); } });  } ); </script>
</head>
<body>
<header>
<style>
.panel-menu-left {
  background: rgba(0,0,0,0.5);
  width: 285px;  height: 100%;
  position: fixed;  left: -285px;  z-index:100;
}

#panel-menu-right {
	visibility:hidden;
    background: rgba(0,0,0,0.5);
    z-index: 1000;    position: fixed;    right: 0;    width: 250px;    height: 100%;
    overflow-y: auto; transform: translateX(250px);
    -webkit-transition: all 0.4s ease 0s;    -moz-transition: all 0.4s ease 0s;    -ms-transition: all 0.4s ease 0s;    -o-transition: all 0.4s ease 0s;    transition: all 0.4s ease 0s;
}
#panel-menu-right.active {
	visibility:visible;
    right: 250px; width: 260px;
    -webkit-transition: all 0.4s ease 0s;     -moz-transition: all 0.4s ease 0s;    -ms-transition: all 0.4s ease 0s;    -o-transition: all 0.4s ease 0s;    transition: all 0.4s ease 0s;
}

#menu-kiri li {
	 padding:10px; list-style-type:none;
}
#menu-kiri li:hover {
	list-style-type:none; background: rgba(0,0,0,0.5);
}
#menu-kiri li a {
	color:#FFF; text-decoration:none; left:0; right:0;
}
div#menu-kiri li ul {
	padding:0;
}

</style>
<script>
$(document).ready(function() {
  $('.panel-menu-left').html( $('.panel-menu-left').html() + '<div id="menu-kiri">' + $('#MenuUtama').html() + '</div>');
  $("#menu-kiri li ul").slideToggle();
  $("#menu-kiri li ul").prev("a").append().click(function(){  $(this).next("ul").slideToggle(100); return false; });

  $('.panel-menu-left-toggle').click(function() {   $('.panel-menu-left').animate({ left: '0px' }, 200);     $('body').animate({ left: '285px' }, 200);   });  
  $('.panel-menu-left-close').click(function() {    $('.panel-menu-left').animate({ left: '-285px' }, 200);  $('body').animate({ left: '0px' }, 200);    });

  $(".panel-menu-right-open").click(function(e) { $("#panel-menu-right").removeClass("active").delay(500).queue(function(next){ $(this).addClass('active'); next(); }); });
  $(".panel-menu-right-close").click(function(e) {  e.preventDefault(); $("#panel-menu-right").removeClass("active"); });
  $(".panel-menu-right-toggle").click(function(e) { e.preventDefault(); $("#panel-menu-right").toggleClass("active"); });
});
</script>
<a class="panel-menu-left-toggle" style="float:left; margin-top:9px; margin-left:10px;" title="Menu Bagi Pengguna Handphone"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/panel-menu-open.png" height="20" /></a>
<div class="panel-menu-left">
<a class="panel-menu-left-close" style="float:left; margin-top:9px; margin-left:10px;" title="Mobile Menu"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/panel-menu-close.png" height="20" /></a>
<a style="font-size:29px; color:#FFF; padding-left:10px;">Mobile Menu</a>
<hr />
</div>
    
<nav id="panel-menu-right">
<a style="font-size:29px; color:#FFF; padding-left:10px;">Panel Menu</a>
<a class="panel-menu-right-close" style="float:right; margin-top:9px; margin-right:10px;" title="Mobile Menu"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/panel-menu-close.png" height="20" /></a>
<hr />
<ul class="sidebar-nav">
<li><a href="#top" onclick=$("#panel-menu-right-close").click();>Home</a></li>
</ul>
</nav>
<?php
if ($WEBSITE['DOMAIN']['SUB'] == 'prototype' && $_GET['modul_proyek_id']) {
function RecursiveMenuPrototype($data, $parent, $first){
if(isset($data[$parent]))
  {
   $first = ($first == '') ? ' class="MenuBarHorizontal" id="MenuUtama"' : '';
   $str = '<ul'. $first .'>'; 
   foreach($data[$parent] as $modul_database_tabel_recursive)
     {
      $child = RecursiveMenuPrototype($data, $modul_database_tabel_recursive['modul_database_tabel_id'], $first); 
      $claspunyasub = ($child) ? ' class="MenuBarItemSubmenu"' : '';
	  $str .= '<li'. $claspunyasub .'><a title="'. $modul_database_tabel_recursive['modul_database_tabel_tooltip'] .'" ';
	  if ($modul_database_tabel_recursive['modul_database_tabel_id'] <> '') {
	          $str .=  'href="'. $WEBSITE['DOMAIN']['PROTOTYPE'] .'index.php?modul_proyek_id='. $_GET['modul_proyek_id'] .'&modul_database_tabel_id='. $modul_database_tabel_recursive['modul_database_tabel_id'] .'"';
	  }
	  $str .= '>'. $modul_database_tabel_recursive['modul_database_tabel_judul'] .'</a>';
      if  ($child) $str .= $child;
	  $str .= '</li>';
     }
   $str .= '</ul>';
   return $str;
  }
else return false;	  
}
$modulproyekid_modul_database_tabel_recursive = "-1";
if (isset($_GET['modul_proyek_id'])) {
  $modulproyekid_modul_database_tabel_recursive = $_GET['modul_proyek_id'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_modul_database_tabel_recursive = sprintf("SELECT * FROM modul_database_tabel WHERE modul_database_tabel.modul_proyek_id=%s AND modul_database_tabel.modul_database_tabel_analisis NOT IN ('logs', 'menu', 'meta', 'type', 'status') ORDER BY modul_database_tabel.modul_database_tabel_nama, modul_database_tabel.modul_database_tabel_upline_id", GetSQLValueString($modulproyekid_modul_database_tabel_recursive, "int"));
$modul_database_tabel_recursive = mysql_query($query_modul_database_tabel_recursive, $senimandigital) or die(mysql_error());
$row_modul_database_tabel_recursive = mysql_fetch_assoc($modul_database_tabel_recursive);
$totalRows_modul_database_tabel_recursive = mysql_num_rows($modul_database_tabel_recursive);
$data = array();
while($row_modul_database_tabel_recursive = mysql_fetch_assoc($modul_database_tabel_recursive)){
$data[$row_modul_database_tabel_recursive['modul_database_tabel_upline_id']][] = $row_modul_database_tabel_recursive;
}
echo RecursiveMenuPrototype($data, 0, '');

} elseif ($WEBSITE['DOMAIN']['SUB'] == 'dreamweaver' && (preg_match('/^\/[a-z]+\/[0-9.]+.*?/', $_SERVER['PATH_INFO'], $matches) OR preg_match('/^\/[a-z]+\/[0-9.]+\/[a-z_]+/', $_SERVER['PATH_INFO'], $matches))) {
function RecursiveMenuDreamweaver($data, $parent, $first, $WEBSITE){
if(isset($data[$parent]))
  {
   $first = ($first == '') ? ' class="MenuBarHorizontal" id="MenuUtama"' : '';
   $str = '<ul'. $first .'>'; 
   foreach($data[$parent] as $menu_recursive)
     {
      $child = RecursiveMenuDreamweaver($data, $menu_recursive['menu_id'], $first, $WEBSITE); 
      $claspunyasub = ($child) ? ' class="MenuBarItemSubmenu"' : '';
	  $str .= '<li'. $claspunyasub .'><a title="'. $menu_recursive['menu_tooltip'] .'" ';
	  if ($menu_recursive['menu_link'] <> '') {
          if ($menu_recursive['menu_callback'] == 'iframe') { $popup = 'openDialogIframe'; } else { $popup = 'openDialog'; }
		  if        ($menu_recursive['menu_callback'] == 'html') {
			  $str .=  'href="'. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][1] . $menu_recursive['menu_link'] .'"';  
		  } elseif (substr($menu_recursive['menu_link'], 0, 7) == 'http://') {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  } else {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  }
	  }
	  $str .= '>'. $menu_recursive['menu_judul'] .'</a>';
      if  ($child) $str .= $child;
	  $str .= '</li>';
     }
   $str .= '</ul>';
   return $str;
  }
else return false;	  
}

$cmsalias_cms_versi = "0";
if (isset($WEBSITE['PATH_INFO'][0])) {
  $cmsalias_cms_versi = $WEBSITE['PATH_INFO'][0];
}
$cmsversikode_cms_versi = "-1";
if (isset($WEBSITE['PATH_INFO'][1])) {
  $cmsversikode_cms_versi = $WEBSITE['PATH_INFO'][1];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_cms_versi = sprintf("SELECT *  FROM cms_versi INNER JOIN cms ON cms.cms_id = cms_versi.cms_id WHERE cms.cms_alias=%s AND cms_versi.cms_versi_kode=%s", GetSQLValueString($cmsalias_cms_versi, "text"),GetSQLValueString($cmsversikode_cms_versi, "text"));
$cms_versi = mysql_query($query_cms_versi, $senimandigital) or die(mysql_error());
$row_cms_versi = mysql_fetch_assoc($cms_versi);
$totalRows_cms_versi = mysql_num_rows($cms_versi);

mysql_select_db($database_senimandigital, $senimandigital);
$query_menu_recursive = "SELECT * FROM menu WHERE cms_versi_id='". $row_cms_versi['cms_versi_id'] ."' ORDER BY menu.menu_urutan, menu.menu_upline_id";
$menu_recursive = mysql_query($query_menu_recursive, $senimandigital) or die(mysql_error());
$data = array();
while($row_menu_recursive = mysql_fetch_assoc($menu_recursive)){
$data[$row_menu_recursive['menu_upline_id']][] = $row_menu_recursive;
}
echo RecursiveMenuDreamweaver($data, 0, '', $WEBSITE);

} elseif ($WEBSITE['DOMAIN']['SUB'] == 'cms' && (preg_match('/^\/[a-z]+\/[0-9.]+.*?/', $_SERVER['PATH_INFO'], $matches) OR preg_match('/^\/[a-z]+\/[0-9.]+\/[a-z_]+/', $_SERVER['PATH_INFO'], $matches))) {

function RecursiveMenuCms($data, $parent, $first, $WEBSITE){
if(isset($data[$parent]))
  {
   $first = ($first == '') ? ' class="MenuBarHorizontal" id="MenuUtama"' : '';
   $str = '<ul'. $first .'>'; 
   foreach($data[$parent] as $menu_recursive)
     {
      $child = RecursiveMenuCms($data, $menu_recursive['menu_id'], $first, $WEBSITE); 
      $claspunyasub = ($child) ? ' class="MenuBarItemSubmenu"' : '';
	  $str .= '<li'. $claspunyasub .'><a title="'. $menu_recursive['menu_tooltip'] .'" ';
	  if ($menu_recursive['menu_link'] <> '') {
          if ($menu_recursive['menu_callback'] == 'iframe') { $popup = 'openDialogIframe'; } else { $popup = 'openDialog'; }
		  if        ($menu_recursive['menu_callback'] == 'html') {
			  $str .=  'href="'. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][1] . $menu_recursive['menu_link'] .'"';  
		  } elseif (substr($menu_recursive['menu_link'], 0, 7) == 'http://') {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  } else {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  }
	  }
	  $str .= '>'. $menu_recursive['menu_judul'] .'</a>';
      if  ($child) $str .= $child;
	  $str .= '</li>';
     }
   $str .= '</ul>';
   return $str;
  }
else return false;	  
}

$cmsalias_cms_versi = "0";
if (isset($WEBSITE['PATH_INFO'][0])) {
  $cmsalias_cms_versi = $WEBSITE['PATH_INFO'][0];
}
$cmsversikode_cms_versi = "-1";
if (isset($WEBSITE['PATH_INFO'][1])) {
  $cmsversikode_cms_versi = $WEBSITE['PATH_INFO'][1];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_cms_versi = sprintf("SELECT *  FROM cms_versi INNER JOIN cms ON cms.cms_id = cms_versi.cms_id WHERE cms.cms_alias=%s AND cms_versi.cms_versi_kode=%s", GetSQLValueString($cmsalias_cms_versi, "text"),GetSQLValueString($cmsversikode_cms_versi, "text"));
$cms_versi = mysql_query($query_cms_versi, $senimandigital) or die(mysql_error());
$row_cms_versi = mysql_fetch_assoc($cms_versi);
$totalRows_cms_versi = mysql_num_rows($cms_versi);

mysql_select_db($database_senimandigital, $senimandigital);
$query_menu_recursive = "SELECT * FROM menu WHERE subdomain='cms' AND cms_versi_id='". $row_cms_versi['cms_versi_id'] ."' ORDER BY menu.menu_urutan, menu.menu_upline_id";
$menu_recursive = mysql_query($query_menu_recursive, $senimandigital) or die(mysql_error());
$data = array();
while($row_menu_recursive = mysql_fetch_assoc($menu_recursive)){
$data[$row_menu_recursive['menu_upline_id']][] = $row_menu_recursive;
}
echo RecursiveMenuCms($data, 0, '', $WEBSITE);

} elseif ($WEBSITE['DOMAIN']['SUB'] == 'framework' && (preg_match('/^\/[a-z]+\/[0-9.]+.*?/', $_SERVER['PATH_INFO'], $matches) OR preg_match('/^\/[a-z]+\/[0-9.]+\/[a-z_]+/', $_SERVER['PATH_INFO'], $matches))) {

function RecursiveMenuframework($data, $parent, $first, $WEBSITE){
if(isset($data[$parent]))
  {
   $first = ($first == '') ? ' class="MenuBarHorizontal" id="MenuUtama"' : '';
   $str = '<ul'. $first .'>'; 
   foreach($data[$parent] as $menu_recursive)
     {
      $child = RecursiveMenuframework($data, $menu_recursive['menu_id'], $first, $WEBSITE); 
      $claspunyasub = ($child) ? ' class="MenuBarItemSubmenu"' : '';
	  $str .= '<li'. $claspunyasub .'><a title="'. $menu_recursive['menu_tooltip'] .'" ';
	  if ($menu_recursive['menu_link'] <> '') {
          if ($menu_recursive['menu_callback'] == 'iframe') { $popup = 'openDialogIframe'; } else { $popup = 'openDialog'; }
		  if        ($menu_recursive['menu_callback'] == 'html') {
			  $str .=  'href="'. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][1] . $menu_recursive['menu_link'] .'"';  
		  } elseif (substr($menu_recursive['menu_link'], 0, 7) == 'http://') {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  } else {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] .'/index.php/'. $WEBSITE['PATH_INFO'][0] .'/'. $WEBSITE['PATH_INFO'][0] .'/'. $menu_recursive['menu_link'] .'\')"';
		  }
	  }
	  $str .= '>'. $menu_recursive['menu_judul'] .'</a>';
      if  ($child) $str .= $child;
	  $str .= '</li>';
     }
   $str .= '</ul>';
   return $str;
  }
else return false;	  
}

$frameworkalias_framework_versi = "0";
if (isset($WEBSITE['PATH_INFO'][0])) {
  $frameworkalias_framework_versi = $WEBSITE['PATH_INFO'][0];
}
$frameworkversikode_framework_versi = "-1";
if (isset($WEBSITE['PATH_INFO'][1])) {
  $frameworkversikode_framework_versi = $WEBSITE['PATH_INFO'][1];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_framework_versi = sprintf("SELECT *  FROM framework_versi INNER JOIN framework ON framework.framework_id = framework_versi.framework_id WHERE framework.framework_alias=%s AND framework_versi.framework_versi_kode=%s", GetSQLValueString($frameworkalias_framework_versi, "text"),GetSQLValueString($frameworkversikode_framework_versi, "text"));
$framework_versi = mysql_query($query_framework_versi, $senimandigital) or die(mysql_error());
$row_framework_versi = mysql_fetch_assoc($framework_versi);
$totalRows_framework_versi = mysql_num_rows($framework_versi);

mysql_select_db($database_senimandigital, $senimandigital);
$query_menu_recursive = "SELECT * FROM menu WHERE subdomain='framework' AND cms_versi_id='". $row_framework_versi['framework_versi_id'] ."' ORDER BY menu.menu_urutan, menu.menu_upline_id";
$menu_recursive = mysql_query($query_menu_recursive, $senimandigital) or die(mysql_error());
$data = array();
while($row_menu_recursive = mysql_fetch_assoc($menu_recursive)){
$data[$row_menu_recursive['menu_upline_id']][] = $row_menu_recursive;
}
echo RecursiveMenuframework($data, 0, '', $WEBSITE);

} else {
// Global Menu
if (!function_exists('RecursiveMenuUtama')) {
function RecursiveMenuUtama($data, $parent, $first){
if(isset($data[$parent]))
  {
   $first = ($first == '') ? ' class="MenuBarHorizontal" id="MenuUtama"' : '';
   $str = '<ul'. $first .'>'; 
   foreach($data[$parent] as $menu_recursive)
     {
      $child = RecursiveMenuUtama($data, $menu_recursive['menu_id'], $first); 
      $claspunyasub = ($child && $menu_recursive['menu_rules'] == 'ul') ? ' class="MenuBarItemSubmenu"' : ' ';
	  $str .= '<li'. $claspunyasub .'>';
	  $str .= '<a title="'. $menu_recursive['menu_tooltip'] .'" ';
	  if ($menu_recursive['menu_link'] <> '') {
          if ($menu_recursive['menu_callback'] == 'iframe') { $popup = 'openDialogIframe'; } else { $popup = 'openDialog'; }
		  if ($menu_recursive['menu_callback'] == 'html') {
			  $str .=  'href="'. $menu_recursive['menu_link'] .'"';  
		  } elseif (substr($menu_recursive['menu_link'], 0, 7) == 'http://') {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \''. $menu_recursive['menu_link'] .'\')"';
		  } else {
	          $str .=  'onClick="'. $popup .'(\''. $menu_recursive['menu_judul'] .'\', \'http://htaphpjs.senimandigital.kom/'. $menu_recursive['menu_link'] .'\')"';
		  }
	  }
	  $str .= '>'. $menu_recursive['menu_judul'] .'</a>';

      if ($menu_recursive['menu_rules'] == 'description') {
		  $str .= '<div class="drop" style="width:400px;">';
	  }
      if  ($child) $str .= $child;
      if ($menu_recursive['menu_rules'] == 'description') {
		  $str .= '<p>'. $menu_recursive['menu_tooltip'] . '</p></div>';
	  }
	  $str .= '</li>';
     }
   $str .= '</ul>';
   return $str;
  }
else return false;	  
}}

$subdomain_menu_recursive = "www";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $subdomain_menu_recursive = $WEBSITE['DOMAIN']['SUB'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_menu_recursive = sprintf("SELECT * FROM menu WHERE menu.menu_area = 'menu_utama' AND cms_versi_id != -1  AND cms_versi_id < 1 AND menu.subdomain = %s ORDER BY menu.menu_urutan, menu.menu_id, menu.menu_upline_id", GetSQLValueString($subdomain_menu_recursive, "text"),GetSQLValueString($subdomain_menu_recursive, "text"));
$menu_recursive = mysql_query($query_menu_recursive, $senimandigital) or die(mysql_error());
$row_menu_recursive = mysql_fetch_assoc($menu_recursive);
$totalRows_menu_recursive = mysql_num_rows($menu_recursive);
$menu_recursive = mysql_query($query_menu_recursive, $senimandigital) or die(mysql_error());
$data = array();
while($row_menu_recursive = mysql_fetch_assoc($menu_recursive)){
if ($_SESSION['MM_UserGroup'] == '' && $row_menu_recursive['anggota_level_alias'] != '') continue;
$data[$row_menu_recursive['menu_upline_id']][] = $row_menu_recursive;
}
echo RecursiveMenuUtama($data, 0, '');
mysql_free_result($menu_recursive);
}


$paragraphuntuk_paragraph_menu_atas_kanan = "www";
if (isset($WEBSITE['DOMAIN']['SUB'])) {
  $paragraphuntuk_paragraph_menu_atas_kanan = $WEBSITE['DOMAIN']['SUB'];
}
mysql_select_db($database_senimandigital, $senimandigital);
$query_paragraph_menu_atas_kanan = sprintf("SELECT * FROM paragraph WHERE paragraph.paragraph_query LIKE '%%menu=menu_atas_kanan%%' AND paragraph.paragraph_untuk=%s", GetSQLValueString($paragraphuntuk_paragraph_menu_atas_kanan, "text"));
$paragraph_menu_atas_kanan = mysql_query($query_paragraph_menu_atas_kanan, $senimandigital) or die(mysql_error());
$row_paragraph_menu_atas_kanan = mysql_fetch_assoc($paragraph_menu_atas_kanan);
$totalRows_paragraph_menu_atas_kanan = mysql_num_rows($paragraph_menu_atas_kanan);
?>
<a class="panel-menu-right-toggle" style="float:right; margin-top:9px; margin-right:10px;" ><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/panel-menu-open.png" height="20" /></a>
  <ul id="Menulogin" class="MenuBarHorizontal" style="float:right;">
  <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
    <li><a href="#">+</a>
      <div class="drop" data-align="right" style="width:300px;"><p role="deskripsi" ondblclick="openDialogIframe('Tambah Menu Deskripsi', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>paragraph_tambah.php?popup=dialog&paragraph_id=<?php echo $row_paragraph_menu_atas_kanan['paragraph_id']; ?>#tabs-edit-halaman'); return false;">Klik ganda disini untuk membuat Menu Deskripsi</p></div>
    </li>
  <?php } ?>
  <?php if ($totalRows_paragraph_menu_atas_kanan > 0) { // Show if recordset not empty ?>
  <?php do { ?>
    <li><a href="#"><?php echo $row_paragraph_menu_atas_kanan['paragraph_judul']; ?></a>
      <div class="drop" data-align="right" style="width:300px;" ondblclick="openDialogIframe('Edit Konten Paragraph', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>paragraph_edit.php?popup=dialog&paragraph_id=<?php echo $row_paragraph_menu_atas_kanan['paragraph_id']; ?>#tabs-edit-halaman'); return false;"><?php echo $row_paragraph_menu_atas_kanan['paragraph_konten']; ?></div>
    </li>
  <?php } while ($row_paragraph_menu_atas_kanan = mysql_fetch_assoc($paragraph_menu_atas_kanan)); ?>
  <?php } // Show if recordset not empty ?>
    <li><a href="#">Akun</a>
      <div class="drop TabbedPanels" id="form-login" data-align="right" style="width:250px;">
        <ol class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Login</li>
          <?php if (!$_SESSION['anggota_id']) { ?>
          <li class="TabbedPanelsTab" tabindex="1">Registrasi</li>
          <?php } else { ?>
          <li class="TabbedPanelsTab" tabindex="1">Menu</li>
          <li class="TabbedPanelsTab" tabindex="1">Balance</li>
          <?php } /* if (!$row_anggota_session['anggota_id']) */ ?>
        </ol>
        <div class="TabbedPanelsContentGroup">
          <?php if (!$_SESSION['anggota_id']) { ?>
          <form method="post" name="form_login" class="TabbedPanelsContent" action="">
            <table cellpadding="3">
              <tr>
                <td><label for="username">Username</label></td>
              </tr>
              <tr>
                <td><input type="text" name="username" id="username" style="width:100%" /></td>
              </tr>
              <tr>
                <td><label for="password">Password</label></td>
              </tr>
              <tr>
                <td><input type="password" name="password" style="width:100%"/></td>
              </tr>
              <tr>
                <td><a onclick="openDialogIframe('Reset Password', '<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>password_reset.php?popup=dialog')" style="float:left; font-size:11px;">Lupa Password</a>
                  <input type="submit" value="Login" id="asal" style="float:right;"/></td>
              </tr>
            </table>
          </form>
          <form method="post" name="form-registrasi" class="TabbedPanelsContent" action="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>/registrasi">
            <table cellpadding="3">
              <tr>
                <td><label for="anggota_realname">Nama</label></td>
              </tr>
              <tr>
                <td><input type="text" name="anggota_realnme" /></td>
              </tr>
              <tr>
                <td><label for="anggota_email">Email</label></td>
              </tr>
              <tr>
                <td><input type="text" name="anggota_email" /></td>
              </tr>
              <tr>
                <td><a href="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>registrasi.php" style="float:left; font-size:11px;">Advance</a>
                  <input type="submit" value="Registrasi" id="asalja" style="float:right;"/></td>
              </tr>
            </table>
          </form>
          <?php } elseif ($_SESSION['MM_UserGroup'] == 'admin') { ?>
          <form method="put" name="form_logout"class="TabbedPanelsContent" action="<?php echo $WEBSITE['DOMAIN']['ROOT']; ?>">
            <table cellpadding="3">
              <tr>
                <td><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/anggota/<?php echo $_SESSION['anggota_id']; ?>.png" style="width:100%"/></td>
              </tr><tr><td><a style="float:left;"><input type="button" value="Profile" /></a><a href="/index.php?Logout=true" style="float:right;"><input type="button" value="Logout"/></a>
                  </td>
              </tr>
            </table>
          </form>
          <form method="post" name="form-registrasi" class="TabbedPanelsContent" action="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>">
           <div>
           <select name="modul_proyek_id" url-update="parameter" value="<?php echo $_REQUEST['modul_proyek_id']; ?>">
      <option>--- Pilih Proyek ---</option>
	 <?php do { ?>
      <option value="<?php echo $row_modul_proyek_my_all['modul_proyek_id']?>"><?php echo $row_modul_proyek_my_all['modul_proyek_judul']; ?></option>
      <?php } while ($row_modul_proyek_my_all = mysql_fetch_assoc($modul_proyek_my_all));  $rows = mysql_num_rows($modul_proyek_my_all);  if($rows > 0) {      mysql_data_seek($modul_proyek_my_all, 0);	  $row_modul_proyek_my_all = mysql_fetch_assoc($modul_proyek_my_all);  }?>
    </select>
           <a href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>" target="_new">Administrator</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>menu.php?subdomain=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>" target="_new">Menu</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>" target="_new">Anggota</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>" target="_new">Assets</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>" title="Jangan lewatkan dokumen-dokumen penting dan melepaskan peluang dengan percuma, periksa surat keluar dan surat masuk yang perlu anda tanda tangani dengan segera." target="_new">Teken</a>
           </div> 
          </form>
          <div class="TabbedPanelsContent">
          <table>
            <tr>
              <td>Tagihan</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_tagihan'] ? $row_anggota_login['anggota_tagihan'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Pemasukan</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_pemasukan'] ? $row_anggota_login['anggota_pemasukan'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Pengeluaran</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_pengeluaran'] ? $row_anggota_login['anggota_pengeluaran'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Rekber</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_poin'] ? $row_anggota_login['anggota_rekber'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Point</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_poin'] ? $row_anggota_login['anggota_poin'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Saldo</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_saldo'] ? $row_anggota_login['anggota_saldo'] : 0 ; ?></td>
            </tr>
          </table>
          </div>
          <?php } else { ?>
          <form method="put" name="form_logout"class="TabbedPanelsContent" action="<?php echo $WEBSITE['DOMAIN']['ROOT']; ?>">
            <table cellpadding="3">
              <tr>
                <td><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>data-icon/anggota/<?php echo $_SESSION['anggota_id']; ?>.png" style="width:100%"/></td>
              </tr><tr><td><a style="float:left;"><input type="button" value="Profile" /></a><a href="/index.php?Logout=true" style="float:right;"><input type="button" value="Logout"/></a>
                  </td>
              </tr>
            </table>
          </form>
          <form method="post" name="form-registrasi" class="TabbedPanelsContent" action="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>">
           <div>
           <select name="modul_proyek_id" url-update="parameter" value="<?php echo $_REQUEST['modul_proyek_id']; ?>">
      <option>--- Pilih Proyek ---</option>
	 <?php do { ?>
      <option value="<?php echo $row_modul_proyek_my_all['modul_proyek_id']?>"><?php echo $row_modul_proyek_my_all['modul_proyek_judul']; ?></option>
      <?php } while ($row_modul_proyek_my_all = mysql_fetch_assoc($modul_proyek_my_all));  $rows = mysql_num_rows($modul_proyek_my_all);  if($rows > 0) {      mysql_data_seek($modul_proyek_my_all, 0);	  $row_modul_proyek_my_all = mysql_fetch_assoc($modul_proyek_my_all);  }?>
    </select>
           <a href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>" target="_new">Administrator</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>menu.php?subdomain=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>" target="_new">Menu</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>" target="_new">Anggota</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>" target="_new">Assets</a>
           <a href="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>" title="Jangan lewatkan dokumen-dokumen penting dan melepaskan peluang dengan percuma, periksa surat keluar dan surat masuk yang perlu anda tanda tangani dengan segera." target="_new">Teken</a>
           </div> 
          </form>
          <div class="TabbedPanelsContent">
          <table>
            <tr>
              <td>Tagihan</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_tagihan'] ? $row_anggota_login['anggota_tagihan'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Pemasukan</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_pemasukan'] ? $row_anggota_login['anggota_pemasukan'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Pengeluaran</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_pengeluaran'] ? $row_anggota_login['anggota_pengeluaran'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Rekber</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_poin'] ? $row_anggota_login['anggota_rekber'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Point</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_poin'] ? $row_anggota_login['anggota_poin'] : 0 ; ?></td>
            </tr>
            <tr>
              <td>Saldo</td>
              <td currency="rupiah"><?php echo $row_anggota_login['anggota_saldo'] ? $row_anggota_login['anggota_saldo'] : 0 ; ?></td>
            </tr>
          </table>
          </div>
          <?php } /* if (!$row_anggota_session['anggota_id']) */ ?>
        </div>
      </div>
    </li>
  </ul>
</header>
<main>
<?php
$WEBSITE['TEMPLATE']['HEADER'] = ob_get_contents();
ob_end_clean();

ob_start();
?>
</main>
<footer>
<script>
$(function() { 
  $("#footer-description > li:gt(0)").hide(); setInterval(function() { 
  $("#footer-description > li:first").fadeOut(0).next().fadeIn(1000).end().appendTo("#footer-description"); }, 15000); 
});
</script>
  <table border="0" cellpadding="0">
    <tr>
      <td><ul data-transition="fade" id="footer-description" style="margin-top:0px;">
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
<?php do { ?>
<li>
  <a <?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?>
 ondblclick="openDialogIframe('Edit Deskripsi', '<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>menu_edit.php?popup=dialog&menu_id=<?php echo $row_menu_deskripsi['menu_id']; ?>');" 
<?php } ?>><strong style="color: #606062;  clear:both;"><?php echo $row_menu_deskripsi['menu_judul']; ?></strong><br /><span style="color: #666; clear:both;"><?php echo $row_menu_deskripsi['menu_deskripsi']; ?></span></a>
</li>
<?php } while ($row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi)); $rows = mysql_num_rows($menu_deskripsi); if($rows > 0) { mysql_data_seek($menu_deskripsi, 0); $row_menu_deskripsi = mysql_fetch_assoc($menu_deskripsi); } ?>
</ul></td>
      <td width="85"><strong style="color: #606062">Bagaimana</strong>
        <ul>
          <li><a>Berkonstribusi</a></li>
          <li><a>Registrasi</a></li>
          <li>Lainya</li>
        </ul></td>
      <td width="55"><strong style="color: #606062">Produk</strong>
        <ul>
          <li>Hosting</li>
          <li>RiaErp</li>
          <li><a href="http://senimandigital.com/index.php/produk">Lainya</a></li>
        </ul></td>
      <td width="70" style="padding-right:5px;"><strong style="color: #606062"><a href="http://senimandigital.com/index.php/tentang">Tentang</a></strong>
        <ul>
          <li>Perusahaan</li>
          <li><a href="http://senimandigital.com/index.php/kontak">Kontak</a></li>
          <li><a href="http://senimandigital.com/index.php/sitemap">Lainya</a></li>
        </ul></td>
      <td width="100">
      <table frame="void" rules="all" cellpadding="5px;" style="border-color:#093;">
          <tr>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/senimandigital-logo.png" href="<?php echo $WEBSITE['DOMAIN']['SITE']; ?>" /></td>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>icon/cms-config.jpg" href="<?php echo $WEBSITE['DOMAIN']['CMS']; ?>index.php/senimandigital/1.0.0/"  /></td>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/dreamweaver.png" href="<?php echo $WEBSITE['DOMAIN']['DREAMWEAVER']; ?>index.php/senimandigital/1.0.0/" /></td>
          </tr>
          <tr>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/google-chrome.png" href="<?php echo $WEBSITE['DOMAIN']['CHROME']; ?>index.php/senimandigital/1.0.0/" /></td>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>logo/mozzila-firefox.jpg" href="<?php echo $WEBSITE['DOMAIN']['FIREFOX']; ?>index.php/senimandigital/1.0.0/" /></td>
            <td><img width="30" src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>icon/location.png" href="<?php echo $WEBSITE['DOMAIN']['KNOWLEDGE']; ?>" /></td>
          </tr>
       </table>
       </td>
    </tr>
  </table>
</footer>
<!-- </body></html> -->
</body>
</html>
<script type="text/javascript">
var MenuUtama = new Spry.Widget.MenuBar("MenuUtama", {imgDown:"<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBarDownHover.gif", imgRight:"<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBarRightHover.gif"});
var Menulogin = new Spry.Widget.MenuBar("Menulogin", {imgDown:"<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBarDownHover.gif", imgRight:"<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>SpryAssets/SpryMenuBarRightHover.gif"});
var formlogin = new Spry.Widget.TabbedPanels("form-login");
</script>
<script src="<?php echo $WEBSITE['DOMAIN']['ASSETS']; ?>js/script_footer.js" type="text/javascript" /></script>
<?php echo $WEBSITE['SCRIPT']['FOOTER']; unset($WEBSITE['SCRIPT']['FOOTER']); ?>
<script>
if ( $('meta[name=HOSTING_SCRIPT_FILENAME]').attr('content') != null) { $('<span style="position:absolute; margin-top:24px; font-size:9px;">Location: '+ $('meta[name=HOSTING_SCRIPT_FILENAME]').attr('content') +'</span>').insertBefore( 'article>section>h3' ); }
if (document.querySelectorAll('meta[name=anggota_level_alias]').item(0).getAttribute('content') == 'admin') {
if (document.querySelectorAll('meta[name=HOSTING_SCRIPT_FILENAME]').item(0).getAttribute('content') == document.querySelectorAll('meta[name=SERVER_SCRIPT_FILENAME]').item(0).getAttribute('content')) {
document.querySelectorAll('article>section>h3').item(0).innerHTML = document.querySelectorAll('article>section>h3').item(0).innerHTML + '<span style="float: right">'
+'<a target="_new" title="Form Builder" href="'+ document.querySelectorAll('meta[name=FORM_BUILDER]').item(0).getAttribute('content') +'"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/form-builder.jpg" height="20" /></a> '
+'<a target="_new" title="Form Saran" href="'+ document.querySelectorAll('meta[name=FORM_SARAN]').item(0).getAttribute('content') +'"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/form-saran.png" height="20" /></a> '
+'<a target="_new" title="Form Edit" href="'+ document.querySelectorAll('meta[name=FORM_EDIT]').item(0).getAttribute('content') +'"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/form-edit.png" height="20" /></a> '
+'<a target="_new" title="Edit Source" href="'+ document.querySelectorAll('meta[name=EDITOR_SCRIPT_FILENAME]').item(0).getAttribute('content') +'"><img src="<?php echo $WEBSITE['DOMAIN']['GAMBAR']; ?>website/php-edit.png" height="20" /></a>'
+'</span>';
}}

var $input = document.querySelectorAll('img[src*=GAMBAR]');
for(i = 0 ; i < $input.length ; i++) {
$input.item(i).outerHTML = $input.item(i).outerHTML.replace(/&lt;[?]php.*?GAMBAR.*?[?]&gt;/g, "<?php echo $WEBSITE['DOMAIN']['GAMBAR'] ?>");
}

$('img[onerror]').each(function( index ) {
  if ( $(this).attr("src") == $(this).attr("onerror").substr(10, $(this).attr("onerror").length-12)) {
       $(this).attr("onclick", "openDialogIframe('Ganti dengan script Paste Image', '<?php echo $WEBSITE['DOMAIN']['ANGGOTA']; ?>paste_image.php?table="+ $(this).attr("table") +"&id="+ $(this).attr("data-id") +"');");
  }
});
<?php if ($_SESSION['MM_UserGroup'] == 'admin') { ?> $('#MenuUtama').append('<li><a popup target="_blank" title="tambah menu utama" href="<?php echo $WEBSITE['DOMAIN']['ADMINISTRATOR']; ?>menu_tambah.php?popup&subdomain=<?php echo $WEBSITE['DOMAIN']['SUB']; ?>">+</a></li>'); <?php } ?>
</script>
<?php
mysql_free_result($menu_recursive);
mysql_free_result($paragraph_menu_atas_kanan);
$WEBSITE['TEMPLATE']['FOOTER'] = ob_get_contents();
ob_end_clean();
?>
