<?
$mode = $_GET['mode'];
ob_start();
session_start();

include("../db.php");
include("../sayfa_koruma.php");
include("../sayfa_admin.php");
include('../fonksiyon.php');
?><? if ($mode=='genel') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">
$(function(){


   
 $('#genel_button').click(function() {

    var adres = $('#adres').val();
	var adadres = $('#adadres').val();
	var logos = $('#logos').val();
	var descc = $('#descc').val();
	var keyss = $('#keyss').val();
	var copyy = $('#copyy').val();
	var title = $('#title').val();
	var fav = $('#fav').val();
	
	

	$.post('config_save.php?mode=genel', {adres : adres, adadres : adadres, logos : logos, descc : descc , keyss : keyss , copyy : copyy, title : title, fav : fav}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel_durum').html('<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel_durum').html(return_val);
				}
	 });

 });


  });
</script>
<title></title>
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Sistemin doğru çalışması için sağlanan genel ayarlar</b></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;Sistem Adresi:</td>
			<td height="25" width="750">&nbsp;<input name="adres" id="adres" class="form-login"  value="<?=$yaz['adres']?>" size="74" maxlength="2048" /></td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Ad Eklenti Adresi:</td>
			<td height="25" width="750">&nbsp;<input name="adadres" id="adadres" class="form-login"  value="<?=$yaz['adadres']?>" size="74" maxlength="2048" /></td>
		</tr>
		
		
		<tr>
	
			<td height="35" width="150">&nbsp;Title:</td>
			<td height="25" width="750">&nbsp;<input name="title" id="title" class="form-login" value="<?=$yaz['title']?>" size="74" maxlength="2048" /></td>
		</tr>
		<tr>

			<td height="35" width="150">&nbsp;Copyright Yazısı:</td>
			<td height="25" width="750">&nbsp;<input name="copyy" id="copyy" class="form-login" type="text" value="<?=$yaz['copyy']?>" size="74" maxlength="2048" /></td>
		</tr>
		<tr>
				<td height="35" width="150">&nbsp;Logo:</td>
			<td height="25" width="250">&nbsp;<input name="logos" id="logos" type="text" class="form-login"  value="<?=$yaz['logo']?>" size="74" maxlength="2048" /></td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Favicon:</td>
			<td height="25" width="250">&nbsp;<input name="fav" id="fav" type="text" class="form-login"  value="<?=$yaz['fav']?>" size="74" maxlength="2048" /></td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Keywords:</td>
			<td height="25" width="250">&nbsp;<input name="keyss" id="keyss" type="text" class="form-login" value="<?=$yaz['keyy']?>" size="74" maxlength="2048" /></td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Description:</td>
			<td height="25" width="250">&nbsp;<input name="descc" id="descc" type="text" class="form-login" value="<?=$yaz['descc']?>" size="74" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel_button" name="genel_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel2') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel2_button').click(function() {

	
	var popupreklam = $('#popupreklam').val();
	var splashreklam = $('#splashreklam').val();
	var msnpopreklam = $('#msnpopreklam').val();
	
	var popupyayinci = $('#popupyayinci').val();
	var splashyayinci = $('#splashyayinci').val();
	var msnpopyayinci = $('#msnpopyayinci').val();
	
	

	$.post('config_save.php?mode=genel2', { popr : popupreklam, splashr : splashreklam, msnr : msnpopreklam, popy : popupyayinci, splashy : splashyayinci, msny : msnpopyayinci }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel2_durum').html('<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel2_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel2_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel2_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Yayıncı ve Reklamveren için belirlenen reklam ücretleri</b></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;Popup Reklamveren:</td>
			<td height="25" width="750">&nbsp;<input name="popupreklam" id="popupreklam" class="form-login" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" value="<?=$yaz['popupreklam']?>" size="10" maxlength="6" /></td>
		</tr>
		<tr>
	
			<td height="35" width="150">&nbsp;Splash Reklamveren:</td>
			<td height="25" width="750">&nbsp;<input name="splashreklam" id="splashreklam" class="form-login" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" value="<?=$yaz['splashreklam']?>" size="10" maxlength="6" /></td>
		</tr>
		<tr>

			<td height="35" width="150">&nbsp;Msn Reklamveren:</td>
			<td height="25" width="750">&nbsp;<input name="msnpopreklam" id="msnpopreklam" class="form-login" type="text" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" value="<?=$yaz['msnpopreklam']?>" size="10" maxlength="6" /></td>
		</tr>
		<tr>
				<td height="35" width="150">&nbsp;Popup Yayıncı:</td>
			<td height="25" width="250">&nbsp;<input name="popupyayinci" id="popupyayinci" type="text" class="form-login" onkeypress="return BlockNonNumbers(this, event,'.',true,false);"  value="<?=$yaz['popupyayinci']?>" size="10" maxlength="6" /></td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Splash Yayıncı:</td>
			<td height="25" width="250">&nbsp;<input name="splashyayinci" id="splashyayinci" type="text" class="form-login" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" value="<?=$yaz['splashyayinci']?>" size="10" maxlength="6" /></td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Msn Yayıncı:</td>
			<td height="25" width="250">&nbsp;<input name="msnpopyayinci" id="msnpopyayinci" type="text" class="form-login" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" value="<?=$yaz['msnpopyayinci']?>" size="10" maxlength="6" /></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel2_button" name="genel2_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel2_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel3') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel3_button').click(function() {

	
	var sismail = $('#sismail').val();
	var bilmail = $('#bilmail').val();

	
	

	$.post('config_save.php?mode=genel3', { sismail : sismail, bilmail : bilmail }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel3_durum').html('<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel3_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel3_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel3_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Sistemin kullanacağı email hesabı ve bilgilendirmeleri göndereceği adres</b></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;Kullanılacak Adres:</td>
			<td height="25" width="750">&nbsp;<input name="sismail" id="sismail" class="form-login"  value="<?=$yaz['sismail']?>" size="65" maxlength="100" /></td>
		</tr>
		<tr>

			<td height="35" width="150">&nbsp;Bilgilendirme Adresi:</td>
			<td height="25" width="750">&nbsp;<input name="bilmail" id="bilmail" class="form-login" type="text" value="<?=$yaz['bilmail']?>" size="65" maxlength="100" /></td>
		</tr>
		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel3_button" name="genel3_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel3_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel4') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel4_button').click(function() {

	
	var uyekayit = $('#uyekayit').val();
	var odemetalep = $('#odemetalep').val();
	var odemebildir = $('#odemebildir').val();
	var iletisimmesaj = $('#iletisimmesaj').val();
	var ticketac = $('#ticketac').val();

	
	

	$.post('config_save.php?mode=genel4', { uyekayit : uyekayit, odemetalep : odemetalep, odemebildir : odemebildir, iletisimmesaj : iletisimmesaj, ticketac : ticketac }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel4_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları seçmediniz !');
						break;

					case 'FAILED':
					$('#genel4_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel4_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel4_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Hangi durumlarda sistem size email göndersin ?</b></td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Yeni Üye Kaydında:</td>
			<td height="25" width="750">&nbsp;
			<select id="uyekayit" class="select">
			<option <? if($yaz['uyekayit']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['uyekayit']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>
		
			<tr>
			<td height="35" width="150">&nbsp;Ödeme Bildiriminde:</td>
			<td height="25" width="750">&nbsp;
			<select id="odemebildir" class="select">
			<option <? if($yaz['odemebildir']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['odemebildir']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Ödeme Talebinde:</td>
			<td height="25" width="750">&nbsp;
			<select id="odemetalep" class="select">
			<option <? if($yaz['odemetalep']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['odemetalep']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;İletişim Mesajında:</td>
			<td height="25" width="750">&nbsp;
			<select id="iletisimmesaj" class="select">
			<option <? if($yaz['iletisimmesaj']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['iletisimmesaj']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Ticket Açıldığında:</td>
			<td height="25" width="750">&nbsp;
			<select id="ticketac" class="select">
			<option <? if($yaz['ticketac']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['ticketac']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>
		
<? if ($yalibaba=="vurdumala") { ?>
		<tr>
			<td height="35" width="150">&nbsp;Kullanılacak Adres:</td>
			<td height="25" width="750">&nbsp;
			<select id="" class="select">
			<option <? if($yaz['']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>
		
<? } ?>
		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel4_button" name="genel4_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel4_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel5') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel5_button').click(function() {

	
	var kesinti = $('#kesinti').val();
	var odeme_talep = $('#odeme_talep').val();
	var min_talep = $('#min_talep').val();
	var max_talep = $('#max_talep').val();


	
	

	$.post('config_save.php?mode=genel5', { kesinti : kesinti, odeme_talep : odeme_talep, min_talep : min_talep, max_talep : max_talep }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel5_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel5_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel5_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel5_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Ödeme talep ayarlarını ayarlamayı unutmayın</b></td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Ödeme Talep Etme:</td>
			<td height="25" width="750">&nbsp;
			<select id="odeme_talep" class="select">
			<option <? if($yaz['odeme_talep']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['odeme_talep']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>
		
			<tr>
			<td height="35" width="150">&nbsp;Ödeme Kesintisi:</td>
			<td height="25" width="750">&nbsp;%
<input name="kesinti" id="kesinti" type="text" class="form-login" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="<?=$yaz['kesinti']?>" size="1" maxlength="3" />
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Minimum Talep Tutarı:</td>
			<td height="25" width="750">&nbsp;
<input onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="min_talep" name="min_talep" type="text" class="form-login" title="Password" value="<?=number_format($yaz['min_talep'],2)?>" size="14" maxlength="2048" />
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Maximum Talep Tutarı:</td>
			<td height="25" width="750">&nbsp;
<input onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="max_talep" name="max_talep" type="text" class="form-login" title="Password" value="<?=number_format($yaz['max_talep'],2)?>" size="14" maxlength="2048" />
			</td>
		</tr>

		

		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel5_button" name="genel5_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel5_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel6') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from config where id = 1"));
?>
<script type="text/javascript">

function ip_temizle() {
$('#2genel_durum').html('<img src="new/loadingAnimation.gif"> Lütfen bekleyin...');

var soru = confirm('Devam ederseniz IP kayıtları kalıcı olarak silinecektir ?');

if (soru) {

$('#2genel_durum').html('<img src="new/loadingAnimation.gif"> Uzak sunucuyla bağlantı kuruluyor...');


$.post('remote.php?mode=ip', { username : '<?=$_SESSION['username']?>', password : '<?=$_SESSION['password']?>' }, function(response) {

				var return_val = ajaxduzelt(response);
				switch (return_val) {
				
					case 'ERROR':
						$('#2genel_durum').html('<img src="extra/notification-exclamation.gif"> Bilinmeyen bir hata oluştu.');
						break;
						
						
					case 'SUCCESS':
						$('#2genel_durum').html('<img src="extra/notification-information.gif"> IP Havuzu Başarıyla Temizlendi.');
						break;
						
					default:
					$('#2genel_durum').html(return_val);

				}		
});

} else {
$('#2genel_durum').html('<img src="extra/minus-circle.gif"> İşlem İptal Edildi !');
}


}




function ipdurum() {

$('#2genel_durum').html('<img src="new/loadingAnimation.gif"> Uzak sunucuyla bağlantı kuruluyor...');

$.post('remote.php?mode=ipcache', { username : '<?=$_SESSION['username']?>', password : '<?=$_SESSION['password']?>' }, function(response) {

				var return_val = ajaxduzelt(response);
				switch (return_val) {
				
					case 'ERROR':
					$('#2genel_durum').html('<img src="extra/notification-exclamation.gif"> Bilinmeyen bir hata oluştu.');
					break;
						
					default:
					$('#2genel_durum').html(return_val);

				}		
});
}



function kayit_temizle() {
$('#1genel_durum').html('<img src="new/loadingAnimation.gif"> Lütfen bekleyin...');

var soru = confirm('Devam ederseniz Reklam kayıtları kalıcı olarak silinecektir ?');

if (soru) {

$('#1genel_durum').html('<img src="new/loadingAnimation.gif"> Uzak sunucuyla bağlantı kuruluyor...');


$.post('remote.php?mode=kayit', { username : '<?=$_SESSION['username']?>', password : '<?=$_SESSION['password']?>' }, function(response) {

				var return_val = ajaxduzelt(response);
				switch (return_val) {
				
					case 'ERROR':
						$('#1genel_durum').html('<img src="extra/notification-exclamation.gif"> Bilinmeyen bir hata oluştu.');
						break;
						
						
					case 'SUCCESS':
						$('#1genel_durum').html('<img src="extra/notification-information.gif"> Kayıt Havuzu Başarıyla Temizlendi.');
						break;
						
					default:
					$('#1genel_durum').html(return_val);

				}		
});

} else {
$('#1genel_durum').html('<img src="extra/minus-circle.gif"> İşlem İptal Edildi !');
}


}







function kayitdurum() {

$('#1genel_durum').html('<img src="new/loadingAnimation.gif"> Uzak sunucuyla bağlantı kuruluyor...');

$.post('remote.php?mode=adscache', { username : '<?=$_SESSION['username']?>', password : '<?=$_SESSION['password']?>' }, function(response) {

				var return_val = ajaxduzelt(response);
				switch (return_val) {
				
					case 'ERROR':
					$('#1genel_durum').html('<img src="extra/notification-exclamation.gif"> Bilinmeyen bir hata oluştu.');
					break;
						
					default:
					$('#1genel_durum').html(return_val);

				}		
});
}





$(function(){


 
  $('#genel6_button').click(function() {

	
	var havuz = $('#havuz').val();



	
	

	$.post('config_save.php?mode=genel6', { havuz : havuz }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel6_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel6_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel6_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel6_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Havuz ayarlarını değiştirin yada manuel olarak Havuzları temizleyin</b></td>
		</tr>
		

		
			<tr>
			<td height="35" width="20%">&nbsp;IP Adreslerinin Saklanacağı Süre:</td>
			<td height="35" width="80%">&nbsp;<input name="havuz" id="havuz" type="text" class="form-login" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="<?=$yaz['havuz']/3600?>" size="1" maxlength="3" /> Saat</td>
		</tr>

		<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="genel6_button" name="genel6_button" class="button" value="Değişiklikleri Kaydet"></td>
			<td height="32" width="">&nbsp;</td>
		</tr>
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="genel6_durum"></span></td>
		</tr>
		
					  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Reklam Kayıt havuzunu temizlemek mi istiyorsunuz?</b></td>
		</tr>
					<tr>
			<td height="25" colspan="2" width="">&nbsp;Kayıt Havuzu: Sistemdeki Reklam Modüllerinin İstatistiklerini Tutar. Ödeme Yaptıktan Sonra Silinmesi Önerilir. MySqL sisteminin kasması kayıt sayısıyla doğrudan ilişkilidir.</td>
		    </tr>
		<tr>
			<td height="35" colspan="2" width="">&nbsp;<input type="button" onclick="kayitdurum();" value="Şimdi Temizlemelimiyim ?" class="button">&nbsp;<input type="button" onclick="kayit_temizle();" class="button" value="Kayıt havuzunu Şimdi Temizle ?"></td>
		    </tr>

		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="1genel_durum"></span></td>
		</tr>
		
		
		
							  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>IP Kayıt havuzunu temizlemek mi istiyorsunuz?</b></td>
		</tr>
					<tr>
			<td height="25" colspan="2" width="">&nbsp;IP Havuzu: Sistemde reklamları görüntüleyen yada Tıklayan kullanıcıların IP adresinin tutulduğu havuzdur.</td>
		    </tr>
								<tr>
			<td height="25" colspan="2" width="">&nbsp;Her IP adresi kendine özel süresi vardır. Süresi gelince Silinir. El ile Silmeyi Kayıtlar 1,000,000'a Ulaştığında Yapmanız Önerilir..</td>
		    </tr>
		<tr>
			<td height="35" colspan="2" width="">&nbsp;<input type="button" onclick="ipdurum();" value="Şimdi Temizlemelimiyim ?" class="button">&nbsp;<input type="button" onclick="ip_temizle();" class="button" value="IP havuzunu Şimdi Temizle?"></td>
		    </tr>

		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="2genel_durum"></span></td>
		</tr>
		
		
		</table>
<? } ?>
<? if ($mode=='genel7') { ?>
<?
$yaz = @mysql_fetch_array(@mysql_query("select * from reklam_ayarlari where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel7_button').click(function() {

	
	var pop_min_hit = $('#pop_min_hit').val();
	var pop_max_hit = $('#pop_max_hit').val();

	var splash_min_hit = $('#splash_min_hit').val();
	var splash_max_hit = $('#splash_max_hit').val();
	
	var msn_min_hit = $('#msn_min_hit').val();
	var msn_max_hit = $('#msn_max_hit').val();	
	
	var splash_min_width = $('#splash_min_width').val();
	var splash_min_height = $('#splash_min_height').val();
	
	var splash_max_width = $('#splash_max_width').val();
	var splash_max_height = $('#splash_max_height').val();
	
	
	var msn_min_width = $('#msn_min_width').val();
	var msn_min_height = $('#msn_min_height').val();
	
	var msn_max_width = $('#msn_max_width').val();
	var msn_max_height = $('#msn_max_height').val();
	

	$.post('config_save.php?mode=genel7', { splash_min_width : splash_min_width, splash_min_height : splash_min_height, splash_max_width: splash_max_width, splash_max_height :  splash_max_height, pop_min : pop_min_hit, pop_max : pop_max_hit, splash_min : splash_min_hit, splash_max : splash_max_hit, msn_min : msn_min_hit, msn_max : msn_max_hit, msn_min_width : msn_min_width, msn_min_height : msn_min_height, msn_max_width: msn_max_width, msn_max_height :  msn_max_height}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel7_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'FAILED':
					$('#genel7_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel7_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel7_durum').html(return_val);
				}
	 });

 });
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		
		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Reklam Hit ayarlarını ayarlamayı unutmayın</b></td>
		</tr>
		

		<tr>
			<td height="35" width="150">&nbsp;Minimum Popup Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="pop_min_hit" name="pop_min_hit" type="text" class="ninput" value="<?=number_format($yaz['pop_min_hit'])?>">
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Maximum Popup Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="pop_max_hit" name="pop_max_hit" type="text" class="ninput" value="<?=number_format($yaz['pop_max_hit'])?>">
			</td>
		</tr>


		
				<tr>
			<td height="35" width="150">&nbsp;Minimum Splash Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_min_hit" name="splash_min_hit" type="text" class="ninput" value="<?=number_format($yaz['splash_min_hit'])?>">
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Maximum Splash Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_max_hit" name="splash_max_hit" type="text" class="ninput" value="<?=number_format($yaz['splash_max_hit'])?>">
			</td>
		</tr>
		
		
		
				<tr>
			<td height="35" width="150">&nbsp;Minimum Msn-Popup Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_min_hit" name="msn_min_hit" type="text" class="ninput" value="<?=number_format($yaz['msn_min_hit'])?>">
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Maximum Msn-Popup Hit:</td>
			<td height="25" width="750">&nbsp;<input onblur="ExtractNumber(this,'.',',',0,false);" onkeyup="ExtractNumber(this,'.',',',0,false);" onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_max_hit" name="msn_max_hit" type="text" class="ninput" value="<?=number_format($yaz['msn_max_hit'])?>">
			</td>
		</tr>

		
		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Splash Resim boyutlarını ayarlayın</b></td>
		</tr>
		
		
		
		<tr>
			<td height="35" width="150">&nbsp;Splash Minimum Width:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_min_width" name="splash_min_width" type="text" class="ninput" value="<?=$yaz['splash_min_width']?>">&nbsp;PX</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Splash Minimum Height:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_min_height" name="splash_min_height" type="text" class="ninput" value="<?=$yaz['splash_min_height']?>">&nbsp;PX</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Splash Maximum Width:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_max_width" name="splash_max_width" type="text" class="ninput" value="<?=$yaz['splash_max_width']?>">&nbsp;PX</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Splash Maximum Height:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="splash_max_height" name="splash_max_height" type="text" class="ninput" value="<?=$yaz['splash_max_height']?>">&nbsp;PX</td>
		</tr>
		
		
		
				<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Msn-Popup Resim boyutlarını ayarlayın</b></td>
		</tr>
		
		
		
		<tr>
			<td height="35" width="150">&nbsp;Msn Minimum Width:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_min_width" name="msn_min_width" type="text" class="ninput" value="<?=$yaz['msn_min_width']?>">&nbsp;PX</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Msn Minimum Height:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_min_height" name="msn_min_height" type="text" class="ninput" value="<?=$yaz['msn_min_height']?>">&nbsp;PX</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Msn Maximum Width:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_max_width" name="msn_max_width" type="text" class="ninput" value="<?=$yaz['msn_max_width']?>">&nbsp;PX</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Msn Maximum Height:</td>
			<td height="25" width="750">&nbsp;<input onkeypress="return BlockNonNumbers(this, event,'',true,false);" id="msn_max_height" name="msn_max_height" type="text" class="ninput" value="<?=$yaz['msn_max_height']?>">&nbsp;PX</td>
		</tr>
		
		

		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel7_button" name="genel7_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel7_durum"></span></td>
		</tr>
		</table>
<? } ?>
<? if ($mode=='genel8') { ?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from extra_ayarlar where id = 1"));
?>
<script type="text/javascript">
$(function(){


 
  $('#genel10_button').click(function() {

	
	var k_s = $('#k_s').val();
	var y_k = $('#y_k').val();
	var r_k = $('#r_k').val();
	
	var y_o = $('#y_o').val();
	var r_o = $('#r_o').val();
	
	var p_m = $('#p_m').val();
	var s_m = $('#s_m').val();
	var m_m = $('#m_m').val();
	
	var c_g = $('#c_g').val();


	$.post('config_save.php?mode=genel10', { ks : k_s, yk : y_k, rk : r_k, yo : y_o, ro : r_o, pm: p_m, sm : s_m, mm : m_m, cg : c_g  }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#genel10_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları seçmediniz !');
						break;

					case 'FAILED':
					$('#genel10_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#genel10_durum').html('<img src="extra/notification-information.gif"> Ayarlar Kaydedildi.');
						break;

                    default:
                   $('#genel10_durum').html(return_val);
				}
	 });

 });
 
 
 
 
  });
</script>
<title></title>
				  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		<tr>
			<td height="45" colspan="2" width="100%">&nbsp;<b>Sistemi kendinize göre düzenlemeyi unutmayın !</b></td>
		</tr>
		

		
		<tr>
			<td height="35" width="150">&nbsp;Kayıt Sayfası:</td>
			<td height="25" width="750">&nbsp;
			<select id="k_s" class="select">
			<option <? if($yaz['k_sayfasi']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['k_sayfasi']=="1") { ?>selected<? } ?> value="1">Kullanıma Açık</option>
			</select>&nbsp;&nbsp;Kayit.php dosyasını erişime açma yada kapatma.
			</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Yayıncı Kayıt:</td>
			<td height="25" width="750">&nbsp;
			<select id="y_k" class="select">
			<option <? if($yaz['y_kayit']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['y_kayit']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>&nbsp;&nbsp;Sisteme yayıncı kayıt olmasını sağlar.
			</td>
		</tr>
		
		
		<tr>
			<td height="35" width="150">&nbsp;Reklamveren Kayıt:</td>
			<td height="25" width="750">&nbsp;
			<select id="r_k" class="select">
			<option <? if($yaz['r_kayit']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['r_kayit']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>&nbsp;&nbsp;Sisteme reklamveren kayıt olmasını sağlar.
			</td>
		</tr>
		
		<tr>
			<td height="25" colspan="2" width="100%">&nbsp;</td>
		</tr>
		
		
				<tr>
			<td height="35" width="150">&nbsp;Yayıncı Onay Türü:</td>
			<td height="25" width="750">&nbsp;
			<select id="y_o" class="select">
			<option <? if($yaz['y_otomatik']=="0") { ?>selected<? } ?> value="0">Manuel</option>
			<option <? if($yaz['y_otomatik']=="1") { ?>selected<? } ?> value="1">Otomatik</option>
			</select>&nbsp;&nbsp;Yayıncı hesaplarının onaylanma türü.
			</td>
		</tr>
		
						<tr>
			<td height="35" width="150">&nbsp;Reklamveren Onay Türü:</td>
			<td height="25" width="750">&nbsp;
			<select id="r_o" class="select">
			<option <? if($yaz['r_otomatik']=="0") { ?>selected<? } ?> value="0">Manuel</option>
			<option <? if($yaz['r_otomatik']=="1") { ?>selected<? } ?> value="1">Otomatik</option>
			</select>&nbsp;&nbsp;Reklamveren hesaplarının onaylanma türü.
			</td>
		</tr>
		
				<tr>
			<td height="25" colspan="2" width="100%">&nbsp;</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Popup Reklam Modülü:</td>
			<td height="25" width="750">&nbsp;
			<select id="p_m" class="select">
			<option <? if($yaz['popa']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['popa']=="1") { ?>selected<? } ?> value="1">Etkin</option>
			</select>&nbsp;&nbsp;Popup reklam modülünü kullanıma açın yada kapatın.
			</td>
		</tr>
		
						<tr>
			<td height="35" width="150">&nbsp;Splash Reklam Modülü:</td>
			<td height="25" width="750">&nbsp;
			<select id="s_m" class="select">
			<option <? if($yaz['splasha']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['splasha']=="1") { ?>selected<? } ?> value="1">Etkin</option>
			</select>&nbsp;&nbsp;Splash reklam modülünü kullanıma açın yada kapatın.
			</td>
		</tr>
		
						<tr>
			<td height="35" width="150">&nbsp;Msn Reklam Modülü:</td>
			<td height="25" width="750">&nbsp;
			<select id="m_m" class="select">
			<option <? if($yaz['msna']=="0") { ?>selected<? } ?> value="0">Devre Dışı</option>
			<option <? if($yaz['msna']=="1") { ?>selected<? } ?> value="1">Etkin</option>
			</select>&nbsp;&nbsp;Msn reklam modülünü kullanıma açın yada kapatın.
			</td>
		</tr>
		
				<tr>
			<td height="25" colspan="2" width="100%">&nbsp;</td>
		</tr>
		
		
		
				<tr>
			<td height="35" width="150">&nbsp;Çoğul Gösterim:</td>
			<td height="25" width="750">&nbsp;
			<select id="c_g" class="select">
			<option <? if($yaz['a_gosterim']=="0") { ?>selected<? } ?> value="0">Gösterilmesin</option>
			<option <? if($yaz['a_gosterim']=="1") { ?>selected<? } ?> value="1">Göster</option>
			</select>&nbsp;&nbsp;Sayfa Üstünde Gözüken Çoğul Gösterim Sayısı
			</td>
		</tr>
		
		
		
<? if ($yalibaba=="vurdumala") { ?>
		<tr>
			<td height="35" width="150">&nbsp;Kullanılacak Adres:</td>
			<td height="25" width="750">&nbsp;
			<select id="" class="select">
			<option <? if($yaz['']=="0") { ?>selected<? } ?> value="0">Aktif Değil</option>
			<option <? if($yaz['']=="1") { ?>selected<? } ?> value="1">Aktif</option>
			</select>
			</td>
		</tr>
		
<? } ?>
		<tr>
			<td height="35" width="150">&nbsp;<input type=button  id="genel10_button" name="genel10_button" class="button" value="Bilgileri Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="45" width="100%" colspan="2">&nbsp;<span id="genel10_durum"></span></td>
		</tr>
		</table>
<? } ?>