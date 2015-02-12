<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_koruma.php");
include("../sayfa_editor.php");
include('../fonksiyon.php');
?><? if ($mode=='tumu' or $mode=='bansiz' or $mode=='banli') {

$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

?>
<title></title>
<script type="text/javascript">


function uyesil(id) {

	$.post('inc_editor/uye.php?mode=sil', { id : id}, function(response) {
	
   $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
   $('#uye_listesi').load('inc_editor/uye.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}

function sayfa_getir(id) {

 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#uye_listesi').load('inc_editor/uye.php?mode=<?=$mode?>&p='+id);

}
</script>
<?	

$limit = 15;


if ($mode=='tumu') { $count      = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur = 1 and onay = 1")); }
if ($mode=='banli') { $count      = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur =1 and login = 0 and onay = 1")); }
if ($mode=='bansiz') { $count      = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur=1 and login = 1 and onay = 1")); }


$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;


if ($mode=='tumu') { $result = @mysql_query("select * from user where sil = 0 and tur = 1 and onay = 1 LIMIT $baslangic,$limit"); }
if ($mode=='banli') { $result = @mysql_query("select * from user where sil = 0 and tur = 1 and login = 0 and onay = 1 LIMIT $baslangic,$limit"); }
if ($mode=='bansiz') { $result = @mysql_query("select * from user where sil = 0 and tur = 1 and login = 1 and onay = 1 LIMIT $baslangic,$limit"); }


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

			<td height="25" width="900" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16" align="middle"> 
			Kayıt bulunamadı !</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $usernames, $passwords, $emails , $telefons, $ads, $kimliks, $turs, $logins, $sil) = @mysql_fetch_row($result))
{

if ($logins=="1") {
$udurum = "Bansız";
} else {
$udurum = "Banlı";
}

if ($turs=="1") {
$uturs = "Yayıncı";
}

if ($turs=="2") {
$uturs = "Reklamveren";
}

if ($turs=="3") {
$uturs = "Editor";
}

if ($turs=="4") {
$uturs = "Admin";
}

?>

		    <tr>
			<td height="30" width="15%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$ads?></b></td>
			<td height="25" width="15%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$telefons?></b></td>
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$usernames?></b></td>
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$kimliks?></b></td>
			<td height="25" width="20%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$emails?></b></td>
			<td height="25" width="13%" style="border: 1px solid #008000; padding-top: 1px">
			<p><b>&nbsp;<?=$uturs?></b></td>
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			<p><b>&nbsp;<?=$udurum?></b></td>
			<td height="25" width="7%" style="border: 1px solid #008000; padding-top: 1px">
			<p align="center">
			<a href="javascript:uyeduzenle('<?=$id?>');">
			<img border="0" src="img/icon_edit.gif" width="16" height="16" align="middle"></a>&nbsp;&nbsp;
			<a href="javascript:uyesil('<?=$id?>');" onclick="return onay();">
			<img border="0" src="img/icon_delete.gif" width="16" height="16" align="middle"></a></td>
		</tr>
		
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="8" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
</table>
<? } } ?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE user SET sil = 1 where id = '$id'");

}
?>
<? if ($mode=="edit") { 
$id = sql($_GET['id']);
?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from user where id = '$id' and tur = 1 and onay = 1 and sil = 0"));
?>
			  
	<script type="text/javascript">
	
	function islembitti() {
	
	$('#uye_duzen_panel').fadeOut();
	setTimeout("$('#uye_duzen_panel').html('');", 500);
	$('#uye_duzen_panel').fadeIn();
	}
	
	
$(function() {


 
   $('#duzenle_button').click(function() {
  
  
    var id = <?=$id?>;
	var adiniz = $('#adiniz').val();
	var email = $('#email').val();
	var telefon = $('#tel').val();

	var parola = $('#parola').val();
	var hesap_durum = $('#hesap_durum').val();

	

	$.post('inc_editor/uye.php?mode=editsave', {adiniz : adiniz, tel : telefon, email : email, parola : parola, durum : hesap_durum, id : id}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#duzenle_durum').html('<img src="extra/notification-slash.gif"> Zorunlu alanları doldurmadınız !');
						break;


					case 'EM':
						$('#duzenle_durum').html('<img src="extra/notification-exclamation.gif"> Bu Email adresi zaten kullanımda !');
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
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td height="35" width="15%">&nbsp;Adı Soyadı:</td>
			<td height="25" width="250">&nbsp;<input name="adiniz" id="adiniz" class="ninput" title="Password" value="<?=$yaz['ad']?>" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="10%">&nbsp;Eposta Adresi:</td>
			<td height="25" width="250">&nbsp;<input name="email" id="email" class="ninput" title="Password" value="<?=$yaz['email']?>" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
	
			<td height="35" width="10%">&nbsp;Telefon:</td>
			<td height="25" width="250">&nbsp;<input name="tel" id="tel" class="ninput" title="Password" value="<?=$yaz['telefon']?>" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="10%">&nbsp;Yeni Şifre:</td>
			<td height="25" width="250">&nbsp;<input name="parola" id="parola" type="password" class="ninput" title="Password" value="" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="10%">&nbsp;Hesap Durumu:</td>
			<td height="25" width="250">&nbsp;<select id="hesap_durum" class="select"><option <? if($yaz['login']=="0") { ?>selected <? }?>  value="0">Kapalı</option><option <? if($yaz['login']=="1") { ?>selected <? }?>  value="1">Açık</option></select></td>
		</tr>
		<tr>
			<td height="35" width="10%">&nbsp;<input type="button"  id="duzenle_button" name="duzenle_button" class="button" value=" Değişiklikleri Kaydet "></td>
			<td height="32" width="250">&nbsp;<input type="button" onclick="$('#uye_duzen_panel').html('');" class="button" value="Vazgeç"></td>
		</tr>
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="duzenle_durum"></span></td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		</table>
<? } ?>
<? if ($mode=="editsave") { ?>
<?
	
$email = sql($_POST['email']);
$telefon = sql($_POST['tel']);
$parola = sql($_POST['parola']);
$adiniz = sql($_POST['adiniz']);
$id = sql($_POST['id']);

$durum = sql($_POST['durum']);


if ($adiniz=='' or $telefon=='' or $email=='' or $id=='' or $durum=='') {
die("ERROR");
}

$kontrol = mysql_num_rows(mysql_query("select * from user where email = '$email' and id != '$id'"));

if ($kontrol > 0) {
die("EM");
}

if ($parola=='') {

$yali2 = mysql_query("UPDATE user SET telefon = '$telefon', email = '$email', ad = '$adiniz', login = '$durum' where id = '$id'");

} else {
$parola = md5($parola);
$yali2 = mysql_query("UPDATE user SET telefon = '$telefon', email = '$email', ad = '$adiniz', login = '$durum', password = '$parola' where id = '$id'");

}


die("SUCCESS");


?>
<? } ?>