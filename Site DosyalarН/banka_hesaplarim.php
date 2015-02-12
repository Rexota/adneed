<?php
include("db.php");

$title = "Banka Hesaplarım - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_yayinci.php");
include('ust.php');
?>
<script type="text/javascript">

 function bankasil(id) {
 
 	$.post('inc_yayinci/hesap.php?mode=sil', {id: id}, function(response) {
	
	var return_val = ajaxduzelt(response);
			
	 });
 
 hesapyenile();
 }
 
 
  function hesapyenile() {

 $('#banka_hesaplarim').load('inc_yayinci/hesap.php?mode=see');

 }
 
 function islembitti() {
 	$('#banka_adi').val('');
	$('#sube_kodu').val('');
	$('#iban').val('');
	$('#hesapno').val('');
	$('#ad').val('');
	
	$('#hesap_durum').html('');
	$('#hesap_ekle_panel').slideUp();
	
	hesapyenile();
 }



$(function(){
hesapyenile();




  $('#hesap_eklebutton').click(function() {
  
  

	var banka_adi = $('#banka_adi').val();
	var sube_kodu = $('#sube_kodu').val();
	var iban = $('#iban').val();
	var hesapno = $('#hesapno').val();
	var ad = $('#ad').val();
	

	$.post('inc_yayinci/hesap.php?mode=ekle', {banka : banka_adi, sube : sube_kodu, iban : iban, ad : ad, hesap : hesapno}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#hesap_durum').html('<img src="new/yanlis.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'SUCCESS':
						$('#hesap_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("islembitti();", 2500);
						break;
						
				  default:
                  $('#hesap_durum').html(return_val);
				}
				
				
	 });


			

 });
 
 
});



</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Banka Hesaplarınız Aşağıdadır</h3>
			
			  <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>
			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" width="227" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Banka</td>
			<td height="25" width="206" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Hesap sahibi</td>
			<td height="25" width="65" style="border: 1px solid #C0C0C0">&nbsp;Şube</td>
			<td height="25" width="110" style="border: 1px solid #C0C0C0">
			&nbsp;Hesap No</td>
			<td height="25" width="285" style="border: 1px solid #C0C0C0">&nbsp;IBAN</td>
			<td height="25" width="26" style="border: 1px solid #C0C0C0">
			<p align="center">
			<img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		</tr>
		<tr>
		
		
	    <td id="banka_hesaplarim" colspan="6">&nbsp;</td>
		</tr>
		<tr>
		

			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" colspan="6">&nbsp;<input type="button" onclick="$('#hesap_ekle_panel').slideDown();"  class="button" value="Yeni Hesap Ekle">&nbsp;<input type="button" onclick="hesapyenile();"  class="button" value="Listeyi Yenile"></td>
		</tr>
		<tr>
			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		</table>
			
			</div>
			
			

<table id="hesap_ekle_panel" style="display:none;" border="0" width="920" cellpadding="0">
	<tr>
		<td height="30">
		<p>&nbsp;<b><font style="font-size:13px;">Banka Hesabı Ekleme Paneli</font></b></td>
	</tr>
	<tr>
		<td height="25">
			<table border="0" width="90%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="35" width="104">&nbsp;Banka Adı:</td>
		<td height="35" width="234">&nbsp;<input id="banka_adi" name="banka_adi" type="text" class="form-login" title="Password" value="" size="30" maxlength="2048" /></td>
				</tr>
				<tr>
		<td height="35" width="104">&nbsp;Şube Kodu:</td>
		<td height="35" width="444">&nbsp;<input id="sube_kodu" name="sube_kodu" type="text" class="form-login" title="Password" value="" size="30" maxlength="2048" /></td>
				</tr>
				<tr>
		<td height="35" width="104">&nbsp;IBAN:</td>
		<td height="35" width="234">&nbsp;<input id="iban" name="iban" type="text" class="form-login" title="Password" value="" size="30" maxlength="2048" /></td>
				</tr>
				<tr>
		<td height="35" width="104">&nbsp;Hesap No:</td>
		<td height="35" width="234">&nbsp;<input id="hesapno" name="hesapno" type="text" class="form-login" title="Password" value="" size="30" maxlength="2048" /></td>
				</tr>
				<tr>
		<td height="35" width="104">&nbsp;Hesap Sahibi:</td>
		<td height="35" width="234">&nbsp;<input id="ad" name="ad" type="text" class="form-login" title="Password" value="" size="30" maxlength="2048" /></td>
				</tr>
				<tr>
		<td height="35" width="104">&nbsp;İşlem</td>
		<td height="35" width="234" align="left">&nbsp;<input type="button" id="hesap_eklebutton" class="button" value="Ekle"> <input onclick="$('#hesap_ekle_panel').slideUp();" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="hesap_durum"></span></td>
					</tr>
					<tr>
		<td height="25" colspan="2">&nbsp;</td>
					</tr>
					</table>
			</div>
		</td>
	</tr>
	</table>








			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>