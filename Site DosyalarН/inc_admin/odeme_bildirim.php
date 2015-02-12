<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_admin.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>
<? if ($mode=='tumu' or $mode=='onayli' or $mode=='bekleyen') {

$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }


 ?>
<title></title>
<script type="text/javascript">

function detaygoster(id) {$('#detay'+id).fadeIn();}
function detaygizle(id) {$('#detay'+id).fadeOut();}




function sayfa_getir(id) {

 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=<?=$mode?>&p='+id);

}



function odeme_onayla(id) {

	$.post('inc_admin/odeme_bildirim.php?mode=onayla', { id : id}, function(response) {
	
    detaygizle(id);
	
	
	 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=<?=$mode?>&p=<?=$git?>');
 
	 });


}


function odeme_onaylama(id) {

	$.post('inc_admin/odeme_bildirim.php?mode=onaylama', { id : id}, function(response) {
	
    detaygizle(id);
	
	
	 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}




function odemesil(id) {

	$.post('inc_admin/odeme_bildirim.php?mode=sil', { id : id}, function(response) {
	
    detaygizle(id);
	
	
	 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


</script>
<?	

$limit = 15;
 


if ($mode=='onayli') { $count      = mysql_num_rows(mysql_query("select * from reklam_odeme where durum = 1")); }
if ($mode=='bekleyen') { $count      = mysql_num_rows(mysql_query("select * from reklam_odeme where durum = 0")); }
if ($mode=='tumu') { $count      = mysql_num_rows(mysql_query("select * from reklam_odeme")); }

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;


if ($mode=='tumu') { $result = @mysql_query("select * from reklam_odeme LIMIT $baslangic,$limit"); }
if ($mode=='onayli') { $result = @mysql_query("select * from reklam_odeme where durum = 1 LIMIT $baslangic,$limit"); }
if ($mode=='bekleyen') { $result = @mysql_query("select * from reklam_odeme where durum = 0 LIMIT $baslangic,$limit"); }


if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
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

$buls = @mysql_fetch_array(mysql_query("select * from user where id = '$bul[user]'"));

?>
<tr>
<td height="36" width="291" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<a style="cursor: pointer;" onclick="detaygoster(<?=$bul[id]?>)"><?=$yaz['url']?> - <?=$reklamtur?></a></td>
			<td height="25" width="186" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=date("d.m.Y H:i:s", $bul[tarih])?></td>
			<td height="25" width="138" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<? if ($bul[odeme_turu]=="1") { ?>Havale<? } else { ?>EFT<? } ?></td>
			<td height="25" width="187" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<? if ($bul[durum]=="1") { ?><font color="#000080">Onaylanmış</font><? } else { ?><font color="#808080">Onay Bekliyor<? } ?></font></td>
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
<li>Durum: <? if ($bul[durum]=="1") { ?><font color="#000080">Onaylanmış</font><? } else { ?><font color="#808080">Onay Bekliyor<? } ?></li><br>
			</td><td width="463" valign="top">
			<li>Kullanıcı Adı: <?=$buls[username]?></li><br>
<li>Ödeme Yaptığı Banka: <?=$bul[banka]?></li><br>
<li>Hesap Adı: <?=$bul[ad]?></li><br>
<li>Şube Kodu: <?=$bul[sube]?></li><br>
<li>Hesap Numarası: <?=$bul[hesap]?></li><br>
<li>IBAN: <?=$bul[iban]?></li><br>
<li>Özel Not: <?=$bul[note]?></li><br>
			</td>
		</tr>
		<tr>
			<td width="926" colspan="2" height="30"><? if ($bul[durum]!="1") { ?>&nbsp;<input type=button class="button" onclick="odeme_onayla(<?=$bul[id]?>)" value="Ödemeyi Onayla"><? } ?><? if ($bul[durum]!="0") { ?>&nbsp;<input type=button class="button" onclick="odeme_onaylama(<?=$bul[id]?>)" value="Onayı Kaldır"><? } ?>&nbsp;<input type=button class="button" onclick="detaygizle(<?=$bul[id]?>)" value="Detayı Gizle"></td>
		</tr>
	</table>
</div>


			
			
</td>
	</tr>
	</table>
	</td>
	</tr>
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="6" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" class="sayfa_tikla" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
</table>
<? } } ?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del = mysql_query("delete from reklam_odeme where id = '$id' and durum = 0");

}
?>
<? if ($mode=='onayla') {

$id = sql($_POST['id']);

$del = @mysql_query("UPDATE reklam_odeme SET durum = 1 where id = '$id'");
$yaz = @mysql_fetch_array(mysql_query("select * from reklam_odeme where id = '$id'"));


switch ($yaz[reklam_tur]) {

case "1":
$islem1 = @mysql_query("Update popup_reklamlar SET durum = 1 where id = '$yaz[reklam]'");
break;

case "2":
$islem1 = @mysql_query("Update splash_reklamlar SET durum = 1 where id = '$yaz[reklam]'");
break;

case "3":
$islem1 = @mysql_query("Update msn_reklamlar SET durum = 1 where id = '$yaz[reklam]'");
break;

case "4":
$islem1 = @mysql_query("Update ppc_reklamlar SET durum = 1 where id = '$yaz[reklam]'");
break;

}


}
?>
<? if ($mode=='onaylama') {

$id = sql($_POST['id']);

$del = @mysql_query("UPDATE reklam_odeme SET durum = 0 where id = '$id'");
$yaz = @mysql_fetch_array(mysql_query("select * from reklam_odeme where id = '$id'"));


switch ($yaz[reklam_tur]) {

case "1":
$islem1 = @mysql_query("Update popup_reklamlar SET durum = 0 where id = '$yaz[reklam]'");
break;

case "2":
$islem1 = @mysql_query("Update splash_reklamlar SET durum = 0 where id = '$yaz[reklam]'");
break;

case "3":
$islem1 = @mysql_query("Update msn_reklamlar SET durum = 0 where id = '$yaz[reklam]'");
break;

}

}
?>