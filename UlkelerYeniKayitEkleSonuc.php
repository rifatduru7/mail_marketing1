<? if(isset($_SESSION["Yonetici"])){
	$GelenUlkeAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["UlkeAdi"]));
	$GelenUlkeKodu					=	UluslararasiKodIcerikleriniFiltrele(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["UlkeKodu"]));
	$GelenSiraNumarasi				=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	
	if(($GelenUlkeAdi!="") and ($GelenUlkeKodu!="") and ($GelenSiraNumarasi!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE UlkeAdi='$GelenUlkeAdi' OR UlkeKodu='$GelenUlkeKodu' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}

				$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO ulkeler (UlkeAdi, UlkeKodu, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi) values ('$GelenUlkeAdi', '$GelenUlkeKodu', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi')");
					if($KayitEkle){	
						if($GelenSiraNumarasi<=$SonSiraNumarasi){
							$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi=SiraNumarasi+1 WHERE UlkeKodu!='$GelenUlkeKodu' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
								if(!$DigerKayitlarinSiraNumaralariniGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=20");
									exit();
								}
						}
						
						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET UlkeSayisi=UlkeSayisi+1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=20");
								exit();
							}

						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=19");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=20");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=21");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=20");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>