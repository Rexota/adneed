<?
ob_start();
session_start();
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_admin.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');

$mode = sql($_GET['mode']);

?>
<? if ($mode=='see') { ?>
<script type="text/javascript">


function tum_reklamlar() {
$('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
$('#reklamlar').load('inc_admin_new/popup.php?mode=tumu');

$('#reklam_duzen_panel').html('');


 $('#tum_reklamlar_button').addClass('button_tikli');
 $('#suresi_bitenler_button').removeClass('button_tikli'); 
 $('#yayinda_olanlar_button').removeClass('button_tikli'); 
 $('#odeme_bekleyenler_button').removeClass('button_tikli'); 
 
}

function suresi_bitenler() {
$('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
$('#reklamlar').load('inc_admin_new/popup.php?mode=biten');

$('#reklam_duzen_panel').html('');


 $('#tum_reklamlar_button').removeClass('button_tikli');
 $('#suresi_bitenler_button').addClass('button_tikli'); 
 $('#yayinda_olanlar_button').removeClass('button_tikli'); 
 $('#odeme_bekleyenler_button').removeClass('button_tikli'); 
}

function yayinda_olanlar() {
$('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
$('#reklamlar').load('inc_admin_new/popup.php?mode=yayinda');

$('#reklam_duzen_panel').html('');


 $('#tum_reklamlar_button').removeClass('button_tikli');
 $('#suresi_bitenler_button').removeClass('button_tikli'); 
 $('#yayinda_olanlar_button').addClass('button_tikli'); 
 $('#odeme_bekleyenler_button').removeClass('button_tikli'); 
}

function odeme_bekleyenler() {
$('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
$('#reklamlar').load('inc_admin_new/popup.php?mode=bekleyen');

$('#reklam_duzen_panel').html('');


 $('#tum_reklamlar_button').removeClass('button_tikli');
 $('#suresi_bitenler_button').removeClass('button_tikli'); 
 $('#yayinda_olanlar_button').removeClass('button_tikli'); 
 $('#odeme_bekleyenler_button').addClass('button_tikli'); 
}



</script>
		

			
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  
		<tr>
			<td height="10" colspan="">&nbsp;<input type="button" onclick="tum_reklamlar()" id="tum_reklamlar_button" class="button" value="Tüm Reklamlar">&nbsp;<input type="button" onclick="suresi_bitenler()" id="suresi_bitenler_button" class="button" value="Süresi Biten">&nbsp;<input type="button" onclick="odeme_bekleyenler()" id="odeme_bekleyenler_button" class="button" value="Ödeme Bekleyen">&nbsp;<input type="button" onclick="yayinda_olanlar()" id="yayinda_olanlar_button" class="button" value="Yayında Olan"></td>
		</tr>
		
		<tr>
	    <td height="35" id="reklam_duzen_panel" colspan="">&nbsp;</td>
		</tr>
		
		<tr>
	    <td height="10" id="reklamlar" colspan="">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
		</tr>
		
		<tr>
	    <td height="10" colspan="">&nbsp;</td>
		</tr>
		
</table>
<? } ?>
<? if ($mode=='tumu' or $mode=='bekleyen' or $mode=='biten' or $mode=='yayinda') { 

$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {
 $('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#reklamlar').load('inc_admin_new/popup.php?mode=<?=$mode?>&p='+id);
}

 function reklamsil(id) {
 
 $.post('inc_admin_new/popup.php?mode=sil', {id: id}, function(response) {
 $('#reklamlar').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#reklamlar').load('inc_admin_new/popup.php?mode=<?=$mode?>&p='+id);	
	 });
 
 }
 
 
  function reklam_duzenle(id) {  
  $('#reklam_duzen_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#reklam_duzen_panel').load('inc_admin_new/popup.php?mode=edit&id='+id);
 }
 
 function reklam_duzenle_kapat() {
 $('#reklam_duzen_panel').html('');
 }
 
 
</script>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
 		<tr>
			<td height="25" width="20%" style="border: 1px solid #C0C0C0">&nbsp;Reklam Adresi</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Eklenme Tarihi</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Kategori</td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;Toplam Hit</td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;Yayınlanan</td>
			<td height="25" width="14%" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Ücret</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Yayım Süresi</td>
			<td height="25" width="5%" style="border: 1px solid #C0C0C0"><p align="center"><img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		</tr>
<?	

$limit = 10;
 


if ($mode=='tumu') { $count      = @mysql_num_rows(mysql_query("select * from popup_reklamlar")); }
if ($mode=='yayinda') { $count      = @mysql_num_rows(mysql_query("select * from popup_reklamlar where durum = 1")); }
if ($mode=='bekleyen') { $count      = @mysql_num_rows(mysql_query("select * from popup_reklamlar where durum = 0")); }
if ($mode=='biten') { $count      = @mysql_num_rows(mysql_query("select * from popup_reklamlar where durum = 2")); }

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;


if ($mode=='tumu') { $result = @mysql_query("select * from popup_reklamlar LIMIT $baslangic,$limit"); }
if ($mode=='yayinda') { $result = @mysql_query("select * from popup_reklamlar where durum = 1 LIMIT $baslangic,$limit"); }
if ($mode=='bekleyen') { $result = @mysql_query("select * from popup_reklamlar where durum = 0 LIMIT $baslangic,$limit"); }
if ($mode=='biten') { $result = @mysql_query("select * from popup_reklamlar where durum = 2 LIMIT $baslangic,$limit"); }


if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
?>
		<tr>
			<td height="30" colspan="9" style="border: 1px solid #c0c0c0;">&nbsp;<img border="0" src="extra/notification-exclamation.gif"> Reklam Bulunamadı !</td>
		</tr>
<? 
} else {

?>


<?
	 
while($yaz = @mysql_fetch_array($result))
{

?>

		    <tr>
			<td height="25" width="20%" style="border: 1px solid #C0C0C0">&nbsp;<a href="<?=admin_popup_rapor($yaz[id])?>"><?=$yaz[url]?></a></td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=date("d.m.Y H:i:s", $yaz[tarih])?></td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;<?=kategori_bul($yaz[kategori])?></td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($yaz[toplam])?></td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($yaz[suan])?></td>
			<td height="25" width="14%" style="border: 1px solid #C0C0C0">&nbsp;<?=reklam_durum($yaz[durum])?></td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($yaz[ucret],2)?> TL</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;<?=yayim_suresi($yaz[sure])?></td>
			<td height="25" width="5%" style="border: 1px solid #008000; padding-top: 1px"><p align="center"><a href="javascript:reklam_duzenle(<?=$yaz[id]?>);"><img border="0" src="img/icon_edit.gif" align="middle"></a>&nbsp;&nbsp;<a href="javascript:reklamsil('<?=$yaz[id]?>');" onclick="return onay();"><img border="0" src="img/icon_delete.gif" align="middle"></a></td>
		</tr>
		
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="9" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" class="sayfa_tikla" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
<? }?>
</table>
<? } ?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del =  mysql_query("delete from popup_reklamlar where id = '$id'");

$del1 = mysql_query("delete from reklam_odeme where reklam = '$id' and reklam_tur = 1");

}
?>
<? if ($mode=="save") {


$sure = sql($_POST['sure']);
$durum = sql($_POST['durum']);
$url = sql($_POST['url']);
$id = sql($_POST['id']);
$cat = sql($_POST['cat']);




if ($sure=='' or $id=='' or $durum=='' or $url=='' or $cat=='' or $cat=='0') {
die("ERROR");
}

$bbul = @mysql_fetch_array(mysql_query("select * from popup_reklamlar where id = '$id'"));
$istek = $bbul[toplam];

$ilk = substr($url , 0, 7);

if ($ilk!=="http://") {
die("URL");
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


$sql = "UPDATE popup_reklamlar SET url = '$url', sure = '$sureg', gunluk = '$gunluk', durum = '$durum', kategori = '$cat' where id = '$id'";
$ekle = mysql_query($sql);

die("SUCCESS");


}?>
<? if ($mode=="edit") { 
$id = sql($_GET['id']);

$yaz = mysql_fetch_array(mysql_query("select * from popup_reklamlar where id = '$id'"));
?>
<title></title>

<script type="text/javascript">


$(function(){


    $('#edit_button').click(function() {
  
    $('#islem_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor...');



	var durum = $('#durum').val();
	var sure = $('#sure').val();
	var url = $('#url').val();
	var cat = $('#cat').val();
	var id = <?=$id?>;


	$.post('inc_admin_new/popup.php?mode=save', {id : id , durum : durum, sure : sure, url :  url, cat : cat}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#islem_durum').html('<img src="extra/notification-slash.gif"> Zorunlu Alanları Doldurmadınız !');
						break;

						
					case 'URL':
						$('#islem_durum').html('<img src="extra/notification-exclamation.gif"> Girdiğiniz URL hatalı !');
						break;

						
					case 'SUCCESS':
						$('#islem_durum').html('<img src="extra/notification-information.gif"> Tamamlandı. Lütfen bekleyin..');
						setTimeout("reklam_duzenle_kapat();", 1500);
						break;
						
						default:
						$('#islem_durum').html(return_val);
				}
				
				
	 });
 });
 
 
  });


</script>


			<table border="0" width="100%" id="table6" cellpadding="0" style="border-collapse: collapse">
			
				<tr>
		<td height="10"  colspan="2">&nbsp;</td>
				</tr>
				
	<tr>
		<td height="45" colspan="2"><p style="width:390px; height:35px;line-height:35px;border-bottom: 1px solid #c0c0c0;font-size:13px; font-weight:bold;"><b>&nbsp;&nbsp;Reklam Düzenleme Paneli</b></p></td>
	</tr>
	
					
				<tr>
		<td height="35" width="20%">&nbsp;Kullanmak istediğiniz süre:</td>
		<td height="35" width="">&nbsp;<select class="select" id="sure" name="sure" size="1">
		<option <? if ($yaz[sure]=="0") { ?>selected<? }?> value="1">Bitene kadar gösterilsin</option>
		<option <? if ($yaz[sure]=="7") { ?>selected<? }?> value="2">1 Hafta</option>
		<option <? if ($yaz[sure]=="14") { ?>selected<? }?>value="3">2 Hafta</option>
		<option <? if ($yaz[sure]=="22") { ?>selected<? }?> value="4">3 Hafta</option>
		<option <? if ($yaz[sure]=="30") { ?>selected<? }?> value="5">Bir Ay</option>
		</select></td>
				</tr>
		<tr>
		<td height="35" width="">&nbsp;Reklam Durumu:</td>
		<td height="35" width="">&nbsp;<select class="select" id="durum" name="durum" size="1">
		<option <? if ($yaz[durum]=="0") { ?>selected<? } ?> value="0">Ödeme Bekliyor</option>
		<option <? if ($yaz[durum]=="1"){ ?>selected<? } ?> value="1">Yayında</option>
        <option <? if ($yaz[durum]=="2") { ?>selected<? } ?> value="2">Bitmiş</option>
		</select></td>
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
 
while($yaz2 = @mysql_fetch_array($result))
{

?>
<option <? if ($yaz[kategori]==$yaz2[id]) {?>selected<? } ?> value="<?=$yaz2[id]?>"><?=$yaz2[name]?></option>

<? } 
}?>
</select></td>
				</tr>
				
				
				<tr>
		<td height="35" width="">&nbsp;Url:</td>
		<td height="35" width="">&nbsp;<input id="url" name="url" type="text" class="ninput" value="<?=$yaz[url]?>"></td>
				</tr>
				<tr>
		<td height="35" width="">&nbsp;İşlem</td>
		<td height="35" width="" align="left">&nbsp;<input type="button" id="edit_button" class="button" value="Değişiklikleri Kaydet"> <input onclick="reklam_duzenle_kapat();" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" id="islem_durum" colspan="2">&nbsp;</td>
					</tr>
					</table>
			
<? } ?>