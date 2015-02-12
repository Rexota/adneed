<?php
include("db.php");

$title = "Giriş Yapın - ".$sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
<script type="text/javascript">

$(function() {




 $('#login_button').click(function() {
 
    $('#giris_durum').html('<img src="new/loadingAnimation.gif"> Kontrol ediliyor...');

	var username = $('#username').val();
	var password = $('#password').val();
	

	$.post('login.php', {username : username, password : password}, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#giris_durum').html('<img src="new/yanlis.gif"> Kullanıcı adı yada Parolanızı girmediniz !');
						break;

					case 'FAILED':
					$('#giris_durum').html('<img src="new/yanlis.gif"> Giriş Yapılamadı. Bilgilerinizi kontrol edin.');
						break;
						
					case 'BANNED':
					$('#giris_durum').html('<img src="extra/notification-exclamation.gif"> Hesabınız Yönetici tarafından askıya alınmıştır.');
						break;
						
											case 'CLOSED':
					$('#giris_durum').html('<img src="extra/notification-exclamation.gif"> Hesabınız Henüz onay aşamasındadır.');
						break;

					case 'SUCCESS':
						$('#giris_durum').html('<img src="extra/notification-information.gif"> Giriş Yapıldı.. Yönlendiriliyorsunuz...');
						setTimeout("location.href='panel.php';", 2500);
						break;

                    default:
                   $('#giris_durum').html(return_val);
				}
	 });


			

 });




});



</script>
	<div id="content-top"></div>
		<div id="content-middle">
		
			<div class="columnz">
				<h3>Giriş Yapın</h3>
			<div id="login-box">			

			<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse" height="183">
				<tr>
					<td width="492">
						<table border="0" width="246" id="table5" cellpadding="0">
							<tr>
								<td height="26" width="240"></td>
															
							</tr>
							<tr>
								<td height="26">&nbsp;Kullanıcı adı:</td>
							</tr>
							</table>
						<table border="0" width="246" id="table2" cellpadding="0">
							<tr>
								<td height="26"><div id="giris_yazi"><input type="text" class="user_input" id="username" name="username"></div></td>
							</tr>
							<tr>
								<td height="26">&nbsp;Parola:</td>
							</tr>
							<tr>
								<td height="26"><div id="giris_yazi"><input type="password" class="user_input" id="password" name="password"></div></td>
							</tr>
							<tr>
								<td height="60" width="240">&nbsp;<input type="button" name="login_button" id="login_button" class="button_login"></td>
															
							</tr>
							<tr>
								<td height="26" id="giris_durum" width="240"></td>
															
							</tr>	
						</table>
						</form>	
					</div>
					</td>
					<td width="493">&nbsp;</td>
				</tr>
			</table>
			<p>			

			</div>
          </div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		
<? include("alt.php"); ?>