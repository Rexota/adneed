<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_yayinci.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>




<? if ($mode=='see') { ?>
<title></title>
<?	
$result = @mysql_query("select * from sitelerim where user = '$_SESSION[userid]' and onay = 1 order by id desc");

if (@mysql_num_rows($result)<1) {
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" width="626" style="border: 1px solid #000080" colspan="6">
			<p>&nbsp;<img border="0" src="extra/notification-exclamation.gif" width="14" height="14"> 
			Şuan rapor gösterilecek bir siteniz bulunmamaktadır.</td>
		</tr>
		</table>


<? 
} else {

?>


<?
	 
while( $gos = @mysql_fetch_array($result))
{



?>
	<table border="0" width="%100" cellpadding="0" style="border-collapse: collapse">
			<tr>
			<td height="25" colspan="8">&nbsp;Rapor Tarihi: <?=date("d.m.Y")?></td>
		</tr>
		<tr>
			<td height="25" width="30%" style="border: 1px solid #C0C0C0">&nbsp;Web Siteniz</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Reklam Türü</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Gösterim / Tıklama</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Çoğul Gösterim</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Sayfa TO</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Kazanç</td>
		</tr>
		<tr>
			<td height="25" width="" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=$gos[adres]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y")?></td>
			<td height="25" width="" style="border: 1px solid #008000; padding-top: 1px">&nbsp;Popup</td>
			<td height="25" width="" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format(popup_bugun_sayim_site($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(popup_bugun_sayim_site_cogul($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format(popup_bugun_sayim_site($gos[id],"")/popup_bugun_sayim_site_cogul($gos[id],"")*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #008000; padding-top: 1px"><p><font color="#008000">&nbsp;<?=number_format(popup_bugun_kazanc_site($gos[id],""),2)?> TL</font></td>
		</tr>
		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$gos[adres]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y")?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Splash</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=number_format(splash_bugun_sayim_site($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(splash_bugun_sayim_site_cogul($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format(splash_bugun_sayim_site($gos[id],"")/splash_bugun_sayim_site_cogul($gos[id],"")*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format(splash_bugun_kazanc_site($gos[id],""),2)?> TL</font></td>
		</tr>
		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$gos[adres]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y")?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Msn Pop</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=number_format(msn_bugun_sayim_site($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(msn_bugun_sayim_site_cogul($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format(msn_bugun_sayim_site($gos[id],"")/msn_bugun_sayim_site_cogul($gos[id],"")*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format(msn_bugun_kazanc_site($gos[id],""),2)?> TL</font></td>
		</tr>
		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$gos[adres]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y")?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;PPC Banner</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(ppc_bugun_sayim_site($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(ppc_bugun_sayim_site_cogul($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format(ppc_bugun_sayim_site($gos[id],"")/ppc_bugun_sayim_site_cogul($gos[id],"")*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format(ppc_bugun_kazanc_site($gos[id],""),2)?> TL</font></td>
		</tr>
         <tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;İstatistikler</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;Bugün</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Hepsi</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=number_format(popup_bugun_sayim_site($gos[id],"")+splash_bugun_sayim_site($gos[id],"")+msn_bugun_sayim_site($gos[id],"")+ppc_bugun_sayim_site($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format(popup_bugun_sayim_site_cogul($gos[id],"")+splash_bugun_sayim_site_cogul($gos[id],"")+msn_bugun_sayim_site_cogul($gos[id],"")+ppc_bugun_sayim_site_cogul($gos[id],""))?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;Ortalama</td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format(popup_bugun_kazanc_site($gos[id],"")+splash_bugun_kazanc_site($gos[id],"")+msn_bugun_kazanc_site($gos[id],"")+ppc_bugun_kazanc_site($gos[id],""),2)?> TL</font></td>
		</tr>
		<tr>
			<td height="25" colspan="8">&nbsp;</td>
		</tr>
		</table>

<? } ?>
<? } } ?>










<? if ($mode=='tek') { 

$gunss = sql($_GET['gun']);
$ayss = sql($_GET['ay']);
$yilss = sql($_GET['yil']);

$bgunss =sql($_GET['bgun']);
$bayss = sql($_GET['bay']);
$byilss = sql($_GET['byil']);

$sites_id = sql($_GET['sitem']);


$basla = mktime(0,0,0,$ayss,$gunss,$yilss);
$bit = mktime(23,59,59,$bayss,$bgunss,$byilss);


?>
<title></title>

	<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			<tr>
			<td height="25" colspan="5">&nbsp;Rapor Tarihi: <?=date("d.m.Y", $basla)?> - <?=date("d.m.Y", $bit)?></td>
		</tr>
		<tr>
			<td height="25" width="30%" style="border: 1px solid #C0C0C0">&nbsp;Web Siteniz</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Reklam Türü</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Gösterim / Tıklama</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Çoğul Gösterim</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Sayfa TO</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Kazanç</td>
		</tr>
		
		
		
		
		
<?	
$sorgu = "and tarih>='$basla' AND tarih<='$bit'";
$result = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$sites_id' $sorgu");

if (@mysql_num_rows($result)<1) { } else {

while( $yaz = @mysql_fetch_array($result)) {

$toplam_sayim = $toplam_sayim+$yaz[sayi];
$toplam_sayim_cogul = $toplam_sayim_cogul+$yaz[cogul];
$toplam_kazanc = $toplam_kazanc+$yaz[alacak];
?>	

		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$yaz[site_adresi]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y", $yaz[tarih])?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Popup</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[sayi])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[cogul])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format($yaz[sayi]/$yaz[cogul]*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format($yaz[alacak],2)?> TL</font></td>
		</tr>
<? } } ?>

<?	
$sorgu = "and tarih>='$basla' AND tarih<='$bit'";
$result = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$sites_id' $sorgu");

if (@mysql_num_rows($result)<1) { } else {

while( $yaz = @mysql_fetch_array($result)) {

$toplam_sayim = $toplam_sayim+$yaz[sayi];
$toplam_sayim_cogul = $toplam_sayim_cogul+$yaz[cogul];
$toplam_kazanc = $toplam_kazanc+$yaz[alacak];
?>		

		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$yaz[site_adresi]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y", $yaz[tarih])?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Splash</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[sayi])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[cogul])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format($yaz[sayi]/$yaz[cogul]*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format($yaz[alacak],2)?> TL</font></td>
		</tr>
<? } } ?>


<?	
$sorgu = "and tarih>='$basla' AND tarih<='$bit'";
$result = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$sites_id' $sorgu");

if (@mysql_num_rows($result)<1) { } else {

while( $yaz = @mysql_fetch_array($result)) {

$toplam_sayim = $toplam_sayim+$yaz[sayi];
$toplam_sayim_cogul = $toplam_sayim_cogul+$yaz[cogul];
$toplam_kazanc = $toplam_kazanc+$yaz[alacak];
?>		

		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$yaz[site_adresi]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y", $yaz[tarih])?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Msn Pop</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[sayi])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[cogul])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format($yaz[sayi]/$yaz[cogul]*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format($yaz[alacak],2)?> TL</font></td>
		</tr>
		
		
<? } } ?>





<?	
$sorgu = "and tarih>='$basla' AND tarih<='$bit'";
$result = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$sites_id' $sorgu");

if (@mysql_num_rows($result)<1) { } else {

while( $yaz = @mysql_fetch_array($result)) {

$toplam_sayim = $toplam_sayim+$yaz[sayi];
$toplam_sayim_cogul = $toplam_sayim_cogul+$yaz[cogul];
$toplam_kazanc = $toplam_kazanc+$yaz[alacak];
?>		
		<tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=$yaz[site_adresi]?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=date("d.m.Y", $yaz[tarih])?></td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;PPC Banner</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[sayi])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($yaz[cogul])?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;%<?=@number_format($yaz[sayi]/$yaz[cogul]*100,2)?></td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format($yaz[alacak],2)?> TL</font></td>
		</tr>
		
		
<? } } ?>


         <tr>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;İstatistikler</td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;Seçilen</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;Hepsi</td>
			<td height="25" width="" style="border: 1px solid #000080">&nbsp;<?=number_format($toplam_sayim)?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;<?=number_format($toplam_sayim_cogul)?></td>
			<td height="25" width="" style="border: 1px solid #008000">&nbsp;Ortalama</td>
			<td height="25" width="" style="border: 1px solid #000080"><p><font color="#008000">&nbsp;<?=number_format($toplam_kazanc,2)?> TL</font></td>
		</tr>
		
		

		
		<tr>
			<td height="25" colspan="4">&nbsp;</td>
		</tr>
		</table>
<? 
$toplam_sayim = "";
$toplam_sayim_cogul = "";
$toplam_kazanc = "";
} ?>
