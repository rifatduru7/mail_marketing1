<?php
session_start(); ob_start();
require_once("Ayarlar/Ayarlar.php");
require_once("Ayarlar/Fonksiyonlar.php");
require_once("Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");
require_once("Frameworkler/Verot/src/class.upload.php");
if(isset($_REQUEST["S"])){
	$GelenSayfa			=	SayiliIcerikleriFiltrele($_REQUEST["S"]);
}else{
	$GelenSayfa			=	"";
}
if(isset($_REQUEST["SS"])){
	$GelenSayfalar		=	SayiliIcerikleriFiltrele($_REQUEST["SS"]);
}else{
	$GelenSayfalar		=	"";
}
if(isset($_REQUEST["Sayfalama"])){
	$GelenSayfalama		=	SayiliIcerikleriFiltrele($_REQUEST["Sayfalama"]);
}else{
	$GelenSayfalama		=	1;
}
require_once("Ayarlar/SayfalarIslemleri.php");
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr-TR" xml:lang="tr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<meta name="robots" content="noindex, nofollow, noarchive">
		<meta http-equiv="X-UA-Competible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo DonusumleriGeriDondur($SiteAyarlariKaydiSiteTitle); ?></title>
		<link href="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiSiteFaviconu); ?>" type="image/ico" rel="shortcut icon">
		<?php if(isset($_SESSION["Yonetici"])){ ?>
			<link href="Stiller/Sistem.css" type="text/css" media="all" rel="stylesheet">
		<?php }else{ ?>
			<link href="Stiller/Giris.css" type="text/css" media="all" rel="stylesheet">
		<?php } ?>
		<script src="Ayarlar/Fonksiyonlar.js" type="text/javascript" language="javascript"></script>
	</head>
	
	<body>
		<div id="TumSayfaKapsayiciAlani">
			<?php if(empty($_SESSION["Yonetici"])){ ?>
				<div id="TamSayfaArkaPlanResimAlani" style="background-image: url('Resimler/Background.jpg')"></div>
				<div id="TamSayfaArkaPlanKarartmaAlani"></div>
			<?php } ?>
		
			<?php
			if(empty($_SESSION["Yonetici"])){
				if((!$GelenSayfa) or ($GelenSayfa=="")){
					include($Sayfa[1]);
				}else{
					include($Sayfa[$GelenSayfa]);
				}
			}else{
				if((!$GelenSayfa) or ($GelenSayfa=="")){
					include($Sayfa[0]);
				}else{
					include($Sayfa[$GelenSayfa]);
				}
			}
			?>
		</div>
	</body>
</html>
<?php
ob_end_flush();
$VeritabaniBaglantisi->close();
?>