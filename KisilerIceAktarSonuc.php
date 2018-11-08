<? if(isset($_SESSION["Yonetici"])){
	$GelenAktarimDosyasi							=	$_FILES["AktarimDosyasi"];
	
	if(($GelenAktarimDosyasi["name"]!="") and ($GelenAktarimDosyasi["type"]!="") and ($GelenAktarimDosyasi["tmp_name"]!="") and ($GelenAktarimDosyasi["error"]==0) and ($GelenAktarimDosyasi["size"]>0)){	
		$GelenAktarimDosyasiYeniDosyaAdiOlustur			=	RastgeleResimAdiUret();
		$GelenAktarimDosyasiDosyaAdi					=	$GelenAktarimDosyasi["name"];
		$GelenAktarimDosyasiDosyaUzantisiKontrolEt		=	substr($GelenAktarimDosyasiDosyaAdi, -4);
		
		if(($GelenAktarimDosyasiDosyaUzantisiKontrolEt==".csv") or ($GelenAktarimDosyasiDosyaUzantisiKontrolEt==".CSV")){
			$GelenAktarimDosyasiDosyaUzantisi		=	".csv";
			$GelenAktarimDosyasiYeniDosyaAdi		=	$GelenAktarimDosyasiYeniDosyaAdiOlustur.$GelenAktarimDosyasiDosyaUzantisi;
			
			$GelenAktarimDosyasiTempDizini			=	$GelenAktarimDosyasi["tmp_name"];
			$DosyayiAc								=	fopen($GelenAktarimDosyasiTempDizini, "r");
			$DosyaninTumunuCozumle					=	file_get_contents($GelenAktarimDosyasiTempDizini);
			$DosyaninKayitSayisi					=	substr_count($DosyaninTumunuCozumle, "\r");
			$KayitSayisi							=	$DosyaninKayitSayisi-1;
				
			if($DosyayiAc){
				if($KayitSayisi<=$SiteAyarlariKaydiKisilerSayfasiIceAktarimKayitSayisiLimiti){
					if(move_uploaded_file($GelenAktarimDosyasiTempDizini, "Dosyalar/".$GelenAktarimDosyasiYeniDosyaAdi)){
						$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO kisilericeaktarimdosyalari (DosyaAdi, EklenmeTarihiZamanDamgasi, EklenmeTarihi, KayitSayisi) values ('$GelenAktarimDosyasiYeniDosyaAdi', '$ZamanDamgasi', '$TarihSaat', '$KayitSayisi')");
							if($KayitEkle){
								fclose($DosyayiAc);
								
								$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenIceAktarimIslemSayisi=BekleyenIceAktarimIslemSayisi+1");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
										exit();
									}
								
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=166");
								exit();
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
						exit();
					}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=168");
					exit();
				}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
				exit();
			}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=167");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>