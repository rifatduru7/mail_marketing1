<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenUlkeAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["UlkeAdi"]));
	$GelenUlkeKodu					=	UluslararasiKodIcerikleriniFiltrele(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["UlkeKodu"]));
	$GelenSiraNumarasi				=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	
	if(($GelenID!="") and ($GelenUlkeAdi!="") and ($GelenUlkeKodu!="") and ($GelenSiraNumarasi!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID!='$GelenID' AND (UlkeAdi='$GelenUlkeAdi' OR UlkeKodu='$GelenUlkeKodu') ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
				$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
					if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
						$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
							$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
						
						$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET UlkeAdi='$GelenUlkeAdi', UlkeKodu='$GelenUlkeKodu', SiraNumarasi='$GelenSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							if($KayitGuncelle){
								if($GelenSiraNumarasi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
									if($GelenSiraNumarasi<=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi=SiraNumarasi+1 WHERE ID!='$GelenID' AND SiraNumarasi>='$GelenSiraNumarasi' AND SiraNumarasi<'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=25");
												exit();
											}
									}
									
									if($GelenSiraNumarasi>=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi=SiraNumarasi-1 WHERE ID!='$GelenID' AND SiraNumarasi<='$GelenSiraNumarasi' AND SiraNumarasi>'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=25");
												exit();
											}
									}
								}
	
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=24");
								exit();
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=25");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=25");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=26");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=25");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>