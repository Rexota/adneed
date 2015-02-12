<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_reklamveren2.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');

if ($popupactive==0) {
die('<img src="extra/minus-circle.gif" /> Bu Modül Aktif Değildir.');
}

?><? if ($mode=='see') { ?>
<script type="text/javascript">

function reklam_ekle() {
 $('#reklam_ekle_alan').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
 $('#reklam_ekle_alan').load('inc_reklam/popup.php?mode=new');
 $('#odeme_bildirim_button').removeClass('button_tikli');
 $('#reklam_ekle_button').addClass('button_tikli');
 
 $('#odeme_bildirim_button').hide();
}

function reklam_ekle_kapat() {
  $('#reklam_ekle_alan').html('<img src="extra/notification-information.gif"> İşlem iptal edildi !');
  $('#reklam_ekle_button').removeClass('button_tikli');
}

function odeme_bildirim(id) {
 $('#reklam_ekle_alan').html('<img src="new/loadingAnimation.gif"> Veri Aktarılıyor ...');
 $('#reklam_ekle_alan').load('inc_reklam/popup.php?mode=bildirim&id='+id);
 $('#reklam_ekle_button').removeClass('button_tikli');
 $('#odeme_bildirim_button').addClass('button_tikli');
 
 $('#odeme_bildirim_button').show();
}

function odeme_bildirim_kapat() {
  $('#reklam_ekle_alan').html('<img src="extra/notification-information.gif"> İşlem iptal edildi !');
  $('#odeme_bildirim_button').removeClass('button_tikli');
  
  $('#odeme_bildirim_button').hide();
}


 function reklamsil(id) {
 
 if (onay()) {
   
 $.post('inc_reklam/popup.php?mode=sil', {id: id}, function(response) { });
 popup_goster();
 
 }
 }

</script>
<title></title>
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">

		<tr>
			<td height="25" width="35%" style="border: 1px solid #C0C0C0">&nbsp;Reklam Url</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Kategori</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="35%" style="border: 1px solid #C0C0C0">&nbsp;Gösterilme durumu yada İşlemler</td>
		</tr>



		
<?	
$result = @mysql_query("select * from popup_reklamlar where reklamveren_id = '$_SESSION[userid]'");

if (@mysql_num_rows($result)<1) {
?>

		<tr>
			<td height="32" width="100%" colspan="4" style="border: 1px solid #c0c0c0">&nbsp;<img border="0" src="extra/notification-exclamation.gif">&nbsp;Şuan gösterimde olan yada biten bir reklamınız yok !</td>
		</tr>



<? 
} else {
 
while($yaz = @mysql_fetch_array($result))
{

$islem = $yaz[suan]*100/$yaz[toplam];
$reklamyuzdesi = number_format($islem,2);

$sor = @mysql_num_rows(mysql_query("select * from reklam_odeme where reklam = '$yaz[id]' and reklam_tur = 1"));
?>
<tr>
			<td height="36" width="40%" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<a href="<?=popup_rapor($yaz[id])?>"><?=$yaz[url]?></a></td>
			<td height="25" width="15%" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<?=reklam_kategori($yaz[kategori])?></td>
			<td height="25" width="15%" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<?=reklam_durum($yaz[durum])?></td>
			
			<? if ($yaz[durum]=="0") { ?>
			<td height="25" width="30%" style="border: 1px solid #c0c0c0; padding-top: 1px"><p align="center"><? if ($_SESSION['tur']=="2") { ?><? if ($sor < 1 ) { ?><input type="button" onclick="odeme_bildirim(<?=$yaz[id]?>);" class="button" value="Ödeme Bildirimi Yap"><? } ?><? } ?>&nbsp;<input type="button" onclick="reklamsil(<?=$yaz[id]?>);" class="button" value="Reklamı Silin"></p></td>
            <? } else { ?>
            <td height="25" width="30%" style="border: 1px solid #c0c0c0; padding-top: 1px"><div style="font-size:12px;font-weight:bold;height:25px;line-height:25px;"><p align="center">%<?=$reklamyuzdesi?> - <?=number_format($yaz[toplam])?>/<?=number_format($yaz[suan])?></p></div></td>
            <? } ?>
			
</tr>	
<? } } ?>

		
		<tr>
			<td height="65" width="100%" colspan="4">&nbsp;<input id="reklam_ekle_button" onclick="reklam_ekle();" type="button" class="button" value="Yeni Popup Reklam Ekle">&nbsp;<input type="button" id="odeme_bildirim_button" class="button" style="display:none;" value="Ödeme Bildirimi Yapın"></td>
		</tr>
		
		
		<tr>
			<td height="25" id="reklam_ekle_alan" width="100%" colspan="4">&nbsp;</td>
		</tr>
	
</table>
<?  } ?>
<? if ($mode=="new") { ?>
<title></title>

<script type="text/javascript">


$(function(){



 
    $('#al_button').click(function() {
  
    $('#islem_durum').html('<img src="new/loadingAnimation.gif"> Aktarılıyor...');




	var istek = $('#istek').val();
	var sure = $('#sure').val();
	var url = $('#url').val();
	var cat = $('#cat').val();
	
	

	$.post('inc_reklam/popup.php?mode=add', {istek: istek, sure : sure, url : url, cat : cat}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
				
					case 'ERROR':
						$('#islem_durum').html('<img src="extra/notification-slash.gif"> Zorunlu Alanları Doldurmadınız !');
						break;


					case 'MIN_HIT':
						$('#islem_durum').html('<img src="extra/notification-exclamation.gif"> En az <?=number_format($pop_min_hit)?> Hit Alabilirsiniz !');
						break;
						
					case 'MAX_HIT':
						$('#islem_durum').html('<img src="extra/notification-exclamation.gif"> En fazla <?=number_format($pop_max_hit)?> Hit Alabilirsiniz !');
						break;
						
						
					case 'SIT':
						$('#islem_durum').html('<img src="extra/notification-exclamation.gif"> Girdiğiniz URL hatalı !');
						break;

						
					case 'SUCCESS':
						$('#islem_durum').html('<img src="extra/notification-information.gif"> Tamamlandı. Lütfen bekleyin..');
						setTimeout("popup_goster();", 1500);
						break;
						
						default:
						$('#islem_durum').html(return_val);
				}
				
				
	 });
 });
 
 
  });



