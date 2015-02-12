<?
// çok sayıda alıcı
$to  = $yali[email];

// konu
$subject = 'Sifre Hatirlatma';

// ileti
$message = '
<html>
<head>
  <title>Şifre Hatırlatma</title>
</head>
<body>
  <p> Merhaba, '.$yali[ad].' '.$yali[soyad].'!</p>
  <table>
    <tr>
      <td>Unuttuğunuz Şifrenizi Sıfırlamak İçin Aşağıdaki Bağlantıya Tıklayın :</td>
    </tr>
    <tr>
      <td><a href="'.$siteurl.'reset_pw.php?uid='.$yali[id].'&cid='.$yali[password].'">Şifre Sıfırlama Sayfası</a></td>
    </tr>
  </table>
</body>
</html>
';


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: <'.$yali[email].'>' . "\r\n";
$headers .= 'From: <'.$sismail.'>' . "\r\n";

// İletiyi postalayalım
$baba = mail($to, $subject, $message, $headers);
?>