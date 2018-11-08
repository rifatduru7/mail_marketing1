<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
			if($EMailHesapBilgileriSorgusuKayitSayisi>0){
				$EMailHesapBilgileriSorgusuKaydi	=	$EMailHesapBilgileriSorgusu->fetch_assoc();
					$EMailHesapBilgileriSorgusuKaydiID										=	$EMailHesapBilgileriSorgusuKaydi["ID"];
					$EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi		=	$EMailHesapBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
					$EMailHesapBilgileriSorgusuKaydiGunlukGonderilenMailSayisi				=	$EMailHesapBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
					$EMailHesapBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi			=	$EMailHesapBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
					$EMailHesapBilgileriSorgusuKaydiPostaKutusuKontrolSayisi				=	$EMailHesapBilgileriSorgusuKaydi["PostaKutusuKontrolSayisi"];
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeSayisi						=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeSayisi"];
					$EMailHesapBilgileriSorgusuKaydiGonderilenMailSayisi					=	$EMailHesapBilgileriSorgusuKaydi["GonderilenMailSayisi"];
?>
			
			<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGunlukGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiPostaKutusuKontrolSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiDinlendirmeSayisi) ?>
<?php
			}
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>