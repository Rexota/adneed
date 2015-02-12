<?
ob_start();
session_start();
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_editor.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?><? if ($mode=='see') { 

$git = @$_GET["p"];
$ara = $_GET['ara'];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {

 $('#siteler').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#siteler').load('inc_editor/siteler.php?mode=<?=$mode?>&ara=<?=$ara?>&p='+id);

}

</script>
<?

if ($ara!='') {
$limit = 15;

$islem = mysql_query("select * from user where username = '$ara'");
if (mysql_num_rows($islem) > 0 ) {
$yazdir = mysql_fetch_array($islem);
$arasorgu = "and user = '$yazdir[id]'";
} else {
$arasorgu = "and adres like '%$ara%'";
}
} else {
$limit = 5;
}	



 
$count      = mysql_num_rows(mysql_query("select * from sitelerim where onay = 1 $arasorgu"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;


$result = @mysql_query("select * from sitelerim where onay = 1 $arasorgu order by id desc LIMIT $baslangic,$limit");

if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
?>
 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="900" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16"> Sistemde kayıtlı web sitesi bulunamadı !</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
<?
	 
while($yaz = @mysql_fetch_array($result))
{

$kbul = @mysql_fetch_array(@mysql_query("select * from user where id = '$yaz[user]'"));
$ktbul = @mysql_fetch_array(@mysql_query("select * from kategoriler where id = '$yaz[kategori]'"));


alacak_guncelle();

$pop_kayit_sayisi = @mysql_query("select Count(*) from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and yayinci_site = '$yaz[adres]' and reklam_tur = 1");
$pop_kayit_sayisi = @mysql_fetch_array($pop_kayit_sayisi);
$pop_kayit_sayisi = $pop_kayit_sayisi[0];


$splash_kayit_sayisi = @mysql_query("select Count(*) from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and yayinci_site = '$yaz[adres]' and reklam_tur = 2");
$splash_kayit_sayisi = @mysql_fetch_array($splash_kayit_sayisi);
$splash_kayit_sayisi = $splash_kayit_sayisi[0];



$msn_kayit_sayisi = @mysql_query("select Count(*) from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and yayinci_site = '$yaz[adres]' and reklam_tur = 3");
$msn_kayit_sayisi = @mysql_fetch_array($msn_kayit_sayisi);
$msn_kayit_sayisi = $msn_kayit_sayisi[0];


$ppc_kayit_sayisi = @mysql_query("select Count(*) from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and yayinci_site = '$yaz[adres]' and reklam_tur = 4");
$ppc_kayit_sayisi = @mysql_fetch_array($ppc_kayit_sayisi);
$ppc_kayit_sayisi = $ppc_kayit_sayisi[0];

?>

		    <tr>
			<td height="30" width="20%" style="border: 1px solid #C0C0C0; padding-top: 1px"><b>&nbsp;<?=$yaz[adres]?></b></td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0; padding-top: 1px"><b>&nbsp;<?=date("d.m.Y H:i:s", $yaz[tarih])?></b></td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0; padding-top: 1px"><b>&nbsp;<?=$ktbul[name]?></b></td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0; padding-top: 1px"><b>&nbsp;<?=$kbul[username]?></b></td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;<a target="_blank" href="site_incele.php?site=<?=$yaz[id]?>&reklam=1"><?=number_format($pop_kayit_sayisi)?></a></td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;<a target="_blank" href="site_incele.php?site=<?=$yaz[id]?>&reklam=2"><?=number_format($splash_kayit_sayisi)?></a></td>
			<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;<a target="_blank" href="site_incele.php?site=<?=$yaz[id]?>&reklam=3"><?=number_format($msn_kayit_sayisi)?></a></td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;<a target="_blank" href="site_incele.php?site=<?=$yaz[id]?>&reklam=4"><?=number_format($ppc_kayit_sayisi)?></a></td>
			<td height="25" width="5%" style="border: 1px solid #C0C0C0; padding-top: 1px"><p align="center"><a href="javascript:siteduzelt('<?=$yaz[id]?>');"><img border="0" src="img/icon_edit.gif" width="16" height="16" align="middle"></a>&nbsp;&nbsp;<a href="javascript:sitesil('<?=$yaz[id]?>');" onclick="return onay();"><img border="0" src="img/icon_delete.gif" width="16" height="16" align="middle"></a></td>
		</tr>
		
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="9" style="border: 0px solid #C0C0C0; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
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

$del = mysql_query("UPDATE sitelerim SET onay = 0 where id = '$id'");


}?>
<? if ($mode=="editsave") { 

$id = sql($_POST['id']);
$cat = sql($_POST['cat']);

if ($id=="" or $cat=="" or $cat=="0") {
die("ERROR");
}

$islem = mysql_query("UPDATE sitelerim SET kategori = '$cat' where id = '$id'");

die("SUCCESS");
}
?>
<? if ($mode=="edit") { 
$id = sql($_GET['id']);
?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from sitelerim where id = '$id'"));
?>
			  
	<script type="text/javascript">
	
	function islembitti() {
	
	$('#site_duzen_panel').fadeOut();
	setTimeout("$('#site_duzen_panel').html('');", 500);
	$('#site_duzen_panel').fadeIn();
	}
	
	
$(function() {


 
   $('#duzenle_button').click(function() {
  
  
    var id = <?=$id?>;
	var cat = $('#cat').val();


	

	$.post('inc_editor/siteler.php?mode=editsave', {cat: cat, id : id}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#duzenle_durum').html('<img src="extra/notification-slash.gif"> Kategori Seçmediniz !');
						break;

					case 'SUCCESS':
				    $('#duzenle_durum').html('<img src="extra/notification-information.gif"> Değişiklikler kaydedildi.');
					setTimeout("islembitti();", 1500);	
						break;
						
					default:
                   $('#duzenle_durum').html(return_val);
				}
				
				
	 });


			

 });


});



</script>		  
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" colspan="2">&nbsp;</td>
		</tr>
	

		<tr>
			<td height="35" width="12%">&nbsp;Site Adresi:</td>
			<td height="25" width="">&nbsp;<b><?=$yaz[adres]?></b></td>
		</tr>	
		
		<tr>
			<td height="35" width="">&nbsp;Kategori:</td>
			<td height="25" width="">&nbsp;<select name="cat" id="cat" size="1" class="select">
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
<option <? if($yaz[kategori]==$yaz2[id]) { ?>selected<? } ?> value="<?=$yaz2[id]?>"><?=$yaz2[name]?></option>

<? } 
}?>
</select></td>
		</tr>
		
		
		<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="duzenle_button" name="duzenle_button" class="button" value="Düzenle Kaydet"></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#site_duzen_panel').html('');" class="button" value="Vazgeç"></td>
		</tr>
		
		

		
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="duzenle_durum"></span></td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		</table>
<? } ?>