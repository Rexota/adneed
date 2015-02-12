<?
ob_start();
session_start();
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_yayinci.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');










?><? if ($mode=='see') { ?>
<title></title>
<script type="text/javascript">

function popup_kodu(id) {
$('#kod_alani').html('<img src="new/yukleniyor.gif"> Veriler yükleniyor...');
$('#kod_alani').load('inc_yayinci/sitelerim.php?mode=popkodver&site='+id);
}

function splash_kodu(id) {
$('#kod_alani').html('<img src="new/yukleniyor.gif"> Veriler yükleniyor...');
$('#kod_alani').load('inc_yayinci/sitelerim.php?mode=splashkodver&site='+id);
}

function msn_kodu(id) {
$('#kod_alani').html('<img src="new/yukleniyor.gif"> Veriler yükleniyor...');
$('#kod_alani').load('inc_yayinci/sitelerim.php?mode=msnkodver&site='+id);
}

function ppc_kodu(id) {
$('#kod_alani').html('<img src="new/yukleniyor.gif"> Veriler yükleniyor...');
$('#kod_alani').load('inc_yayinci/sitelerim.php?mode=ppckodver&site='+id);
}



</script>
<?	
$result = @mysql_query("select * from sitelerim where user = '$_SESSION[userid]' and onay = 1");

if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="900" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16" align="middle"> 
			Eklenmiş Web Sitesi bulunamadı. Hemen Ekleyip kazanmaya başlayabilirsiniz..</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
<?
	 
while($yaz = mysql_fetch_array($result))
{

$yaz2 = @mysql_fetch_array(@mysql_query("select * from kategoriler where id = '$yaz[kategori]'"));
?>

		    <tr>
			<td height="40" width="20%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$yaz[adres]?></b></td>
			
			<td height="25" width="15%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=date("d.m.Y H:i:s", $yaz[tarih])?></b></td>
			
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$yaz2['name']?></b></td>			
			
			
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<input type="button" onclick="popup_kodu(<?=$yaz[id]?>);" class="button" value="Popup Kodu"></td>
			
			
			<td height="25" width="10%" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<input type="button" onclick="splash_kodu(<?=$yaz[id]?>);" class="button" value="Splash Kodu"></td>
			
			
			<td height="25" width="11%" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<input type="button" onclick="msn_kodu(<?=$yaz[id]?>);" class="button" value="Msn Pop Kodu"></td>
			
			
			<td height="25" width="13%" style="border: 1px solid #008000; padding-top: 1px">
			&nbsp;<input type="button" onclick="ppc_kodu(<?=$yaz[id]?>);" class="button" value="PPC Banner Kodu"></td>
			
			
			
			<td height="25" width="5%" style="border: 1px solid #008000; padding-top: 1px"></td>
		</tr>
		
<? } ?>
</table>
<? } } ?>
<? if ($mode=='yontem') {

$yontem = sql($_POST['yontem']);


if ($yontem==1) {
$salla = rand(999,99999);
$_SESSION['salla']=$salla;


if ($ad_server_code=='') {
$_SESSION['code']='&lt;meta name="adserver" content="'.$salla.'"&gt;';
} else {
$_SESSION['code']='&lt;meta name="'.$ad_server_code.'" content="'.$salla.'"&gt;';
}



}


if ($yontem==2) {
$salla = rand(999,99999);
$_SESSION['salla']=$salla;
$_SESSION['code']=$salla.".html";
}



$_SESSION['siteyontem']=$yontem;
$_SESSION['sitestep3']="True";

die("SUCCESS");



} ?><? if ($mode=='ekle') {

$site = sql($_POST['site']);
$cat = sql($_POST['cat']);



if ($site=='' or $cat=='' or $cat=='0') {
die("ERROR");
}

$ilk = substr($site , 0, 7);
if ($ilk!=="http://") {
die("SIT");
}

$son = substr($site , -1);
if ($son!=="/") {
$site = $site."/";
}


site_kontrol($site);



$_SESSION['ekleneceksite']=$site;
$_SESSION['sitekategori']=$cat;
$_SESSION['sitestep2']="True";
die("SUCCESS");



}
?><? if ($mode=='onay' and $_SESSION['sitestep2']=="True") {
?>


<script type="text/javascript">
 $(function(){

   $('#site_eklebutton2').click(function() {
  
 

	var yontem = $('#yontem').val();
	

	$.post('inc_yayinci/sitelerim.php?mode=yontem', {yontem : yontem}, function(response) {
 
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {

									
					case 'SUCCESS':
						$('#site2_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("sitestep3();", 1500);
						break;
						
						default:
						$('#site2_durum').html(return_val);
						
				}
				
				
	 });


			

 });
 
 
 });   

</script>




			<table border="0" width="90%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="35" width="104">&nbsp;Site Adresi:</td>
		<td height="35" width="664">&nbsp;<font color="green"><?=$_SESSION['ekleneceksite']?></font></td>
				</tr>
				<tr>
		<td height="35" width="164">&nbsp;Onaylama Yönetmi:</td>
		<td height="35" width="464">&nbsp;<select id="yontem" name="yontem" class="select"><option value="1">Header'e kod koyarak</option><option value="2">FTP'de dosya oluşturarak</option></select></td>
				</tr>
				<tr>
		<td height="35" width="164">&nbsp;İşlem</td>
		<td height="35" width="234" align="left">&nbsp;<input type="button" id="site_eklebutton2" class="button" value="Devam"> <input onclick="document.getElementById('site_ekle_panel2').style.display='none';" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="site2_durum"></span></td>
					</tr>
					<tr>
		<td height="25" colspan="2">&nbsp;</td>
					</tr>
					</table>


<? } ?><? if ($mode=='header') {

$salla = sql($_POST['salla']);



if ($ad_server_code=='') {
$aranan = '<meta name="adserver" content="'.$salla.'">';
} else {
$aranan = '<meta name="'.$ad_server_code.'" content="'.$salla.'">';
}



$site = $_SESSION['ekleneceksite'];
$cat = $_SESSION['sitekategori'];
$kaynak = @file_get_contents($site);


site_kontrol($_SESSION[ekleneceksite]);



if (!$kaynak) {
die("ERROR");
} else {


$al1 = explode('<head',$kaynak);
$al2=explode('</head>',$al1[1]); 
$alindi = $al2[0];

if (!strstr($alindi,$aranan)) {

die("FAILED");

} else {
$tarih = mktime();
$ekle = mysql_query("insert into sitelerim (adres,onay,user,tarih,kategori) values ('$_SESSION[ekleneceksite]', '1', '$_SESSION[userid]', '$tarih', '$cat')");
die("SUCCESS");
}



}
}?><? if ($mode=="ftp") {

$salla = sql($_POST['salla']);
$dosya = $_SESSION['code'];


$site = $_SESSION['ekleneceksite'].$dosya;
$cat = $_SESSION['sitekategori'];
$kontrol = @fopen($site, "r");


site_kontrol($_SESSION[ekleneceksite]);



if (!$kontrol) {
die("ERROR");
} else {


$tarih = mktime();
$ekle = mysql_query("insert into sitelerim (adres,onay,user,tarih,kategori) values ('$_SESSION[ekleneceksite]', '1', '$_SESSION[userid]', '$tarih', '$cat')");
die("SUCCESS");
}


}?><? if ($mode=="onay2" and $_SESSION['sitestep3']=="True") {
?>


<script type="text/javascript">


function sitestep4() {


siteyenile();
hepsinikapat();



}







 $(function(){

   $('#header_onay').click(function() {
  
    var salla = $('#salla').val();
    
	$.post('inc_yayinci/sitelerim.php?mode=header', { salla : salla}, function(response) {
 
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
				
				
					case 'SITE':
						$('#site3_durum').html('<img src="extra/notification-exclamation.gif"> Bu Site daha önceden eklenmiş!');
						break;
				
				
					case 'ERROR':
						$('#site3_durum').html('<img src="extra/notification-exclamation.gif"> Siteye bağlantı sağlanamadı !');
						break;

					case 'FAILED':
						$('#site3_durum').html('<img src="extra/notification-slash.gif"> Site Doğrulanamadı !');
						break;
															
					case 'SUCCESS':
						$('#site3_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("sitestep4();", 1500);
						break;
						
						default:
						$('#site3_durum').html(return_val);
						
				}
				
				
	 });


			

 });
 
 
 
 
 
 
 
 
 
 
 
 
  $('#ftp_onay').click(function() {
  
    var salla = $('#salla').val();
    
	$.post('inc_yayinci/sitelerim.php?mode=ftp', { salla : salla}, function(response) {
 
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
				
				
					case 'SITE':
						$('#site4_durum').html('<img src="extra/notification-exclamation.gif"> Bu Site daha önceden eklenmiş!');
						break;
				
				
					case 'ERROR':
						$('#site4_durum').html('<img src="extra/notification-exclamation.gif"> Site Doğrulanamadı !');
						break;
															
					case 'SUCCESS':
						$('#site4_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("sitestep4();", 1500);
						break;
						
						default:
						$('#site4_durum').html(return_val);
						
				}
				
				
	 });


			

 });

 
 
 });   

</script>




			<table border="0" width="90%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="35" width="104">&nbsp;Site Adresi:</td>
		<td height="35" width="664">&nbsp;<font color="green"><?=$_SESSION['ekleneceksite']?></font></td>
				</tr>
				
				
		
		<? if ($_SESSION['siteyontem']=="1") { ?>
		
				<tr>
		<td height="35" width="164">&nbsp;Onaylama Yönetmi:</td>
		<td height="35" width="464">&nbsp;Header'e kod koyarak</td>
				</tr>
				<tr>
				
		<td height="35" width="164">&nbsp;Kod:</td>
		<td height="35" width="464">&nbsp;<font style="font-size:13px;"><?=$_SESSION['code']?></font></td>
				</tr>
				<tr>
	    <input type="hidden" id="salla" name="salla" value="<?=$_SESSION['salla']?>">
		<td height="35" width="164">&nbsp;Bilgi:</td>
		<td height="35" width="464">&nbsp;<font style="font-size:13px;"><b>&lt;head&gt;</b>Yukarıdaki kodu sitenizin bu kısmına koyacaksınız<b>&lt;/head&gt;</b></font></td>
				</tr>
				<tr>
		<td height="35" width="164">&nbsp;İşlem</td>
		<td height="35" width="234" align="left">&nbsp;<input type="button" id="header_onay" class="button" value="Kontrol Et"> <input onclick="document.getElementById('site_ekle_panel3').style.display='none';" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="site3_durum"></span></td>
					</tr>
					<tr>
					<? } ?>
					
					
					
					
					
							<? if ($_SESSION['siteyontem']=="2") { ?>
		
				<tr>
		<td height="35" width="164">&nbsp;Onaylama Yönetmi:</td>
		<td height="35" width="464">&nbsp;FTP'de dosya oluşturarak</td>
				</tr>
				<tr>
				
		<td height="35" width="164">&nbsp;Dosya İsmi:</td>
		<td height="35" width="464">&nbsp;<font style="font-size:13px;"><?=$_SESSION['code']?></font></td>
				</tr>
				<tr>
	    <input type="hidden" id="salla" name="salla" value="<?=$_SESSION['salla']?>">
		<td height="35" width="164">&nbsp;Bilgi:</td>
		<td height="35" width="464">&nbsp;<font style="font-size:13px;"><b>Dosyayı FTP'de oluşturduktan sonra Kontrol Buttonuna basınız..</b></font></td>
				</tr>
				<tr>
		<td height="35" width="164">&nbsp;İşlem</td>
		<td height="35" width="234" align="left">&nbsp;<input type="button" id="ftp_onay" class="button" value="Kontrol Et"> <input onclick="document.getElementById('site_ekle_panel3').style.display='none';" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="site4_durum"></span></td>
					</tr>
					<tr>
					<? } ?>
					
					
		<td height="25" colspan="2">&nbsp;</td>
					</tr>
					</table>


<? } ?>
<? if ($mode=='popkodver' or $mode=='splashkodver' or $mode=='msnkodver' or $mode=='ppckodver') {

$id = sql($_GET['site']);

$site = sql($_GET['site']);
$bul = mysql_fetch_array(mysql_query("select * from sitelerim where id = '$id' and user = '$_SESSION[userid]'"));
$buls = mysql_fetch_array(mysql_query("select * from user where id = '$_SESSION[userid]'"));
?>
			<table border="0" width="90%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="25" width="664">&nbsp;</td>
				</tr>
				<tr>
				
		<? if ($mode=='popkodver') { ?>		
		<td height="25" width="104">&nbsp;<font style="font-size:12px;">Popup Kodu:</font></td>
		<? } ?>
		<? if ($mode=='splashkodver') { ?>		
		<td height="25" width="104">&nbsp;<font style="font-size:12px;">Splash Kodu:</font></td>
		<? } ?>
		<? if ($mode=='msnkodver') { ?>		
		<td height="25" width="104">&nbsp;<font style="font-size:12px;">Msn Pop Kodu:</font></td>
		<? } ?>		
		<? if ($mode=='ppckodver') { ?>		
		<td height="25" width="104">&nbsp;<font style="font-size:12px;">PPC Banner Kodları:</font></td>
		<? } ?>	
		
		</tr>
		<tr>
		<td height="10" width="664">&nbsp;</td>
				</tr>
						<tr>
						
						
		<td height="25" width="664">&nbsp;
			
<? if ($mode=='popkodver') { ?>		

<? if ($popupactive==0) { ?>
<textarea readonly class="form-login" style="width:90%;height:50px;">Bu Modül Aktif Değildir.</textarea>
<? } else { ?>		
<textarea readonly class="form-login" style="width:90%;height:50px;"><script type="text/javascript" src="<?=$adurl?>popup_<?=$buls[kimlik]?>_<?=$bul[id]?>/"></script></textarea>
<? } ?>
<? } ?>
		<? if ($mode=='splashkodver') { ?>	
		
	<? if ($splashactive==0) { ?>
<textarea readonly class="form-login" style="width:90%;height:50px;">Bu Modül Aktif Değildir.</textarea>
<? } else { ?>		
<textarea readonly class="form-login" style="width:90%;height:50px;"><script type="text/javascript" src="<?=$adurl?>splash_<?=$buls[kimlik]?>_<?=$bul[id]?>/"></script></textarea>
<? } ?>	
		<? } ?>
		
		
		
		<? if ($mode=='msnkodver') { ?>	
		
			<? if ($msnpopactive==0) { ?>
<textarea readonly class="form-login" style="width:90%;height:50px;">Bu Modül Aktif Değildir.</textarea>
<? } else { ?>		
<textarea readonly class="form-login" style="width:90%;height:50px;"><script type="text/javascript" src="<?=$adurl?>msn_<?=$buls[kimlik]?>_<?=$bul[id]?>/"></script></textarea>
<? } ?>	
	<? } ?>				
	
	
	
	
	
			<? if ($mode=='ppckodver') { ?>	
			
<?
$babam = @mysql_query("select * from ppc_cat");
$yalim = @mysql_num_rows($babam);
if ($yalim < 1) { ?>
<textarea readonly class="form-login" style="width:90%;height:50px;">Bu Modül Aktif Değildir.</textarea>
<? } else { ?>
<textarea readonly class="form-login" style="width:90%;min-height:150px;">
<? while($yaz = mysql_fetch_array($babam)) { ?>

<!--// <?=$yaz[ad]?> - <?=$yaz[width]?>x<?=$yaz[height]?> PX //-->
<script type="text/javascript" src="<?=$adurl?>ppc_<?=$buls[kimlik]?>_<?=$bul[id]?>_<?=$yaz[id]?>/"></script>

<? } ?>
</textarea>
<? } } ?>
</td></tr>
				
						<tr>
		<td height="10" width="664">&nbsp;</td>
				</tr>
				
										<tr>
		<td height="25" width="664">&nbsp;<input type="button" class="button" onclick="$('#kod_alani').html('');" value="Kapat"></td>
				</tr>
										<tr>
		<td height="25" width="664">&nbsp;</td>
				</tr>
					</table>

<?
} ?>