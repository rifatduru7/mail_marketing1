<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$PanoIstatistikBilgisi					=	$VeritabaniBaglantisi->query("SELECT * FROM genelistatistikler");
$PanoIstatistikBilgisiKayitSayisi		=	$PanoIstatistikBilgisi->num_rows;
	if($PanoIstatistikBilgisiKayitSayisi>0){
		$PanoIstatistikBilgisiKaydi		=	$PanoIstatistikBilgisi->fetch_assoc();
			$PanoIstatistikBilgisiKaydiID										=	$PanoIstatistikBilgisiKaydi["ID"];
			$PanoIstatistikBilgisiKaydiKisiSayisi								=	$PanoIstatistikBilgisiKaydi["KisiSayisi"];
			$PanoIstatistikBilgisiKaydiBekleyenIceAktarimIslemSayisi			=	$PanoIstatistikBilgisiKaydi["BekleyenIceAktarimIslemSayisi"];
			$PanoIstatistikBilgisiKaydiBekleyenDisaAktarimIslemSayisi			=	$PanoIstatistikBilgisiKaydi["BekleyenDisaAktarimIslemSayisi"];
			$PanoIstatistikBilgisiKaydiDisaAktarimDosyalariSayisi				=	$PanoIstatistikBilgisiKaydi["DisaAktarimDosyalariSayisi"];
			$PanoIstatistikBilgisiKaydiKampanyaSayisi							=	$PanoIstatistikBilgisiKaydi["KampanyaSayisi"];
			$PanoIstatistikBilgisiKaydiTemaSayisi								=	$PanoIstatistikBilgisiKaydi["TemaSayisi"];
			$PanoIstatistikBilgisiKaydiEMailHesapSayisi							=	$PanoIstatistikBilgisiKaydi["EMailHesapSayisi"];
			$PanoIstatistikBilgisiKaydiAktifEMailHesabiSayisi					=	$PanoIstatistikBilgisiKaydi["AktifEMailHesabiSayisi"];
			$PanoIstatistikBilgisiKaydiPasifEMailHesabiSayisi					=	$PanoIstatistikBilgisiKaydi["PasifEMailHesabiSayisi"];
			$PanoIstatistikBilgisiKaydiDinlendirilenEMailHesabiSayisi			=	$PanoIstatistikBilgisiKaydi["DinlendirilenEMailHesabiSayisi"];
			$PanoIstatistikBilgisiKaydiGunlukMaksimumMailGonderimSayisi			=	$PanoIstatistikBilgisiKaydi["GunlukMaksimumMailGonderimSayisi"];
			$PanoIstatistikBilgisiKaydiGunlukGonderilenMailSayisi				=	$PanoIstatistikBilgisiKaydi["GunlukGonderilenMailSayisi"];
			$PanoIstatistikBilgisiKaydiGunlukKalanMailGonderimSayisi			=	$PanoIstatistikBilgisiKaydi["GunlukKalanMailGonderimSayisi"];
			$PanoIstatistikBilgisiKaydiSosyalAgSayisi							=	$PanoIstatistikBilgisiKaydi["SosyalAgSayisi"];
			$PanoIstatistikBilgisiKaydiUlkeSayisi								=	$PanoIstatistikBilgisiKaydi["UlkeSayisi"];		
			$PanoIstatistikBilgisiKaydiSehirSayisi								=	$PanoIstatistikBilgisiKaydi["SehirSayisi"];
			$PanoIstatistikBilgisiKaydiYoneticiSayisi							=	$PanoIstatistikBilgisiKaydi["YoneticiSayisi"];
			$PanoIstatistikBilgisiKaydiAktifYoneticiSayisi						=	$PanoIstatistikBilgisiKaydi["AktifYoneticiSayisi"];
			$PanoIstatistikBilgisiKaydiPasifYoneticiSayisi						=	$PanoIstatistikBilgisiKaydi["PasifYoneticiSayisi"];
			$PanoIstatistikBilgisiKaydiGonderimBekleyenMailSayisi				=	$PanoIstatistikBilgisiKaydi["GonderimBekleyenMailSayisi"];
			$PanoIstatistikBilgisiKaydiGonderilenMailSayisi						=	$PanoIstatistikBilgisiKaydi["GonderilenMailSayisi"];
			$PanoIstatistikBilgisiKaydiGeriDonenGecersizMailSayisi				=	$PanoIstatistikBilgisiKaydi["GeriDonenGecersizMailSayisi"];
			$PanoIstatistikBilgisiKaydiAcilanMailSayisi							=	$PanoIstatistikBilgisiKaydi["AcilanMailSayisi"];
			$PanoIstatistikBilgisiKaydiMailAcilmaSayisi							=	$PanoIstatistikBilgisiKaydi["MailAcilmaSayisi"];
			$PanoIstatistikBilgisiKaydiIcerigineTiklananMailSayisi				=	$PanoIstatistikBilgisiKaydi["IcerigineTiklananMailSayisi"];
			$PanoIstatistikBilgisiKaydiMailIcerigineTiklanmaSayisi				=	$PanoIstatistikBilgisiKaydi["MailIcerigineTiklanmaSayisi"];
			$PanoIstatistikBilgisiKaydiIzinsizGonderimBildirenKisiSayisi		=	$PanoIstatistikBilgisiKaydi["IzinsizGonderimBildirenKisiSayisi"];
?>
			<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiKisiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiBekleyenIceAktarimIslemSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiBekleyenDisaAktarimIslemSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiDisaAktarimDosyalariSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiKampanyaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiTemaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiEMailHesapSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiAktifEMailHesabiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiPasifEMailHesabiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiDinlendirilenEMailHesabiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGunlukMaksimumMailGonderimSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGunlukGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGunlukKalanMailGonderimSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiSosyalAgSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiUlkeSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiSehirSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiYoneticiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiAktifYoneticiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiPasifYoneticiSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGonderimBekleyenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiGeriDonenGecersizMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiAcilanMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiMailAcilmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiIcerigineTiklananMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiMailIcerigineTiklanmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($PanoIstatistikBilgisiKaydiIzinsizGonderimBildirenKisiSayisi) ?>
<?php
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>