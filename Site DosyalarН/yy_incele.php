<?php
include("db.php");

$title = "Yayıncı Siteleri İnceleme - ".$sitetitle;
$keywords = "";
$description = "";

$uid = $_GET['uid'];

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');
include("alacak_guncelle.php");
?>
<script type="text/javascript">

  function raporyenile() {
 $('#raporlarim').html('<img src="new/loadingAnimation.gif"> Veri Aktarılıyor...');
 $('#raporlarim').load('inc_admin/yyrapor.php?uid=<?=$uid?>&mode=see');
 }



$(function(){
raporyenile();
});


function tarihgetir() {

var gun = $('#gun').val();
var ay = $('#ay').val();
var yil = $('#yil').val();

var bgun = $('#bgun').val();
var bay = $('#bay').val();
var byil = $('#byil').val();

var sitem = $('#sitem').val();
var filtre = $('#filtre').val();


if (sitem=="0") {

return false;

} else {

var url = "gun="+gun;
var url = url + "&ay="+ay;
var url = url + "&yil="+yil;
var url = url + "&bgun="+bgun;
var url = url + "&bay="+bay;
var url = url + "&byil="+byil;
var url = url + "&sitem="+sitem;
var url = url + "&filtre="+filtre;

var url2 = "inc_admin/yyrapor.php?uid=<?=$uid?>&mode=tek&"+url;
 
 $('#raporlarim').html('<img src="new/loadingAnimation.gif"> Veri Aktarılıyor...');
 $('#raporlarim').load(url2);


}
}

</script>




		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yayıncı Sitesini İnceliyorsunuz !</h3>
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="55">&nbsp;Başlangıç:&nbsp;&nbsp;&nbsp;
		<select id="gun" class="select2">
		<?for ($i = 1; $i <= 31 ; $i++ ) {?>
		<option value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>
		
		<select id="ay" class="select2">
		<?for ($i = 1; $i <= 12 ; $i++ ) {?>
		<option value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>	
		
		<select id="yil" class="select2">
		<?for ($i = 2011; $i <= 2012 ; $i++ ) {?>
		<option value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>
		
		  &nbsp;&nbsp;Bitiş:&nbsp;  
		
		<select id="bgun" class="select2">
		<?for ($i = 1; $i <= 31 ; $i++ ) {?>
		<option <? if ($i==date("d")) { ?>selected<? } ?> value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>
		
		<select id="bay" class="select2">
		<?for ($i = 1; $i <= 12 ; $i++ ) {?>
		<option <? if ($i==date("m")) { ?>selected<? } ?> value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>	
		
		<select id="byil" class="select2">
		<?for ($i = 2011; $i <= 2015 ; $i++ ) {?>
		<option <? if ($i==date("Y")) { ?>selected<? } ?> value="<?=$i?>"><?=$i?></option>
		<? } ?>
		</select>
		
		
		</td>
	</tr>
		<tr>
		<td height="25">&nbsp;Web Sitesi:&nbsp;
		<select class="select2" id="sitem" name="sitem" size="1">

<option value="0">Site Seçiniz..</option>		
<?	
$result = @mysql_query("select * from sitelerim where user = '$uid' and onay=1");

if (mysql_num_rows($result)<1) {
?>

<? 
} else {

?>

<?
	 
while(list($id, $adres, $onay, $user, $tarih ) = @mysql_fetch_row($result))
{
?>
<option value="<?=$id?>"><?=$adres?></option>
<? }} ?>
</select>&nbsp;&nbsp;&nbsp;Filtre:&nbsp;
		<select class="select2" id="filtre" name="filtre" size="1">

<option value="1">Popup</option>
<option value="2">Splash</option>
<option value="3">Msn Popup</option>
<option value="4">PPC Banner</option>

</select>&nbsp;&nbsp;&nbsp;<input type="button" onclick="tarihgetir();" class="button" value="  Tarihleri Arasını Getir  ">
		
		
		
		
		</td>
	</tr>
	<tr>
		<td height="25">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" id="raporlarim">&nbsp;</td>
	</tr>
</table>
		
		
		
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>