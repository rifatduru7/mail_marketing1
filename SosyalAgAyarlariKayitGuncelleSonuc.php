<? if(isset($_SESSION["Yonetici"])){
	$GelenID							=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);	
	$GelenSosyalAgLogosu				=	$_FILES["SosyalAgLogosu"];
	$GelenSosyalAgAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SosyalAgAdi"]));
	$GelenSosyalAgSayfasiLinki			=	LinkliIcerikleriFiltrele($_REQUEST["SosyalAgSayfasiLinki"]);
	$GelenSiraNumarasi					=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);

	if(($GelenID!="") and ($GelenSosyalAgAdi!="") and ($GelenSosyalAgSayfasiLinki!="") and (LinkDogrulugunuOnEkZorunluKontrolEt($GelenSosyalAgSayfasiLinki)==1) and ($GelenSiraNumarasi!="")){	
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari WHERE ID!='$GelenID' AND (SosyalAgAdi='$GelenSosyalAgAdi' OR SosyalAgSayfasiLinki='$GelenSosyalAgSayfasiLinki') ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
				$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
					if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
						$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
							$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSosyalAgLogosu	=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SosyalAgLogosu"];
							$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
	
						$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SosyalAgAdi='$GelenSosyalAgAdi', SosyalAgSayfasiLinki='$GelenSosyalAgSayfasiLinki', SiraNumarasi='$GelenSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							if($KayitGuncelle){
								if(($GelenSosyalAgLogosu["name"]!="") and ($GelenSosyalAgLogosu["type"]!="") and ($GelenSosyalAgLogosu["tmp_name"]!="") and ($GelenSosyalAgLogosu["error"]==0) and ($GelenSosyalAgLogosu["size"]>0)){
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

															$ResimIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SosyalAgLogosu='$GelenSosyalAgLogosuYeniDosyaAdi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
																if($ResimIcinKayitGuncelle){
																	unlink("Resimler/".$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSosyalAgLogosu);
																}else{
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
													exit();
												}
										}
								}
								
								if($GelenSiraNumarasi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
									if($GelenSiraNumarasi<=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SiraNumarasi=SiraNumarasi+1 WHERE ID!='$GelenID' AND SiraNumarasi>='$GelenSiraNumarasi' AND SiraNumarasi<'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
												exit();
											}
									}

									if($GelenSiraNumarasi>=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SiraNumarasi=SiraNumarasi-1 WHERE ID!='$GelenID' AND SiraNumarasi<='$GelenSiraNumarasi' AND SiraNumarasi>'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
												exit();
											}
									}
								}

								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=99");
								exit();
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=101");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=100");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>