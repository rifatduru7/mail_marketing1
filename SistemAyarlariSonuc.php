<? if(isset($_SESSION["Yonetici"])){
	$GelenSiteAdi											=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SiteAdi"]);
	$GelenSiteTitle											=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SiteTitle"]);
	$GelenSiteCopyrightMetni								=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SiteCopyrightMetni"]);
	$GelenSiteFaviconu										=	$_FILES["SiteFaviconu"];
	$GelenSiteAnaLogosu										=	$_FILES["SiteAnaLogosu"];
	$GelenGirisFormuLogosu									=	$_FILES["GirisFormuLogosu"];
	$GelenSiteAnaEMailAdresi								=	EMailliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresi"]);
	$GelenSiteAnaEMailAdresiSifresi							=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_REQUEST["SiteAnaEMailAdresiSifresi"]);
	$GelenSiteAnaEMailAdresiPOP3SunucuBaglantiTuru			=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiPOP3SunucuBaglantiTuru"]);
	$GelenSiteAnaEMailAdresiPOP3SunucuAdresi				=	LinkliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiPOP3SunucuAdresi"]);
	$GelenSiteAnaEMailAdresiPOP3SunucusuSSLPortu			=	SayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiPOP3SunucusuSSLPortu"]);	
	$GelenSiteAnaEMailAdresiPOP3SunucusuTLSPortu			=	SayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiPOP3SunucusuTLSPortu"]);
	$GelenSiteAnaEMailAdresiSMTPSunucuBaglantiTuru			=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiSMTPSunucuBaglantiTuru"]);
	$GelenSiteAnaEMailAdresiSMTPSunucuAdresi				=	LinkliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiSMTPSunucuAdresi"]);
	$GelenSiteAnaEMailAdresiSMTPSunucusuSSLPortu			=	SayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiSMTPSunucusuSSLPortu"]);
	$GelenSiteAnaEMailAdresiSMTPSunucusuTLSPortu			=	SayiliIcerikleriFiltrele($_REQUEST["SiteAnaEMailAdresiSMTPSunucusuTLSPortu"]);
	$GelenIslemBasinaGonderilecekMailSayisi					=	SayiliIcerikleriFiltrele($_REQUEST["IslemBasinaGonderilecekMailSayisi"]);
	$GelenPanoSayfasiListelemeLimiti						=	SayiliIcerikleriFiltrele($_REQUEST["PanoSayfasiListelemeLimiti"]);
	$GelenKisilerSayfasiListelemeLimiti						=	SayiliIcerikleriFiltrele($_REQUEST["KisilerSayfasiListelemeLimiti"]);
	$GelenKisilerSayfasiIceAktarimKayitSayisiLimiti			=	SayiliIcerikleriFiltrele($_REQUEST["KisilerSayfasiIceAktarimKayitSayisiLimiti"]);
	$GelenKisilerSayfasiDisaAktarimKayitSayisiLimiti		=	SayiliIcerikleriFiltrele($_REQUEST["KisilerSayfasiDisaAktarimKayitSayisiLimiti"]);
	$GelenKisiBildirimleriSayfasiListelemeLimiti			=	SayiliIcerikleriFiltrele($_REQUEST["KisiBildirimleriSayfasiListelemeLimiti"]);
	$GelenKampanyalarSayfasiListelemeLimiti					=	SayiliIcerikleriFiltrele($_REQUEST["KampanyalarSayfasiListelemeLimiti"]);
	$GelenTemalarSayfasiListelemeLimiti						=	SayiliIcerikleriFiltrele($_REQUEST["TemalarSayfasiListelemeLimiti"]);
	$GelenEMailHesaplariAyarlariSayfasiListelemeLimiti		=	SayiliIcerikleriFiltrele($_REQUEST["EMailHesaplariAyarlariSayfasiListelemeLimiti"]);	
	$GelenSosyalAglarSayfasiListelemeLimiti					=	SayiliIcerikleriFiltrele($_REQUEST["SosyalAglarSayfasiListelemeLimiti"]);
	$GelenUlkelerSayfasiListelemeLimiti						=	SayiliIcerikleriFiltrele($_REQUEST["UlkelerSayfasiListelemeLimiti"]);
	$GelenSehirlerSayfasiListelemeLimiti					=	SayiliIcerikleriFiltrele($_REQUEST["SehirlerSayfasiListelemeLimiti"]);
	$GelenYoneticilerSayfasiListelemeLimiti					=	SayiliIcerikleriFiltrele($_REQUEST["YoneticilerSayfasiListelemeLimiti"]);

	if(($GelenSiteAdi!="") and ($GelenSiteTitle!="") and ($GelenSiteCopyrightMetni!="") and ($GelenSiteAnaEMailAdresi!="") and (filter_var($GelenSiteAnaEMailAdresi, FILTER_VALIDATE_EMAIL)) and ($GelenSiteAnaEMailAdresiSifresi!="") and ($GelenSiteAnaEMailAdresiPOP3SunucuBaglantiTuru!="") and ($GelenSiteAnaEMailAdresiPOP3SunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenSiteAnaEMailAdresiPOP3SunucuAdresi)==1) and ($GelenSiteAnaEMailAdresiPOP3SunucusuSSLPortu!="") and ($GelenSiteAnaEMailAdresiPOP3SunucusuSSLPortu!=0) and ($GelenSiteAnaEMailAdresiPOP3SunucusuTLSPortu!="") and ($GelenSiteAnaEMailAdresiPOP3SunucusuTLSPortu!=0) and ($GelenSiteAnaEMailAdresiSMTPSunucuBaglantiTuru!="") and ($GelenSiteAnaEMailAdresiSMTPSunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenSiteAnaEMailAdresiSMTPSunucuAdresi)==1) and ($GelenSiteAnaEMailAdresiSMTPSunucusuSSLPortu!="") and ($GelenSiteAnaEMailAdresiSMTPSunucusuSSLPortu!=0) and ($GelenSiteAnaEMailAdresiSMTPSunucusuTLSPortu!="") and ($GelenSiteAnaEMailAdresiSMTPSunucusuTLSPortu!=0) and ($GelenIslemBasinaGonderilecekMailSayisi!="") and ($GelenIslemBasinaGonderilecekMailSayisi!=0) and ($GelenPanoSayfasiListelemeLimiti!="") and ($GelenPanoSayfasiListelemeLimiti!=0) and ($GelenKisilerSayfasiListelemeLimiti!="") and ($GelenKisilerSayfasiListelemeLimiti!=0) and ($GelenKisilerSayfasiIceAktarimKayitSayisiLimiti!="") and ($GelenKisilerSayfasiIceAktarimKayitSayisiLimiti!=0) and ($GelenKisilerSayfasiDisaAktarimKayitSayisiLimiti!="") and ($GelenKisilerSayfasiDisaAktarimKayitSayisiLimiti!=0) and ($GelenKisiBildirimleriSayfasiListelemeLimiti!="") and ($GelenKisiBildirimleriSayfasiListelemeLimiti!=0) and ($GelenKampanyalarSayfasiListelemeLimiti!="") and ($GelenKampanyalarSayfasiListelemeLimiti!=0) and ($GelenTemalarSayfasiListelemeLimiti!="") and ($GelenTemalarSayfasiListelemeLimiti!=0) and ($GelenEMailHesaplariAyarlariSayfasiListelemeLimiti!="") and ($GelenEMailHesaplariAyarlariSayfasiListelemeLimiti!=0) and ($GelenSosyalAglarSayfasiListelemeLimiti!="") and ($GelenSosyalAglarSayfasiListelemeLimiti!=0) and ($GelenUlkelerSayfasiListelemeLimiti!="") and ($GelenUlkelerSayfasiListelemeLimiti!=0) and ($GelenSehirlerSayfasiListelemeLimiti!="") and ($GelenSehirlerSayfasiListelemeLimiti!=0) and ($GelenYoneticilerSayfasiListelemeLimiti!="") and ($GelenYoneticilerSayfasiListelemeLimiti)){
		$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE siteayarlari SET SiteAdi='$GelenSiteAdi', SiteTitle='$GelenSiteTitle', SiteCopyrightMetni='$GelenSiteCopyrightMetni', SiteAnaEMailAdresi='$GelenSiteAnaEMailAdresi', SiteAnaEMailAdresiSifresi='$GelenSiteAnaEMailAdresiSifresi', SiteAnaEMailAdresiPOP3SunucuBaglantiTuru='$GelenSiteAnaEMailAdresiPOP3SunucuBaglantiTuru', SiteAnaEMailAdresiPOP3SunucuAdresi='$GelenSiteAnaEMailAdresiPOP3SunucuAdresi', SiteAnaEMailAdresiPOP3SunucusuSSLPortu='$GelenSiteAnaEMailAdresiPOP3SunucusuSSLPortu', SiteAnaEMailAdresiPOP3SunucusuTLSPortu='$GelenSiteAnaEMailAdresiPOP3SunucusuTLSPortu', SiteAnaEMailAdresiSMTPSunucuBaglantiTuru='$GelenSiteAnaEMailAdresiSMTPSunucuBaglantiTuru', SiteAnaEMailAdresiSMTPSunucuAdresi='$GelenSiteAnaEMailAdresiSMTPSunucuAdresi', SiteAnaEMailAdresiSMTPSunucusuSSLPortu='$GelenSiteAnaEMailAdresiSMTPSunucusuSSLPortu', SiteAnaEMailAdresiSMTPSunucusuTLSPortu='$GelenSiteAnaEMailAdresiSMTPSunucusuTLSPortu', IslemBasinaGonderilecekMailSayisi='$GelenIslemBasinaGonderilecekMailSayisi', PanoSayfasiListelemeLimiti='$GelenPanoSayfasiListelemeLimiti', KisilerSayfasiListelemeLimiti='$GelenKisilerSayfasiListelemeLimiti', KisilerSayfasiIceAktarimKayitSayisiLimiti='$GelenKisilerSayfasiIceAktarimKayitSayisiLimiti', KisilerSayfasiDisaAktarimKayitSayisiLimiti='$GelenKisilerSayfasiDisaAktarimKayitSayisiLimiti', KisiBildirimleriSayfasiListelemeLimiti='$GelenKisiBildirimleriSayfasiListelemeLimiti', KampanyalarSayfasiListelemeLimiti='$GelenKampanyalarSayfasiListelemeLimiti', TemalarSayfasiListelemeLimiti='$GelenTemalarSayfasiListelemeLimiti', EMailHesaplariAyarlariSayfasiListelemeLimiti='$GelenEMailHesaplariAyarlariSayfasiListelemeLimiti', SosyalAglarSayfasiListelemeLimiti='$GelenSosyalAglarSayfasiListelemeLimiti', UlkelerSayfasiListelemeLimiti='$GelenUlkelerSayfasiListelemeLimiti', SehirlerSayfasiListelemeLimiti='$GelenSehirlerSayfasiListelemeLimiti', YoneticilerSayfasiListelemeLimiti='$GelenYoneticilerSayfasiListelemeLimiti'");
			if($KayitGuncelle){
				if(($GelenSiteFaviconu["name"]!="") and ($GelenSiteFaviconu["type"]!="") and ($GelenSiteFaviconu["tmp_name"]!="") and ($GelenSiteFaviconu["error"]==0) and ($GelenSiteFaviconu["size"]>0)){
					$GelenSiteFaviconuTempDizini		=	$GelenSiteFaviconu["tmp_name"];
					if(!move_uploaded_file($GelenSiteFaviconuTempDizini, "Resimler/".$SiteAyarlariKaydiSiteFaviconu)){
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
						exit();
					}
				}
				
				if(($GelenSiteAnaLogosu["name"]!="") and ($GelenSiteAnaLogosu["type"]!="") and ($GelenSiteAnaLogosu["tmp_name"]!="") and ($GelenSiteAnaLogosu["error"]==0) and ($GelenSiteAnaLogosu["size"]>0)){
					$SiteAnaLogosuDosyaAdi					=	$GelenSiteAnaLogosu["name"];
					$SiteAnaLogosuDosyaUzantisiKontrolEt	=	substr($SiteAnaLogosuDosyaAdi, -4);
						if(($SiteAnaLogosuDosyaUzantisiKontrolEt==".png") or ($SiteAnaLogosuDosyaUzantisiKontrolEt==".PNG")){
							$SiteAnaLogosuDosyaUzantisi			=	$SiteAnaLogosuDosyaUzantisiKontrolEt;
							$SiteAnaLogosuYeniDosyaAdi			=	"AnaLogo".$SiteAnaLogosuDosyaUzantisi;
							
							$SiteAnaLogosuYukle				=	new upload($GelenSiteAnaLogosu, 'tr-TR');
								if($SiteAnaLogosuYukle->uploaded){
									$SiteAnaLogosuYukle->mime_magic_check			=	true;
									$SiteAnaLogosuYukle->allowed					=	array("image/*");
									$SiteAnaLogosuYukle->file_new_name_body			=	"AnaLogo";
									$SiteAnaLogosuYukle->file_overwrite				=	true;
									$SiteAnaLogosuYukle->image_background_color		=	null;
									$SiteAnaLogosuYukle->image_resize				=	true;
									$SiteAnaLogosuYukle->image_x					=	196;
									$SiteAnaLogosuYukle->image_y					=	54;
									$SiteAnaLogosuYukle->process(SITEKOKDIZINI."Resimler/");
										if($SiteAnaLogosuYukle->processed){
											$SiteAnaLogosuYukle->clean();
											$SiteAnaLogosuIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE siteayarlari SET SiteAnaLogosu='$SiteAnaLogosuYeniDosyaAdi'");
												if(!$SiteAnaLogosuIcinKayitGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
													exit();
												}
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
											exit();
										}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
									exit();
								}
						}
				}
		
				if(($GelenGirisFormuLogosu["name"]!="") and ($GelenGirisFormuLogosu["type"]!="") and ($GelenGirisFormuLogosu["tmp_name"]!="") and ($GelenGirisFormuLogosu["error"]==0) and ($GelenGirisFormuLogosu["size"]>0)){
					$GirisFormuLogosuDosyaAdi					=	$GelenGirisFormuLogosu["name"];
					$GirisFormuLogosuDosyaUzantisiKontrolEt		=	substr($GirisFormuLogosuDosyaAdi, -4);
						if(($GirisFormuLogosuDosyaUzantisiKontrolEt==".jpg") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".JPG") or ($GirisFormuLogosuDosyaUzantisiKontrolEt=="jpeg") or ($GirisFormuLogosuDosyaUzantisiKontrolEt=="JPEG") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".png") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".PNG") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".gif") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".GIF") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".bmp") or ($GirisFormuLogosuDosyaUzantisiKontrolEt==".BMP")){
							
							if(($GirisFormuLogosuDosyaUzantisiKontrolEt=="jpeg") or ($GirisFormuLogosuDosyaUzantisiKontrolEt=="JPEG")){
								$GirisFormuLogosuDosyaUzantisi			=	".jpeg";
								$GirisFormuLogosuYeniDosyaAdi			=	"FormLogosu".$GirisFormuLogosuDosyaUzantisi;
								$GirisFormuLogosuConvertDurumu			=	1;
							}else{
								$GirisFormuLogosuDosyaUzantisi			=	$GirisFormuLogosuDosyaUzantisiKontrolEt;
								$GirisFormuLogosuYeniDosyaAdi			=	"FormLogosu".$GirisFormuLogosuDosyaUzantisi;
								$GirisFormuLogosuConvertDurumu			=	0;
							}
							
							$GirisFormuLogosuYukle				=	new upload($GelenGirisFormuLogosu, 'tr-TR');
								if($GirisFormuLogosuYukle->uploaded){
									$GirisFormuLogosuYukle->mime_magic_check				=	true;
									$GirisFormuLogosuYukle->allowed							=	array("image/*");
									$GirisFormuLogosuYukle->file_new_name_body				=	"FormLogosu";
									$GirisFormuLogosuYukle->file_overwrite					=	true;
									if($GirisFormuLogosuConvertDurumu==1){
										$GirisFormuLogosuYukle->image_convert				=	"jpg";
										$GirisFormuLogosuYukle->image_quality				=	100;
										$GirisFormuLogosuYukle->image_background_color		=	"#FFFFFF";
									}else{
										$GirisFormuLogosuYukle->image_background_color		=	null;
									}
									$GirisFormuLogosuYukle->image_resize					=	true;
									$GirisFormuLogosuYukle->image_x							=	75;
									$GirisFormuLogosuYukle->image_y							=	75;
									$GirisFormuLogosuYukle->process(SITEKOKDIZINI."Resimler/");
										if($GirisFormuLogosuYukle->processed){
											$GirisFormuLogosuYukle->clean();
											$GirisFormuLogosuIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE siteayarlari SET GirisFormuLogosu='$GirisFormuLogosuYeniDosyaAdi'");
												if(!$GirisFormuLogosuIcinKayitGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
													exit();
												}
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
											exit();
										}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
									exit();
								}
						}
				}
				
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=9");
				exit();
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=10");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>