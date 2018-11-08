<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$KisiBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KisiBilgileriSorgusuKayitSayisi	=	$KisiBilgileriSorgusu->num_rows;
			if($KisiBilgileriSorgusuKayitSayisi>0){
				$KisiBilgileriSorgusuKaydi	=	$KisiBilgileriSorgusu->fetch_assoc();
					$KisiBilgileriSorgusuKaydiID								=	$KisiBilgileriSorgusuKaydi["ID"];
					$KisiBilgileriSorgusuKaydiAdi								=	$KisiBilgileriSorgusuKaydi["Adi"];
					$KisiBilgileriSorgusuKaydiSoyadi							=	$KisiBilgileriSorgusuKaydi["Soyadi"];
					$KisiBilgileriSorgusuKaydiEMailAdresi						=	$KisiBilgileriSorgusuKaydi["EMailAdresi"];
					$KisiBilgileriSorgusuKaydiTelefonu							=	$KisiBilgileriSorgusuKaydi["Telefonu"];
					$KisiBilgileriSorgusuKaydiCepTelefonu						=	$KisiBilgileriSorgusuKaydi["CepTelefonu"];
					$KisiBilgileriSorgusuKaydiCinsiyeti							=	$KisiBilgileriSorgusuKaydi["Cinsiyeti"];
					$KisiBilgileriSorgusuKaydiVIPDurumu							=	$KisiBilgileriSorgusuKaydi["VIPDurumu"];
						if($KisiBilgileriSorgusuKaydiVIPDurumu==1){
							$KisiBilgileriSorgusuKaydiVIPDurumuYaz		=	"VIP";
						}else{
							$KisiBilgileriSorgusuKaydiVIPDurumuYaz		=	"Standart";
						}
					$KisiBilgileriSorgusuKaydiAdresi							=	$KisiBilgileriSorgusuKaydi["Adresi"];
					$KisiBilgileriSorgusuKaydiPostaKodu							=	$KisiBilgileriSorgusuKaydi["PostaKodu"];
					$KisiBilgileriSorgusuKaydiIlcesi							=	$KisiBilgileriSorgusuKaydi["Ilcesi"];
					$KisiBilgileriSorgusuKaydiSehri								=	$KisiBilgileriSorgusuKaydi["Sehri"];
					$KisiBilgileriSorgusuKaydiUlkesi							=	$KisiBilgileriSorgusuKaydi["Ulkesi"];
						if($KisiBilgileriSorgusuKaydiUlkesi!=0){
							$KisininUlkeSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$KisiBilgileriSorgusuKaydiUlkesi' ORDER BY ID ASC LIMIT 1");
							$KisininUlkeSorgusuKayitSayisi		=	$KisininUlkeSorgusu->num_rows;
								if($KisininUlkeSorgusuKayitSayisi>0){
									$KisininUlkeSorgusuKaydi		=	$KisininUlkeSorgusu->fetch_assoc();
										$KisininUlkeSorgusuKaydiUlkeAdi		=	$KisininUlkeSorgusuKaydi["UlkeAdi"];
								}else{
									$KisininUlkeSorgusuKaydiUlkeAdi		=	"";
								}
						}
				
						if($KisiBilgileriSorgusuKaydiSehri!=0){
							$KisininSehirSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$KisiBilgileriSorgusuKaydiSehri' ORDER BY ID ASC LIMIT 1");
							$KisininSehirSorgusuKayitSayisi		=	$KisininSehirSorgusu->num_rows;
								if($KisininSehirSorgusuKayitSayisi>0){
									$KisininSehirSorgusuKaydi		=	$KisininSehirSorgusu->fetch_assoc();
										$KisininSehirSorgusuKaydiSehirAdi		=	$KisininSehirSorgusuKaydi["SehirAdi"];
								}else{
									$KisininSehirSorgusuKaydiSehirAdi		=	"";
								}
						}
					$KisiBilgileriSorgusuKaydiWebSitesiAdresi					=	$KisiBilgileriSorgusuKaydi["WebSitesiAdresi"];
					$KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi		=	$KisiBilgileriSorgusuKaydi["FacebookProfilSayfasiAdresi"];
					$KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi		=	$KisiBilgileriSorgusuKaydi["TwitterProfilSayfasiAdresi"];
					$KisiBilgileriSorgusuKaydiRatingDegeri						=	$KisiBilgileriSorgusuKaydi["RatingDegeri"];
						if($KisiBilgileriSorgusuKaydiRatingDegeri>100){
							$KisiBilgileriSorgusuKaydiRatingDegeri		=	100;
						}
					$KisiBilgileriSorgusuKaydiAciklama							=	$KisiBilgileriSorgusuKaydi["Aciklama"];
					$KisiBilgileriSorgusuKaydiEklenmeTuru						=	$KisiBilgileriSorgusuKaydi["EklenmeTuru"];
					$KisiBilgileriSorgusuKaydiEklenmeTarihi						=	$KisiBilgileriSorgusuKaydi["EklenmeTarihi"];
?>				
<script type="text/javascript" language="javascript">
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Kişi kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili kişi kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"?S=0&SS=158&ID=" + IDDegeri;
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display			=	"block";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display			=	"block";
	}
	
	function KayitSilIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"";
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display			=	"none";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display			=	"none";
	}
