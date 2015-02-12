<?php
include("db.php");

$title = "İletişim - ".$sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
<script type="text/javascript">

$(function(){

   
 $('#iletisim_button').click(function() {
 
    var ad  = $('#ad').val();
	var soyad  = $('#soyad').val();
    var tel = $('#tel').val();
    var email = $('#email').val();
	var mesaj = $('#mesaj').val();
	var konu = $('#konu').val();

	

	$.post('save.php', { ad : ad, soyad: soyad, tel : tel, email : email, mesaj : mesaj, konu : konu}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#iletisim_durum').html('<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;


					case 'FAILED':
					$('#iletisim_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#iletisim_durum').html('<img src="extra/notification-information.gif"> Teşekkür ederiz.. En kısa sürede size ulaşacağız..');
						setTimeout($('#iletisim_form').slideUp(), 2500);
						break;

                    default:
                   $('#iletisim_durum').html(return_val);
				}
	 });


			

 });
 
 
 
 
 
 

 
  });

</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Bizimle iletişime geçmeye hazırmısınız ?</h3>		

          	<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
				<tr>
					<td id="iletisim_form" height="30">
					
					<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="35" width="13%">&nbsp;Adınız:</td>
		<td height="30" width="">&nbsp;<input type="text" name="ad" id="ad" class="ninput"></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="">&nbsp;Soyadınız:</td>
		<td height="30" width="">&nbsp;<input type="text" name="soyad" id="soyad" class="ninput"></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="">&nbsp;Telefonunuz:</td>
		<td height="30" width="">&nbsp;<input type="text" name="tel" id="tel" class="ninput"></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="">&nbsp;Eposta Adresiniz:</td>
		<td height="30" width="">&nbsp;<input type="text" name="email" id="email" class="ninput"></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
		<tr>
		<td height="35" width="">&nbsp;Konu:</td>
		<td height="30" width="">&nbsp;<input type="text" name="konu" id="konu" class="ninput"></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="">&nbsp;Mesajınız:</td>
		<td height="110" width="">&nbsp;<textarea id="mesaj" class="ninput" style="width:350px;height:100px;" name="mesaj"></textarea></td>
		<td height="30" width="">&nbsp;</td>
	</tr>
	<tr>
		<td height="30" width="">&nbsp;İşlem : </td>
		<td height="30" width="" colspan="2">&nbsp;<input type="button" id="iletisim_button" name="iletisim_button" value=" Mesajımı Gönder " class="button"></td>
	</tr>
</table>
					
					</td>
				</tr>
				<tr>
					<td height="45">&nbsp;<span id="iletisim_durum"></span></td>
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