<?php
include("db.php");

$title = "Bilgilerimi Düzenle - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include('ust.php');
?>
<script type="text/javascript">
$(function() {


 
   $('#bilgi_button').click(function() {
  
  

	var email = $('#email').val();
	var telefon = $('#tel').val();
	var eski = $('#eski').val();
	var parola = $('#parola').val();
	

	$.post('inc/bilgilerim.php?mode=save', {email : email, telefon : telefon, eski : eski, parola : parola}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ET':
						$('#bilgi_durum').html('<img src="extra/notification-slash.gif"> Email yada Telefonunuzu girmediniz !');
						break;


					case 'EM':
						$('#bilgi_durum').html('<img src="extra/notification-exclamation.gif"> Bu Email adresi zaten kullanımda !');
						break;


					case 'PA':
						$('#bilgi_durum').html('<img src="extra/notification-slash.gif"> Yeni şifrenizi girmediniz !');
						break;


					case 'AP':
						$('#bilgi_durum').html('<img src="extra/notification-slash.gif"> Eski şifrenizi girmediniz !');
						break;


					case 'PASS':
						$('#bilgi_durum').html('<img src="extra/notification-exclamation.gif"> Eski şifrenizi yanlış girdiniz !');
						break;



					case 'SUCCESS':
					$('#eski').val('');
					$('#parola').val('');
				    
				    $('#bilgi_durum').html('<img src="extra/notification-information.gif"> Bilgileriniz güncellendi.');
						
						break;
						
						                                         default:
                                         $('#bilgi_durum').html(return_val);
				}
				
				
	 });


			

 });


});



</script>


		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Bilgilerim</h3>

<?
$yaz = mysql_fetch_array(mysql_query("select * from user where id = '$_SESSION[userid]'"));
?>
			  
			  
			  
			  
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="35" width="250">&nbsp;Adınız Soyadınız:</td>
			<td height="25" width="250"><b>&nbsp;<?=$yaz['ad']?></b></td>
		</tr>
		<tr>
			<td height="35" width="250">&nbsp;Kullanıcı adınız:</td>
			<td height="25" width="250"><b>&nbsp;<?=$yaz['username']?></b></td>
		</tr>
		<tr>
			<td height="35" width="250">&nbsp;Kimliğiniz</td>
			<td height="25" width="250"><font color="#FF0000"><b>&nbsp;<?=$yaz['kimlik']?></b></font></td>
		</tr>
		<tr>
			<td height="35" width="250">&nbsp;Eposta Adresiniz:</td>
			<td height="25" width="250">&nbsp;<input name="email" id="email" class="form-login" title="Password" value="<?=$yaz['email']?>" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
	
			<td height="35" width="250">&nbsp;Telefon:</td>
			<td height="25" width="250">&nbsp;<input name="tel" id="tel" class="form-login" title="Password" value="<?=$yaz['telefon']?>" size="22" maxlength="2048" /></td>
		</tr>
		<tr>

			<td height="35" width="250">&nbsp;Eski Şifreniz:</td>
			<td height="25" width="250">&nbsp;<input name="eski" id="eski" class="form-login" type="password" title="Password" value="" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
				<td height="35" width="250">&nbsp;Yeni Şifreniz:</td>
			<td height="25" width="250">&nbsp;<input name="parola" id="parola" type="password" class="form-login" title="Password" value="" size="22" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="250">&nbsp;<input type=button  id="bilgi_button" name="bilgi_button" class="button" value="Bilgilerimi Güncelle"></td>
			<td height="32" width="250">&nbsp;</td>
		</tr>
		<tr>
			<td height="35" width="500" colspan="2">&nbsp;<span id="bilgi_durum"></span></td>
		</tr>
		</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>