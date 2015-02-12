<?php
include("db.php");

$title = "Destek Biletleri - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_editor.php");
include('ust.php');

$mode = sql($_GET['mode']);
?>
		
<? if ($mode=="see") { ?>
<script type="text/javascript">




 
 
 function ticket_acik() {
 
 $('#desteklerim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#desteklerim').load('inc_editor/destek.php?mode=acik');
 }
 
 
 function ticket_kapali() {
 $('#desteklerim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#desteklerim').load('inc_editor/destek.php?mode=kapali');
 
 }


 function ticket_tumu() {
 $('#desteklerim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#desteklerim').load('inc_editor/destek.php?mode=tumu');
 
 }


 

</script>

		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Destek Biletleri</h3>
			
			  <table border="0" width="515" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="15" colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td height="25" colspan="4">&nbsp;<input onclick="ticket_acik()" type="button" class="button" value="Açık Ticketler">&nbsp;<input onclick="ticket_kapali()" type="button" class="button" value="Kapalı Ticketler">&nbsp;<input onclick="ticket_tumu()" type="button" class="button" value="Tümünü Göster"></td>
				</tr>
				<tr>
					<td height="15" colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td height="25" width="224" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Destek Başlığı</td>
					<td height="25" width="79" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
					<td height="25" width="57" style="border: 1px solid #C0C0C0">&nbsp;Mesajlar</td>
					<td height="25" width="152" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
				</tr>
				<tr>
					<td id="desteklerim" height="45" colspan="4">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="25" colspan="4">&nbsp;</td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php"); ?>


<? } ?>















<? if ($mode=="read") { ?>

		<?
		
		$id = sql($_GET['id']);
		
		if ($id=='') {
		@header("Location: destek_biletleri.php?mode=see");
		}
		
		$yali = mysql_query("select * from ticketler where id = '$id'");
		$yazyali = mysql_fetch_array($yali);
		
		if (mysql_num_rows($yali)<1) {
		@header("Location: destek_biletleri.php?mode=see");
		}
		
		
		$bul2 = mysql_fetch_array(mysql_query("select * from ticket_cevaplar where ticket_id = '$yazyali[id]' limit 1"));
		?>

		
		<div id="content-top"></div>
		<div id="content-middle">
		

		
		
<script type="text/javascript">


  function mesajyenile() {

 $('#mesajlar').load('inc_editor/destek2.php?id=<?=$id?>');

 }



$(function(){
mesajyenile();
});



</script>



<script type="text/javascript">

$(function() {


  $('#cevap_button').click(function() {
  
  

	var mesaj = $('#mesaj').val();
    var ticket = <?=$id?>;
	

	$.post('inc_editor/destek.php?mode=cevap', {mesaj : mesaj, ticket : ticket}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#cevap_durum').html('<img src="new/yanlis.gif"> Mesaj Yazmadınız !');
						break;
						
					case 'FAILED':
						$('#cevap_durum').html('<img src="new/yanlis.gif"> Kritik hata!');
						break;
						
					case 'SUCCESS':
						$('#cevap_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("mesajyenile();", 2500);
						$('#mesaj').val('');
						$('#cevap_durum').html('<img src="extra/notification-information.gif"> Mesajınız gönderildi..');
						break;
						
						                                         default:
                                         $('#cevap_durum').html(return_val);
				}
				
				
	 });


			

 });



});






</script>

<div class="columnz">
			<h3><?=$yazyali[baslik]?></h3>
			
	

			  <table border="0" width="800" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="25" colspan="4">&nbsp;</form></td>
				</tr>
				<tr>
					<td height="29" width="125" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Ticket 
					Sahibi:&nbsp;<font color="#008000"><?=$bul2['yazan']?></font></td>
					<td height="29" width="125" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Kimlik:&nbsp;<?=$bul2[yazan_tur]?></td>
					<td height="29" width="125" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Tarih:&nbsp;<?=date("d.m.Y H:i:s", $tarih)?></td>
					<td height="29" width="125" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Ticket 
					Durumu:&nbsp;<? if ($yazyali[durum]==1) { ?><font color="#008000">Açık</font><? } else { ?><font color="#FF0000">Kapalı</font><? } ?></td>
				</tr>
				<tr>
					<td width="" id="mesajlar" style="border: 1px solid #f4f3f4; padding-top: 1px" colspan="4">
				</td>
				</tr>
		<? if ($yazyali[durum]=="0") { ?>
		<tr>
					<td height="25" width="499" style="border: 1px solid #f4f3f4" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="16" height="16"> 
					Sorunu kısa sürede çözdüğünüz için teşekkürler.</td>
				</tr>
				
	  <? } ?>
	<tr>
					<td height="25" colspan="4">
					</tr>

				<tr>
					<td height="25" colspan="4">
					<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse;">
						<tr>
							
								<td height="40" width="338" colspan="2" style="border-top:1px dashed #C0C0C0; "><b>&nbsp; 
									<font color="#000080">Hızlı Cevap yaz</font></b></td>
						</tr>
						<tr>
							<td height="25" width="104" valign="top">&nbsp;Mesaj:</td>
							<td height="80" width="234" valign="top">
							<textarea id="mesaj" class="ninput" style="width:350px;height:120px;" name="mesaj"></textarea></td>
						</tr>
						<tr>
							<td height="25" width="104">&nbsp;İşlem</td>
							<td height="55" width="234" align="left">&nbsp;<input type="button" id="cevap_button" name="cevap_button" class="button" value="Hızlı Cevap Yaz"></td>
						</tr>
						<tr>
								<td height="30" colspan="2">&nbsp;<span id="cevap_durum"></span></td>
						</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); } ?>