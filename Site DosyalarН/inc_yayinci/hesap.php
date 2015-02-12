<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_yayinci.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?><? if ($mode=='see') { ?>
<title></title>
<?	
$result = @mysql_query("select * from banka where user = '$_SESSION[userid]'");

if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="900" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16" align="middle"> 
			Eklenmiş banka hesabı bulunamadı. Bu durumda hiçbir ödeme 
			yapılmayacaktır.</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $banka, $hesap, $sube, $ads, $iban ) = @mysql_fetch_row($result))
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
			<p align="center">
			<a href="javascript:bankasil('<?=$id?>');" onclick="return onay();">
			<img border="0" src="extra/cross-on-white.gif" width="16" height="16" align="middle"></a></td>
		</tr>
		
<? } ?>
</table>
<? } } ?><? if ($mode=='sil') {

$id = sql($_POST['id']);

$del = mysql_query("delete from banka where id = '$id' and user = '$_SESSION[userid]'");


}?><? if ($mode=='ekle') {

$banka = sql($_POST['banka']);
$sube = sql($_POST['sube']);
$iban = sql($_POST['iban']);
$ads = sql($_POST['ad']);
$hesap = sql($_POST['hesap']);



if ($banka=='' or $sube=='' or $iban=='' or $ads=='' or $hesap=='') {
die("ERROR");
}

$yali = "insert into banka (banka,hesap,sube,ad,iban,user) values ('$banka', '$hesap', '$sube', '$ads', '$iban', '$_SESSION[userid]')";

$ekle = mysql_query($yali);

die("SUCCESS");

}
?>