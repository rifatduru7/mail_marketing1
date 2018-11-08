<? if(isset($_SESSION["Yonetici"])){
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti)-$SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti);
?>
<script type="text/javascript" language="javascript">
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display						=	"block";
		document.getElementById("ModalAlani").style.display								=	"block";
		document.getElementById("ModalMetinAlani").innerHTML							=	"Sosyal ağ kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili sosyal ağ kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href							=	"?S=0&SS=102&ID=" + IDDegeri;
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function KayitSilIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display						=	"none";
		document.getElementById("ModalAlani").style.display								=	"none";
		document.getElementById("ModalMetinAlani").innerHTML							=	"";
		document.getElementById("SilIslemiOnaylaButonu").href							=	"";
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display		=	"none";
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

<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		Sosyal Ağ Ağarları
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=92" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
		</span>
	</div>

	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=91" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="ListelemeAlaniTablolariSiraBaslikSutunu">Sıra</th>
					<th class="ListelemeAlaniTablolariLogolarBaslikSutunu">Logo</th>
					<th>Sosyal Ağ Adı</th>
					<th>Sosyal Ağ Linki</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
					<th class="ListelemeAlaniTablolariUcluIkiliTekliBaslikSutunu">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$SosyalAglarSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti");
			$SosyalAglarSorgusuKayitSayisi	=	$SosyalAglarSorgusu->num_rows;
				if($SosyalAglarSorgusuKayitSayisi>0){
					$SosyalAglarinSonSiraNumarasiniBul			=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
					$SosyalAglarinSonSiraNumarasiniBulKaydi		=	$SosyalAglarinSonSiraNumarasiniBul->fetch_assoc();
						$SosyalAglarinSonSiraNumarasiniBulKaydiSiraNumarasi		=	$SosyalAglarinSonSiraNumarasiniBulKaydi["SiraNumarasi"];
					
					while($SosyalAglarSorgusuKayitlari=$SosyalAglarSorgusu->fetch_assoc()){
						$SosyalAglarSorgusuKayitlariID						=	$SosyalAglarSorgusuKayitlari["ID"];
						$SosyalAglarSorgusuKayitlariSosyalAgLogosu			=	$SosyalAglarSorgusuKayitlari["SosyalAgLogosu"];
						$SosyalAglarSorgusuKayitlariSosyalAgAdi				=	$SosyalAglarSorgusuKayitlari["SosyalAgAdi"];
						$SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki	=	$SosyalAglarSorgusuKayitlari["SosyalAgSayfasiLinki"];
						$SosyalAglarSorgusuKayitlariEklenmeTarihi			=	$SosyalAglarSorgusuKayitlari["EklenmeTarihi"];
						$SosyalAglarSorgusuKayitlariSiraNumarasi			=	$SosyalAglarSorgusuKayitlari["SiraNumarasi"];
			?>
				<tr>
					<td>
						<div class="ListelemeAlaniIciTablolariSiraSutunuRakamAlani">
							<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($SosyalAglarSorgusuKayitlariSiraNumarasi); ?>
						</div>
						<div class="ListelemeAlaniIciTablolariSiraSutunuIconlarAlani">
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraYukariIconuAlani" <?php if($SosyalAglarSorgusuKayitlariSiraNumarasi==1){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=107&ID=<?php echo $SosyalAglarSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraYukari.png" width="10" height="5" title="Bir Sıra Yukarı Taşı" alt="Bir Sıra Yukarı Taşı"></a>
							</div>
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraAsagiIconuAlani" <?php if($SosyalAglarSorgusuKayitlariSiraNumarasi==$SosyalAglarinSonSiraNumarasiniBulKaydiSiraNumarasi){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=105&ID=<?php echo $SosyalAglarSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraAsagi.png" width="10" height="5" title="Bir Sıra Aşağı Taşı" alt="Bir Sıra Aşağı Taşı"></a>
							</div>
						</div>
					</td>

					<td class="ListelemeAlaniTablolariLogolarSutunu">
						<img src="Resimler/<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgLogosu); ?>" width="24" height="24" title="<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgAdi); ?>" alt="<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgAdi); ?>">
					</td>
				
					<td>
						<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgAdi); ?>
					</td>

					<td>
						<a href="<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki); ?>" target="_blank"><?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariSosyalAgSayfasiLinki); ?></a>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($SosyalAglarSorgusuKayitlariEklenmeTarihi); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=97&ID=<?php echo $SosyalAglarSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerGuncelle.png" width="20" height="20" title="Güncelle" alt="Güncelle"></a>
						<a href="javascript:KayitSilIcinModalAc(<?php echo $SosyalAglarSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="6">Sisteme kayıtlı sosyal ağ kaydı bulunmamaktadır.</td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
	</div>
</div>

<?php if($BulunanSayfaSayisi>1){ ?>
<div id="SayfalamaAlaniKapsayicisi">
	<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
		Toplam <?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($BulunanSayfaSayisi); ?> sayfada, <?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($ToplamKayitSayisi); ?> kayıt bulunmaktadır.
	</div>

	<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
		<?php
		if($GelenSayfalama>1){
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90&Sayfalama=1\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90&Sayfalama=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
		}
		?>
	</div>
</div>
<?php
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>