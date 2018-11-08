<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

/* İZİNSİZ GÖNDERİM BİLDİRİM İŞLEMLERİ >>>>> */
$IzinsizBildirimlerIcinKayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevizinsizgonderimbildirenmailler ORDER BY ID ASC LIMIT 100");
$IzinsizBildirimlerIcinKayitSorgusuKayitSayisi	=	$IzinsizBildirimlerIcinKayitSorgusu->num_rows;				
	if($IzinsizBildirimlerIcinKayitSorgusuKayitSayisi>0){
		while($IzinsizBildirimlerIcinKayitSorgusuKayitlari=$IzinsizBildirimlerIcinKayitSorgusu->fetch_assoc()){
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariID								=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["ID"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariKampanyaIDsi					=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["KampanyaIDsi"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariKisiIDsi						=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["KisiIDsi"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariHashKodu						=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["HashKodu"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeIPAdresi					=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["EklenmeIPAdresi"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi		=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["EklenmeTarihiZamanDamgasi"];
			$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeTarihi					=	$IzinsizBildirimlerIcinKayitSorgusuKayitlari["EklenmeTarihi"];

			$IzinsizBildirimlerIcinGonderilenMailSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KampanyaIDsi='$IzinsizBildirimlerIcinKayitSorgusuKayitlariKampanyaIDsi' AND KisiIDsi='$IzinsizBildirimlerIcinKayitSorgusuKayitlariKisiIDsi' AND HashKodu='$IzinsizBildirimlerIcinKayitSorgusuKayitlariHashKodu' LIMIT 1");
			$IzinsizBildirimlerIcinGonderilenMailSorgusuKayitSayisi		=	$IzinsizBildirimlerIcinGonderilenMailSorgusu->num_rows;	
				if($IzinsizBildirimlerIcinGonderilenMailSorgusuKayitSayisi>0){
					$IzinsizBildirimlerIcinKayitSorgusuKaydi	=	$IzinsizBildirimlerIcinGonderilenMailSorgusu->fetch_assoc();
						$IzinsizBildirimlerIcinKayitSorgusuKaydiID									=	$IzinsizBildirimlerIcinKayitSorgusuKaydi["ID"];
						$IzinsizBildirimlerIcinKayitSorgusuKaydiIzinsizGonderimBildirimDurumu		=	$IzinsizBildirimlerIcinKayitSorgusuKaydi["IzinsizGonderimBildirimDurumu"];
					
						if($IzinsizBildirimlerIcinKayitSorgusuKaydiIzinsizGonderimBildirimDurumu==0){
							$IzinsizBildirimlerIcinMailKaydiGuncelle				=	$VeritabaniBaglantisi->query("UPDATE emailgonderimlerigonderilen SET IzinsizGonderimBildirimDurumu='1', IzinsizGonderimBildirimIPAdresi='$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeIPAdresi', IzinsizGonderimBildirimTarihiZamanDamgasi='$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', IzinsizGonderimBildirimTarihi='$IzinsizBildirimlerIcinKayitSorgusuKayitlariEklenmeTarihi' WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKaydiID' LIMIT 1");
								if($IzinsizBildirimlerIcinMailKaydiGuncelle){
									$IzinsizBildirimlerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET IzinsizGonderimBildirenKisiSayisi=IzinsizGonderimBildirenKisiSayisi+1");
									
									$IzinsizBildirimlerIcinKampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET IzinsizGonderimBildirenKisiSayisi=IzinsizGonderimBildirenKisiSayisi+1 WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
									
									$IzinsizBildirimlerIcinKisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET IzinsizGonderimBildirimiSayisi=IzinsizGonderimBildirimiSayisi+1 WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");

									$IzinsizBildirimKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevizinsizgonderimbildirenmailler WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}else{
									$IzinsizBildirimKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevizinsizgonderimbildirenmailler WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}
						}else{
							$IzinsizBildirimKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevizinsizgonderimbildirenmailler WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
						}
				}else{
					$IzinsizBildirimKaydiSil	=	$VeritabaniBaglantisi->query("DELETE FROM gorevizinsizgonderimbildirenmailler WHERE ID='$IzinsizBildirimlerIcinKayitSorgusuKayitlariID' LIMIT 1");
				}
		}
	}
/* İZİNSİZ GÖNDERİM BİLDİRİM İŞLEMLERİ <<<<< */

/* AÇILAN MAIL İŞLEMLERİ >>>>> */
$AcilanMaillerIcinKayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevacilanmailler ORDER BY ID ASC LIMIT 100");
$AcilanMaillerIcinKayitSorgusuKayitSayisi	=	$AcilanMaillerIcinKayitSorgusu->num_rows;				
	if($AcilanMaillerIcinKayitSorgusuKayitSayisi>0){
		while($AcilanMaillerIcinKayitSorgusuKayitlari=$AcilanMaillerIcinKayitSorgusu->fetch_assoc()){
			$AcilanMaillerIcinKayitSorgusuKayitlariID								=	$AcilanMaillerIcinKayitSorgusuKayitlari["ID"];
			$AcilanMaillerIcinKayitSorgusuKayitlariKampanyaIDsi						=	$AcilanMaillerIcinKayitSorgusuKayitlari["KampanyaIDsi"];
			$AcilanMaillerIcinKayitSorgusuKayitlariKisiIDsi							=	$AcilanMaillerIcinKayitSorgusuKayitlari["KisiIDsi"];
			$AcilanMaillerIcinKayitSorgusuKayitlariHashKodu							=	$AcilanMaillerIcinKayitSorgusuKayitlari["HashKodu"];
			$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi					=	$AcilanMaillerIcinKayitSorgusuKayitlari["EklenmeIPAdresi"];
			$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi		=	$AcilanMaillerIcinKayitSorgusuKayitlari["EklenmeTarihiZamanDamgasi"];
			$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihi					=	$AcilanMaillerIcinKayitSorgusuKayitlari["EklenmeTarihi"];
			
			$AcilanMaillerIcinGonderilenMailSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KampanyaIDsi='$AcilanMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' AND KisiIDsi='$AcilanMaillerIcinKayitSorgusuKayitlariKisiIDsi' AND HashKodu='$AcilanMaillerIcinKayitSorgusuKayitlariHashKodu' LIMIT 1");
			$AcilanMaillerIcinGonderilenMailSorgusuKayitSayisi		=	$AcilanMaillerIcinGonderilenMailSorgusu->num_rows;	
				if($AcilanMaillerIcinGonderilenMailSorgusuKayitSayisi>0){
					$AcilanMaillerIcinKayitSorgusuKaydi		=	$AcilanMaillerIcinGonderilenMailSorgusu->fetch_assoc();
						$AcilanMaillerIcinKayitSorgusuKaydiID					=	$AcilanMaillerIcinKayitSorgusuKaydi["ID"];
						$AcilanMaillerIcinKayitSorgusuKaydiMailAcilmaDurumu		=	$AcilanMaillerIcinKayitSorgusuKaydi["MailAcilmaDurumu"];
						
						if($AcilanMaillerIcinKayitSorgusuKaydiMailAcilmaDurumu==0){
							$AcilanMaillerIcinMailKaydiGuncelle				=	$VeritabaniBaglantisi->query("UPDATE emailgonderimlerigonderilen SET MailAcilmaDurumu='1', MailAcilmaSayisi=MailAcilmaSayisi+1, MailIlkAcilmaIPAdresi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailIlkAcilmaTarihiZamanDamgasi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailIlkAcilmaTarihi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihi', MailSonAcilmaIPAdresi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailSonAcilmaTarihiZamanDamgasi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailSonAcilmaTarihi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihi' WHERE ID='$AcilanMaillerIcinKayitSorgusuKaydiID' LIMIT 1");
								if($AcilanMaillerIcinMailKaydiGuncelle){
									$AcilanMaillerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AcilanMailSayisi=AcilanMailSayisi+1, MailAcilmaSayisi=MailAcilmaSayisi+1");
			
									$AcilanMaillerIcinKampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET AcilanMailSayisi=AcilanMailSayisi+1, MailAcilmaSayisi=MailAcilmaSayisi+1 WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");

									$AcilanMaillerIcinKisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET RatingDegeri=RatingDegeri+2, AcilanMailSayisi=AcilanMailSayisi+1, MailAcilmaSayisi=MailAcilmaSayisi+1 WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");

									$AcilanMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevacilanmailler WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}else{
									$AcilanMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevacilanmailler WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}
						}else{
							$AcilanMaillerIcinMailKaydiGuncelle				=	$VeritabaniBaglantisi->query("UPDATE emailgonderimlerigonderilen SET MailAcilmaSayisi=MailAcilmaSayisi+1, MailSonAcilmaIPAdresi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailSonAcilmaTarihiZamanDamgasi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailSonAcilmaTarihi='$AcilanMaillerIcinKayitSorgusuKayitlariEklenmeTarihi' WHERE ID='$AcilanMaillerIcinKayitSorgusuKaydiID' LIMIT 1");
								if($AcilanMaillerIcinMailKaydiGuncelle){							
									$AcilanMaillerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET MailAcilmaSayisi=MailAcilmaSayisi+1");
							
									$AcilanMaillerIcinKampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET MailAcilmaSayisi=MailAcilmaSayisi+1 WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
							
									$AcilanMaillerIcinKisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET RatingDegeri=RatingDegeri+1, MailAcilmaSayisi=MailAcilmaSayisi+1 WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");

									$AcilanMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevacilanmailler WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}else{
									$AcilanMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevacilanmailler WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}
						}
				}else{
					$AcilanMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevacilanmailler WHERE ID='$AcilanMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
				}
		}
	}
/* AÇILAN MAIL İŞLEMLERİ <<<<< */

/* TIKLANAN MAIL İŞLEMLERİ >>>>> */
$TiklananMaillerIcinKayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevtiklananmailler ORDER BY ID ASC LIMIT 100");
$TiklananMaillerIcinKayitSorgusuKayitSayisi		=	$TiklananMaillerIcinKayitSorgusu->num_rows;				
	if($TiklananMaillerIcinKayitSorgusuKayitSayisi>0){
		while($TiklananMaillerIcinKayitSorgusuKayitlari=$TiklananMaillerIcinKayitSorgusu->fetch_assoc()){
			$TiklananMaillerIcinKayitSorgusuKayitlariID									=	$TiklananMaillerIcinKayitSorgusuKayitlari["ID"];
			$TiklananMaillerIcinKayitSorgusuKayitlariKampanyaIDsi						=	$TiklananMaillerIcinKayitSorgusuKayitlari["KampanyaIDsi"];
			$TiklananMaillerIcinKayitSorgusuKayitlariKisiIDsi							=	$TiklananMaillerIcinKayitSorgusuKayitlari["KisiIDsi"];
			$TiklananMaillerIcinKayitSorgusuKayitlariHashKodu							=	$TiklananMaillerIcinKayitSorgusuKayitlari["HashKodu"];
			$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi					=	$TiklananMaillerIcinKayitSorgusuKayitlari["EklenmeIPAdresi"];
			$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi			=	$TiklananMaillerIcinKayitSorgusuKayitlari["EklenmeTarihiZamanDamgasi"];
			$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihi						=	$TiklananMaillerIcinKayitSorgusuKayitlari["EklenmeTarihi"];

			$TiklananMaillerIcinGonderilenMailSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KampanyaIDsi='$TiklananMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' AND KisiIDsi='$TiklananMaillerIcinKayitSorgusuKayitlariKisiIDsi' AND HashKodu='$TiklananMaillerIcinKayitSorgusuKayitlariHashKodu' LIMIT 1");
			$TiklananMaillerIcinGonderilenMailSorgusuKayitSayisi	=	$TiklananMaillerIcinGonderilenMailSorgusu->num_rows;	
				if($TiklananMaillerIcinGonderilenMailSorgusuKayitSayisi>0){
					$TiklananMaillerIcinKayitSorgusuKaydi		=	$TiklananMaillerIcinGonderilenMailSorgusu->fetch_assoc();
						$TiklananMaillerIcinKayitSorgusuKaydiID						=	$TiklananMaillerIcinKayitSorgusuKaydi["ID"];
						$TiklananMaillerIcinKayitSorgusuKaydiMailTiklanmaDurumu		=	$TiklananMaillerIcinKayitSorgusuKaydi["MailTiklanmaDurumu"];
						
						if($TiklananMaillerIcinKayitSorgusuKaydiMailTiklanmaDurumu==0){
							$TiklananMaillerIcinMailKaydiGuncelle				=	$VeritabaniBaglantisi->query("UPDATE emailgonderimlerigonderilen SET MailTiklanmaDurumu='1', MailTiklanmaSayisi=MailTiklanmaSayisi+1, MailIlkTiklanmaIPAdresi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailIlkTiklanmaTarihiZamanDamgasi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailIlkTiklanmaTarihi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihi', MailSonTiklanmaIPAdresi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailSonTiklanmaTarihiZamanDamgasi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailSonTiklanmaTarihi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihi' WHERE ID='$TiklananMaillerIcinKayitSorgusuKaydiID' LIMIT 1");
								if($TiklananMaillerIcinMailKaydiGuncelle){
									$TiklananMaillerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET IcerigineTiklananMailSayisi=IcerigineTiklananMailSayisi+1, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1");

									$TiklananMaillerIcinKampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET IcerigineTiklananMailSayisi=IcerigineTiklananMailSayisi+1, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1 WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
			
									$TiklananMaillerIcinKisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET RatingDegeri=RatingDegeri+2, IcerigineTiklananMailSayisi=IcerigineTiklananMailSayisi+1, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1 WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");

									$TiklananMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevtiklananmailler WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}else{
									$TiklananMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevtiklananmailler WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}
						}else{
							$TiklananMaillerIcinMailKaydiGuncelle				=	$VeritabaniBaglantisi->query("UPDATE emailgonderimlerigonderilen SET MailTiklanmaSayisi=MailTiklanmaSayisi+1, MailSonTiklanmaIPAdresi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeIPAdresi', MailSonTiklanmaTarihiZamanDamgasi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihiZamanDamgasi', MailSonTiklanmaTarihi='$TiklananMaillerIcinKayitSorgusuKayitlariEklenmeTarihi' WHERE ID='$TiklananMaillerIcinKayitSorgusuKaydiID' LIMIT 1");							
								if($TiklananMaillerIcinMailKaydiGuncelle){							
									$TiklananMaillerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1");
							
									$TiklananMaillerIcinKampanyaIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1 WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariKampanyaIDsi' LIMIT 1");
							
									$TiklananMaillerIcinKisiIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET RatingDegeri=RatingDegeri+1, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi+1 WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariKisiIDsi' LIMIT 1");

									$TiklananMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevtiklananmailler WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}else{
									$TiklananMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevtiklananmailler WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
								}
						}
				}else{
					$TiklananMailKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevtiklananmailler WHERE ID='$TiklananMaillerIcinKayitSorgusuKayitlariID' LIMIT 1");
				}
		}
	}
/* TIKLANAN MAIL İŞLEMLERİ <<<<< */

/* DİNLENDİRİLEN E-MAIL HESAPLARINI KONTROL EDEREK ZAMANI DOLANLARI GERİ AÇ */
$DinlendirilenEMailHesaplariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE DinlendirmeDurumu='1' AND DinlendirmeBitisTarihiZamanDamgasi<='$ZamanDamgasi' ORDER BY DinlendirmeBitisTarihiZamanDamgasi ASC");
$DinlendirilenEMailHesaplariSorgusuKayitSayisi	=	$DinlendirilenEMailHesaplariSorgusu->num_rows;				
	if($DinlendirilenEMailHesaplariSorgusuKayitSayisi>0){
		while($DinlendirilenEMailHesaplariSorgusuKayitlari=$DinlendirilenEMailHesaplariSorgusu->fetch_assoc()){
			$DinlendirilenEMailHesaplariSorgusuKayitlariID									=	$DinlendirilenEMailHesaplariSorgusuKayitlari["ID"];
			$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukMaksimumMailGonderimSayisi	=	$DinlendirilenEMailHesaplariSorgusuKayitlari["GunlukMaksimumMailGonderimSayisi"];
			$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukGonderilenMailSayisi			=	$DinlendirilenEMailHesaplariSorgusuKayitlari["GunlukGonderilenMailSayisi"];
			$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukKalanMailGonderimSayisi		=	$DinlendirilenEMailHesaplariSorgusuKayitlari["GunlukKalanMailGonderimSayisi"];
			$DinlendirilenEMailHesaplariSorgusuKayitlariCalismaDurumu						=	$DinlendirilenEMailHesaplariSorgusuKayitlari["CalismaDurumu"];
			
			$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET DinlendirmeDurumu='0', DinlendirmeBaslangicTarihiZamanDamgasi='0', DinlendirmeBaslangicTarihi='', DinlendirmeBitisTarihiZamanDamgasi='0', DinlendirmeBitisTarihi='' WHERE ID='$DinlendirilenEMailHesaplariSorgusuKayitlariID' ORDER BY DinlendirmeBitisTarihiZamanDamgasi ASC LIMIT 1");
				if($KayitGuncelle){
					if($DinlendirilenEMailHesaplariSorgusuKayitlariCalismaDurumu==1){
						$DinlendirilenEMailHesabiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifEMailHesabiSayisi=AktifEMailHesabiSayisi+1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi-1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi+$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukMaksimumMailGonderimSayisi, GunlukGonderilenMailSayisi=GunlukGonderilenMailSayisi+$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukGonderilenMailSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi+$DinlendirilenEMailHesaplariSorgusuKayitlariGunlukKalanMailGonderimSayisi");
					}else{
						$DinlendirilenEMailHesabiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET PasifEMailHesabiSayisi=PasifEMailHesabiSayisi+1, DinlendirilenEMailHesabiSayisi=DinlendirilenEMailHesabiSayisi-1");
					}
				}
		}
	}else{
		exit();
	}
/* DİNLENDİRİLEN E-MAIL HESAPLARINI KONTROL EDEREK ZAMANI DOLANLARI GERİ AÇ */

ob_end_flush();
$VeritabaniBaglantisi->close();
?>