</script>
				
<div id="ModalKarartmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="ModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">
			Dikkat! Önemli Uyarı!
		</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
		<div id="ModalButonAlani" class="ModalButonAlaniKapsayicisi">
			<div id="SilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="SilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitSilIcinModalKapat()" style="display: none;">İptal</span>
		</div>
	</div>
</div>
				
<div id="DetayAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > Detay
	</div>
	
	<?php if(($KisiBilgileriSorgusuKaydiAdi!="") or ($KisiBilgileriSorgusuKaydiSoyadi!="")){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			<?php if($KisiBilgileriSorgusuKaydiAdi!=""){ ?>Adı <?php } ?><?php if($KisiBilgileriSorgusuKaydiSoyadi!=""){ ?>Soyadı<?php } ?>
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($KisiBilgileriSorgusuKaydiAdi!=""){ ?><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiAdi); ?> <?php } ?><?php if($KisiBilgileriSorgusuKaydiSoyadi!=""){ ?><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiSoyadi); ?><?php } ?>
		</div>
	</div>
	<?php } ?>		
				
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			E-Mail Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="mailto:<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEMailAdresi); ?>"><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEMailAdresi); ?></a>
		</div>
	</div>
				
	<?php if($KisiBilgileriSorgusuKaydiTelefonu!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Telefonu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo TelefonYaz($KisiBilgileriSorgusuKaydiTelefonu); ?>
		</div>
	</div>
	<?php } ?>
				
	<?php if($KisiBilgileriSorgusuKaydiCepTelefonu!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Cep Telefonu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo TelefonYaz($KisiBilgileriSorgusuKaydiCepTelefonu); ?>
		</div>
	</div>
	<?php } ?>
				
	<?php if($KisiBilgileriSorgusuKaydiCinsiyeti!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Cinsiyeti
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiCinsiyeti); ?>
		</div>
	</div>
	<?php } ?>
				
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			VIP Durumu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiVIPDurumuYaz); ?>
		</div>
	</div>
				
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Rating Durumu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			% <?php echo $KisiBilgileriSorgusuKaydiRatingDegeri; ?>
		</div>
	</div>
				
	<?php if($KisiBilgileriSorgusuKaydiAdresi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiAdresi); ?>
		</div>
	</div>
	<?php } ?>
				
	<?php if($KisiBilgileriSorgusuKaydiPostaKodu!=0){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Posta Kodu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiPostaKodu); ?>
		</div>
	</div>
	<?php } ?>
				
	<?php if($KisiBilgileriSorgusuKaydiIlcesi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			İlçesi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiIlcesi); ?>
		</div>
	</div>
	<?php } ?>
	
	<?php if($KisiBilgileriSorgusuKaydiSehri!=0){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Şehri
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisininSehirSorgusuKaydiSehirAdi); ?>
		</div>
	</div>
	<?php } ?>
	
	<?php if($KisiBilgileriSorgusuKaydiUlkesi!=0){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Ülkesi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisininUlkeSorgusuKaydiUlkeAdi); ?>
		</div>
	</div>
	<?php } ?>
	
	<?php if($KisiBilgileriSorgusuKaydiWebSitesiAdresi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Web Sitesi Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiWebSitesiAdresi); ?>" target="_blank"><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiWebSitesiAdresi); ?></a>
		</div>
	</div>
	<?php } ?>
	
	<?php if($KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Facebook Profil Sayfası Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi); ?>" target="_blank"><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi); ?></a>
		</div>
	</div>
	<?php } ?>
	
	<?php if($KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Twitter Profil Sayfası Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi); ?>" target="_blank"><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi); ?></a>
		</div>
	</div>
	<?php } ?>
				
	<?php if($KisiBilgileriSorgusuKaydiAciklama!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Ek Açıklama
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiAciklama); ?>
		</div>
	</div>
	<?php } ?>
				
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Eklenme Türü
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEklenmeTuru); ?>
		</div>
	</div>
				
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Eklenme Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEklenmeTarihi); ?>
		</div>
	</div>
</div>		
	
<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>	
	
<div class="DetayAlaniButonAlaniKapsayicisi">
	<span class="DetayAlaniGuncelleButonuAlaniKapsayicisi"><a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=154&ID=<?php echo $GelenID; ?>" target="_top">Güncelle</a></span>
	<span class="DetayAlaniSilButonuAlaniKapsayicisi"><a href="javascript:KayitSilIcinModalAc(<?php echo $GelenID; ?>)">Sil</a></span>
</div>
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