<?php
ob_start();
session_start();

if ($_SESSION['tur']!=="2") {

$hata = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml">';
$hata = $hata.'<head>';
$hata = $hata.'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$hata = $hata.'<title>Yetki Sorgulama Sayfası</title>';
$hata = $hata.'</head><body>';

$hata = $hata.'<div style="position:relative;margin-right:auto;margin-left:auto;width:270px;height:40px;background-color:red;border-radius:6px;line-height:40px;font-size:15px;color:#fff;font-family:Tahoma;font-weight:bold;text-align:center;">Bu sayfa yetkileriniz dışındadır !</div>';

$hata = $hata.'</body></html>';

die($hata);

}


?>