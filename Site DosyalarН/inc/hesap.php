<?
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
?>



<? if ($mode=='see') { ?>
<title></title>
<?	
$result = @mysql_query("select * from hesaplarimiz order by id desc");

if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="900" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16" align="middle"> 
			Şuan sistem tarafından eklenen bir hesap bulunamadı !</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $banka, $hesap, $sube, $iban, $ads ) = @mysql_fetch_row($result))
{
?>

		    <tr>
			<td height="30" width="227" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$banka?></b></td>
			<td height="25" width="206" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$ads?></b></td>
			<td height="25" width="65" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$sube?></b></td>
			<td height="25" width="110" style="border: 1px solid #008000; padding-top: 1px">
			<b>&nbsp;<?=$hesap?></b></td>
			<td height="25" width="285" style="border: 1px solid #008000; padding-top: 1px">
			<p><b>&nbsp;<?=$iban?></b></td>
			<td height="25" width="26" style="border: 1px solid #008000; padding-top: 1px">
			<p align="center"></td>
		</tr>
		
<? } ?>
</table>
<? } } ?>