<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_yayinci.php");
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
$result = @mysql_query("select * from yayinci_odeme where yayinci_id = '$_SESSION[userid]'");

if (@mysql_num_rows($result)<1) {
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" width="626" style="border: 1px solid #000080" colspan="6">
			<p>&nbsp;<img border="0" src="extra/notification-exclamation.gif" width="14" height="14"> 
			Şuan gösterilecek bir talep bulunmamaktadır.</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" colspan="7" style="border-collapse: collapse">
<?
	 
while(list( $id, $yayinci_id, $stutar, $skesinti, $sodenecek_tutar, $tarih, $durum, $banka_adi, $hesapno, $sube_kodu, $iban, $hesapsahibi, $durum_yazisi) = @mysql_fetch_row($result))
{

?>
		<tr>
		
			<td height="25" width="224" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><a style="cursor: pointer;" onclick="detaygoster(<?=$id?>)"><?=$banka_adi?></a></b></td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<? if ($durum=="1") { ?><font color="green"><? } else { ?><font color="#FF0000"><? } ?><?=$durum_yazisi?></font></td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($stutar,2)?> 
			TL</td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($skesinti,2)?> TL</td>
			<td height="25" width="117" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($sodenecek_tutar,2)?> TL</td>
			<td height="25" width="133" style="border: 1px solid #008000; padding-top: 1px">
			<p>&nbsp;<?=date("d.m.Y", $tarih)?></td>
			<td height="25" width="66" style="border: 1px solid #008000; padding-top: 1px">
			<table border="0" width="66" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="32">
					<p align="center">
					<a style="cursor: pointer;" onclick="detaygoster(<?=$id?>)">
					<img  border="0" src="extra/asc.gif" width="21" height="4" align="middle" title="Ödeme Ayrıntıları" alt="Ödeme Ayrıntıları"></td>
					</a>
					<td width="32">
					<p align="center">
					<? if($durum=="0") { ?>
					<a href="javascript:talepsil('<?=$id?>')" onclick="return onay()">
					<img border="0" src="extra/cross-on-white.gif" width="16" height="16" align="middle" title="İptal Et / Kaldır" alt="İptal Et / Kaldır"></a>
					<? } ?>
					</td>
				</tr>
				</table>
	</tr>	
	
	<tr>
	<td width="100%" colspan="6">
	<table border="0" height="1" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
			<td id="detay<?=$id?>" height="280" style="display:none;border: 1px solid #F4F3F4" colspan="6">
			




<div align="center">
	<table border="0" width="96%" id="table2" cellpadding="0" style="border-collapse: collapse">
		<tr>
		
			<td width="463" valign="top">
<li>Ödeme Talep Tarihi: <?=date("d.m.Y H:i:s", $tarih)?></li><br>
<li>Banka Adı: <?=$banka_adi?></li><br>
<li>Hesap Sahibi: <?=$hesapsahibi?></li><br>
<li>Hesap Numarası: <?=$hesapno?></li><br>
<li>Şube Kodu: <?=$sube_kodu?></li><br>
<li>IBAN: <?=$iban?></li><br>
			</td><td width="463" valign="top">
<li>Talep Edilen Tutar: <?=number_format($stutar,2)?> TL</li><br>
<li>Kesinti: <?=number_format($skesinti,2)?> TL</li><br>
<li>Ödenecek Tutar: <?=number_format($sodenecek_tutar,2)?> TL</li><br>
<li>Durum: <? if ($durum=="0") { ?><font color="green"><? } else { ?><font color="#FF0000"><? } ?><?=$durum_yazisi?></font></li>
			</td>
		</tr>
		<tr>
			<td width="926" colspan="2" height="30">&nbsp;<input type=button class="button" onclick="detaygizle(<?=$id?>)" value="Detayı Gizle"></td>
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

$del = mysql_query("delete from yayinci_odeme where id = '$id' and yayinci_id = '$_SESSION[userid]' and durum = 0");

}
?><? if ($mode=="yeni") { 


    $istek = sql($_POST['istek']);
    $hesap_no = sql($_POST['hesap_no']);
    $istek = str_replace(",","", $istek);
	

if ($istek=='' or $hesap_no=='0') {
die("ERROR");
}

if ($odeme_talep=="0") {
die("CLOSED");
}


if ($istek < $min_talep) {
die("MIN");
}


if ($istek > $max_talep) {
die("MAX");
}


if ($istek > hesap_bakiye()) {
die("PAY");
}

$tarih = mktime();

$talep = $istek;
$kesinti = $istek/100*$kesinti;
$net = $talep-$kesinti;

$kesinti = str_replace(",","", $kesinti);
$net = str_replace(",","", $net);


$bul = mysql_fetch_array(mysql_query("select * from banka where id = '$hesap_no' and user = '$_SESSION[userid]'"));

$banka_adi = $bul['banka'];
$hesap_adi = $bul['ad'];
$sube_kodu = $bul['sube'];
$hesap_no = $bul['hesap'];
$iban = $bul['iban'];


$ekle = "insert into yayinci_odeme (yayinci_id, tutar, kesinti, odenecek_tutar, tarih, durum, banka_adi, hesapno , sube_kodu, iban, hesapsahibi, durum_yazisi ) values ('$_SESSION[userid]', '$talep', '$kesinti', '$net', '$tarih', '0', '$banka_adi', '$hesap_no', '$sube_kodu', '$iban', '$hesap_adi','İşleme Alındı')";
$yali = mysql_query($ekle);

if ($yali) {
include('../sis_mail/talep.php');
die("SUCCESS");
}else {
die("FAILED");
}


}

?>