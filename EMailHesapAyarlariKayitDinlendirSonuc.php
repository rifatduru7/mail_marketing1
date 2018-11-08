<? if(isset($_SESSION["Yonetici"])){
	$GelenID							=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenDinlendirmeSuresi				=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["DinlendirmeSuresi"]);	
	
	if(($GelenID!="") and ($GelenDinlendirmeSuresi!="")){	
		$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi			=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu						=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["CalismaDurumu"];
	
	
				$DinlendirilmeSureleriniBul								=	DinlendirilmelerIcinBaslangicVeBitisHesapla($GelenDinlendirmeSuresi);
				$DinlendirilmeBaslangicTarihiZamanDamgasi				=	$DinlendirilmeSureleriniBul[0];
				$DinlendirilmeBaslangicTarihi							=	$DinlendirilmeSureleriniBul[1];
				$DinlendirilmeBitisTarihiZamanDamgasi					=	$DinlendirilmeSureleriniBul[2];
				$DinlendirilmeBitisTarihi								=	$DinlendirilmeSureleriniBul[3];
			
				$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET DinlendirmeSayisi=DinlendirmeSayisi+1, DinlendirmeDurumu='1', DinlendirmeBaslangicTarihiZamanDamgasi='$DinlendirilmeBaslangicTarihiZamanDamgasi', DinlendirmeBaslangicTarihi='$DinlendirilmeBaslangicTarihi', DinlendirmeBitisTarihiZamanDamgasi='$DinlendirilmeBitisTarihiZamanDamgasi', DinlendirmeBitisTarihi='$DinlendirilmeBitisTarihi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
					if($KayitGuncelle){
						if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu==1){
							$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi-1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi+1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=129");
										exit();
									}
						}else{
							$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET PasifEMailHesabiSayisi=PasifEMailHesabiSayisi-1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi+1");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=129");
										exit();
									}
						}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=128");
						exit();		
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=129");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=129");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=129");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>