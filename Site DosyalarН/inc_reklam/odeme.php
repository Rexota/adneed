<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_reklamveren.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>
<? if ($mode=='see') { ?>
<title></title>
<script type="text/javascript">

function detaygoster(id) {

$('#detay'+id).fadeIn();

}


function detaygizle(id) {

$('#detay'+id).fadeOut();

}
</script>
<?	
$result = @mysql_query("select * from reklam_odeme where user = '$_SESSION[userid]'");

if (@mysql_num_rows($result)<1) {
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" width="626" style="border: 1px solid #000080" colspan="6">
			<p>&nbsp;<img border="0" src="extra/notification-exclamation.gif" width="14" height="14"> 
			Şuan gösterilecek bir bildirim bulunmamaktadır.</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" colspan="4" style="border-collapse: collapse">
<?
	 
while($bul = @mysql_fetch_array($result))
{



switch ($bul['reklam_tur']) {

case "1":
$reklamtur = "Popup";
$yaz = @mysql_fetch_array(mysql_query("select * from popup_reklamlar where id = '$bul[reklam]'"));
break;

case "2":
$reklamtur = "Splash";
$yaz = @mysql_fetch_array(mysql_query("select * from splash_reklamlar where id = '$bul[reklam]'"));
break;

case "3":
$reklamtur = "Msn Popup";
$yaz = @mysql_fetch_array(mysql_query("select * from msn_reklamlar where id = '$bul[reklam]'"));
break;

case "4":
$reklamtur = "PPC Banner";
$yaz = @mysql_fetch_array(mysql_query("select * from ppc_reklamlar where id = '$bul[reklam]'"));
break;

}

?>
<tr>
<td height="36" width="290" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<a style="cursor: pointer;" onclick="detaygoster(<?=$bul[id]?>)"><?=$yaz['url']?> - <?=$reklamtur?></a></td>
			<td height="25" width="185" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=date("d.m.Y H:i:s", $bul[tarih])?></td>
			<td height="25" width="138" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<? if ($bul[odeme_turu]=="1") { ?>Havale<? } else { ?>EFT<? } ?></td>
			<td height="25" width="186" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<? if ($bul[durum]=="1") { ?><font color="#000080">Onaylanmış</font><? } else { ?><font color="#808080">Kontrol Ediliyor<? } ?></font></td>
			<td height="25" width="87" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<?=number_format($bul[ucret],2)?> TL</td>
			<td height="25" width="87" style="border: 1px solid #008000; padding-top: 1px">
			<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse" height="28">
				<tr>
					<td width="43">
					<p align="center">
					<img style="cursor: pointer;" onclick="detaygoster(<?=$bul[id]?>)" border="0" src="extra/asc.gif" width="21" height="4" align="middle" alt="Bildirim Detayları"></td>
					<td width="44">
					<p align="center">
					<? if ($bul[durum]=="0") { ?>
					<a href="javascript:odemesil('<?=$bul[id]?>')" onclick="return onay()">
					<img border="0" src="extra/cross-on-white.gif" width="16" height="16" align="middle" alt="Bildirimi İptal Et"></a><? } ?></td>
				
				</tr>
				</table>
	</tr>	
	
	<tr>
	<td width="100%" colspan="6">
	<table border="0" height="1" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
			<td id="detay<?=$bul[id]?>" height="330" style="display:none;border: 1px solid #F4F3F4" colspan="6">
			




<div align="center">
	<table border="0" width="96%" id="table2" cellpadding="0" style="border-collapse: collapse">
		<tr>
		
			<td width="463" valign="top">
<li>Ödeme Bildirim Tarihi: <?=date("d.m.Y H:i:s", $bul[tarih])?></li><br>
<li>Ödeme Türü: <? if ($bul[odeme_turu]=="1") { ?>Havale<? } else { ?>EFT<? } ?></li><br>
<li>Gönderen Kişi: <?=$bul[gad]?></li><br>
<li>Gönderen Banka: <?=$bul[gbanka]?></li><br>
<li>Reklam: <?=$reklamtur?></li><br>
<li>Tutar: <?=number_format($bul[ucret],2)?> TL</li><br>
<li>Durum: <? if ($durum=="1") { ?><font color="#000080">Onaylanmış</font><? } else { ?><font color="#808080">Kontrol Ediliyor<? } ?></li><br>
			</td><td width="463" valign="top">
<li>Ödeme Yaptığınız Banka: <?=$bul[banka]?></li><br>
<li>Hesap Adı: <?=$bul[ad]?></li><br>
<li>Şube Kodu: <?=$bul[sube]?></li><br>
<li>Hesap Numarası: <?=$bul[hesap]?></li><br>
<li>IBAN: <?=$bul[iban]?></li><br>
<li>Özel Not: <?=$bul[note]?></li><br>
			</td>
		</tr>
		<tr>
			<td width="926" colspan="2" height="30">&nbsp;<input type=button class="button" onclick="detaygizle(<?=$bul[id]?>)" value="Detayı Gizle"></td>
		</tr>
	</table>
</div>


			
			
</td>
	</tr>
	</table>
	</td>
	</tr>
<? } ?>
</table>
<? } } ?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del = mysql_query("delete from reklam_odeme where id = '$id' and user = '$_SESSION[userid]' and durum = 0");

}
?>