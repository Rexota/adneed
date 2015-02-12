<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_admin.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>
<? if ($mode=='tumu' or $mode=='bekleyen' or $mode=='engel' or $mode=='onayli') {

$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }


 ?>

<title></title>

<script type="text/javascript">

function detaygoster(id) {$('#detay'+id).fadeIn();}
function detaygizle(id) {$('#detay'+id).fadeOut();}


function sayfa_getir(id) {

 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=<?=$mode?>&p='+id);

}



function odeme_onayla(id) {

	$.post('inc_admin/odeme_talep.php?mode=onayla', { id : id}, function(response) {
	
    detaygizle(id);
	
	 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
     $('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


function odeme_onaylama(id) {

	$.post('inc_admin/odeme_talep.php?mode=onaylama', { id : id}, function(response) {
	
    detaygizle(id);
	 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
     $('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


function odeme_engelle(id) {

	$.post('inc_admin/odeme_talep.php?mode=engelle', { id : id}, function(response) {
	
    detaygizle(id);
	 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
     $('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


function odemesil(id) {

	$.post('inc_admin/odeme_talep.php?mode=sil', { id : id}, function(response) {
	
    detaygizle(id);
	 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
     $('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


</script>
<?	

$limit = 15;
 

if ($mode=='tumu') { $count = @mysql_num_rows(mysql_query("select * from yayinci_odeme")); }
if ($mode=='onayli') { $count = @mysql_num_rows(mysql_query("select * from yayinci_odeme where durum = 1")); }
if ($mode=='engel') { $count = @mysql_num_rows(mysql_query("select * from yayinci_odeme where durum = 2")); }
if ($mode=='bekleyen') { $count = @mysql_num_rows(mysql_query("select * from yayinci_odeme where durum = 0")); }


$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;



if ($mode=='tumu') { $result = @mysql_query("select * from yayinci_odeme LIMIT $baslangic,$limit"); }
if ($mode=='onayli') { $result = @mysql_query("select * from yayinci_odeme where durum = 1 LIMIT $baslangic,$limit"); }
if ($mode=='engel') { $result = @mysql_query("select * from yayinci_odeme where durum = 2 LIMIT $baslangic,$limit"); }
if ($mode=='bekleyen') { $result = @mysql_query("select * from yayinci_odeme where durum = 0 LIMIT $baslangic,$limit"); }

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
			Şuan gösterilecek bir talep bulunmamaktadır.</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" colspan="7" style="border-collapse: collapse">
<?
	 
while(list( $id, $yayinci_id, $tutar, $kesinti, $odenecek_tutar, $tarih, $durum, $banka_adi, $hesapno, $sube_kodu, $iban, $hesapsahibi, $durum_yazisi) = @mysql_fetch_row($result))
{

$bul = mysql_fetch_array(mysql_query("select * from user where id = '$yayinci_id'"));
?>
		<tr>
		
			<td height="25" width="229" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><a style="cursor: pointer;" href="yayinci_siteleri.php?ara=<?=$bul[username]?>" target="_blank"><?=$bul[ad]?></a></b></td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<? if ($durum=="1") { ?><font color="green"><? } else { ?><font color="#FF0000"><? } ?><?=$durum_yazisi?></font></td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($tutar,2)?> 
			TL</td>
			<td height="25" width="116" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($kesinti,2)?> TL</td>
			<td height="25" width="117" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=number_format($odenecek_tutar,2)?> TL</td>
			<td height="25" width="133" style="border: 1px solid #008000; padding-top: 1px">
			<p>&nbsp;<?=date("d.m.Y", $tarih)?></td>
			<td height="25" width="66" style="border: 1px solid #008000; padding-top: 1px">
			<table border="0" width="68" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="32">
					<p align="center">
					<a style="cursor: pointer;" onclick="detaygoster(<?=$id?>)">
					<img  border="0" src="extra/asc.gif" width="21" height="4" align="middle" title="Ödeme Ayrıntıları" alt="Ödeme Ayrıntıları"></td>
					</a>
					<td width="32">
					<p align="center">
					<? if($durum!=="1") { ?>
					<a href="javascript:odemesil('<?=$id?>')" onclick="return onay()">
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
	<table border="0" width="97%" id="table2" cellpadding="0" style="border-collapse: collapse">
		<tr>
		
			<td width="463" valign="top">
<li>Ödeme Talep Tarihi: <?=date("d.m.Y H:i:s", $tarih)?></li><br>
<li>Banka Adı: <?=$banka_adi?></li><br>
<li>Hesap Sahibi: <?=$hesapsahibi?></li><br>
<li>Hesap Numarası: <?=$hesapno?></li><br>
<li>Şube Kodu: <?=$sube_kodu?></li><br>
<li>IBAN: <?=$iban?></li><br>
			</td><td width="463" valign="top">
			<li>Kullanıcı Adı: <?=$bul[username]?></li><br>
<li>Talep Edilen Tutar: <?=number_format($tutar,2)?> TL</li><br>
<li>Kesinti: <?=number_format($kesinti,2)?> TL</li><br>
<li>Ödenecek Tutar: <?=number_format($odenecek_tutar,2)?> TL</li><br>
<li>Durum: <? if ($durum=="1") { ?><font color="green"><? } else { ?><font color="#FF0000"><? } ?><?=$durum_yazisi?></font></li>

			</td>
		</tr>
		<tr>
			<td width="926" colspan="2" height="30"><? if ($durum!=="1") { ?>&nbsp;<input type=button class="button" onclick="odeme_onayla(<?=$id?>)" value="Ödeme Yapıldı"><? } ?><? if ($durum!=="0") { ?>&nbsp;<input type=button class="button" onclick="odeme_onaylama(<?=$id?>)" value="Beklemede Yap"><? } ?><? if ($durum!=="2") { ?>&nbsp;<input type=button class="button" onclick="odeme_engelle(<?=$id?>)" value="Ödemeyi Engelle"><? } ?>&nbsp;<input type=button class="button" onclick="detaygizle(<?=$id?>)" value="Detayı Gizle"></td>
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

$del = mysql_query("delete from yayinci_odeme where id = '$id' and durum != 1");

}
?>
<? if ($mode=='onayla') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE yayinci_odeme SET durum = 1, durum_yazisi = 'Ödeme Yapıldı' where id = '$id'");

}
?>
<? if ($mode=='onaylama') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE yayinci_odeme SET durum = 0, durum_yazisi = 'Bekleme Durumunda' where id = '$id'");

}
?>
<? if ($mode=='engelle') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE yayinci_odeme SET durum = 2, durum_yazisi = 'Ödeme Engellendi' where id = '$id'");

}
?>
<? if ($mode=="yeni") { 


    $istek = sql($_POST['istek']);
    $hesap_no = sql($_POST['hesap_no']);
    $istek = str_replace(",","", $istek);
	
	
	

$hepsi = @mysql_query("select * from yayinci_odeme where yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi)<1) 
{ 
$alinan = "0";
} else {
while(list( $id, $yayinci_id, $tutar, $kesinti, $odenecek_tutar, $tarih) = @mysql_fetch_row($hepsi)) {
$alinan = $alinan+$tutar;
}
$alinan = str_replace(",","", $alinan);
}


$hepsi = @mysql_query("select * from yayinci_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi)<1) 
{ 
$toplam_kazanc = "0";
} else {
while(list( $id, $yayinci_kimlik, $sayi, $reklam_tur, $gun, $ay, $yil, $ucret, $alacak, $site_id , $yayinci_id , $tarih) = @mysql_fetch_row($hepsi)) {
$toplam_kazanc = $toplam_kazanc+$alacak;
}
$toplam_kazanc = str_replace(",","", $toplam_kazanc);
}

$talep_tutar = $toplam_kazanc-$alinan;




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


if ($istek > $talep_tutar) {
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
die("SUCCESS");
}else {
die("FAILED");
}


}

?>