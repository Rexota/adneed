<?php
ob_start();
session_start();
include("db.php");

$title = "Reklamlarım - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_reklamveren2.php");
include('ust.php');
?>
<script type="text/javascript">

 function popup_goster() {
 
 $('#reklamlarim').html('<img src="new/loadingAnimation.gif"> Popup Reklamlar Yükleniyor ...');
 $('#reklamlarim').load('inc_reklam/popup.php?mode=see');
 
 $('#popup_button').addClass('button_tikli');
 $('#splash_button').removeClass('button_tikli'); 
 $('#msn_button').removeClass('button_tikli'); 
  $('#ppc_banner_button').removeClass('button_tikli');

 }
 
  function splash_goster() {
 
 $('#reklamlarim').html('<img src="new/loadingAnimation.gif"> Splash Reklamlar Yükleniyor ...');
 $('#reklamlarim').load('inc_reklam/splash.php?mode=see');

 $('#splash_button').addClass('button_tikli');
 $('#popup_button').removeClass('button_tikli'); 
 $('#msn_button').removeClass('button_tikli'); 
  $('#ppc_banner_button').removeClass('button_tikli');
 }
 
 
  function msn_goster() {
 
 $('#reklamlarim').html('<img src="new/loadingAnimation.gif"> Msn Popup Reklamlar Yükleniyor ...');
 $('#reklamlarim').load('inc_reklam/msn.php?mode=see');

 $('#msn_button').addClass('button_tikli');
 $('#splash_button').removeClass('button_tikli'); 
 $('#popup_button').removeClass('button_tikli'); 
 $('#ppc_banner_button').removeClass('button_tikli');
 }
 
 
   function ppc_banner_goster() {
 
 $('#reklamlarim').html('<img src="new/loadingAnimation.gif"> PPC Banner Reklamlar Yükleniyor ...');
 $('#reklamlarim').load('inc_reklam/ppc.php?mode=see');

 $('#ppc_banner_button').addClass('button_tikli');
 $('#msn_button').removeClass('button_tikli');
 $('#splash_button').removeClass('button_tikli'); 
 $('#popup_button').removeClass('button_tikli'); 
 }
 


</script>

		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Reklam verin yada Reklamlarınızı Yönetin</h3>
			
	
			  
			  
			  
			  
			  
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  
		<tr>
		<td height="25" colspan="">&nbsp;</td>
		</tr>
		
		
		
		<tr>
		<td height="25" colspan="">&nbsp;<input onclick="popup_goster();" id="popup_button" type="button" class="button" value="Popup Reklamlarım">&nbsp;<input onclick="splash_goster();" id="splash_button" type="button" class="button" value="Splash Reklamlarım">&nbsp;<input type="button" onclick="msn_goster();" id="msn_button" class="button" value="Msn Popup Reklamlarım">&nbsp;<input type="button" onclick="ppc_banner_goster();" id="ppc_banner_button" class="button" value="PPC Banner Reklamlarım"></td>
		</tr>
		
				<tr>
		<td height="25" colspan="">&nbsp;</td>
		</tr>
		
						
		<tr>
		<td id="reklamlarim" height="25" colspan="">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
		</tr>
				
				
				
		
		<tr>
		<td height="25" colspan="">&nbsp;</td>
		</tr>

		

</table>















			</div>
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		

<? include("alt.php"); ?>