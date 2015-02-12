<?php
ob_start();
session_start();

include("db.php");
include("fonksiyon.php");

$gelenurl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

echo '<title>'.$title.'</title>';

if ($keywords=="") { 
echo '<meta name="keywords" content="'.$sitekey.'" />'; 
} else { 
echo '<meta name="keywords" content="'.$keywords.'" />'; 
} 

if ($description=="") { 
echo '<meta name="description" content="'.$sitedesc.'" />'; 
} else {
echo '<meta name="description" content="'.$description.'" />'; 
}

echo '<link rel="SHORTCUT ICON" href="'.$sitefav.'" /><link rel="stylesheet" href="css/main.css" type="text/css" /><link rel="stylesheet" href="css/index.css" type="text/css" /><link href="css/login-box.css" rel="stylesheet" type="text/css" /><link href="css/login.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script><script type="text/javascript" src="javascript/upload.js"></script><script type="text/javascript" src="javascript/genel.js"></script><script type="text/javascript" src="javascript/jquery.featureList-1.0.0.js"></script></head>'; 

echo '<body><div id="wrap">';
echo '<div id="logo"><img src="'.$sitelogo.'" /></div>';
?>
<? if ($anasayfa_gosterim==1) { ?>
<div id="gg" style="position:Absolute;float:Right;right:240px; top:80px;"></div>
<script type="text/javascript">

$(function(){
gosterim();
});
function gosterim() { $('#gg').html('<img src="new/loadingAnimation2.gif">'); setTimeout("$('#gg').load('gosterim.php');", 2000); setTimeout("gosterim();", 7500); }
</script>
<? } ?>
<?
echo '<div id="explore">'; 

if ($_SESSION['login']=="True") { 
echo '<a href="logout.php" id="explore-link">Çıkış Yap</a>';

if ($_SESSION['tur']=="1") { if ( strstr($gelenurl,"odeme_taleplerim.php")){ 
echo '<span style="" id="explore-link"><font color="#FFFFFF">Ödeme Taleplerim</font></span>'; 
} else { 
echo '<a href="odeme_taleplerim.php" id="explore-link">Ödeme Taleplerim</a>'; 
} }


 if ($_SESSION['tur']=="2") { 
 if ( strstr($gelenurl,"destek.php")){ 
 echo '<span style="" id="explore-link"><font color="#FFFFFF">Destek</font></span>'; 
 } else {
 echo '<a href="destek.php?mode=see" id="explore-link">Destek</a>'; 
 }
 
 } 
 
 if ($_SESSION['tur']=="1") { if ( strstr($gelenurl,"yayinci_rapor.php")){ 
 echo '<span style="" id="explore-link"><font color="#FFFFFF">Raporlarım</font></span>'; 
 } else {
 echo '<a href="yayinci_rapor.php" id="explore-link">Raporlarım</a>'; 
 } } 
 
 if ($_SESSION['tur']=="2") { if ( strstr($gelenurl,"reklamlarim.php")){ 
 echo '<span style="" id="explore-link"><font color="#FFFFFF">Reklamlarım</font></span>'; 
 } else { 
 echo '<a href="reklamlarim.php" id="explore-link">Reklamlarım</a>'; 
 } } 
 } else { 
 
 if ( strstr($gelenurl,"giris.php")){ 
 echo '<span style="" id="explore-link"><font color="#FFFFFF">Giriş Yap</font></span>'; 
 } else {
echo '<a href="giris.php" id="explore-link">Giriş Yap</a>'; 
} 

if ( strstr($gelenurl,"unuttum.php")){ 
echo '<span style="" id="explore-link"><font color="#FFFFFF">Şifremi Unuttum</font></span>'; 
} else { 
echo '<a href="unuttum.php" id="explore-link">Şifremi Unuttum</a>'; 
} } 
echo '</div><div id="menu"><div id="menu-left"></div><ul><li><a ';
if ( strstr($gelenurl,"index.php")){ echo'class="current"'; 
} 
echo'href="index.php"><span>'; 
echo 'ANA SAYFA</span></a></li>'; 

if ($_SESSION['login']=="True") 
{ 
echo '<li><a '; if ( strstr($gelenurl,"panel.php")){ 
echo 'class="current"'; 
} 
echo' href="panel.php"><span>PANELİM</span></a></li>';
} else { 
echo '<li><a ';  

if ( strstr($gelenurl,"kayit.php")){ 
echo 'class="current"';  
}  
echo 'href="kayit.php"><span>KAYIT OL</span></a></li>'; 
} 
echo '<li><a '; 

if ( strstr($gelenurl,"hakkimizda.php")){ echo 'class="current"'; } 
echo 'href="hakkimizda.php"><span>HAKKIMIZDA</span></a></li>'; 
echo '<li><a '; if ( strstr($gelenurl,"duyurular.php")){ 
echo 'class="current"'; } 
echo 'href="duyurular.php"><span>DUYURULAR</span></a></li>';
echo '<li><a '; if ( strstr($gelenurl,"iletisim.php")){ 
echo 'class="current"'; } 
echo 'href="iletisim.php"><span>İLETİŞİM</span></a></li>'; 
echo '</ul><div id="menu-right"></div></div>'; 
?>