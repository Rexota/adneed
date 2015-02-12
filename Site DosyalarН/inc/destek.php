<?php
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
include("../sayfa_koruma2.php");
?><? if ($mode=='see') { ?>
<title></title>
<?	
$result = @mysql_query("select * from ticketler where user = '$_SESSION[userid]' order by id desc");

if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="515" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="513" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Tebrikler sistemimizle ilgili hiçbir sorununuz yok.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="515" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $durum, $tarih, $baslik, $user, $user_tur ) = @mysql_fetch_row($result))
{

$say = mysql_num_rows(mysql_query("select * from ticket_cevaplar where ticket_id = '$id'"));
$say = $say-1 ;
?>

          <tr>
					<td height="25" width="224" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><a href="destek.php?mode=read&id=<?=$id?>"><?=$baslik?></a></b></td>
					<td height="25" width="79" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><? if ($durum=="1"){ ?></b><font color="#008000">Açık</font><b><? } else { ?></b><font color="#FF0000">Kapalı</font><b><? } ?></b></td>
					<td height="25" width="57" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=$say?></td>
					<td height="25" width="152" style="border: 1px solid #008000; padding-top: 1px">
					<p>&nbsp;<?=date("d.m.Y H:i:s", $tarih)?></td>
				</tr>
		
<? } ?>
</table>
<? } } ?><? if ($mode=="cevap") { 


$mesaj = sql($_POST['mesaj']);
$ticket = sql($_POST['ticket']);

if ($mesaj=='' or $ticket=='') {
die("ERROR");
}

$sql = "select * from ticketler where id = '$ticket'";
$yali = mysql_fetch_array(mysql_query($sql));

if ($yali[user]!==$_SESSION[userid]) {
die("FAILED");
} else {

$tarih = mktime();

if ($_SESSION[tur]=="1") {
$yazarkimlik = "Yayıncı";
} else {
$yazarkimlik = "Reklamveren";
}

$guncelle = mysql_query("UPDATE ticketler SET durum = 1 where id = '$ticket'");


$ekle = "insert into ticket_cevaplar (ticket_id, yazan, yazan_tur, tarih,  mesaj, yazan_id) values ('$ticket', '$_SESSION[ad]', '$yazarkimlik', '$tarih', '$mesaj', '$_SESSION[userid]')";
$yali = mysql_query($ekle);

if ($yali) {
die("SUCCESS");
} else {
die("FAILED");
}



}
} ?><? if ($mode=="yeni") { 


$mesaj = sql($_POST['mesaj']);
$baslik = sql($_POST['baslik']);

if ($mesaj=='' or $baslik=='') {
die("ERROR");
}


$tarih = mktime();

if ($_SESSION[tur]=="1") {
$yazarkimlik = "Yayıncı";
} else {
$yazarkimlik = "Reklamveren";
}


$ekle = mysql_query("insert into ticketler (durum,tarih,baslik,user,user_tur) values ('1','$tarih','$baslik','$_SESSION[userid]','$_SESSION[tur]')");
$ticket = mysql_fetch_array(mysql_query("select * from ticketler where user = '$_SESSION[userid]' order by id desc"));
$ticket = $ticket['id'];



$ekle = "insert into ticket_cevaplar (ticket_id, yazan, yazan_tur, tarih,  mesaj, yazan_id) values ('$ticket', '$_SESSION[ad]', '$yazarkimlik', '$tarih', '$mesaj', '$_SESSION[userid]')";
$yali = mysql_query($ekle);

if ($yali) {
include('../sis_mail/ticket.php');
die("SUCCESS");
} else {
die("FAILED");
}



}
 ?>