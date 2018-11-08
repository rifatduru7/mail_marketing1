<? if(isset($_SESSION["Yonetici"])){
	$GelenSosyalAgLogosu				=	$_FILES["SosyalAgLogosu"];
	$GelenSosyalAgAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SosyalAgAdi"]));
	$GelenSosyalAgSayfasiLinki			=	LinkliIcerikleriFiltrele($_REQUEST["SosyalAgSayfasiLinki"]);
	$GelenSiraNumarasi					=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	
	if((($GelenSosyalAgLogosu["name"]!="") and ($GelenSosyalAgLogosu["type"]!="") and ($GelenSosyalAgLogosu["tmp_name"]!="") and ($GelenSosyalAgLogosu["error"]==0) and ($GelenSosyalAgLogosu["size"]>0)) and ($GelenSosyalAgAdi!="")and ($GelenSosyalAgSayfasiLinki!="") and (LinkDogrulugunuOnEkZorunluKontrolEt($GelenSosyalAgSayfasiLinki)==1) and ($GelenSiraNumarasi!="")){	
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari WHERE SosyalAgAdi='$GelenSosyalAgAdi' OR SosyalAgSayfasiLinki='$GelenSosyalAgSayfasiLinki' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}

				$GelenSosyalAgLogosuYeniDosyaAdiOlustur			=	RastgeleResimAdiUret();
				$GelenSosyalAgLogosuDosyaAdi					=	$GelenSosyalAgLogosu["name"];
				$GelenSosyalAgLogosuDosyaUzantisiKontrolEt		=	substr($GelenSosyalAgLogosuDosyaAdi, -4);
					if(($GelenSosyalAgLogosuDosyaUzantisiKontrolEt==".png") or ($GelenSosyalAgLogosuDosyaUzantisiKontrolEt==".PNG")){
						$GelenSosyalAgLogosuDosyaUzantisi				=	$GelenSosyalAgLogosuDosyaUzantisiKontrolEt;
						$GelenSosyalAgLogosuYeniDosyaAdi				=	$GelenSosyalAgLogosuYeniDosyaAdiOlustur.$GelenSosyalAgLogosuDosyaUzantisi;
	
						$GelenSosyalAgLogosuYukle				=	new upload($GelenSosyalAgLogosu, 'tr-TR');
							if($GelenSosyalAgLogosuYukle->uploaded){
								$GelenSosyalAgLogosuYukle->mime_magic_check					=	true;
								$GelenSosyalAgLogosuYukle->allowed							=	array("image/*");
								$GelenSosyalAgLogosuYukle->file_new_name_body				=	$GelenSosyalAgLogosuYeniDosyaAdiOlustur;
								$GelenSosyalAgLogosuYukle->file_overwrite					=	true;
								$GelenSosyalAgLogosuYukle->image_background_color			=	null;
								$GelenSosyalAgLogosuYukle->image_resize						=	true;
								$GelenSosyalAgLogosuYukle->image_x							=	24;
								$GelenSosyalAgLogosuYukle->image_y							=	24;
								$GelenSosyalAgLogosuYukle->process(SITEKOKDIZINI."Resimler/");
									if($GelenSosyalAgLogosuYukle->processed){
										$GelenSosyalAgLogosuYukle->clean();
	
										$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO sosyalagayarlari (SosyalAgLogosu, SosyalAgAdi, SosyalAgSayfasiLinki, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi) values ('$GelenSosyalAgLogosuYeniDosyaAdi', '$GelenSosyalAgAdi', '$GelenSosyalAgSayfasiLinki', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi')");
											if($KayitEkle){	
												if($GelenSiraNumarasi<=$SonSiraNumarasi){
													$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SiraNumarasi=SiraNumarasi+1 WHERE SosyalAgSayfasiLinki!='$GelenSosyalAgSayfasiLinki' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
														if(!$DigerKayitlarinSiraNumaralariniGuncelle){
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
															exit();
														}
												}
												
												$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET SosyalAgSayisi=SosyalAgSayisi+1");
													if(!$GenelIstatistikleriGuncelle){
														header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
														exit();
													}
	
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=94");
												exit();
											}else{
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
												exit();
											}
									}else{
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
										exit();
									}
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=96");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=95");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>