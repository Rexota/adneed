<? include('db_db.php');
set_time_limit(100000);

$username = sql($_POST['username']);
$password = sql($_POST['password']);
$mode = $_POST['mode'];

if ($mode=='' or $username=='' or $password=='') {
die("INVALID");
}


$yali = mysql_num_rows(mysql_query("select * from user where username = '$username' and password = '$password' and tur = 4"));


if ($yali < 1) {
die("ERROR");
} else {



if ($mode=="ip") {
$s = 0;
foreach (glob("ip_cache/*.txt") as $amca) {  
@unlink($amca);
$s++;  

if ($s==25000) {
break;
}
}  

$p = 0;  
foreach (glob("ip_cache_2/*.txt") as $amca) {  
@unlink($amca);
$p++;  

if ($p==25000) {
break;
}
}  


die("SUCCESS");
}




if ($mode=="kayit") {
$yali = mysql_query("delete from reklam_kayitlar");

die("SUCCESS");
}



if ($mode=="ipcache") {
$s = 0;  
foreach (glob("ip_cache/*.txt") as $amca) {  
$s++;  
}  


$p = 0;  
foreach (glob("ip_cache_2/*.txt") as $amca) {  
$p++;  
}  

$sonuc = $s+$p;


if ($sonuc == 0) {
echo '<font color="green">IP Havuzu Boş Durumdadır. Bir İşlem Yapmayınız.</br></font>';
}

if ($sonuc > 0 and $sonuc < 450000) {
echo '<font color="green">IP Havuzu Normal Seviyededir.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}

if ($sonuc > 450000 and $sonuc < 900000) {
echo '<font color="#FF9966">IP Havuzu Orta Seviyededir.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}

if ($sonuc > 900000) {
echo '<font color="red">IP Havuzu Maximum Seviyededir. Biran Önce Temizleyiniz.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}
}







if ($mode=="adscache") {

$sonuc = mysql_num_rows(mysql_query("select id from reklam_kayitlar"));

if ($sonuc == 0) {
echo '<font color="green">Kayıt Havuzu Boş Durumdadır. Bir İşlem Yapmayınız.</br></font>';
}

if ($sonuc > 0 and $sonuc < 450000) {
echo '<font color="green">Kayıt Havuzu Normal Seviyededir.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}

if ($sonuc > 450000 and $sonuc < 900000) {
echo '<font color="#FF9966">Kayıt Havuzu Orta Seviyededir.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}

if ($sonuc > 900000) {
echo '<font color="red">Kayıt Havuzu Maximum Seviyededir. Biran Önce Temizleyiniz.</br></font>';
echo '&nbsp;Bulunan Kayıt Sayısı: <b>'.number_format($sonuc).'</b>';
}
}





}
mysql_close($sqlconnect);
?>