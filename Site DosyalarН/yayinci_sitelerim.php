<?php
include("db.php");

$title = "Web Sitelerim - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_yayinci.php");
include('ust.php');
?>
<script type="text/javascript">

$(function(){


   

 
 
 
   $('#site_eklebutton').click(function() {
  
  

	var site_adresi = $('#site_adresi').val();
	var cat = $('#cat').val();
	

	$.post('inc_yayinci/sitelerim.php?mode=ekle', {site : site_adresi, cat : cat}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#site_durum').html('<img src="extra/notification-slash.gif"> Site adresi yada Kategori hatalı !');
						break;


					case 'SIT':
						$('#site_durum').html('<img src="extra/notification-exclamation.gif"> Site adresiniz hatalıdır !');
						break;

					case 'SITE':
						$('#site_durum').html('<img src="extra/notification-exclamation.gif"> Bu site daha önceden eklenmiş !');
						break;
						
						
					case 'SUCCESS':
						$('#site_durum').html('<img src="new/loadingAnimation.gif"> İşlem yapılıyor... Bekleyin...');
						setTimeout("sitestep2();", 1500);
						break;
						
						default:
						$('#site_durum').html(return_val);
				}
				
				
	 });


			

 });
 
 
});


function sitestep2() {

document.getElementById('site_ekle_panel').style.display='none';
$('#site_adresi').val('');
$('#site_durum').html('');
document.getElementById('site_ekle_panel2').style.display='block';
$('#site_onayla_2').load('inc_yayinci/sitelerim.php?mode=onay');
}


function sitestep3() {

document.getElementById('site_ekle_panel2').style.display='none';
$('#site2_durum').html('');
document.getElementById('site_ekle_panel3').style.display='block';
$('#site_onayla_3').load('inc_yayinci/sitelerim.php?mode=onay2');
}



function yenisiteekle() {

document.getElementById('site_ekle_panel').style.display='block';
document.getElementById('site_ekle_panel2').style.display='none';
document.getElementById('site_ekle_panel3').style.display='none';
}



function hepsinikapat() {
document.getElementById('site_ekle_panel').style.display='none';
document.getElementById('site_ekle_panel2').style.display='none';
document.getElementById('site_ekle_panel3').style.display='none';
}



 
 
  function siteyenile() {

 $('#web_sitelerim').load('inc_yayinci/sitelerim.php?mode=see');


	$('#site_adresi').val('');
	$('#site_durum').html('');
 }



$(function(){
siteyenile();
});



</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Web Siteleriniz Aşağıdadır</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		    <tr>
			<td id="kod_alani" height="45" colspan="8">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" width="20%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Site Adresi</td>
			
			<td height="25" width="15%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Eklenme Tarihi</td>
			
			<td height="25" width="10%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Kategorisi</td>
			
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Popup</td>
			
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Splash</td>
			
			<td height="25" width="11%" style="border: 1px solid #C0C0C0">&nbsp;Msn Pop</td>
			
			<td height="25" width="13%" style="border: 1px solid #C0C0C0">&nbsp;PPC Banner</td>
			
			<td height="25" width="5%" style="border: 1px solid #C0C0C0"><p align="center"><img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		
		</tr>
		
		<tr>
	    <td id="web_sitelerim" colspan="8">&nbsp;</td>
		</tr>
		<tr>
		

			<td height="25" colspan="8">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" colspan="8">&nbsp;<input type="button" onclick="yenisiteekle();"  class="button" value="Yeni Site Ekle">&nbsp;<input type="button" onclick="siteyenile();"  class="button" value="Siteleri Yenile"></td>
		</tr>
		<tr>
			<td height="25" colspan="8">&nbsp;</td>
		</tr>
		</table>
			
			</div>
			
			

<table id="site_ekle_panel" style="display:none;" border="0" width="920" cellpadding="0">
	<tr>
		<td height="30">
		<p>&nbsp;<b><font style="font-size:13px;">Web Sitesi Ekleme Paneli</font></b></td>
	</tr>
	<tr>
		<td height="25">
			<table border="0" width="90%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
		<td height="35" width="104">&nbsp;Site Adresi:</td>
		<td height="35" width="664">&nbsp;<input id="site_adresi" name="site_adresi" type="text" class="ninput" value=""> Örnek: http://www.google.com.tr</td>
				</tr>
				
				<tr>
		<td height="35" width="104">&nbsp;Kategori Seçin:</td>
		<td height="35" width="664">&nbsp;<select name="cat" id="cat" size="1" class="select">
		<?	
$result = @mysql_query("select * from kategoriler");

if (mysql_num_rows($result)<1) {
?>

<option value="0">Kategori Bulunamadı !</option>	
<? 
} else {
 
while($yaz = @mysql_fetch_array($result))
{

?>
<option value="<?=$yaz[id]?>"><?=$yaz[name]?></option>

<? } 
}?>
</select></td>
				</tr>
				
				
		<td height="25" width="104">&nbsp;İşlem</td>
		<td height="25" width="234" align="left">&nbsp;<input type="button" id="site_eklebutton" class="button" value="Devam"> <input onclick="document.getElementById('site_ekle_panel').style.display='none';" type="button" class="button" value="Vazgeç"></td>
					</tr>
					<tr>
		<td height="55" colspan="2">&nbsp;<span id="site_durum"></span></td>
					</tr>
					<tr>
		<td height="25" colspan="2">&nbsp;</td>
					</tr>
					</table>
			</div>
		</td>
	</tr>
	</table>




<table id="site_ekle_panel2" style="display:none;" border="0" width="920" cellpadding="0">
	<tr>
		<td height="30">
		<p>&nbsp;<b><font style="font-size:13px;">Web Sitesi Onaylama Yöntemi</font></b></td>
	</tr>
	<tr>
		<td id="site_onayla_2" height="25">



			</div>
		</td>
	</tr>
	</table>
	
	
	
	
	
	<table id="site_ekle_panel3" style="display:none;" border="0" width="920" cellpadding="0">
	<tr>
		<td height="30">
		<p>&nbsp;<b><font style="font-size:13px;">Sitenizi Onaylayın</font></b></td>
	</tr>
	<tr>
		<td id="site_onayla_3" height="25">



			</div>
		</td>
	</tr>
	</table>
	



			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>