function hesapla(gelen) {

document.getElementById('al_button').disabled=true;

var gelen = gelen;

$.post('inc_reklam/popup.php?mode=hesap', {gelen : gelen}, function(response) {
	
	var return_val = ajaxduzelt(response);
				
				document.getElementById('tutar').value=return_val;

		document.getElementById('al_button').disabled=false;		
	});
	
} 


</script>


		
		<table border="0" width="100%" id="table6" cellpadding="0" style="border-collapse: collapse">
		
		
			<tr>
		<td height="10" colspan="2"></td>
	</tr>
		
		
		
	<tr>
		<td height="35" colspan="2"><p style="width:390px; height:35px;line-height:35px;border-bottom: 1px solid #c0c0c0;font-size:13px; font-weight:bold;"><b>&nbsp;&nbsp;Popup Reklam Ekleme Paneli</b></p></td>
	</tr>
	
	<tr>
		<td height="20" colspan="2"></td>
	</tr>
	
	
				<tr>
		<td height="35" width="20%">&nbsp;Tekil Tutarı:</td>
		<td height="35" width="">&nbsp;<input type="text" class="ninput" name="fiyat" id="fiyat" disabled value="<?=$popupreklam?>">&nbsp;TL</td>
				</tr>
					<tr>
		<td height="35" width="">&nbsp;İşlem tutarı:</td>
		<td height="35" width="">&nbsp;<input type="text" class="ninput" disabled name="tutar" id="tutar" value="0.00">&nbsp;TL</td>
				</tr>
				<tr>
		<td height="35" width="">&nbsp;Almak istediğiniz Hit </td>
		<td height="35" width="">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="hesapla(this.value);ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="istek" name="istek" type="text" class="ninput"></td>
				</tr>
				<tr>
		<td height="35" width="">&nbsp;Kullanmak istediğiniz süre:</td>
		<td height="35" width="">&nbsp;<select class="select" id="sure" name="sure" size="1">
		<option value="1">Bitene kadar gösterilsin</option>
		<option value="2">1 hafta</option>
		<option value="3">2 Hafta</option>
		<option value="4">3 Hafta</option>
		<option value="5">Bir Ay</option>
		</select></td>
				</tr>
				
				<tr>
		<td height="35" width="">&nbsp;Url:</td>
		<td height="35" width="">&nbsp;<input id="url" name="url" type="text" class="ninput"></td>
				</tr>
				
				<tr>
		<td height="35" width="">&nbsp;Kategori:</td>
		<td height="35" width="">&nbsp;<select name="cat" id="cat" size="1" class="select">
		<?	
$result = @mysql_query("select * from kategoriler");

