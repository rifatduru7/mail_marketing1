<? if(isset($_SESSION["Yonetici"])){
	$GelenKampanyaAdi						=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["KampanyaAdi"]));
	$GelenTemaIDsi							=	SayiliIcerikleriFiltrele($_REQUEST["TemaIDsi"]);
	$GelenWebSitesiLinki					=	LinkliIcerikleriFiltrele($_REQUEST["WebSitesiLinki"]);
	$GelenMailGondericiAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["MailGondericiAdi"]));
	$GelenYanitAliciAdi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["YanitAliciAdi"]));
	$GelenYanitEMailAdresi					=	EMailliIcerikleriFiltrele($_REQUEST["YanitEMailAdresi"]);
	$GelenOncelikDurumu						=	SayiliIcerikleriFiltrele($_REQUEST["OncelikDurumu"]);
	$GelenSiraNumarasi						=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	$GelenFiltreIcinAdi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FiltreIcinAdi"]));
	$GelenFiltreIcinSoyadi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FiltreIcinSoyadi"]));
	$GelenFiltreIcinEMailAdresi				=	EMailliIcerikleriFiltrele($_REQUEST["FiltreIcinEMailAdresi"]);
	$GelenFiltreIcinCinsiyeti				=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FiltreIcinCinsiyeti"]);	
	$GelenFiltreIcinVIPDurumu				=	SayiliIcerikleriFiltrele($_REQUEST["FiltreIcinVIPDurumu"]);
	$GelenFiltreIcinUlkesi					=	SayiliIcerikleriFiltrele($_REQUEST["FiltreIcinUlkesi"]);
	$GelenFiltreIcinSehri					=	SayiliIcerikleriFiltrele($_REQUEST["FiltreIcinSehri"]);
	$GelenFiltreIcinIlcesi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FiltreIcinIlcesi"]));
	$GelenFiltreIcinPostaKodu				=	SayiliIcerikleriFiltrele($_REQUEST["FiltreIcinPostaKodu"]);
	
	if($GelenFiltreIcinAdi!=""){
		$SorguKosulu		=	"WHERE Adi LIKE '%$GelenFiltreIcinAdi%'";
	}else{
		$SorguKosulu		=	"";
	}
	
	if($GelenFiltreIcinSoyadi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Soyadi LIKE '%$GelenFiltreIcinSoyadi%'";
		}else{
			$SorguKosulu		=	"WHERE Soyadi LIKE '%$GelenFiltreIcinSoyadi%'";
		}
	}
	
	if($GelenFiltreIcinEMailAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND EMailAdresi LIKE '%$GelenFiltreIcinEMailAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE EMailAdresi LIKE '%$GelenFiltreIcinEMailAdresi%'";
		}
	}
	
	if($GelenFiltreIcinCinsiyeti!="Tümü"){
		if($SorguKosulu!=""){
			if($GelenFiltreIcinCinsiyeti=="Erkek"){
				$SorguKosulu		.=	" AND Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		.=	" AND Cinsiyeti='Kadın'";
			}
		}else{
			if($GelenFiltreIcinCinsiyeti=="Erkek"){
				$SorguKosulu		=	"WHERE Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		=	"WHERE Cinsiyeti='Kadın'";
			}
		}
	}
	
	if($GelenFiltreIcinVIPDurumu!=2){
		if($SorguKosulu!=""){
			if($GelenFiltreIcinVIPDurumu==1){
				$SorguKosulu		.=	" AND VIPDurumu='1'";
			}else{
				$SorguKosulu		.=	" AND VIPDurumu='0'";
			}
		}else{
			if($GelenFiltreIcinVIPDurumu==1){
				$SorguKosulu		=	"WHERE VIPDurumu='1'";
			}else{
				$SorguKosulu		=	"WHERE VIPDurumu='0'";
			}
		}
	}
	
	if($GelenFiltreIcinUlkesi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ulkesi='$GelenFiltreIcinUlkesi'";
		}else{
			$SorguKosulu		=	"WHERE Ulkesi='$GelenFiltreIcinUlkesi'";
		}
	}
	
	if($GelenFiltreIcinSehri!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Sehri='$GelenFiltreIcinSehri'";
		}else{
			$SorguKosulu		=	"WHERE Sehri='$GelenFiltreIcinSehri'";
		}
	}
	
	if($GelenFiltreIcinIlcesi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ilcesi LIKE '%$GelenFiltreIcinIlcesi%'";
		}else{
			$SorguKosulu		=	"WHERE Ilcesi LIKE '%$GelenFiltreIcinIlcesi%'";
		}
	}
	
	if($GelenFiltreIcinPostaKodu!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND PostaKodu LIKE '%$GelenFiltreIcinPostaKodu%'";
		}else{
			$SorguKosulu		=	"WHERE PostaKodu LIKE '%$GelenFiltreIcinPostaKodu%'";
		}
	}
	
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler $SorguKosulu LIMIT 1");
	$ToplamKayitSayisiSorgusuKayitSayisi	=	$ToplamKayitSayisiSorgusu->num_rows;	

	if(($GelenKampanyaAdi!="") and ($GelenTemaIDsi!="") and ($GelenWebSitesiLinki!="") and (LinkDogrulugunuOnEkZorunluKontrolEt($GelenWebSitesiLinki)==1) and ($GelenMailGondericiAdi!="") and ($GelenYanitAliciAdi!="") and ($GelenYanitEMailAdresi!="") and (filter_var($GelenYanitEMailAdresi, FILTER_VALIDATE_EMAIL)) and ($GelenOncelikDurumu!="") and ($GelenSiraNumarasi!="")){
		if($ToplamKayitSayisiSorgusuKayitSayisi>0){
			$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE KampanyaAdi='$GelenKampanyaAdi' ORDER BY ID ASC LIMIT 1");
			$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;				
				if($EsKayitKontrolSorgusuKayitSayisi<1){
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
							$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							$SonSiraNumarasi		=	0;
						}
					
					$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO kampanyalar (KampanyaAdi, TemaIDsi, WebSitesiLinki, MailGondericiAdi, YanitAliciAdi, YanitEMailAdresi, OncelikDurumu, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi, FiltreIcinAdi, FiltreIcinSoyadi, FiltreIcinEMailAdresi, FiltreIcinCinsiyeti, FiltreIcinVIPDurumu, FiltreIcinPostaKodu, FiltreIcinIlcesi, FiltreIcinSehri, FiltreIcinUlkesi) values ('$GelenKampanyaAdi', '$GelenTemaIDsi', '$GelenWebSitesiLinki', '$GelenMailGondericiAdi', '$GelenYanitAliciAdi', '$GelenYanitEMailAdresi', '$GelenOncelikDurumu', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi', '$GelenFiltreIcinAdi', '$GelenFiltreIcinSoyadi', '$GelenFiltreIcinEMailAdresi', '$GelenFiltreIcinCinsiyeti', '$GelenFiltreIcinVIPDurumu', '$GelenFiltreIcinPostaKodu', '$GelenFiltreIcinIlcesi', '$GelenFiltreIcinSehri', '$GelenFiltreIcinUlkesi')");
						if($KayitEkle){
							if($GelenSiraNumarasi<=$SonSiraNumarasi){
								$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET SiraNumarasi=SiraNumarasi+1 WHERE KampanyaAdi!='$GelenKampanyaAdi' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
									if(!$DigerKayitlarinSiraNumaralariniGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
										exit();
									}
							}

							$EklenenKaydaBaglan				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE KampanyaAdi='$GelenKampanyaAdi' ORDER BY ID DESC LIMIT 1");
							$EklenenKaydaBaglanKayitSayisi	=	$EklenenKaydaBaglan->num_rows;
								if($EklenenKaydaBaglanKayitSayisi>0){
									$EklenenKaydaBaglanKaydi	=	$EklenenKaydaBaglan->fetch_assoc();
										$EklenenKaydaBaglanKaydiID		=	$EklenenKaydaBaglanKaydi["ID"];
							
									$GorevEkle		=	$VeritabaniBaglantisi->query("INSERT INTO gorevkampanyagonderimlerihazirla (KampanyaIDsi) values ('$EklenenKaydaBaglanKaydiID')");
										if(!$GorevEkle){
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
											exit();
										}
							
									$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KampanyaSayisi=KampanyaSayisi+1");
										if(!$GenelIstatistikleriGuncelle){
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
											exit();
										}
							
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=216");
									exit();
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=218");
					exit();
				}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=219");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=217");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>