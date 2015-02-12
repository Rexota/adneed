<?php
include("db.php");

$title = "Ödeme Taleplerim - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_yayinci.php");
include('ust.php');


?>
<script type="text/javascript">




 function talepsil(id) {
 
 	$.post('inc_yayinci/talep.php?mode=sil', {id: id}, function(response) {
	
	var return_val = ajaxduzelt(response);
			
	 });
 
 talepyenile();
 }
 
 



function talepyenile() { $('#odeme_taleplerim').load('inc_yayinci/talep.php?mode=see'); }


$(function(){
talepyenile();
});


</script>



<script type="text/javascript">
 $(function(){

   $('#talep_button').click(function() {
  
 
	var istek = $('#istek').val();
	var hesap_no = $('#hesap_no').val();
	

	$.post('inc_yayinci/talep.php?mode=yeni', {istek : istek, hesap_no : hesap_no}, function(response) {
 
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#talep_durum').html('<img src="extra/notification-slash.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'CLOSED':
						$('#talep_durum').html('<img src="extra/minus-circle.gif"> Ödeme Talepleri henüz açılmamış !');
						break;
						
					case 'MIN':
						$('#talep_durum').html('<img src="extra/notification-exclamation.gif"> Talep edeceğiniz tutar <?=number_format($min_talep,2)?> TL den az olamaz !');
						break;

					case 'MAX':
						$('#talep_durum').html('<img src="extra/notification-exclamation.gif"> Talep edeceğiniz tutar <?=number_format($max_talep,2)?> TL den fazla olamaz !');
						break;

					case 'PAY':
						$('#talep_durum').html('<img src="extra/notification-exclamation.gif"> Bakiyeniz yetersiz !');
						break;
						
					case 'FAILED':
						$('#talep_durum').html('<img src="extra/notification-exclamation.gif"> Kritik bir sistem hatası oluştu !');
						break;	
						
					case 'SUCCESS':
						$('#talep_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("talepeklendi();", 1500);
						break;
						
						default:
						$('#talep_durum').html(return_val);
						
				}
				
				
	 });


			

 });
 
 
 });   
 
 
 function talepeklendi() {
$('#odeme_talep').slideUp();
$('#istek').val('');
$('#talep_durum').html('');
talepyenile();
}

</script>

		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Ödeme Talepleriniz</h3>

			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
		
			<td height="45" colspan="7">Minimum Talep Tutarı: <?=number_format($min_talep,2)?> TL&nbsp;Maximum Talep Tutarı: <?=number_format($max_talep,2)?> TL</td>
		</tr>
		<tr>
			<td height="25" width="224" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Ödeme yapılacak banka</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">
			&nbsp;Tutar</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">
			&nbsp;Kesinti %<?=$kesinti?></td>
			<td height="25" width="117" style="border: 1px solid #C0C0C0">
			&nbsp;Net Ödenecek</td>
			<td height="25" width="133" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="66" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
		</tr>	
		<tr>
			<td height="32" id="odeme_taleplerim" colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td height="55" colspan="7"><? if ($odeme_talep=="1") { ?>&nbsp;<input onclick="$('#odeme_talep').slideDown();" type="button" class="button" value=" Ödeme Talep Et "><? } ?>&nbsp;<input onclick="talepyenile();" type="button" class="button" value=" Listeyi Yenile "></td>
		</tr>
		<tr>
			<td height="25" colspan="7">
			<table border="0" width="100%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td>


					
					
					
<table id="odeme_talep" style="display:none;" border="0" width="100%" cellpadding="0">
	<tr>
		<td height="30">
		<p><b>Ödeme Talep Paneli</b></td>
	</tr>
	<tr>
		<td height="25">
			
			<table border="0" width="100%" id="table8" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="35" width="160">&nbsp;Talep Ettiğiniz Tutar:</td>
		<td height="35" width="400">&nbsp;<input onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="istek" name="istek" type="text" class="form-login" title="Password" value="" size="14" maxlength="2048" /> Hesap Bakiyeniz: <?=number_format(hesap_bakiye(),2)?> TL</td>
					</tr>
				<tr>
		<td height="35" width="160">&nbsp;Banka Hesabınız</td>
		<td height="35" width="400">&nbsp;<select class="form-login" id="hesap_no" name="hesap_no" size="1">

<option value="0">Seçiniz..</option>		
<?	
$result = @mysql_query("select * from banka where user = '$_SESSION[userid]' order by id desc");

if (mysql_num_rows($result)<1) {
?>
<? 
} else {

?>


<?
	 
while(list($id, $banka, $hesap, $sube, $ads, $iban, $user ) = @mysql_fetch_row($result))
{
?>
<option value="<?=$id?>"><?=$banka?>&nbsp;-&nbsp;<?=$ads?></option>
<? }} ?>
</select>
		</td>
				</tr>
				<tr>
		<td height="35" width="160">&nbsp;İşlem</td>
		<td height="35" width="400" align="left">&nbsp;<input type="button" id="talep_button" name="talep_button" class="button" value=" Talep Et "> <input onclick="$('#odeme_talep').slideUp();" type="button" class="button" value=" Vazgeç "></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="talep_durum"></span></td>
					</tr>
					</table>
			
		</td>
	</tr>
	</table>








					</td>
				</tr>
			</table>
			</td>
		</tr>
		</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>