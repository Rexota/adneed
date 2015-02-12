<?
$dosya = @file("system/config.txt");
$buldum = $dosya[0];

if ($buldum!='') {

$s1 = explode("[siteurl]", $buldum);
$s2 = explode("[c]", $s1[1]);
$siteurl = $s2[0];

$a1 = explode("[adurl]", $buldum);
$a2 = explode("[c]", $a1[1]);
$adurl = $a2[0];

$p1 = explode("[popupyayinci]", $buldum);
$p2 = explode("[c]", $p1[1]);
$popupyayinci = $p2[0];

$ss1 = explode("[splashyayinci]", $buldum);
$ss2 = explode("[c]", $ss1[1]);
$splashyayinci = $ss2[0];

$ms1 = explode("[msnpopyayinci]", $buldum);
$ms2 = explode("[c]", $ms1[1]);
$msnpopyayinci = $ms2[0];

$hv1 = explode("[havuz]", $buldum);
$hv2 = explode("[c]", $hv1[1]);
$havuz = $hv2[0];



if ($siteurl=='' or $adurl=='' or $popupyayinci=='' or $splashyayinci=='' or $msnpopyayinci=='' or $havuz=='') { die("ERROR CONFIG"); }

}
?>