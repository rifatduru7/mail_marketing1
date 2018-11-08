<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");
require_once("../Frameworkler/PHPMailerMaster/PHPMailerAutoload.php");

/* GÖNDERİM İŞLEMLERİNİ YAP */
$GonderimlerIcinKayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimleribekleyen ORDER BY GonderimOnceligiDegeri DESC, ID ASC LIMIT $SiteAyarlariKaydiIslemBasinaGonderilecekMailSayisi");
$GonderimlerIcinKayitSorgusuKayitSayisi		=	$GonderimlerIcinKayitSorgusu->num_rows;
	if($GonderimlerIcinKayitSorgusuKayitSayisi>0){
		while($GonderimlerIcinKayitSorgusuKayitlari=$GonderimlerIcinKayitSorgusu->fetch_assoc()){
			$GonderimlerIcinKayitSorgusuKayitlariID							=	$GonderimlerIcinKayitSorgusuKayitlari["ID"];
			$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi				=	$GonderimlerIcinKayitSorgusuKayitlari["KampanyaIDsi"];
			$GonderimlerIcinKayitSorgusuKayitlariKisiIDsi					=	$GonderimlerIcinKayitSorgusuKayitlari["KisiIDsi"];
			$GonderimlerIcinKayitSorgusuKayitlariHashKodu					=	$GonderimlerIcinKayitSorgusuKayitlari["HashKodu"];
			$GonderimlerIcinKayitSorgusuKayitlariGonderimOnceligiDegeri		=	$GonderimlerIcinKayitSorgusuKayitlari["GonderimOnceligiDegeri"];

			$KampanyaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
			$KampanyaBilgileriSorgusuKayitSayisi	=	$KampanyaBilgileriSorgusu->num_rows;
				if($KampanyaBilgileriSorgusuKayitSayisi>0){
					$KampanyaBilgileriSorgusuKaydi		=	$KampanyaBilgileriSorgusu->fetch_assoc();
						$KampanyaBilgileriSorgusuKaydiID					=	$KampanyaBilgileriSorgusuKaydi["ID"];
						$KampanyaBilgileriSorgusuKaydiTemaIDsi				=	$KampanyaBilgileriSorgusuKaydi["TemaIDsi"];
						$KampanyaBilgileriSorgusuKaydiWebSitesiLinki		=	$KampanyaBilgileriSorgusuKaydi["WebSitesiLinki"];
							$KampanyaBilgileriSorgusuKaydiWebSitesiLinkiDuzenle			=	DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiWebSitesiLinki);
						$KampanyaBilgileriSorgusuKaydiMailGondericiAdi		=	$KampanyaBilgileriSorgusuKaydi["MailGondericiAdi"];
							$KampanyaBilgileriSorgusuKaydiMailGondericiAdiDuzenle		=	DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiMailGondericiAdi);
						$KampanyaBilgileriSorgusuKaydiYanitAliciAdi			=	$KampanyaBilgileriSorgusuKaydi["YanitAliciAdi"];
							$KampanyaBilgileriSorgusuKaydiYanitAliciAdiDuzenle			=	DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiYanitAliciAdi);
						$KampanyaBilgileriSorgusuKaydiYanitEMailAdresi		=	$KampanyaBilgileriSorgusuKaydi["YanitEMailAdresi"];
							$KampanyaBilgileriSorgusuKaydiYanitEMailAdresiDuzenle		=	DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiYanitEMailAdresi);


					$TemaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$KampanyaBilgileriSorgusuKaydiTemaIDsi' LIMIT 1");
					$TemaBilgileriSorgusuKayitSayisi	=	$TemaBilgileriSorgusu->num_rows;
						if($TemaBilgileriSorgusuKayitSayisi>0){
							$TemaBilgileriSorgusuKaydi		=	$TemaBilgileriSorgusu->fetch_assoc();
								$TemaBilgileriSorgusuKaydiID						=	$TemaBilgileriSorgusuKaydi["ID"];
								$TemaBilgileriSorgusuKaydiTemaTaslakDosyasi			=	$TemaBilgileriSorgusuKaydi["TemaTaslakDosyasi"];
									$TemaBilgileriSorgusuKaydiTemaTaslakDosyasiBicimlendir		=	"../Temalar/".$TemaBilgileriSorgusuKaydiTemaTaslakDosyasi.".html";
								$TemaBilgileriSorgusuKaydiBaslikMetniBir			=	$TemaBilgileriSorgusuKaydi["BaslikMetniBir"];
									$TemaBilgileriSorgusuKaydiBaslikMetniBirDuzenle				=	DonusumleriGeriDondur($TemaBilgileriSorgusuKaydiBaslikMetniBir);
								$TemaBilgileriSorgusuKaydiBaslikMetniIki			=	$TemaBilgileriSorgusuKaydi["BaslikMetniIki"];
									$TemaBilgileriSorgusuKaydiBaslikMetniIkiDuzenle				=	DonusumleriGeriDondur($TemaBilgileriSorgusuKaydiBaslikMetniIki);
								$TemaBilgileriSorgusuKaydiBaslikMetniUc				=	$TemaBilgileriSorgusuKaydi["BaslikMetniUc"];
									$TemaBilgileriSorgusuKaydiBaslikMetniUcDuzenle				=	DonusumleriGeriDondur($TemaBilgileriSorgusuKaydiBaslikMetniUc);
								$TemaBilgileriSorgusuKaydiBaslikMetniDort			=	$TemaBilgileriSorgusuKaydi["BaslikMetniDort"];
									$TemaBilgileriSorgusuKaydiBaslikMetniDortDuzenle			=	DonusumleriGeriDondur($TemaBilgileriSorgusuKaydiBaslikMetniDort);
								$TemaBilgileriSorgusuKaydiBaslikMetniBes			=	$TemaBilgileriSorgusuKaydi["BaslikMetniBes"];
									$TemaBilgileriSorgusuKaydiBaslikMetniBesDuzenle				=	DonusumleriGeriDondur($TemaBilgileriSorgusuKaydiBaslikMetniBes);

							$TemaDosyasiniAc				=	file_get_contents($TemaBilgileriSorgusuKaydiTemaTaslakDosyasiBicimlendir);
							$TemaDosyasiIceriginiDonustur	=	DosyaliIcerikleriniFiltrele($TemaDosyasiniAc);
							
							$KisiBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");
							$KisiBilgileriSorgusuKayitSayisi	=	$KisiBilgileriSorgusu->num_rows;
								if($KisiBilgileriSorgusuKayitSayisi>0){
									$KisiBilgileriSorgusuKaydi		=	$KisiBilgileriSorgusu->fetch_assoc();
										$KisiBilgileriSorgusuKaydiID				=	$KisiBilgileriSorgusuKaydi["ID"];
										$KisiBilgileriSorgusuKaydiAdi				=	$KisiBilgileriSorgusuKaydi["Adi"];
											$KisiBilgileriSorgusuKaydiAdiDuzenle				=	DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiAdi);
										$KisiBilgileriSorgusuKaydiSoyadi			=	$KisiBilgileriSorgusuKaydi["Soyadi"];
											$KisiBilgileriSorgusuKaydiSoyadiDuzenle				=	DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiSoyadi);
										if(($KisiBilgileriSorgusuKaydiAdiDuzenle!="") or ($KisiBilgileriSorgusuKaydiSoyadiDuzenle!="")){
											$AliciAdiSoyadiYaz		=	$KisiBilgileriSorgusuKaydiAdiDuzenle." ".$KisiBilgileriSorgusuKaydiSoyadiDuzenle;
										}else{
											$AliciAdiSoyadiYaz		=	"";
										}
										$KisiBilgileriSorgusuKaydiEMailAdresi		=	$KisiBilgileriSorgusuKaydi["EMailAdresi"];
											$KisiBilgileriSorgusuKaydiEMailAdresiDuzenle		=	DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEMailAdresi);
									
									$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE GunlukKalanMailGonderimSayisi>0 AND YeniGonderimYapabilecegiTarihZamanDamgasi<=$ZamanDamgasi AND DinlendirmeDurumu='0' AND CalismaDurumu='1' ORDER BY SonGonderimTarihiZamanDamgasi ASC LIMIT 1");
									$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
										if($EMailHesapBilgileriSorgusuKayitSayisi>0){
											$EMailHesapBilgileriSorgusuKaydi		=	$EMailHesapBilgileriSorgusu->fetch_assoc();
												$EMailHesapBilgileriSorgusuKaydiID												=	$EMailHesapBilgileriSorgusuKaydi["ID"];
												$EMailHesapBilgileriSorgusuKaydiEMailAdresi										=	$EMailHesapBilgileriSorgusuKaydi["EMailAdresi"];
													$EMailHesapBilgileriSorgusuKaydiEMailAdresiDuzenle										=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi);
												$EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresi								=	$EMailHesapBilgileriSorgusuKaydi["EMailAdresiSifresi"];
													$EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresiDuzenle								=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresi);
												$EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucuBaglantiTuru"];
													$EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuruDuzenle							=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru);
												$EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresi								=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucuAdresi"];
													$EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresiDuzenle									=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresi);
												$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuSSLPortu							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucusuSSLPortu"];
												$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuTLSPortu							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucusuTLSPortu"];
												$EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi				=	$EMailHesapBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
												$EMailHesapBilgileriSorgusuKaydiGunlukGonderilenMailSayisi						=	$EMailHesapBilgileriSorgusuKaydi["GunlukGonderilenMailSayisi"];
												$EMailHesapBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi					=	$EMailHesapBilgileriSorgusuKaydi["GunlukKalanMailGonderimSayisi"];
												$EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi		=	$EMailHesapBilgileriSorgusuKaydi["YeniGonderimIcinHazirOlmaZamanAraligiSuresi"];
													$EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresiDuzenle		=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi);
												$EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi					=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeZamanAraligiSuresi"];
													$EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresiDuzenle					=	DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi);

											$YeniGonderimYapabilmeSureleriniBul			=	YeniGonderimlerIcinSureHesapla($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresiDuzenle);
											$YeniGonderimYapabilmeTarihiZamanDamgasi	=	$YeniGonderimYapabilmeSureleriniBul[0];
											$YeniGonderimYapabilmeTarihi				=	$YeniGonderimYapabilmeSureleriniBul[1];
											
											$DinlendirilmeSuruleriniBul					=	DinlendirilmelerIcinBaslangicVeBitisHesapla($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresiDuzenle);
											$DinlendirilmeBaslangicTarihiZamanDamgasi	=	$DinlendirilmeSuruleriniBul[0];
											$DinlendirilmeBaslangicTarihi				=	$DinlendirilmeSuruleriniBul[1];
											$DinlendirilmeBitisTarihiZamanDamgasi		=	$DinlendirilmeSuruleriniBul[2];
											$DinlendirilmeBitisTarihi					=	$DinlendirilmeSuruleriniBul[3];

											$TemaDosyasiIcerigiDuzenle			=	MailGonderimiIcinDuzenle($TemaBilgileriSorgusuKaydiID, $TemaDosyasiIceriginiDonustur, $KampanyaBilgileriSorgusuKaydiWebSitesiLinkiDuzenle, $KampanyaBilgileriSorgusuKaydiYanitEMailAdresiDuzenle, $KampanyaBilgileriSorgusuKaydiID, $KisiBilgileriSorgusuKaydiID, $GonderimlerIcinKayitSorgusuKayitlariHashKodu, $KisiBilgileriSorgusuKaydiAdiDuzenle, $KisiBilgileriSorgusuKaydiSoyadiDuzenle);
											$TemaDosyasiIcerigiGeriDonustur		=	DonusumleriGeriDondur($TemaDosyasiIcerigiDuzenle);
											
											$TemaDosyasiIceriginiYaz					=	$TemaDosyasiIcerigiGeriDonustur[0];
											$TemaDosyasiBaslikSecimDegeriniYaz			=	$TemaDosyasiIcerigiGeriDonustur[1];
											$TemaDosyasiIcerikSecimDegeriniYaz			=	$TemaDosyasiIcerigiGeriDonustur[2];
											
											if($TemaDosyasiBaslikSecimDegeriniYaz==1){
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniBirDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniBirGonderimSayisi=BaslikMetniBirGonderimSayisi+1";
											}elseif($TemaDosyasiBaslikSecimDegeriniYaz==2){
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniIkiDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniIkiGonderimSayisi=BaslikMetniIkiGonderimSayisi+1";
											}elseif($TemaDosyasiBaslikSecimDegeriniYaz==3){
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniUcDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniUcGonderimSayisi=BaslikMetniUcGonderimSayisi+1";
											}elseif($TemaDosyasiBaslikSecimDegeriniYaz==4){
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniDortDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniDortGonderimSayisi=BaslikMetniDortGonderimSayisi+1";
											}elseif($TemaDosyasiBaslikSecimDegeriniYaz==5){
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniBesDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniBesGonderimSayisi=BaslikMetniBesGonderimSayisi+1";
											}else{
												$MailGonderimiIcinBaslik							=	$TemaBilgileriSorgusuKaydiBaslikMetniBirDuzenle;
												$MailGonderimiBasligiIcinGonderimSayisiArttirKosulu	=	"BaslikMetniBirGonderimSayisi=BaslikMetniBirGonderimSayisi+1";
											}
											
											if($TemaDosyasiIcerikSecimDegeriniYaz==1){
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniBirGonderimSayisi=IcerikMetniBirGonderimSayisi+1";
											}elseif($TemaDosyasiIcerikSecimDegeriniYaz==2){
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniIkiGonderimSayisi=IcerikMetniIkiGonderimSayisi+1";
											}elseif($TemaDosyasiIcerikSecimDegeriniYaz==3){
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniUcGonderimSayisi=IcerikMetniUcGonderimSayisi+1";
											}elseif($TemaDosyasiIcerikSecimDegeriniYaz==4){
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniDortGonderimSayisi=IcerikMetniDortGonderimSayisi+1";
											}elseif($TemaDosyasiIcerikSecimDegeriniYaz==5){
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniBesGonderimSayisi=IcerikMetniBesGonderimSayisi+1";
											}else{
												$MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu	=	"IcerikMetniBirGonderimSayisi=IcerikMetniBirGonderimSayisi+1";
											}
											
											if($TemaDosyasiIceriginiYaz!="HATA"){
												$MailGondermeDetaylari				=	"";
												$MailGonder							=	new PHPMailer;
												$MailGonder->SMTPDebug				=	2;
												$MailGonder->Debugoutput			=	"html";
												$MailGonder->Debugoutput			=	function($MailGondermeDetaylariIcerik, $MailGondermeDetaylariSeviye){
													global $MailGondermeDetaylari;
													$MailGondermeDetaylari	.=	$MailGondermeDetaylariSeviye." : ".$MailGondermeDetaylariIcerik."\n<br />";
												};
												$MailGonder->isSMTP();
												$MailGonder->Host					=	$EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresiDuzenle;
												$MailGonder->SMTPAuth				=	true;
												$MailGonder->CharSet				=	"utf-8";
												$MailGonder->Encoding				=	"base64";
												$MailGonder->Username				=	$EMailHesapBilgileriSorgusuKaydiEMailAdresiDuzenle;
												$MailGonder->Password				=	$EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresiDuzenle; 
												if($EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuruDuzenle=="SSL"){
													$MailGonder->SMTPSecure			=	"ssl";
													$MailGonder->Port				=	$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuSSLPortu;
												}else{
													$MailGonder->SMTPSecure			=	"tls";
													$MailGonder->Port				=	$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuTLSPortu;
												}
												$MailGonder->setFrom($EMailHesapBilgileriSorgusuKaydiEMailAdresiDuzenle, $KampanyaBilgileriSorgusuKaydiMailGondericiAdiDuzenle);
												$MailGonder->addReplyTo($KampanyaBilgileriSorgusuKaydiYanitEMailAdresiDuzenle, $KampanyaBilgileriSorgusuKaydiYanitAliciAdiDuzenle);
												if($AliciAdiSoyadiYaz!=""){
													$MailGonder->addAddress($KisiBilgileriSorgusuKaydiEMailAdresiDuzenle, $AliciAdiSoyadiYaz);
												}else{
													$MailGonder->addAddress($KisiBilgileriSorgusuKaydiEMailAdresiDuzenle);
												}
												$MailGonder->isHTML(true);
												$MailGonder->Subject				=	DonusumleriGeriDondur($MailGonderimiIcinBaslik);												
												$MailGonder->MsgHTML($TemaDosyasiIceriginiYaz);
												
												if($MailGonder->send()) {
													preg_match_all("/SERVER -> CLIENT: 554|Spam|SPAM|Troubleshooting|TROUBLESHOOTING/", $MailGondermeDetaylari, $SorunMetni);
													$SorunMetniVarmi		=	count($SorunMetni[0]);
														if($SorunMetniVarmi<1){
															$GonderilenMailKaydet						=	$VeritabaniBaglantisi->query("INSERT INTO emailgonderimlerigonderilen (KampanyaIDsi, KisiIDsi, HashKodu, GonderimOnceligiDegeri, EklenmeTarihiZamanDamgasi, EklenmeTarihi, GonderimTarihiZamanDamgasi, GonderimTarihi) values ('$KampanyaBilgileriSorgusuKaydiID', '$KisiBilgileriSorgusuKaydiID', '$GonderimlerIcinKayitSorgusuKayitlariHashKodu', '$GonderimlerIcinKayitSorgusuKayitlariGonderimOnceligiDegeri', '$ZamanDamgasi', '$TarihSaat', '$ZamanDamgasi', '$TarihSaat')");
															
															$GonderimBekleyenMailKaydiSil				=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
															
															$TemaBaslikVeIcerikSayisiArttir				=	$VeritabaniBaglantisi->query("UPDATE temalar SET $MailGonderimiBasligiIcinGonderimSayisiArttirKosulu, $MailGonderimiIcerigiIcinGonderimSayisiArttirKosulu WHERE ID='$TemaBilgileriSorgusuKaydiID' LIMIT 1");
															
															$GenelIstatistikleriGuncelle				=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+1, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-1, GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1, GonderilenMailSayisi=GonderilenMailSayisi+1");
															
															$KisiIstatistikleriGuncelle					=	$VeritabaniBaglantisi->query("UPDATE kisiler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1, GonderilenMailSayisi=GonderilenMailSayisi+1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");
															
															$KampanyaIstatistikleriGuncelle				=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1, GonderilenMailSayisi=GonderilenMailSayisi+1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
																								
															$EMailHesabiIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+1, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-1, SonGonderimTarihiZamanDamgasi='$ZamanDamgasi', SonGonderimTarihi='$TarihSaat', YeniGonderimYapabilecegiTarihZamanDamgasi='$YeniGonderimYapabilmeTarihiZamanDamgasi', YeniGonderimYapabilecegiTarih='$YeniGonderimYapabilmeTarihi', GonderilenMailSayisi=GonderilenMailSayisi+1 WHERE ID='$EMailHesapBilgileriSorgusuKaydiID' LIMIT 1");
															
															$BaskaIslemVarmiKontroluSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimleribekleyen WHERE KampanyaIDsi='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
															$BaskaIslemVarmiKontroluSorgusuKayitSayisi	=	$BaskaIslemVarmiKontroluSorgusu->num_rows;
																if($BaskaIslemVarmiKontroluSorgusuKayitSayisi<1){
																	$GonderimHazirligiVarmiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevkampanyagonderimlerihazirla WHERE KampanyaIDsi='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
																	$GonderimHazirligiVarmiSorgusuKayitSayisi	=	$GonderimHazirligiVarmiSorgusu->num_rows;
																		if($GonderimHazirligiVarmiSorgusuKayitSayisi<1){
																			$KampanyaGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimTamamlanmaDurumu='1', GonderimTamamlanmaTarihiZamanDamgasi='$ZamanDamgasi', GonderimTamamlanmaTarihi='$TarihSaat' WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
																		}																	
																}
														}else{
															$EMailHesabiIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET DinlendirmeSayisi=DinlendirmeSayisi+1, DinlendirmeDurumu='1', DinlendirmeBaslangicTarihiZamanDamgasi='$DinlendirilmeBaslangicTarihiZamanDamgasi', DinlendirmeBaslangicTarihi='$DinlendirilmeBaslangicTarihi', DinlendirmeBitisTarihiZamanDamgasi='$DinlendirilmeBitisTarihiZamanDamgasi', DinlendirmeBitisTarihi='$DinlendirilmeBitisTarihi' WHERE ID='$EMailHesapBilgileriSorgusuKaydiID' LIMIT 1");
															
															$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi-1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi+1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
														}
												}else{
													preg_match_all("/SERVER -> CLIENT: 554|Spam|SPAM|Troubleshooting|TROUBLESHOOTING/", $MailGondermeDetaylari, $SorunMetni);
													$SorunMetniVarmi		=	count($SorunMetni[0]);
														if($SorunMetniVarmi<1){
															$GonderimBekleyenMailKaydet			=	$VeritabaniBaglantisi->query("INSERT INTO emailgonderimleribekleyen (KampanyaIDsi, KisiIDsi, HashKodu, GonderimOnceligiDegeri, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$KampanyaBilgileriSorgusuKaydiID', '$KisiBilgileriSorgusuKaydiID', '$GonderimlerIcinKayitSorgusuKayitlariHashKodu', '0', '$ZamanDamgasi', '$TarihSaat')");
													
															$GonderimBekleyenMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
														}else{
															$EMailHesabiIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET DinlendirmeSayisi=DinlendirmeSayisi+1, DinlendirmeDurumu='1', DinlendirmeBaslangicTarihiZamanDamgasi='$DinlendirilmeBaslangicTarihiZamanDamgasi', DinlendirmeBaslangicTarihi='$DinlendirilmeBaslangicTarihi', DinlendirmeBitisTarihiZamanDamgasi='$DinlendirilmeBitisTarihiZamanDamgasi', DinlendirmeBitisTarihi='$DinlendirilmeBitisTarihi' WHERE ID='$EMailHesapBilgileriSorgusuKaydiID' LIMIT 1");
															
															$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi-1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi+1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi-$EMailHesapBilgileriSorgusuKaydiGunlukKalanMailGonderimSayisi");
														}
												}						
											}else{
												exit();
											}
										}else{
											exit();
										}
								}else{
									$GonderimBekleyenMailKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
									
									$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1");
									
									$KampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
							
									exit();
								}
						}else{
							$GonderimBekleyenMailKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
							
							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1");
							
							$KisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");
							
							$KampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
							
							exit();
						}
				}else{
					$GonderimBekleyenMailKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariID' LIMIT 1");

					$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1");

					$KisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1 WHERE ID='$GonderimlerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");
					
					exit();
				}
		}
	}else{
		exit();
	}
/* GÖNDERİM İŞLEMLERİNİ YAP */

ob_end_flush();
$VeritabaniBaglantisi->close();
?>