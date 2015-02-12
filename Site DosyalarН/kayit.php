<?php
include("db.php");

$title = "Kayıt Olun - ".$sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
<script type="text/javascript">

function kabul() {
var onay = document.getElementById('register_onay').checked;
var button = document.getElementById('register_button');

if (onay==true) {
button.disabled=false;
} else {
button.disabled=true;
}


}

$(function(){

   
 $('#register_button').click(function() {
 
    var adiniz  = $('#adiniz').val();
    var tel = $('#tel').val();
    var email = $('#email').val();
    var tur = $('#tur').val();


	var username = $('#username').val();
	var password1 = $('#password1').val();
	var password2 = $('#password2').val();
	

	$.post('register.php', {username : username, password1 : password1, password2 : password2, adiniz : adiniz, tel : tel, email : email, tur : tur}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#register_durum').html('<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;


					case 'EMAIL':
						$('#register_durum').html('<img src="extra/notification-exclamation.gif"> Bu Email Adresi Kullanımda !');
						break;

					case 'USER':
						$('#register_durum').html('<img src="extra/notification-exclamation.gif"> Bu Kullanıcı Adı Kullanımda !');
						break;

					case 'PASS':
						$('#register_durum').html('<img src="extra/notification-exclamation.gif"> Şifreleriniz Uyuşmuyor !');
						break;


					case 'FAILED':
					$('#register_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#register_durum').html('<img src="extra/notification-information.gif"> Kaydınız Tamamlanmıştır. Hemen şimdi giriş yapabilirsiniz..');
						setTimeout($('#register_form').slideUp(), 2500);
						break;
						
					case 'UNSUCCESS':
						$('#register_durum').html('<img src="extra/notification-exclamation.gif"> Kaydınız Tamamlanmıştır. Hesabınız onaylandıktan sonra giriş yapabilirsiniz..');
						setTimeout($('#register_form').slideUp(), 2500);
						break;

                    default:
                   $('#register_durum').html(return_val);
				}
	 });


			

 });
 
 
 
 
 
 
 
 
 
  });

</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yayıncımız yada Reklam verenimiz olmak İstermisiniz ?</h3>		

<? if ($kayit_sayfasi==0) {

?>

         	<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="20">&nbsp;</td>
				</tr>
				<tr>
					<td height="30">&nbsp;<img src="extra/notification-exclamation.gif"> Bu sayfa yönetici tarafından devre dışı bırakılmıştır.</td>
				</tr>

				</table>

				

<? } else { ?>





          	<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
				<tr>
					<td id="register_form" height="30">
					
					<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="30" width="15%">&nbsp;Adınız ve Soyadınız:</td>
		<td height="30" width="25%">&nbsp;<input type="text" name="adiniz" id="adiniz" class="form-login"></td>
		<td height="30" width="60%"><span style="font-size: 8pt">&nbsp;Gerçek 
		adınız ve soyadınız.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Telefonunuz:</td>
		<td height="30" width="">&nbsp;<input type="text" name="tel" id="tel" class="form-login"></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Size 
		ulaşmamız için telefon numaranız.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Eposta Adresiniz:</td>
		<td height="30" width="">&nbsp;<input type="text" name="email" id="email" class="form-login"></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Şifrenizi 
		unuttuğunuzda kullanacağınız eposta adresi.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;</td>
		<td height="30" width="">&nbsp;</td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Kullanıcı Adınız:</td>
		<td height="30" width="">&nbsp;<input type="text" name="username" id="username" class="form-login"></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Sisteme 
		giriş yaparken kullanacağınız takma ad.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Parolanız:</td>
		<td height="30" width="">&nbsp;<input type="password" name="password1" id="password1" class="form-login"></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Giriş 
		parolanız.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Parola Tekrarı:</td>
		<td height="30" width="">&nbsp;<input type="password" name="password2" id="password2" class="form-login"></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Parolanızın 
		doğrulaması.</span></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;</td>
		<td height="30" width="">&nbsp;</td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;Kayıt Türü: </td>
		<td height="30" width="">&nbsp;<select id="tur" name="tur" class="select">
		<? if ($yayinci_kayit!=0) { ?><option value="1">Yayıncı</option><? } ?>
		<? if ($reklamveren_kayit!=0) { ?><option value="2">Reklamveren</option><? } ?>
		</select></td>
		<td height="30" width=""><span style="font-size: 8pt">&nbsp;Sistemimizi 
		nasıl kullanacağınızı gösteren seçenek.</span></td>
	</tr>
		<tr>
		<td height="30" width="">&nbsp;Kullanım Şartları : </td>
		<td height="30" width="" colspan="2">&nbsp;<input type="checkbox" onclick="kabul();" id="register_onay"> <a href="kullanim_sartlari.php" target="_blank">Kullanım Şartları</a>'nı okudum ve kabul ediyorum.</a></td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;İşlem : </td>
		<td height="30" width="" colspan="2">&nbsp;<input type="button" id="register_button" disabled name="register_button" value="Üyelik Kaydını Tamamla" class="button"></td>
	</tr>
</table>
					
					</td>
				</tr>
				<tr>
					<td height="45">&nbsp;<span id="register_durum"></span></td>
				</tr>
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
			</table>




<? } ?>


          </div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
<?
include("alt.php");	
?>