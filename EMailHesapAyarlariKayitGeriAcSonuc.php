<? if(isset($_SESSION["Yonetici"])){
	$GelenID							=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi			=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu						=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["CalismaDurumu"];
		
				$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET DinlendirmeDurumu='0', DinlendirmeBaslangicTarihiZamanDamgasi='0', DinlendirmeBaslangicTarihi='', DinlendirmeBitisTarihiZamanDamgasi='0', DinlendirmeBitisTarihi='' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
					if($KayitGuncelle){
						if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu==1){
							$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi+1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi-1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi+$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi+$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=132");
										exit();
									}
						}else{
							$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET PasifEMailHesabiSayisi=PasifEMailHesabiSayisi+1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi-1");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=132");
										exit();
									}
						}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=131");
						exit();		
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=132");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=132");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=132");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>