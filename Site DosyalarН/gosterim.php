<? include('db.php'); include('fonksiyon.php'); ?>
<? if ($anasayfa_gosterim==1) { ?>
<? $sonuc = anasayfa_gosterim(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bugün</title>
</head><body>
<font style="font:20px Georgia; color:#f4f3f4;">
<?=number_format($sonuc)?>
</font>
</body></html>
<? } ?>