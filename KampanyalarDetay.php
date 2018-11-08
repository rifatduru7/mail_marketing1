<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$KampanyaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KampanyaBilgileriSorgusuKayitSayisi	=	$KampanyaBilgileriSorgusu->num_rows;
			if($KampanyaBilgileriSorgusuKayitSayisi>0){
				$KampanyaBilgileriSorgusuKaydi	=	$KampanyaBilgileriSorgusu->fetch_assoc();
					$KampanyaBilgileriSorgusuKaydiID								=	$KampanyaBilgileriSorgusuKaydi["ID"];
					$KampanyaBilgileriSorgusuKaydiKampanyaAdi						=	$KampanyaBilgileriSorgusuKaydi["KampanyaAdi"];
					$KampanyaBilgileriSorgusuKaydiTemaIDsi							=	$KampanyaBilgileriSorgusuKaydi["TemaIDsi"];
						$TemaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$KampanyaBilgileriSorgusuKaydiTemaIDsi' ORDER BY ID ASC LIMIT 1");
						$TemaSorgusuKayitSayisi		=	$TemaSorgusu->num_rows;
							if($TemaSorgusuKayitSayisi>0){
								$TemaSorgusuKaydi	=	$TemaSorgusu->fetch_assoc();
									$TemaSorgusuKaydiTemaAdi								=	$TemaSorgusuKaydi["TemaAdi"];
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211");
							}
					$KampanyaBilgileriSorgusuKaydiWebSitesiLinki					=	$KampanyaBilgileriSorgusuKaydi["WebSitesiLinki"];
					$KampanyaBilgileriSorgusuKaydiMailGondericiAdi					=	$KampanyaBilgileriSorgusuKaydi["MailGondericiAdi"];
					$KampanyaBilgileriSorgusuKaydiYanitAliciAdi						=	$KampanyaBilgileriSorgusuKaydi["YanitAliciAdi"];
					$KampanyaBilgileriSorgusuKaydiYanitEMailAdresi					=	$KampanyaBilgileriSorgusuKaydi["YanitEMailAdresi"];
					$KampanyaBilgileriSorgusuKaydiOncelikDurumu						=	$KampanyaBilgileriSorgusuKaydi["OncelikDurumu"];
						if($KampanyaBilgileriSorgusuKaydiOncelikDurumu==0){
							$KampanyaBilgileriSorgusuKaydiOncelikDurumuYaz					=	"Normal";
						}else{
							$KampanyaBilgileriSorgusuKaydiOncelikDurumuYaz					=	"Öncelikli";
						}
					$KampanyaBilgileriSorgusuKaydiEklenmeTarihi						=	$KampanyaBilgileriSorgusuKaydi["EklenmeTarihi"];				
					$KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu			=	$KampanyaBilgileriSorgusuKaydi["GonderimTamamlanmaDurumu"];
					$KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaTarihi			=	$KampanyaBilgileriSorgusuKaydi["GonderimTamamlanmaTarihi"];
						if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){
							$KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaTarihiYaz		=	"Devam Ediyor";
						}else{
							$KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaTarihiYaz		=	$KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaTarihi;
						}
					$KampanyaBilgileriSorgusuKaydiFiltreIcinAdi						=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinAdi"];
					$KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi					=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinSoyadi"];
					$KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi				=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinEMailAdresi"];
					$KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti				=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinCinsiyeti"];
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti!="Tümü"){
							$KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyetiYaz			=	$KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyeti;
						}else{
							$KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyetiYaz			=	"";
						}
					$KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu				=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinVIPDurumu"];
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu!=2){
							if($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumu==0){
								$KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz		=	"Standart";
							}else{
								$KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz		=	"VIP";
							}
						}else{
							$KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz			=	"";
						}
					$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu				=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinPostaKodu"];
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu!=0){
							$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKoduYaz			=	$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKodu;
						}else{
							$KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKoduYaz			=	"";
						}
					$KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi					=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinIlcesi"];
					$KampanyaBilgileriSorgusuKaydiFiltreIcinSehri					=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinSehri"];
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinSehri!=0){
							$SehirSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$KampanyaBilgileriSorgusuKaydiFiltreIcinSehri' ORDER BY ID ASC LIMIT 1");
							$SehirSorgusuKayitSayisi	=	$SehirSorgusu->num_rows;
								if($SehirSorgusuKayitSayisi>0){
									$SehirSorgusuKaydi		=	$SehirSorgusu->fetch_assoc();
										$SehirSorgusuKaydiSehirAdi							=	$SehirSorgusuKaydi["SehirAdi"];
								}else{
									$SehirSorgusuKaydiSehirAdi								=	"";
								}
						}else{
							$SehirSorgusuKaydiSehirAdi										=	"";
						}
					$KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi					=	$KampanyaBilgileriSorgusuKaydi["FiltreIcinUlkesi"];

				
						if($KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi!=0){
							$UlkeSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$KampanyaBilgileriSorgusuKaydiFiltreIcinUlkesi' ORDER BY ID ASC LIMIT 1");
							$UlkeSorgusuKayitSayisi		=	$UlkeSorgusu->num_rows;
								if($UlkeSorgusuKayitSayisi>0){
									$UlkeSorgusuKaydi		=	$UlkeSorgusu->fetch_assoc();
										$UlkeSorgusuKaydiUlkeAdi							=	$UlkeSorgusuKaydi["UlkeAdi"];
								}else{
									$UlkeSorgusuKaydiUlkeAdi								=	"";
								}
						}else{
							$UlkeSorgusuKaydiUlkeAdi										=	"";
						}
