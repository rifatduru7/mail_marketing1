<? if(isset($_SESSION["Yonetici"])){
	$GelenYoneticiResmi							=	$_FILES["YoneticiResmi"];
	$GelenYoneticiKullaniciAdi					=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_REQUEST["YoneticiKullaniciAdi"]);
	$GelenYoneticiKullaniciSifresi				=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_REQUEST["YoneticiKullaniciSifresi"]);
	$GelenYoneticiAdi							=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["YoneticiAdi"]));
	$GelenYoneticiSoyadi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["YoneticiSoyadi"]));
	$GelenYoneticiEMailAdresi					=	EMailliIcerikleriFiltrele($_REQUEST["YoneticiEMailAdresi"]);
	$GelenYoneticiTelefonu						=	TelefonluIcerikleriFiltrele($_REQUEST["YoneticiTelefonu"]);
	$GelenYoneticiCepTelefonu					=	TelefonluIcerikleriFiltrele($_REQUEST["YoneticiCepTelefonu"]);
	$GelenSiraNumarasi							=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	$GelenCalismaDurumu							=	SayiliIcerikleriFiltrele($_REQUEST["CalismaDurumu"]);
	
	if((($GelenYoneticiResmi["name"]!="") and ($GelenYoneticiResmi["type"]!="") and ($GelenYoneticiResmi["tmp_name"]!="") and ($GelenYoneticiResmi["error"]==0) and ($GelenYoneticiResmi["size"]>0)) and ($GelenYoneticiKullaniciAdi!="") and ($GelenYoneticiKullaniciSifresi!="") and ($GelenYoneticiAdi!="") and ($GelenYoneticiSoyadi!="") and ($GelenYoneticiEMailAdresi!="") and (filter_var($GelenYoneticiEMailAdresi, FILTER_VALIDATE_EMAIL)) and ($GelenYoneticiCepTelefonu!="") and ($GelenSiraNumarasi!="") and ($GelenCalismaDurumu!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler WHERE YoneticiKullaniciAdi='$GelenYoneticiKullaniciAdi' OR YoneticiEMailAdresi='$GelenYoneticiEMailAdresi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}

				$GelenYoneticiResmiYeniDosyaAdiOlustur			=	RastgeleResimAdiUret();
				$GelenYoneticiResmiDosyaAdi						=	$GelenYoneticiResmi["name"];
				$GelenYoneticiResmiDosyaUzantisiKontrolEt		=	substr($GelenYoneticiResmiDosyaAdi, -4);
					if(($GelenYoneticiResmiDosyaUzantisiKontrolEt==".jpg") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".JPG") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt=="jpeg") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt=="JPEG") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".png") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".PNG") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".gif") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".GIF") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".bmp") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".BMP")){
						if(($GelenYoneticiResmiDosyaUzantisiKontrolEt=="jpeg") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt=="JPEG")){
							$GelenYoneticiResmiDosyaUzantisi			=	".jpeg";
							$GelenYoneticiResmiYeniDosyaAdi				=	$GelenYoneticiResmiYeniDosyaAdiOlustur.$GelenYoneticiResmiDosyaUzantisi;
							$GelenYoneticiResmiConvertDurumu			=	1;
						}else{
							$GelenYoneticiResmiDosyaUzantisi			=	$GelenYoneticiResmiDosyaUzantisiKontrolEt;
							$GelenYoneticiResmiYeniDosyaAdi				=	$GelenYoneticiResmiYeniDosyaAdiOlustur.$GelenYoneticiResmiDosyaUzantisi;
							$GelenYoneticiResmiConvertDurumu			=	0;
						}
						
						$GelenYoneticiResmiYukle				=	new upload($GelenYoneticiResmi, 'tr-TR');
							if($GelenYoneticiResmiYukle->uploaded){
								$GelenYoneticiResmiYukle->mime_magic_check					=	true;
								$GelenYoneticiResmiYukle->allowed							=	array("image/*");
								$GelenYoneticiResmiYukle->file_new_name_body				=	$GelenYoneticiResmiYeniDosyaAdiOlustur;
								$GelenYoneticiResmiYukle->file_overwrite					=	true;
								if($GelenYoneticiResmiConvertDurumu==1){
									$GelenYoneticiResmiYukle->image_convert					=	"jpg";
									$GelenYoneticiResmiYukle->image_quality					=	100;
								}
								if(($GelenYoneticiResmiDosyaUzantisiKontrolEt==".png") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".PNG") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".gif") or ($GelenYoneticiResmiDosyaUzantisiKontrolEt==".GIF")){
									$GelenYoneticiResmiYukle->image_background_color		=	null;
								}else{
									$GelenYoneticiResmiYukle->image_background_color		=	"#FFFFFF";
								}
								$GelenYoneticiResmiYukle->image_resize						=	true;
								$GelenYoneticiResmiYukle->image_x							=	35;
								$GelenYoneticiResmiYukle->image_y							=	35;
								$GelenYoneticiResmiYukle->process(SITEKOKDIZINI."Resimler/");
									if($GelenYoneticiResmiYukle->processed){
										$GelenYoneticiResmiYukle->clean();
								
										$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO yoneticiler (YoneticiKullaniciAdi, YoneticiKullaniciSifresi, YoneticiResmi, YoneticiAdi, YoneticiSoyadi, YoneticiEMailAdresi, YoneticiTelefonu, YoneticiCepTelefonu, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi, CalismaDurumu) values ('$GelenYoneticiKullaniciAdi', '$GelenYoneticiKullaniciSifresi', '$GelenYoneticiResmiYeniDosyaAdi', '$GelenYoneticiAdi', '$GelenYoneticiSoyadi', '$GelenYoneticiEMailAdresi', '$GelenYoneticiTelefonu', '$GelenYoneticiCepTelefonu', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi', '$GelenCalismaDurumu')");
											if($KayitEkle){	
												if($GelenSiraNumarasi<=$SonSiraNumarasi){
													$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE yoneticiler SET SiraNumarasi=SiraNumarasi+1 WHERE YoneticiKullaniciAdi!='$GelenYoneticiKullaniciAdi' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
														if(!$DigerKayitlarinSiraNumaralariniGuncelle){
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
															exit();
														}
												}
								
												if($GelenCalismaDurumu==1){
													$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET YoneticiSayisi=YoneticiSayisi+1, AktifYoneticiSayisi=AktifYoneticiSayisi+1");
														if(!$GenelIstatistikleriGuncelle){
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
															exit();
														}
												}else{
													$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET YoneticiSayisi=YoneticiSayisi+1, PasifYoneticiSayisi=PasifYoneticiSayisi+1");
														if(!$GenelIstatistikleriGuncelle){
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
															exit();
														}
												}
	
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=66");
												exit();
											}else{
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
												exit();
											}
									}else{
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
										exit();
									}
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=68");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=67");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>