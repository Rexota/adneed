<?php
include("db.php");

$title = "Şifre Sıfırlama Sayfası - ".$sitetitle;
$keywords = "";
$description = "";

include('ust.php');

$uid = sql($_GET['uid']);
$cid = sql($_GET['cid']);

if ($uid=='' or $cid=='') {
@header("location: index.php");
} else {
$baba = @mysql_query("select * from user where id = '$uid' and password = '$cid'");
$yalcin = @mysql_fetch_array($baba);
$yali = @mysql_num_rows($baba);
if ($yali < 1 ) {
@header("Location: index.php");
}
}

?>
<script type="text/javascript">

$(function(){

   
 $('#sifre_button').click(function() {
 
    var sifre1  = $('#sifre1').val();
    var sifre2  = $('#sifre2').val();
	var uid  = '<?=$uid?>';
	var cid  = '<?=$cid?>';

	

	$.post('password2.php', { sifre1 : sifre1 , sifre2 : sifre2 , uid : uid, cid : cid}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#sifre_durum').html('<img src="new/yanlis.gif"> Şifrenizi girmediniz !');
						break;
						

					case 'FAILED':
					$('#sifre_durum').html('<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;
						
					case 'PASS':
						$('#sifre_durum').html('<img src="extra/notification-exclamation.gif"> Şifreleriniz Uyuşmuyor !');
						break;

					case 'SUCCESS':
						$('#sifre_durum').html('<img src="extra/notification-information.gif"> Şifrenizi başarıyla sıfırladınız.. Hemen giriş yapabilirsiniz..');
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
			<h3>Şifrenizi Sıfırlıyorsunuz</h3>		

          	<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="30">&nbsp;</td>
				</tr>
				<tr>
					<td id="sifre_form" height="30">
					
					<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="35" width="196">&nbsp;Eposta Adresiniz:</td>
		<td height="35" width="184">&nbsp;<b><?=$yalcin[email]?></b></td>
		<td height="35" width="1021">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="196">&nbsp;Şifreniz:</td>
		<td height="35" width="184">&nbsp;<input type="password" name="sifre1" id="sifre1" class="ninput"></td>
		<td height="35" width="1021">&nbsp;</td>
	</tr>
	
		<tr>
		<td height="35" width="196">&nbsp;Şifre Tekrar:</td>
		<td height="35" width="184">&nbsp;<input type="password" name="sifre2" id="sifre2" class="ninput"></td>
		<td height="35" width="1021">&nbsp;</td>
	</tr>
	<tr>
		<td height="35" width="196">&nbsp;İşlem : </td>
		<td height="35" width="1205" colspan="2">&nbsp;<input type="button" id="sifre_button" name="sifre_button" value=" Şifremi Değiştir " class="button"></td>
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