?>				
<div id="DetayAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > Detay
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Kampanya Adı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiKampanyaAdi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Tema Adı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/TemaOnIzleme.php?ID=<?php echo $KampanyaBilgileriSorgusuKaydiTemaIDsi; ?>" target="_blank"><?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($TemaSorgusuKaydiTemaAdi); ?></span></a>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Web Sitesi Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="<?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiWebSitesiLinki); ?>" target="_blank"><?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiWebSitesiLinki); ?></span></a>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			E-Mail Gönderici Adı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiMailGondericiAdi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Yanıt Alıcı Adı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiYanitAliciAdi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Yanıt E-Mail Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="mailto:<?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiYanitEMailAdresi); ?>"><?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiYanitEMailAdresi); ?></span></a>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Öncelik Durumu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiOncelikDurumuYaz); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Eklenme Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiEklenmeTarihi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Gönderim Tamamlanma Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaTarihiYaz); ?></span>
		</div>
	</div>
	
	<?php if(($KampanyaBilgileriSorgusuKaydiFiltreIcinAdi!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinAdi!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyetiYaz!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKoduYaz!="") or ($KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi!="") or ($SehirSorgusuKaydiSehirAdi!="") or ($UlkeSorgusuKaydiUlkeAdi!="")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>

		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > Detay > Filtreler
		</div>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinAdi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adı Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinAdi); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Soyadı Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinSoyadi); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinEMailAdresi); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyetiYaz!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Cinsiyet Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinCinsiyetiYaz); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				VIP Durumu Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinVIPDurumuYaz); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKoduYaz!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Posta Kodu Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinPostaKoduYaz); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				İlçe Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyaBilgileriSorgusuKaydiFiltreIcinIlcesi); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($SehirSorgusuKaydiSehirAdi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Şehir Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($SehirSorgusuKaydiSehirAdi); ?></span>
			</div>
		</div>
		<?php } ?>

		<?php if($UlkeSorgusuKaydiUlkeAdi!=""){ ?>
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php if($KampanyaBilgileriSorgusuKaydiGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($UlkeSorgusuKaydiUlkeAdi); ?></span>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	
<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>