<?

if ($iletisimmesaj=="1") {

// çok sayıda alıcı
$to  = $bilmail;

// konu
$subject = 'Yeni iletisim mesaji';

// ileti
$message = '
<html>
<head>
  <title>Yeni İletişim Mesajı</title>
</head>
<body>
  <p>Merhaba, Admin!</p>
  <table>
    <tr>
      <td>Sisteme iletişim bölümünden yeni bir mesaj geldi.</td>
    </tr>
    <tr>
      <td>Bu bildirimi almak istemiyorsanız ayarları düzenleyiniz.</td>
    </tr>
  </table>
</body>
</html>
';


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: <'.$bilmail.'>' . "\r\n";
$headers .= 'From: <'.$sismail.'>' . "\r\n";

// İletiyi postalayalım
$baba = mail($to, $subject, $message, $headers);

}
?>