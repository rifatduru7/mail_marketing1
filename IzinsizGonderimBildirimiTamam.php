<?php
session_start(); ob_start();
require_once("Ayarlar/Ayarlar.php");
require_once("Ayarlar/Fonksiyonlar.php");
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
		<link href="Stiller/Giris.css" type="text/css" media="all" rel="stylesheet">
		<script src="Ayarlar/Fonksiyonlar.js" type="text/javascript" language="javascript"></script>
	</head>
	
	<body>
		<div id="TumSayfaKapsayiciAlani">
			<div id="TamSayfaArkaPlanResimAlani" style="background-image: url('Resimler/Background.jpg')"></div>
			<div id="TamSayfaArkaPlanKarartmaAlani"></div>
		
			<div id="IzinsizGonderimBildirimiFormuSonucMetinleriKapsayiciAlani">
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriLogosuKapsayiciAlani">
					<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
				</div>
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriUstCizgisi">
					<i></i>
				</div>
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriIconKapsayiciAlani">
					<img src="../Resimler/Tamam.png">
				</div>
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriBaslikAlaniKapsayicisi">
					İşlem Başarıyla Tamamlandı.
				</div>
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriIcerikAlaniKapsayicisi">
					İzinsiz gönderim bildiriminiz başarıyla alınmış olup, e-mail adresiniz listeden çıkartılmıştır.<br />Saygılarımızla...
				</div>
				<div class="IzinsizGonderimBildirimiFormuSonucMetinleriAltCizgisi">
					<i></i>
				</div>
			</div>
		</div>
</html>
<?php
ob_end_flush();
$VeritabaniBaglantisi->close();
?>