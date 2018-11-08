<? if(isset($_SESSION["Yonetici"])){
	$GelenID												=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenEMailAdresiSifresi								=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_REQUEST["EMailAdresiSifresi"]);
	$GelenPOP3SunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["POP3SunucuBaglantiTuru"]);	
	$GelenPOP3SunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["POP3SunucuAdresi"]);
	$GelenPOP3SunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["POP3SunucusuSSLPortu"]);
	$GelenPOP3SunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["POP3SunucusuTLSPortu"]);
	$GelenSMTPSunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SMTPSunucuBaglantiTuru"]);	
	$GelenSMTPSunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["SMTPSunucuAdresi"]);
	$GelenSMTPSunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["SMTPSunucusuSSLPortu"]);
	$GelenSMTPSunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["SMTPSunucusuTLSPortu"]);
	$GelenIMAPSunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IMAPSunucuBaglantiTuru"]);	
	$GelenIMAPSunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["IMAPSunucuAdresi"]);
	$GelenIMAPSunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["IMAPSunucusuSSLPortu"]);
	$GelenIMAPSunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["IMAPSunucusuTLSPortu"]);
	$GelenGunlukMaksimumMailGonderimSayisi					=	SayiliIcerikleriFiltrele($_REQUEST["GunlukMaksimumMailGonderimSayisi"]);
	$GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi		=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["YeniGonderimIcinHazirOlmaZamanAraligiSuresi"]);		
	$GelenDinlendirmeZamanAraligiSuresi						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["DinlendirmeZamanAraligiSuresi"]);		
	$GelenSiraNumarasi										=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	$GelenCalismaDurumu										=	SayiliIcerikleriFiltrele($_REQUEST["CalismaDurumu"]);
	
	if(($GelenID!="") and ($GelenEMailAdresiSifresi!="") and ($GelenPOP3SunucuBaglantiTuru!="") and ($GelenPOP3SunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenPOP3SunucuAdresi)==1) and ($GelenPOP3SunucusuSSLPortu!="") and ($GelenPOP3SunucusuSSLPortu!=0) and  ($GelenPOP3SunucusuTLSPortu!="") and ($GelenPOP3SunucusuTLSPortu!=0) and ($GelenSMTPSunucuBaglantiTuru!="") and ($GelenSMTPSunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenSMTPSunucuAdresi)==1) and ($GelenSMTPSunucusuSSLPortu!="") and ($GelenSMTPSunucusuSSLPortu!=0) and  ($GelenSMTPSunucusuTLSPortu!="") and ($GelenSMTPSunucusuTLSPortu!=0) and ($GelenIMAPSunucuBaglantiTuru!="") and ($GelenIMAPSunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenIMAPSunucuAdresi)==1) and ($GelenIMAPSunucusuSSLPortu!="") and ($GelenIMAPSunucusuSSLPortu!=0) and  ($GelenIMAPSunucusuTLSPortu!="") and ($GelenIMAPSunucusuTLSPortu!=0) and ($GelenGunlukMaksimumMailGonderimSayisi!="") and ($GelenGunlukMaksimumMailGonderimSayisi!=0) and ($GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi!="") and ($GelenDinlendirmeZamanAraligiSuresi!="") and ($GelenSiraNumarasi!="") and ($GelenCalismaDurumu!="")){
		$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi			=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi							=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiDinlendirmeDurumu					=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["DinlendirmeDurumu"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu						=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["CalismaDurumu"];

				$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET EMailAdresiSifresi='$GelenEMailAdresiSifresi', POP3SunucuBaglantiTuru='$GelenPOP3SunucuBaglantiTuru', POP3SunucuAdresi='$GelenPOP3SunucuAdresi', POP3SunucusuSSLPortu='$GelenPOP3SunucusuSSLPortu', POP3SunucusuTLSPortu='$GelenPOP3SunucusuTLSPortu', SMTPSunucuBaglantiTuru='$GelenSMTPSunucuBaglantiTuru', SMTPSunucuAdresi='$GelenSMTPSunucuAdresi', SMTPSunucusuSSLPortu='$GelenSMTPSunucusuSSLPortu', SMTPSunucusuTLSPortu='$GelenSMTPSunucusuTLSPortu', IMAPSunucuBaglantiTuru='$GelenIMAPSunucuBaglantiTuru', IMAPSunucuAdresi='$GelenIMAPSunucuAdresi', IMAPSunucusuSSLPortu='$GelenIMAPSunucusuSSLPortu', IMAPSunucusuTLSPortu='$GelenIMAPSunucusuTLSPortu', YeniGonderimIcinHazirOlmaZamanAraligiSuresi='$GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi', DinlendirmeZamanAraligiSuresi='$GelenDinlendirmeZamanAraligiSuresi', SiraNumarasi='$GelenSiraNumarasi', CalismaDurumu='$GelenCalismaDurumu' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
					if($KayitGuncelle){
						if($GelenSiraNumarasi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
							if($GelenSiraNumarasi<=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
								$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET SiraNumarasi=SiraNumarasi+1 WHERE ID!='$GelenID' AND SiraNumarasi>='$GelenSiraNumarasi' AND SiraNumarasi<'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
									if(!$DigerKayitlarinSiraNumaralariniGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
										exit();
									}
							}

							if($GelenSiraNumarasi>=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
								$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET SiraNumarasi=SiraNumarasi-1 WHERE ID!='$GelenID' AND SiraNumarasi<='$GelenSiraNumarasi' AND SiraNumarasi>'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
									if(!$DigerKayitlarinSiraNumaralariniGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
										exit();
									}
							}
						}
						
						if($GelenGunlukMaksimumMailGonderimSayisi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi){
							if(($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu==1) and ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiDinlendirmeDurumu==0)){
								$EMailHesabiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
									if(!$EMailHesabiIcinGenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
										exit();
									}
							}
							
							$GunlukMaksimumMailGonderimSayisiKontrol	=	$GelenGunlukMaksimumMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi;
								if($GunlukMaksimumMailGonderimSayisiKontrol>0){
									$YeniOlusanGunlukGonderilenMailSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi;
									$YeniOlusanGunlukKalanMailGonderimSayisi	=	$GelenGunlukMaksimumMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi;
								}else{
									if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi>=$GelenGunlukMaksimumMailGonderimSayisi){
										$YeniOlusanGunlukGonderilenMailSayisi		=	$GelenGunlukMaksimumMailGonderimSayisi;
										$YeniOlusanGunlukKalanMailGonderimSayisi	=	0;
									}else{
										$YeniOlusanGunlukGonderilenMailSayisi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi;
										$YeniOlusanGunlukKalanMailGonderimSayisi	=	$GelenGunlukMaksimumMailGonderimSayisi-$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiGunlukGonderilenMailSayisi;
									}
								}
							
							if(($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu==1) and ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiDinlendirmeDurumu==0)){							
								$YeniBilgilerleEMailHesabiIcinGenelIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi+$GelenGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+$YeniOlusanGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi+$YeniOlusanGunlukKalanMailGonderimSayisi");
									if(!$YeniBilgilerleEMailHesabiIcinGenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
										exit();
									}
							}
							
							$YeniBilgilerleKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET GunlukMaksimumMailGonderimSayisi='$GelenGunlukMaksimumMailGonderimSayisi', GunlukGonderilenMailSayisi='$YeniOlusanGunlukGonderilenMailSayisi', GunlukKalanMailGonderimSayisi='$YeniOlusanGunlukKalanMailGonderimSayisi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
								if(!$YeniBilgilerleKayitGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
									exit();
								}
						}
						
						if($GelenCalismaDurumu!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiCalismaDurumu){
							$GuncelEMailHesabiBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							$GuncelEMailHesabiBilgileriSorgusuKayitSayisi	=	$GuncelEMailHesabiBilgileriSorgusu->num_rows;
								if($GuncelEMailHesabiBilgileriSorgusuKayitSayisi>0){
									$GuncelEMailHesabiBilgileriSorgusuKaydi	=	$GuncelEMailHesabiBilgileriSorgusu->fetch_assoc();
										$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi		=	$GuncelEMailHesabiBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
										$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukGonderilenMailSayisi			=	$GuncelEMailHesabiBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
										$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi		=	$GuncelEMailHesabiBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
							
									if($GelenCalismaDurumu==1){
										if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiDinlendirmeDurumu==0){
											$EMailHesabininGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi+1, PasifEMailHesabiSayisi=PasifEMailHesabiSayisi-1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi+$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi+$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
												if(!$EMailHesabininGenelIstatistikleriGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
													exit();
												}
										}
									}else{
										if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiDinlendirmeDurumu==0){
											$EMailHesabininGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi-1, PasifEMailHesabiSayisi=PasifEMailHesabiSayisi+1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi-$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi-$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-$GuncelEMailHesabiBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
												if(!$EMailHesabininGenelIstatistikleriGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
													exit();
												}
										}
									}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
									exit();
								}
						}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=121");
						exit();		
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=122");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>