if (mysql_num_rows($result)<1) {
?>

<option value="0">Kategori Bulunamadı !</option>	
<? 
} else {
 
while($yaz = @mysql_fetch_array($result))
{

?>
<option value="<?=$yaz[id]?>"><?=$yaz[name]?></option>

<? } 
}?>
</select></td>
				</tr>
				

				<tr>
		<td height="35" width="">&nbsp;İşlem</td>
		<td height="35" width="" align="left">&nbsp;<input type="button" name="al_button" id="al_button" class="button" value="Satın Al ve Devam Et">&nbsp;<input onclick="reklam_ekle_kapat();" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="45" colspan="2">&nbsp;<span id="islem_durum"></span></td>
					</tr>

					</table>

<? } ?>
<? if ($mode=="hesap") {
$gelen = $_POST['gelen'];

$hitimiz = str_replace(",","", $gelen);

$sonuc = $hitimiz*$popupreklam;

$sonuc = number_format($sonuc,2);

die($sonuc);

}

?>
<? if ($mode=="add") {


$sure = sql($_POST['sure']);
$istek = sql($_POST['istek']);
$url = sql($_POST['url']);
$cat = sql($_POST['cat']);

$istek = str_replace(",","",$istek);
$tutar = $istek*$popupreklam;
$tutar = str_replace(",","",$tutar);
$tarih = mktime();


if ($sure=='' or $istek=='' or $url=='' or $cat=='' or $cat=='0') {
die("ERROR");
}



if ($istek < $pop_min_hit) {
die("MIN_HIT");
}

if ($istek > $pop_max_hit) {
die("MAX_HIT");
}


$ilk = substr($url , 0, 7);
if ($ilk!="http://") {
die("SIT");
}



if ($sure=="1") {
$gunluk = $istek;
$sureg = 0;
}

if ($sure=="2") {
$gunluk = $istek/7;
$sureg = 7;
}

if ($sure=="3") {
$gunluk = $istek/14;
$sureg = 14;
}

if ($sure=="4") {
$gunluk = $istek/22;
$sureg = 22;
}

if ($sure=="5") {
$gunluk = $istek/30;
$sureg = 30;
}


$yali = mysql_query("insert into popup_reklamlar (reklamveren_id, url, toplam, suan,ucret, gunluk, bugun, sure,kategori, gunluk_gosterim, tarih, durum) values 
(
'$_SESSION[userid]', '$url', '$istek', '0', '$tutar', '$gunluk', '0', '$sureg', '$cat', '0', '$tarih', '0'
)") or die(mysql_error());


die("SUCCESS");


}?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del2 = @mysql_query("delete from reklam_odeme where reklam = '$id' and reklam_tur = 1");

$del = @mysql_query("Delete from popup_reklamlar where id = '$id' and durum=0");

}?>
<? if ($mode=="obildir") { 


    $gonderen = sql($_POST['gonderen']);
    $banka = sql($_POST['banka']);
    $odeme_turu = sql($_POST['odeme_turu']);
    $not = sql($_POST['not']);
    $rid = sql($_POST['rid']);
	$rtur = sql($_POST['rtur']);
    $hesap_numaramiz = sql($_POST['hesap_numaramiz']);



if ($gonderen=='' or $banka=='' or $odeme_turu=='' or $rid=='' or $hesap_numaramiz=='0' or $hesap_numaramiz=='' or $rtur=='') {
die("ERROR");
}

$sor = @mysql_num_rows(mysql_query("select * from reklam_odeme where reklam = '$rid' and reklam_tur = '$rtur'"));

if ($sor > 0) {
die("EXITS");
}


$bul2 = mysql_fetch_array(mysql_query("select * from popup_reklamlar where id = '$rid'"));

$tutar = $bul2['ucret'];

$bul = mysql_fetch_array(mysql_query("select * from hesaplarimiz where id = '$hesap_numaramiz'"));

$bankaad = $bul['banka'];
$hesapno = $bul['hesapno'];
$subeno = $bul['sube'];
$hesapad = $bul['ad'];
$hesapiban = $bul['iban'];

$tarih = mktime();

$ekle = "insert into reklam_odeme (user,reklam, tarih, durum, ucret, note, odeme_turu, gbanka, gad, banka, ad, hesap, sube , iban, reklam_tur) values ('$_SESSION[userid]','$rid', '$tarih', '0', '$tutar', '$not', '$odeme_turu','$banka', '$gonderen', '$bankaad', '$hesapad', '$hesapno', '$subeno', '$hesapiban', '$rtur')";
$yali = mysql_query($ekle) or die(mysql_error());

include('../sis_mail/bildirim.php');
die("SUCCESS");



}

