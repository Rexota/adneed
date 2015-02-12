<?php
include("db.php");

$title = "Şifremi Unuttum - ".$sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
<script type="text/javascript">

$(function(){

   
 $('#sifre_button').click(function() {
 
    var username  = $('#username').val();
    var email = $('#email').val();


	

	$.post('password.php', { username : username, email : email}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#sifre_durum').html('<img src="new/yanlis.gif"> Kullanıcı adınızı yada Email adresinizi girmediniz !');
						break;
						
						
					case 'NOT':
						$('#sifre_durum').html('<img src="extra/notification-exclamation.gif"> Girdiğiniz bilgilerle eşleşen kayıt bulunamadı !');
						break;

					case 'FAILED':
					$('#sifre_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#sifre_durum').html('<img src="extra/notification-information.gif"> Şifrenizi sıfırlama önergeleri email adresinize yollanmıştır..');
						setTimeout($('#sifre_form').slideUp(), 2500);
						break;

                    default:
                   $('#sifre_durum').html(return_val);
				}
	 });


			

 });
 
 
 
 
 
 

 
  });

</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>İnsanlık halidir, Şifremizi unutabiliriz..</h3>		

          	<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
				<tr>
					<td id="sifre_form" height="30">
					
					<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="35" width="196">&nbsp;Kullanıcı Adınız:</td>
		<td height="35" width="184">&nbsp;<input type="text" name="username" id="username" class="ninput"></td>
		<td height="35" width="1021">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="196">&nbsp;Eposta Adresiniz:</td>
		<td height="35" width="184">&nbsp;<input type="text" name="email" id="email" class="ninput"></td>
		<td height="35" width="1021">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="196">&nbsp;İşlem : </td>
		<td height="35" width="1205" colspan="2">&nbsp;<input type="button" id="sifre_button" name="sifre_button" value=" Şifremi Gönder " class="button"></td>
	</tr>
</table>
					
					</td>
				</tr>
				<tr>
					<td height="45">&nbsp;<span id="sifre_durum"></span></td>
				</tr>
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
			</table>







          </div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
<?
include("alt.php");	
?>