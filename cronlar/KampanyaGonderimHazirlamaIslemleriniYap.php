<?php
ob_start();
/* Zaman Aşımı İle İlgili Yüksek Sayıda Error_Log Alıyorsanız Bu Alan Açık Kalsın >>>>> */
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$ZamaniBesDakikaGeriAl		=	$ZamanDamgasi - ($SaniyeHesaplamaBirDakika * 5);

/* KAMPANYA GÖNDERİM HAZIRLAMA İŞLMELERİ */
$CronHatasiIcinKampanyaGonderimHazirlamaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevkampanyagonderimlerihazirla WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinKampanyaGonderimHazirlamaSorgusuKayitSayisi	=	$CronHatasiIcinKampanyaGonderimHazirlamaSorgusu->num_rows;
	if($CronHatasiIcinKampanyaGonderimHazirlamaSorgusuKayitSayisi>0){
		$CronHatasiIcinKampanyaGonderimHazirlamaniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE gorevkampanyagonderimlerihazirla SET CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$KampanyaGonderimHazirlamaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevkampanyagonderimlerihazirla ORDER BY ID ASC LIMIT 1");
$KampanyaGonderimHazirlamaSorgusuKayitSayisi	=	$KampanyaGonderimHazirlamaSorgusu->num_rows;
	if($KampanyaGonderimHazirlamaSorgusuKayitSayisi>0){
		$KampanyaGonderimHazirlamaSorgusuKaydi		=	$KampanyaGonderimHazirlamaSorgusu->fetch_assoc();
		$KampanyaGonderimHazirlamaSorgusuKaydiID								=	$KampanyaGonderimHazirlamaSorgusuKaydi["ID"];
		$KampanyaGonderimHazirlamaSorgusuKaydiKampanyaIDsi						=	$KampanyaGonderimHazirlamaSorgusuKaydi["KampanyaIDsi"];
		$KampanyaGonderimHazirlamaSorgusuKaydiSonIslenenKayitIDsi				=	$KampanyaGonderimHazirlamaSorgusuKaydi["SonIslenenKayitIDsi"];
		$KampanyaGonderimHazirlamaSorgusuKaydiCronunCalismaDurumu				=	$KampanyaGonderimHazirlamaSorgusuKaydi["CronunCalismaDurumu"];
		
		if($KampanyaGonderimHazirlamaSorgusuKaydiCronunCalismaDurumu==0){
			$KampanyaGonderimHazirlamaKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE gorevkampanyagonderimlerihazirla SET CronunCalismaDurumu='1', CronunCalismaTarihiZamanDamgasi='$ZamanDamgasi', CronunCalismaTarihi='$TarihSaat' WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");

			$KampanyaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiKampanyaIDsi' ORDER BY ID ASC LIMIT 1");
			$KampanyaBilgileriSorgusuKayitSayisi	=	$KampanyaBilgileriSorgusu->num_rows;
				if($KampanyaBilgileriSorgusuKayitSayisi>0){
					$KampanyaBilgileriSorgusuKaydi		=	$KampanyaBilgileriSorgusu->fetch_assoc();
						$KampanyaBilgileriSorgusuKaydiID						=	$KampanyaBilgileriSorgusuKaydi["ID"];
						$KampanyaBilgileriSorgusuKaydiOncelikDurumu				=	$KampanyaBilgileriSorgusuKaydi["OncelikDurumu"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinAdi				=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinAdi"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi			=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinSoyadi"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi		=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinEMailAdresi"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti		=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinCinsiyeti"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu		=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinVIPDurumu"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi			=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinUlkesi"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinSehri			=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinSehri"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi			=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinIlcesi"];
						$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu		=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinPostaKodu"];

					$SorguKosulu			=	"";

					if($KampanyaBilgileriSorgusuKaydiFiltreIcinAdi!=""){
						$SorguKosulu		.=	" AND Adi LIKE '%$KampanyaBilgileriSorgusuKaydiFiltreIcinAdi%'";
					}

					if($KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi!=""){
						$SorguKosulu		.=	" AND Soyadi LIKE '%$KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi%'";
					}

					if($KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi!=""){
						$SorguKosulu		.=	" AND EMailAdresi LIKE '%$KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi%'";
					}

					if($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti!="Tümü"){
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti=="Erkek"){
							$SorguKosulu		.=	" AND Cinsiyeti='Erkek'";
						}else{
							$SorguKosulu		.=	" AND Cinsiyeti='Kadın'";
						}
					}

					if($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu!=2){
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu==1){
							$SorguKosulu		.=	" AND VIPDurumu='1'";
						}else{
							$SorguKosulu		.=	" AND VIPDurumu='0'";
						}
					}
					
					if(($KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi!="") and ($KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi!=0)){
						$SorguKosulu			.=	" AND Ulkesi='$KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi'";
					}
					
					if(($KampanyaBilgileriSorgusuKaydiFiltreIcinSehri!="") and ($KampanyaBilgileriSorgusuKaydiFiltreIcinSehri!=0)){
						$SorguKosulu			.=	" AND Sehri='$KampanyaBilgileriSorgusuKaydiFiltreIcinSehri'";
					}
					
					if($KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi!=""){
						$SorguKosulu		.=	" AND Ilcesi LIKE '%$KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi%'";
					}
					
					if(($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu!="") and ($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu!=0)){
						$SorguKosulu		.=	" AND PostaKodu LIKE '%$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu%'";
					}
					
					$KisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID>'$KampanyaGonderimHazirlamaSorgusuKaydiSonIslenenKayitIDsi' $SorguKosulu ORDER BY ID ASC LIMIT 100");
					$KisilerSorgusuKayitSayisi	=	$KisilerSorgusu->num_rows;
						if($KisilerSorgusuKayitSayisi>0){
							while($KisilerSorgusuKayitlari=$KisilerSorgusu->fetch_assoc()){
								$KisilerSorgusuKayitlariID				=	$KisilerSorgusuKayitlari["ID"];
								$KisilerSorgusuKayitlariVIPDurumu		=	$KisilerSorgusuKayitlari["VIPDurumu"];

								$HashKodu							=	HashKoduUret();
								$GonderimOnceligiDegeriOlustur		=	0;
								
								if($KampanyaBilgileriSorgusuKaydiOncelikDurumu==1){
									$GonderimOnceligiDegeriOlustur	=	$GonderimOnceligiDegeriOlustur+1;
								}
								
								if($KisilerSorgusuKayitlariVIPDurumu==1){
									$GonderimOnceligiDegeriOlustur	=	$GonderimOnceligiDegeriOlustur+1;
								}
					
								$EMailGonderimBekleyenlereKaydet	=	$VeritabaniBaglantisi->query("INSERT INTO emailgonderimleribekleyen (KampanyaIDsi, KisiIDsi, HashKodu, GonderimOnceligiDegeri, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$KampanyaGonderimHazirlamaSorgusuKaydiKampanyaIDsi', '$KisilerSorgusuKayitlariID', '$HashKodu', '$GonderimOnceligiDegeriOlustur', '$ZamanDamgasi', '$TarihSaat')");
									if($EMailGonderimBekleyenlereKaydet){
										$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi+1");
										
										$KampanyaIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi+1 WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiKampanyaIDsi' LIMIT 1");
										
										$KisiIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisiler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi+1 WHERE ID='$KisilerSorgusuKayitlariID' LIMIT 1");
									}else{
										exit();
									}
							}
					
							$FiltrelereGoreKisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID>'$KisilerSorgusuKayitlariID' $SorguKosulu LIMIT 1");
							$FiltrelereGoreKisilerSorgusuKayitSayisi	=	$FiltrelereGoreKisilerSorgusu->num_rows;
								if($FiltrelereGoreKisilerSorgusuKayitSayisi<1){
									$KayitSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevkampanyagonderimlerihazirla WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
									exit();
								}else{
									$KampanyaGonderimHazirlamaCronuCalismaDurumunuGuncelle		=	$VeritabaniBaglantisi->query("UPDATE gorevkampanyagonderimlerihazirla SET SonIslenenKayitIDsi='$KisilerSorgusuKayitlariID', CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
									exit();
								}
						}else{
							$KayitSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevkampanyagonderimlerihazirla WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
							exit();
						}
				}else{
					$KayitSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevkampanyagonderimlerihazirla WHERE ID='$KampanyaGonderimHazirlamaSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
					exit();
				}
		}else{
			exit();
		}
	}else{
		exit();
	}
/* KAMPANYA GÖNDERİM HAZIRLAMA İŞLMELERİ */

ob_end_flush();
$VeritabaniBaglantisi->close();
?>