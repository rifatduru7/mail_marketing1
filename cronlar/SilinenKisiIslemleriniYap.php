<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$ZamaniBesDakikaGeriAl		=	$ZamanDamgasi - ($SaniyeHesaplamaBirDakika * 5);

$CronHatasiIcinSilinenKisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevsilinenkisiler WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinSilinenKisilerSorgusuKayitSayisi		=	$CronHatasiIcinSilinenKisilerSorgusu->num_rows;
	if($CronHatasiIcinSilinenKisilerSorgusuKayitSayisi>0){
		$CronHatasiIcinSilinenKisileriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE gorevsilinenkisiler SET CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$SilinenKisilerIcinCalisanCronKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevsilinenkisiler WHERE CronunCalismaDurumu='1' ORDER BY ID ASC LIMIT 1");
$SilinenKisilerIcinCalisanCronKontrolSorgusuKayitSayisi		=	$SilinenKisilerIcinCalisanCronKontrolSorgusu->num_rows;
	if($SilinenKisilerIcinCalisanCronKontrolSorgusuKayitSayisi<1){
		$SilinenKisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM gorevsilinenkisiler ORDER BY ID ASC LIMIT 10");
		$SilinenKisilerSorgusuKayitSayisi	=	$SilinenKisilerSorgusu->num_rows;
			if($SilinenKisilerSorgusuKayitSayisi>0){
				while($SilinenKisilerSorgusuKayitlari=$SilinenKisilerSorgusu->fetch_assoc()){
					$SilinenKisilerSorgusuKayitlariID						=	$SilinenKisilerSorgusuKayitlari["ID"];
					$SilinenKisilerSorgusuKayitlariKisiIDsi					=	$SilinenKisilerSorgusuKayitlari["KisiIDsi"];
					$SilinenKisilerSorgusuKayitlariKisiEMailAdresi			=	$SilinenKisilerSorgusuKayitlari["KisiEMailAdresi"];
		
					$SilinenKisiIcinCalismaDurumunuGuncelle		=	$VeritabaniBaglantisi->query("UPDATE gorevsilinenkisiler SET CronunCalismaDurumu='1', CronunCalismaTarihiZamanDamgasi='$ZamanDamgasi', CronunCalismaTarihi='$TarihSaat' WHERE ID='$SilinenKisilerSorgusuKayitlariID' ORDER BY ID ASC LIMIT 1");
					
					$GonderimBekleyenMaillerSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimleribekleyen WHERE KisiIDsi='$SilinenKisilerSorgusuKayitlariKisiIDsi' ORDER BY ID ASC");
					$GonderimBekleyenMaillerSorgusuKayitSayisi		=	$GonderimBekleyenMaillerSorgusu->num_rows;
						if($GonderimBekleyenMaillerSorgusuKayitSayisi>0){
							while($GonderimBekleyenMaillerSorgusuKayitlari=$GonderimBekleyenMaillerSorgusu->fetch_assoc()){
								$GonderimBekleyenMaillerSorgusuKayitlariID				=	$GonderimBekleyenMaillerSorgusuKayitlari["ID"];
								$GonderimBekleyenMaillerSorgusuKayitlariKampanyaIDsi	=	$GonderimBekleyenMaillerSorgusuKayitlari["KampanyaIDsi"];
								
								$GonderimBekleyenMaillerIcinGenelIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1");
								
								$GonderimBekleyenMaillerIcinKampanyaIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderimBekleyenMailSayisi=GonderimBekleyenMailSayisi-1 WHERE ID='$GonderimBekleyenMaillerSorgusuKayitlariKampanyaIDsi' ORDER BY ID ASC LIMIT 1");
								
								$GonderimBekleyenMailKaydiniSil		=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimleribekleyen WHERE ID='$GonderimBekleyenMaillerSorgusuKayitlariID' ORDER BY ID ASC LIMIT 1");
							}
						}
					
					$GonderilenMaillerSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KisiIDsi='$SilinenKisilerSorgusuKayitlariKisiIDsi' ORDER BY ID ASC");
					$GonderilenMaillerSorgusuKayitSayisi		=	$GonderilenMaillerSorgusu->num_rows;
						if($GonderilenMaillerSorgusuKayitSayisi>0){
							while($GonderilenMaillerSorgusuKayitlari=$GonderilenMaillerSorgusu->fetch_assoc()){
								$GonderilenMaillerSorgusuKayitlariID								=	$GonderilenMaillerSorgusuKayitlari["ID"];
								$GonderilenMaillerSorgusuKayitlariKampanyaIDsi						=	$GonderilenMaillerSorgusuKayitlari["KampanyaIDsi"];
								$GonderilenMaillerSorgusuKayitlariMailAcilmaDurumu					=	$GonderilenMaillerSorgusuKayitlari["MailAcilmaDurumu"];
								$GonderilenMaillerSorgusuKayitlariMailAcilmaSayisi					=	$GonderilenMaillerSorgusuKayitlari["MailAcilmaSayisi"];
								$GonderilenMaillerSorgusuKayitlariMailTiklanmaDurumu				=	$GonderilenMaillerSorgusuKayitlari["MailTiklanmaDurumu"];
								$GonderilenMaillerSorgusuKayitlariMailTiklanmaSayisi				=	$GonderilenMaillerSorgusuKayitlari["MailTiklanmaSayisi"];
								$GonderilenMaillerSorgusuKayitlariIzinsizGonderimBildirimDurumu		=	$GonderilenMaillerSorgusuKayitlari["IzinsizGonderimBildirimDurumu"];
							
								$GonderilenMaillerIcinGenelIstatistikleriGuncelle			=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GonderilenMailSayisi=GonderilenMailSayisi-1, AcilanMailSayisi=AcilanMailSayisi-$GonderilenMaillerSorgusuKayitlariMailAcilmaDurumu, MailAcilmaSayisi=MailAcilmaSayisi-$GonderilenMaillerSorgusuKayitlariMailAcilmaSayisi, IcerigineTiklananMailSayisi=IcerigineTiklananMailSayisi-$GonderilenMaillerSorgusuKayitlariMailTiklanmaDurumu, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi-$GonderilenMaillerSorgusuKayitlariMailTiklanmaSayisi, IzinsizGonderimBildirenKisiSayisi=IzinsizGonderimBildirenKisiSayisi-$GonderilenMaillerSorgusuKayitlariIzinsizGonderimBildirimDurumu");
							
								$GonderilenMaillerIcinKampanyaIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kampanyalar SET GonderilenMailSayisi=GonderilenMailSayisi-1, AcilanMailSayisi=AcilanMailSayisi-$GonderilenMaillerSorgusuKayitlariMailAcilmaDurumu, MailAcilmaSayisi=MailAcilmaSayisi-$GonderilenMaillerSorgusuKayitlariMailAcilmaSayisi, IcerigineTiklananMailSayisi=IcerigineTiklananMailSayisi-$GonderilenMaillerSorgusuKayitlariMailTiklanmaDurumu, MailIcerigineTiklanmaSayisi=MailIcerigineTiklanmaSayisi-$GonderilenMaillerSorgusuKayitlariMailTiklanmaSayisi, IzinsizGonderimBildirenKisiSayisi=IzinsizGonderimBildirenKisiSayisi-$GonderilenMaillerSorgusuKayitlariIzinsizGonderimBildirimDurumu WHERE ID='$GonderilenMaillerSorgusuKayitlariKampanyaIDsi' ORDER BY ID ASC LIMIT 1");
								
								$GonderilenMailKaydiniSil		=	$VeritabaniBaglantisi->query("DELETE FROM emailgonderimlerigonderilen WHERE ID='$GonderilenMaillerSorgusuKayitlariID' ORDER BY ID ASC LIMIT 1");
							}		
						}
					
					$GorevKaydiniSil		=	$VeritabaniBaglantisi->query("DELETE FROM gorevsilinenkisiler WHERE ID='$SilinenKisilerSorgusuKayitlariID' ORDER BY ID ASC LIMIT 1");	
				}
			}else{
				exit();
			}
	}else{
		exit();
	}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>