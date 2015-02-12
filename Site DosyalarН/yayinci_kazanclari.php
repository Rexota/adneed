<?php
include("db.php");

$title = "Yayıncı Kazançlarını İnceleyin - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');


?>		
<script type="text/javascript">

  function yayinci_yenile() {

 $('#yayincilar').load('inc_admin/kazanclar.php');
 }



$(function(){
yayinci_yenile();
});



</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yayıncı Kazançlarını İnceleyin</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			 
			 
		<tr>
          <td height="25" colspan="7">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td height="35" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Kullanıcı Adı</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Toplam Kazanç</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Aldığı Ödemeler</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Şuanki Bakiye</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Site Adeti</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Bugün Kazancı</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;İnceleme Başlatın</td>
		</tr>
		
		<tr>
          <td id="yayincilar" height="25" colspan="7">&nbsp;</td>
		</tr>
		

		<tr>
          <td height="45" colspan="7">&nbsp;<input type="button" onclick="yayinci_yenile();"  class="button" value="Yayıncıları Yenile"></td>
		</tr>

		</table>
			
			</div>
			
			


			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>