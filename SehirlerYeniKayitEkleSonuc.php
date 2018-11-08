<? if(isset($_SESSION["Yonetici"])){
	$GelenUlkesi					=	SayiliIcerikleriFiltrele($_REQUEST["Ulkesi"]);	
	$GelenSehirAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SehirAdi"]));
	$GelenSiraNumarasi				=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	
	if(($GelenUlkesi!="") and ($GelenSehirAdi!="") and ($GelenSiraNumarasi!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenUlkesi' AND SehirAdi='$GelenSehirAdi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenUlkesi' ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}

				$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO sehirler (UlkeIDsi, SehirAdi, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi) values ('$GelenUlkesi', '$GelenSehirAdi', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi')");
					if($KayitEkle){	
						if($GelenSiraNumarasi<=$SonSiraNumarasi){
							$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi=SiraNumarasi+1 WHERE UlkeIDsi='$GelenUlkesi' AND SehirAdi!='$GelenSehirAdi' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
								if(!$DigerKayitlarinSiraNumaralariniGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=42");
									exit();
								}
						}
						
						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET SehirSayisi=SehirSayisi+1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=42");
								exit();
							}

						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=41");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=42");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=43");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=42");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>