?>
<? if ($mode=="bildirim") { 
$id = sql($_GET['id']);

$yaz = @mysql_fetch_array(mysql_query("select * from popup_reklamlar where id = '$id'"));
?>
<title></title>

<script type="text/javascript">

$(function() {




   $('#bildir_button').click(function() {
  
    var gonderen = $('#gonderen').val();
    var banka = $('#banka').val();
    var odeme_turu = $('#odeme_turu').val();
    var not = $('#not').val();
    var rid = <?=$id?>;
	var rtur = 1;
    var hesap_numaramiz = $('#hesap_numaramiz').val();
	

	$.post('inc_reklam/popup.php?mode=obildir', {rtur : rtur, gonderen : gonderen, banka : banka, odeme_turu : odeme_turu , not : not, rid : rid , hesap_numaramiz : hesap_numaramiz}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#odeme_durum').html('<img src="extra/notification-slash.gif"> Zorunlu Alanları Doldurmadınız !');
						break;
						
					case 'EXITS':
						$('#odeme_durum').html('<img src="extra/notification-exclamation.gif"> Daha önceden bildirim yapmışsınız !');
						break;

						
					case 'SUCCESS':
						$('#odeme_durum').html('<img src="extra/notification-information.gif"> Bildirim yapıldı. Bekleyin..');
						setTimeout("popup_goster();", 1500);
						break;
						
						default:
						$('#odeme_durum').html(return_val);
				}
				
				
	 });


			

 });


});

</script>


		
		<table border="0" width="100%" id="table6" cellpadding="0" style="border-collapse: collapse">
		
		
			<tr>
		<td height="10" colspan="2"></td>
	</tr>
		
		
		
	<tr>
		<td height="35" colspan="2"><p style="width:460px; height:35px;line-height:35px;border-bottom: 1px solid #c0c0c0;font-size:13px; font-weight:bold;"><b>&nbsp;&nbsp;Ödeme Bildirim Paneli</b></p></td>
	</tr>
	
	<tr>
		<td height="20" colspan="2"></td>
	</tr>
	
	
						<tr>
							<td height="30" width="20%">&nbsp;Reklam:</td>
							<td height="35" width="">
							&nbsp;<?=$yaz['url']?></td>
						</tr>
						<tr>
						
							<td height="25" width="">&nbsp;Ücret:</td>
							<td height="35" width="">
							&nbsp;<?=number_format($yaz[ucret],2)?> TL</td>
						</tr>
						<tr>
						
							<td height="25" width="">&nbsp;Yatırdığınız Hesabımız:</td>
							<td height="35" width="">
							<select class="select" id="hesap_numaramiz" name="hesap_numaramiz" size="1">

<option value="0">Seçiniz..</option>		
<?	
$result = @mysql_query("select * from hesaplarimiz order by id desc");

if (mysql_num_rows($result)<1) {
?>

<? 
} else {	 
while( $cib = @mysql_fetch_array($result))
{
?>
<option value="<?=$cib[id]?>"><?=$cib[banka]?>&nbsp;-&nbsp;<?=$cib[ad]?></option>
<? }} ?>
</select></td>
						</tr>
						
						<tr>
							<td height="30" width="">&nbsp;Ödeme Türü:</td>
							<td height="35" width=""><select class="select" id="odeme_turu" name="odeme_turu" size="1"><option value="1">Havale</option><option value="2">EFT</option></select></td>
						</tr>
						
						<tr>
							<td height="30" width="">&nbsp;Gönderen Adı - Soyadı:</td>
							<td height="35" width=""><input type="text" name="gonderen" id="gonderen" class="ninput"></td>
						</tr>
						
						<tr>
							<td height="30" width="">&nbsp;Gönderen Banka:</td>
							<td height="35" width=""><input type="text" name="banka" id="banka" class="ninput"></td>
						</tr>
						
							<tr>
		<td height="5" colspan="2"></td>
	</tr>
						
						
						<tr>
							<td height="35" width="" valign="top">&nbsp;Notunuz:(varsa)</td>
							<td height="100" width=""><textarea name="not" style="width:270px;height:90px;" id="not" class="form-login" rows="6" cols="26"></textarea></td>
						</tr>
						
						<tr>
							<td height="30" width="">&nbsp;İşlem</td>
							<td height="35" width="" align="left">&nbsp;<input type="button" id="bildir_button" name="bildir_button" class="button" value="Ödeme Bildir">&nbsp;<input onclick="odeme_bildirim_kapat();" type="button" class="button" value="Vazgeç"></td>
						</tr>
						
						<tr>
								<td height="45" id="odeme_durum" colspan="2">&nbsp;</td>
						</tr>

					</table>

<? } ?>