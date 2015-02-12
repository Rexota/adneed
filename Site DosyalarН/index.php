<?php
include("db.php");

$title = $sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
<div id="content-top"></div>
		<div id="content-middle">
			<div id="feature_list">
			<ul id="tabs" style="position: absolute; left: 2px; top: 0px">
				<li>
				  <a href="javascript:;">
						<img src="index/services.png" />
				  <h3>EN İYİ FİYAT</h3>
			    ADNeed,en iyi fiyatları sizlere sunar..</a></li>
				<li> </li>
				<li>
					<a href="javascript:;">
						<img src="index/programming.png" />
						<h3 style="">SAYIM ORANLARI</h3>
						<span>Türkiyenin En İyi Gösterim Oranları..</span></h3>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<img src="index/applications.png" />
						<h3>YAYINA BAŞLAYIN</h3>
						<span>ADNeed ® reklam yayını</span>
					</a>
				</li>
			</ul>
			<ul id="output">
				<li>
					<img src="index/sample1.jpg" />
					
			  </li>
				<li>
					<img src="index/sample2.jpg" />
					
				</li>
				<li>
					<img src="index/sample3.jpg" />
					
				</li>
			</ul>
		</div>
		
        
            <div class="column">
				<h3>Yayıncı Olun</h3>
				<img src="images/thumb.gif" alt="Thumb" />
				<p>Yüksek sayım oranlı reklamlarımızı sitenizde yayınlayarak sizde kazanın. Kazanmak için düşük oranlarla,düşük sayım sistemleri ile uğraşmanın sonunu getirdik.<strong>adNeed</strong> ile artık sizde kazanıcaksınız!</p>
				<p class="more"><a href="kayit.php">Yayıncı Ol</a></p>
			</div>

			<div class="column">
				<h3>Reklam Verin</h3>
				<img src="images/thumb2.gif" alt="Thumb" />
				<p>adNeed ile satmak istediğiniz ürünleri rahatlıkla müşteri potansiyeline ulaştırmak artık çok kolay! adNeed'e reklam vererek firmanızı ya da web sitenizi istediğiniz duruma getirmek sizin elinizde..</p>
				<p class="more"><a href="kayit.php">Reklam Ver</a></p>
			</div>	
			
			<div class="column last">
			  <h3>Son Duyurular</h3>
				<ul>
				
				
<?	
$result = @mysql_query("select * from duyurular order by id desc limit 5");

if (mysql_num_rows($result)<1) {
?>
<li>Duyuru Bulunamadı.</li>
<? 
} else {
?>

<? 
while(list($id, $baslik, $mesaj, $tarih ) = @mysql_fetch_row($result))
{
$i = $i+1;
?>
	 <a href="duyurular.php?mode=read&id=<?=$id?>"><li><?=$i?> - <?=$baslik?> - <?=date("d.m.Y", $tarih)?></li></a>
<? } 

} ?>

			
			
				 

              </ul>
<p class="more"><a href="duyurular.php">Tüm Duyurular</a></p>
			</div>	
		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
		
		
<?
include("alt.php");
?>