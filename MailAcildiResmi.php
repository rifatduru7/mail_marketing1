<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("Ayarlar/Ayarlar.php");
require_once("Ayarlar/Fonksiyonlar.php");

if(isset($_REQUEST["KampanyaIDsi"])){
	$GelenKampanyaIDsi					=	SayiliIcerikleriFiltrele($_REQUEST["KampanyaIDsi"]);
}else{
	$GelenKampanyaIDsi					=	"";
}

if(isset($_REQUEST["KisiIDsi"])){
	$GelenKisiIDsi						=	SayiliIcerikleriFiltrele($_REQUEST["KisiIDsi"]);
}else{
	$GelenKisiIDsi						=	"";
}

if(isset($_REQUEST["HashKodu"])){
	$GelenHashKodu						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["HashKodu"]);
}else{
	$GelenHashKodu						=	"";
}

if(($GelenKampanyaIDsi!="") and ($GelenKisiIDsi!="") and ($GelenHashKodu!="")){
	$AcilanMaillereKaydet	=	$VeritabaniBaglantisi->query("INSERT INTO gorevacilanmailler (KampanyaIDsi, KisiIDsi, HashKodu, EklenmeIPAdresi, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$GelenKampanyaIDsi', '$GelenKisiIDsi', '$GelenHashKodu', '$IPAdresi', '$ZamanDamgasi', '$TarihSaat')");
	
	header("Content-Type: image/gif");
	$Resim	=	"http://www.".SITEDOMAINI.SITEDIZINI."/Resimler/Takip.gif";
	$Dosya	=	filesize("Resimler/Takip.gif");
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	header("Content-Disposition: attachment; filename='Takip.gif'");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$Dosya);
	readfile($Resim);
}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>