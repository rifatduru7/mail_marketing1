<?php
ob_start();
/* Zaman Aşımı İle İlgili Yüksek Sayıda Error_Log Alıyorsanız Bu Alan Açık Kalsın >>>>> */
error_reporting(0);
ini_set("display_errors", 0);
/* Zaman Aşımı İle İlgili Yüksek Sayıda Error_Log Alıyorsanız Bu Alan Açık Kalsın <<<<<< */
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$ZamaniBesDakikaGeriAl		=	$ZamanDamgasi - ($SaniyeHesaplamaBirDakika * 5);

/* SİLİNEN E-MAIL HESABI VARSA ILGI E-MAIL HESABININ DÖNEN MAILLERINI TOPLA */
$CronHatasiIcinSilinenEMailHesaplariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevsilinenemailhesaplari WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinSilinenEMailHesaplariSorgusuKayitSayisi	=	$CronHatasiIcinSilinenEMailHesaplariSorgusu->num_rows;
	if($CronHatasiIcinSilinenEMailHesaplariSorgusuKayitSayisi>0){
		$CronHatasiIcinSilinenEMailHesaplariniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE gorevsilinenemailhesaplari SET CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$SilinenEMailHesaplariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevsilinenemailhesaplari ORDER BY ID ASC LIMIT 1");
$SilinenEMailHesaplariSorgusuKayitSayisi	=	$SilinenEMailHesaplariSorgusu->num_rows;
	if($SilinenEMailHesaplariSorgusuKayitSayisi>0){
		$SilinenEMailHesaplariSorgusuKaydi		=	$SilinenEMailHesaplariSorgusu->fetch_assoc();
		$SilinenEMailHesaplariSorgusuKaydiID							=	$SilinenEMailHesaplariSorgusuKaydi["ID"];
		$SilinenEMailHesaplariSorgusuKaydiEMailAdresi					=	$SilinenEMailHesaplariSorgusuKaydi["EMailAdresi"];
		$SilinenEMailHesaplariSorgusuKaydiEMailAdresiSifresi			=	$SilinenEMailHesaplariSorgusuKaydi["EMailAdresiSifresi"];
		$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru		=	$SilinenEMailHesaplariSorgusuKaydi["IMAPSunucuBaglantiTuru"];
		$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuAdresi				=	$SilinenEMailHesaplariSorgusuKaydi["IMAPSunucuAdresi"];
		$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuSSLPortu			=	$SilinenEMailHesaplariSorgusuKaydi["IMAPSunucusuSSLPortu"];
		$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuTLSPortu			=	$SilinenEMailHesaplariSorgusuKaydi["IMAPSunucusuTLSPortu"];
		$SilinenEMailHesaplariSorgusuKaydiCronunCalismaDurumu			=	$SilinenEMailHesaplariSorgusuKaydi["CronunCalismaDurumu"];
		$SilinenEMailHesaplariSorgusuKaydiCronunHataSayisi				=	$SilinenEMailHesaplariSorgusuKaydi["CronunHataSayisi"];
		
		if($SilinenEMailHesaplariSorgusuKaydiCronunCalismaDurumu==0){
			if($SilinenEMailHesaplariSorgusuKaydiCronunHataSayisi<5){
				$SilinenEMailHesapKaydininiGuncelle			=	$VeritabaniBaglantisi->query("UPDATE gorevsilinenemailhesaplari SET CronunCalismaDurumu='1', CronunCalismaTarihiZamanDamgasi='$ZamanDamgasi', CronunCalismaTarihi='$TarihSaat', CronunHataSayisi=CronunHataSayisi+1 WHERE ID='$SilinenEMailHesaplariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
			
				if($SilinenEMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru=="SSL"){
					$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuPortu		=	$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuSSLPortu;
				}else{
					$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuPortu		=	$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuTLSPortu;
				}
			
				/* INBOX KUTUSU */
				$SilinenEMailHesabiIcinINBOXBilgisi				=	"{".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuAdresi.":".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuPortu."/IMAP/".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru."}INBOX";
				$SilinenEMailHesabiIcinINBOXBaglantiAc			=	imap_open($SilinenEMailHesabiIcinINBOXBilgisi, $SilinenEMailHesaplariSorgusuKaydiEMailAdresi, $SilinenEMailHesaplariSorgusuKaydiEMailAdresiSifresi);
				$SilinenEMailHesabiIcinINBOXMailleriniCek		=	imap_search($SilinenEMailHesabiIcinINBOXBaglantiAc, "ALL", SE_UID);
				$SilinenEMailHesabiIcinINBOXMailleriSayisi		=	imap_num_msg($SilinenEMailHesabiIcinINBOXBaglantiAc);
				
				if($SilinenEMailHesabiIcinINBOXBaglantiAc){
					if($SilinenEMailHesabiIcinINBOXMailleriSayisi>0){
						$SilinenEMailHesabiIcinINBOXMailIcerigi		=	"";
					
						foreach($SilinenEMailHesabiIcinINBOXMailleriniCek as $SilinenEMailHesabiIcinINBOXMailNumarasi){
							$SilinenEMailHesabiIcinINBOXMailIcerigi		=	imap_fetchbody($SilinenEMailHesabiIcinINBOXBaglantiAc, $SilinenEMailHesabiIcinINBOXMailNumarasi, 2, FT_UID);
							$INBOXMailIcerigindekiEMailAdresiniYakala	=	MetinIcerisindekiEMailAdresiniKontrolEtVeBul($SilinenEMailHesabiIcinINBOXMailIcerigi);
					
							foreach($INBOXMailIcerigindekiEMailAdresiniYakala as $INBOXMailIcerigindekiEMailAdresiDegeri){
								$INBOXSilinenEMailHesaplariIcinEMailHesabiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE EMailAdresi='$INBOXMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
								$INBOXSilinenEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi	=	$INBOXSilinenEMailHesaplariIcinEMailHesabiSorgusu->num_rows;
									if(($INBOXSilinenEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi<1) and ($SilinenEMailHesaplariSorgusuKaydiEMailAdresi!=$INBOXMailIcerigindekiEMailAdresiDegeri)){
										$INBOXSilinenEMailHesaplariIcinKisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$INBOXMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
										$INBOXSilinenEMailHesaplariIcinKisiSorgusuKayitSayisi	=	$INBOXSilinenEMailHesaplariIcinKisiSorgusu->num_rows;
											if($INBOXSilinenEMailHesaplariIcinKisiSorgusuKayitSayisi>0){
												$INBOXSilinenEMailHesaplariIcinKisiSorgusuKaydi		=	$INBOXSilinenEMailHesaplariIcinKisiSorgusu->fetch_assoc();
													$INBOXSilinenEMailHesaplariIcinKisiSorgusuKaydiID		=	$INBOXSilinenEMailHesaplariIcinKisiSorgusuKaydi["ID"];
														$INBOXSilinenEMailHesaplariIcinKisiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisiler WHERE ID='$INBOXSilinenEMailHesaplariIcinKisiSorgusuKaydiID' LIMIT 1");
															if($INBOXSilinenEMailHesaplariIcinKisiKaydiSil){
																$INBOXSilinenEMailHesaplariIcinGenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi-1, GeriDonenGecersizMailSayisi=GeriDonenGecersizMailSayisi+1");
																$INBOXSilinenEMailHesaplariIcinSilinenKisiGoreviEkle		=	$VeritabaniBaglantisi->query("INSERT INTO gorevsilinenkisiler (KisiIDsi, KisiEMailAdresi) values ('$INBOXSilinenEMailHesaplariIcinKisiSorgusuKaydiID', '$INBOXMailIcerigindekiEMailAdresiDegeri')");
															}
											}
									}
							}
							imap_delete($SilinenEMailHesabiIcinINBOXBaglantiAc, $SilinenEMailHesabiIcinINBOXMailNumarasi, FT_UID);
						}
						imap_expunge($SilinenEMailHesabiIcinINBOXBaglantiAc);
						imap_close($SilinenEMailHesabiIcinINBOXBaglantiAc, CL_EXPUNGE);
					}
				}else{
					exit();
				}
				/* INBOX KUTUSU */
				
				/* SPAM KUTUSU */
				$SilinenEMailHesabiIcinSPAMBilgisi				=	"{".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuAdresi.":".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucusuPortu."/IMAP/".$SilinenEMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru."}Spam";
				$SilinenEMailHesabiIcinSPAMBaglantiAc			=	imap_open($SilinenEMailHesabiIcinSPAMBilgisi, $SilinenEMailHesaplariSorgusuKaydiEMailAdresi, $SilinenEMailHesaplariSorgusuKaydiEMailAdresiSifresi);
				$SilinenEMailHesabiIcinSPAMMailleriniCek		=	imap_search($SilinenEMailHesabiIcinSPAMBaglantiAc, "ALL", SE_UID);
				$SilinenEMailHesabiIcinSPAMMailleriSayisi		=	imap_num_msg($SilinenEMailHesabiIcinSPAMBaglantiAc);
				
				if($SilinenEMailHesabiIcinSPAMBaglantiAc){
					if($SilinenEMailHesabiIcinSPAMMailleriSayisi>0){
						$SilinenEMailHesabiIcinSPAMMailIcerigi		=	"";
					
						foreach($SilinenEMailHesabiIcinSPAMMailleriniCek as $SilinenEMailHesabiIcinSPAMMailNumarasi){
							$SilinenEMailHesabiIcinSPAMMailIcerigi		=	imap_fetchbody($SilinenEMailHesabiIcinSPAMBaglantiAc, $SilinenEMailHesabiIcinSPAMMailNumarasi, 2, FT_UID);
							$SPAMMailIcerigindekiEMailAdresiniYakala	=	MetinIcerisindekiEMailAdresiniKontrolEtVeBul($SilinenEMailHesabiIcinSPAMMailIcerigi);
					
							foreach($SPAMMailIcerigindekiEMailAdresiniYakala as $SPAMMailIcerigindekiEMailAdresiDegeri){
								$SPAMSilinenEMailHesaplariIcinEMailHesabiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE EMailAdresi='$SPAMMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
								$SPAMSilinenEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi		=	$SPAMSilinenEMailHesaplariIcinEMailHesabiSorgusu->num_rows;
									if(($SPAMSilinenEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi<1) and ($SilinenEMailHesaplariSorgusuKaydiEMailAdresi!=$SPAMMailIcerigindekiEMailAdresiDegeri)){
										$SPAMSilinenEMailHesaplariIcinKisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$SPAMMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
										$SPAMSilinenEMailHesaplariIcinKisiSorgusuKayitSayisi	=	$SPAMSilinenEMailHesaplariIcinKisiSorgusu->num_rows;
											if($SPAMSilinenEMailHesaplariIcinKisiSorgusuKayitSayisi>0){
												$SPAMSilinenEMailHesaplariIcinKisiSorgusuKaydi		=	$SPAMSilinenEMailHesaplariIcinKisiSorgusu->fetch_assoc();
													$SPAMSilinenEMailHesaplariIcinKisiSorgusuKaydiID		=	$SPAMSilinenEMailHesaplariIcinKisiSorgusuKaydi["ID"];
														$SPAMSilinenEMailHesaplariIcinKisiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisiler WHERE ID='$SPAMSilinenEMailHesaplariIcinKisiSorgusuKaydiID' LIMIT 1");
															if($SPAMSilinenEMailHesaplariIcinKisiKaydiSil){
																$SPAMSilinenEMailHesaplariIcinGenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi-1, GeriDonenGecersizMailSayisi=GeriDonenGecersizMailSayisi+1");
																$SPAMSilinenEMailHesaplariIcinSilinenKisiGoreviEkle			=	$VeritabaniBaglantisi->query("INSERT INTO gorevsilinenkisiler (KisiIDsi, KisiEMailAdresi) values ('$SPAMSilinenEMailHesaplariIcinKisiSorgusuKaydiID', '$SPAMMailIcerigindekiEMailAdresiDegeri')");
															}
											}
									}
							}
							imap_delete($SilinenEMailHesabiIcinSPAMBaglantiAc, $SilinenEMailHesabiIcinSPAMMailNumarasi, FT_UID);
						}
						imap_expunge($SilinenEMailHesabiIcinSPAMBaglantiAc);
						imap_close($SilinenEMailHesabiIcinSPAMBaglantiAc, CL_EXPUNGE);
					}
				}else{
					exit();
				}
				/* SPAM KUTUSU */
				
				$SilinenEMailHesapKaydiniSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevsilinenemailhesaplari WHERE ID='$SilinenEMailHesaplariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
			}else{
				$SilinenEMailHesapKaydiniSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevsilinenemailhesaplari WHERE ID='$SilinenEMailHesaplariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
			}
		}else{
			exit();
		}
	}
/* SİLİNEN E-MAIL HESABI VARSA ILGI E-MAIL HESABININ DÖNEN MAILLERINI TOPLA */

/* E-MAIL HESAPLARININ POSTA KUTULARINI KONTROL ET VE DÖNEN MAILLERINI TOPLA */
$CronHatasiIcinEMailHesaplariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE PostaKutusuCronununCalismaDurumu='1' AND PostaKutusuCronununCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinEMailHesaplariSorgusuKayitSayisi	=	$CronHatasiIcinEMailHesaplariSorgusu->num_rows;
	if($CronHatasiIcinEMailHesaplariSorgusuKayitSayisi>0){
		$CronHatasiIcinEMailHesaplariniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET PostaKutusuSonKontrolTarihiZamanDamgasi='$ZamanDamgasi', PostaKutusuSonKontrolTarihi='$TarihSaat', PostaKutusuCronununCalismaDurumu='0', PostaKutusuCronununCalismaTarihiZamanDamgasi='0', PostaKutusuCronununCalismaTarihi='' WHERE PostaKutusuCronununCalismaDurumu='1' AND PostaKutusuCronununCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$EMailHesaplariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY PostaKutusuSonKontrolTarihiZamanDamgasi ASC, ID ASC LIMIT 1");
$EMailHesaplariSorgusuKayitSayisi	=	$EMailHesaplariSorgusu->num_rows;
	if($EMailHesaplariSorgusuKayitSayisi>0){
		$EMailHesaplariSorgusuKaydi		=	$EMailHesaplariSorgusu->fetch_assoc();
		$EMailHesaplariSorgusuKaydiID									=	$EMailHesaplariSorgusuKaydi["ID"];
		$EMailHesaplariSorgusuKaydiEMailAdresi							=	$EMailHesaplariSorgusuKaydi["EMailAdresi"];
		$EMailHesaplariSorgusuKaydiEMailAdresiSifresi					=	$EMailHesaplariSorgusuKaydi["EMailAdresiSifresi"];
		$EMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru				=	$EMailHesaplariSorgusuKaydi["IMAPSunucuBaglantiTuru"];
		$EMailHesaplariSorgusuKaydiIMAPSunucuAdresi						=	$EMailHesaplariSorgusuKaydi["IMAPSunucuAdresi"];
		$EMailHesaplariSorgusuKaydiIMAPSunucusuSSLPortu					=	$EMailHesaplariSorgusuKaydi["IMAPSunucusuSSLPortu"];
		$EMailHesaplariSorgusuKaydiIMAPSunucusuTLSPortu					=	$EMailHesaplariSorgusuKaydi["IMAPSunucusuTLSPortu"];
		$EMailHesaplariSorgusuKaydiPostaKutusuCronununCalismaDurumu		=	$EMailHesaplariSorgusuKaydi["PostaKutusuCronununCalismaDurumu"];

		if($EMailHesaplariSorgusuKaydiPostaKutusuCronununCalismaDurumu==0){
			$EMailHesapKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET PostaKutusuCronununCalismaDurumu='1', PostaKutusuCronununCalismaTarihiZamanDamgasi='$ZamanDamgasi', PostaKutusuCronununCalismaTarihi='$TarihSaat' WHERE ID='$EMailHesaplariSorgusuKaydiID' ORDER BY PostaKutusuSonKontrolTarihiZamanDamgasi ASC, ID ASC LIMIT 1");
			
			if($EMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru=="SSL"){
				$EMailHesaplariSorgusuKaydiIMAPSunucusuPortu		=	$EMailHesaplariSorgusuKaydiIMAPSunucusuSSLPortu;
			}else{
				$EMailHesaplariSorgusuKaydiIMAPSunucusuPortu		=	$EMailHesaplariSorgusuKaydiIMAPSunucusuTLSPortu;
			}

			/* INBOX KUTUSU */
			$EMailHesabiIcinINBOXBilgisi				=	"{".$EMailHesaplariSorgusuKaydiIMAPSunucuAdresi.":".$EMailHesaplariSorgusuKaydiIMAPSunucusuPortu."/IMAP/".$EMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru."}INBOX";
			$EMailHesabiIcinINBOXBaglantiAc			=	imap_open($EMailHesabiIcinINBOXBilgisi, $EMailHesaplariSorgusuKaydiEMailAdresi, $EMailHesaplariSorgusuKaydiEMailAdresiSifresi);
			$EMailHesabiIcinINBOXMailleriniCek		=	imap_search($EMailHesabiIcinINBOXBaglantiAc, "ALL", SE_UID);
			$EMailHesabiIcinINBOXMailleriSayisi		=	imap_num_msg($EMailHesabiIcinINBOXBaglantiAc);
			
			if($EMailHesabiIcinINBOXBaglantiAc){
				if($EMailHesabiIcinINBOXMailleriSayisi>0){
					$EMailHesabiIcinINBOXMailIcerigi		=	"";
			
					foreach($EMailHesabiIcinINBOXMailleriniCek as $EMailHesabiIcinINBOXMailNumarasi){
						$EMailHesabiIcinINBOXMailIcerigi			=	imap_fetchbody($EMailHesabiIcinINBOXBaglantiAc, $EMailHesabiIcinINBOXMailNumarasi, 2, FT_UID);
						$INBOXMailIcerigindekiEMailAdresiniYakala	=	MetinIcerisindekiEMailAdresiniKontrolEtVeBul($EMailHesabiIcinINBOXMailIcerigi);

						foreach($INBOXMailIcerigindekiEMailAdresiniYakala as $INBOXMailIcerigindekiEMailAdresiDegeri){
							$INBOXEMailHesaplariIcinEMailHesabiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE EMailAdresi='$INBOXMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
							$INBOXEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi	=	$INBOXEMailHesaplariIcinEMailHesabiSorgusu->num_rows;
								if(($INBOXEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi<1) and ($EMailHesaplariSorgusuKaydiEMailAdresi!=$INBOXMailIcerigindekiEMailAdresiDegeri)){
									$INBOXEMailHesaplariIcinKisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$INBOXMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
									$INBOXEMailHesaplariIcinKisiSorgusuKayitSayisi	=	$INBOXEMailHesaplariIcinKisiSorgusu->num_rows;
										if($INBOXEMailHesaplariIcinKisiSorgusuKayitSayisi>0){
											$INBOXEMailHesaplariIcinKisiSorgusuKaydi		=	$INBOXEMailHesaplariIcinKisiSorgusu->fetch_assoc();
												$INBOXEMailHesaplariIcinKisiSorgusuKaydiID		=	$INBOXEMailHesaplariIcinKisiSorgusuKaydi["ID"];
													$INBOXEMailHesaplariIcinKisiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisiler WHERE ID='$INBOXEMailHesaplariIcinKisiSorgusuKaydiID' LIMIT 1");
														if($INBOXEMailHesaplariIcinKisiKaydiSil){
															$INBOXEMailHesaplariIcinGenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi-1, GeriDonenGecersizMailSayisi=GeriDonenGecersizMailSayisi+1");
															$INBOXEMailHesaplariIcinKisiGoreviEkle		=	$VeritabaniBaglantisi->query("INSERT INTO gorevsilinenkisiler (KisiIDsi, KisiEMailAdresi) values ('$INBOXEMailHesaplariIcinKisiSorgusuKaydiID', '$INBOXMailIcerigindekiEMailAdresiDegeri')");
														}
										}
								}
						}
						imap_delete($EMailHesabiIcinINBOXBaglantiAc, $EMailHesabiIcinINBOXMailNumarasi, FT_UID);
					}
					imap_expunge($EMailHesabiIcinINBOXBaglantiAc);
					imap_close($EMailHesabiIcinINBOXBaglantiAc, CL_EXPUNGE);
				}
			}
			/* INBOX KUTUSU */
			
			/* SPAM KUTUSU */
			$EMailHesabiIcinSPAMBilgisi				=	"{".$EMailHesaplariSorgusuKaydiIMAPSunucuAdresi.":".$EMailHesaplariSorgusuKaydiIMAPSunucusuPortu."/IMAP/".$EMailHesaplariSorgusuKaydiIMAPSunucuBaglantiTuru."}Spam";
			$EMailHesabiIcinSPAMBaglantiAc			=	imap_open($EMailHesabiIcinSPAMBilgisi, $EMailHesaplariSorgusuKaydiEMailAdresi, $EMailHesaplariSorgusuKaydiEMailAdresiSifresi);
			$EMailHesabiIcinSPAMMailleriniCek		=	imap_search($EMailHesabiIcinSPAMBaglantiAc, "ALL", SE_UID);
			$EMailHesabiIcinSPAMMailleriSayisi		=	imap_num_msg($EMailHesabiIcinSPAMBaglantiAc);

			if($EMailHesabiIcinSPAMBaglantiAc){
				if($EMailHesabiIcinSPAMMailleriSayisi>0){
					$EMailHesabiIcinSPAMMailIcerigi		=	"";

					foreach($EMailHesabiIcinSPAMMailleriniCek as $EMailHesabiIcinSPAMMailNumarasi){
						$EMailHesabiIcinSPAMMailIcerigi		=	imap_fetchbody($EMailHesabiIcinSPAMBaglantiAc, $EMailHesabiIcinSPAMMailNumarasi, 2, FT_UID);
						$SPAMMailIcerigindekiEMailAdresiniYakala	=	MetinIcerisindekiEMailAdresiniKontrolEtVeBul($EMailHesabiIcinSPAMMailIcerigi);

						foreach($SPAMMailIcerigindekiEMailAdresiniYakala as $SPAMMailIcerigindekiEMailAdresiDegeri){
							$SPAMEMailHesaplariIcinEMailHesabiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE EMailAdresi='$SPAMMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
							$SPAMEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi		=	$SPAMEMailHesaplariIcinEMailHesabiSorgusu->num_rows;
								if(($SPAMEMailHesaplariIcinEMailHesabiSorgusuKayitSayisi<1) and ($EMailHesaplariSorgusuKaydiEMailAdresi!=$SPAMMailIcerigindekiEMailAdresiDegeri)){
									$SPAMEMailHesaplariIcinKisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$SPAMMailIcerigindekiEMailAdresiDegeri' LIMIT 1");
									$SPAMEMailHesaplariIcinKisiSorgusuKayitSayisi	=	$SPAMEMailHesaplariIcinKisiSorgusu->num_rows;
										if($SPAMEMailHesaplariIcinKisiSorgusuKayitSayisi>0){
											$SPAMEMailHesaplariIcinKisiSorgusuKaydi		=	$SPAMEMailHesaplariIcinKisiSorgusu->fetch_assoc();
												$SPAMEMailHesaplariIcinKisiSorgusuKaydiID		=	$SPAMEMailHesaplariIcinKisiSorgusuKaydi["ID"];
													$SPAMEMailHesaplariIcinKisiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisiler WHERE ID='$SPAMEMailHesaplariIcinKisiSorgusuKaydiID' LIMIT 1");
														if($SPAMEMailHesaplariIcinKisiKaydiSil){
															$SPAMEMailHesaplariIcinGenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi-1, GeriDonenGecersizMailSayisi=GeriDonenGecersizMailSayisi+1");
															$SPAMEMailHesaplariIcinKisiGoreviEkle			=	$VeritabaniBaglantisi->query("INSERT INTO gorevsilinenkisiler (KisiIDsi, KisiEMailAdresi) values ('$SPAMEMailHesaplariIcinKisiSorgusuKaydiID', '$SPAMMailIcerigindekiEMailAdresiDegeri')");
														}
										}
								}
						}
						imap_delete($EMailHesabiIcinSPAMBaglantiAc, $EMailHesabiIcinSPAMMailNumarasi, FT_UID);
					}
					imap_expunge($EMailHesabiIcinSPAMBaglantiAc);
					imap_close($EMailHesabiIcinSPAMBaglantiAc, CL_EXPUNGE);
				}
			}
			/* SPAM KUTUSU */

			$EMailHesapKaydiniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET PostaKutusuKontrolSayisi=PostaKutusuKontrolSayisi+1, PostaKutusuSonKontrolTarihiZamanDamgasi='$ZamanDamgasi', PostaKutusuSonKontrolTarihi='$TarihSaat', PostaKutusuCronununCalismaDurumu='0', PostaKutusuCronununCalismaTarihiZamanDamgasi='0', PostaKutusuCronununCalismaTarihi='' WHERE ID='$EMailHesaplariSorgusuKaydiID' ORDER BY PostaKutusuSonKontrolTarihiZamanDamgasi DESC LIMIT 1");
		}else{
			exit();
		}
	}else{
		exit();
	}
/* E-MAIL HESAPLARININ POSTA KUTULARINI KONTROL ET VE DÖNEN MAILLERINI TOPLA */

ob_end_flush();
$VeritabaniBaglantisi->close();
?>