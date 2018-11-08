<? if(isset($_SESSION["Yonetici"])){
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti)-$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti);
?>
<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		Kampanyalar
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=214" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
		</span>
	</div>

	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=212" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="ListelemeAlaniTablolariSiraBaslikSutunu">Sıra</th>
					<th>Kampanya Adı</th>
					<th class="ListelemeAlaniTablolariOncelikDurumuBaslikSutunu">Öncelik Durumu</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Tamamlanma Tarihi</th>
					<th class="ListelemeAlaniTablolariUcluIkiliTekliBaslikSutunu">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$KampanyalarSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar ORDER BY SiraNumarasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti");
			$KampanyalarSorgusuKayitSayisi	=	$KampanyalarSorgusu->num_rows;
				if($KampanyalarSorgusuKayitSayisi>0){
					$KampanyalarinSonSiraNumarasiniBul		=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar ORDER BY SiraNumarasi DESC LIMIT 1");
					$KampanyalarinSonSiraNumarasiniBulKaydi	=	$KampanyalarinSonSiraNumarasiniBul->fetch_assoc();
						$KampanyalarinSonSiraNumarasiniBulKaydiSiraNumarasi		=	$KampanyalarinSonSiraNumarasiniBulKaydi["SiraNumarasi"];
					
					while($KampanyalarSorgusuKayitlari=$KampanyalarSorgusu->fetch_assoc()){
						$KampanyalarSorgusuKayitlariID								=	$KampanyalarSorgusuKayitlari["ID"];
						$KampanyalarSorgusuKayitlariKampanyaAdi						=	$KampanyalarSorgusuKayitlari["KampanyaAdi"];
						$KampanyalarSorgusuKayitlariOncelikDurumu					=	$KampanyalarSorgusuKayitlari["OncelikDurumu"];
							if($KampanyalarSorgusuKayitlariOncelikDurumu==0){
								$KampanyalarSorgusuKayitlariOncelikDurumuYaz			=	"Normal";
							}else{
								$KampanyalarSorgusuKayitlariOncelikDurumuYaz			=	"Öncelikli";
							}
						$KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu		=	$KampanyalarSorgusuKayitlari["GonderimTamamlanmaDurumu"];
						$KampanyalarSorgusuKayitlariGonderimTamamlanmaTarihi		=	$KampanyalarSorgusuKayitlari["GonderimTamamlanmaTarihi"];
						$KampanyalarSorgusuKayitlariEklenmeTarihi					=	$KampanyalarSorgusuKayitlari["EklenmeTarihi"];
						$KampanyalarSorgusuKayitlariSiraNumarasi					=	$KampanyalarSorgusuKayitlari["SiraNumarasi"];
			?>
				<tr>
					<td>
						<div class="ListelemeAlaniIciTablolariSiraSutunuRakamAlani">
							<?php if($KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyalarSorgusuKayitlariSiraNumarasi); ?></span>
						</div>
						<div class="ListelemeAlaniIciTablolariSiraSutunuIconlarAlani">
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraYukariIconuAlani" <?php if($KampanyalarSorgusuKayitlariSiraNumarasi==1){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=222&ID=<?php echo $KampanyalarSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraYukari.png" width="10" height="5" title="Bir Sıra Yukarı Taşı" alt="Bir Sıra Yukarı Taşı"></a>
							</div>
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraAsagiIconuAlani" <?php if($KampanyalarSorgusuKayitlariSiraNumarasi==$KampanyalarinSonSiraNumarasiniBulKaydiSiraNumarasi){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=220&ID=<?php echo $KampanyalarSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraAsagi.png" width="10" height="5" title="Bir Sıra Aşağı Taşı" alt="Bir Sıra Aşağı Taşı"></a>
							</div>
						</div>
					</td>
					
					<td>
						<?php if($KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyalarSorgusuKayitlariKampanyaAdi); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariOncelikDurumuSutunu">
						<?php if($KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyalarSorgusuKayitlariOncelikDurumuYaz); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php if($KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($KampanyalarSorgusuKayitlariEklenmeTarihi); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php if($KampanyalarSorgusuKayitlariGonderimTamamlanmaDurumu==0){ ?><span class="TuruncuYazi">Devam Ediyor</span><?php }else{ ?><?php echo DonusumleriGeriDondur($KampanyalarSorgusuKayitlariGonderimTamamlanmaTarihi); ?><?php } ?>
					</td>
					
					<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=213&ID=<?php echo $KampanyalarSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerDetay.png" width="20" height="20" title="Detay" alt="Detay"></a>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=224&ID=<?php echo $KampanyalarSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerIstatistik.png" width="20" height="20" title="İstatistikler" alt="İstatistikler"></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="6">Sisteme kayıtlı kampanya kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211&Sayfalama=1\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211&Sayfalama=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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