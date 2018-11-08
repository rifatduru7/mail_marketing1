<? if(isset($_SESSION["Yonetici"])){
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE IzinsizGonderimBildirimDurumu='1'");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti)-$SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti);
?>
<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		Kişi Bildirimleri
	</div>
			
	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>				
			
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>Kampanya Adı</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>E-Mail Adresi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Gönderim Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Bildirim Tarihi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$KayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE IzinsizGonderimBildirimDurumu='1' ORDER BY IzinsizGonderimBildirimTarihiZamanDamgasi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti");
			$KayitSorgusuKayitSayisi	=	$KayitSorgusu->num_rows;
				if($KayitSorgusuKayitSayisi>0){
					while($KayitSorgusuKayitlari=$KayitSorgusu->fetch_assoc()){
						$KayitSorgusuKayitlariID							=	$KayitSorgusuKayitlari["ID"];
						$KayitSorgusuKayitlariKampanyaIDsi					=	$KayitSorgusuKayitlari["KampanyaIDsi"];
							$KampanyaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$KayitSorgusuKayitlariKampanyaIDsi' ORDER BY ID ASC LIMIT 1");
							$KampanyaSorgusuKayitSayisi		=	$KampanyaSorgusu->num_rows;
								if($KampanyaSorgusuKayitSayisi>0){
									$KampanyaSorgusuKaydi		=	$KampanyaSorgusu->fetch_assoc();
										$KampanyaSorgusuKaydiID				=	$KampanyaSorgusuKaydi["ID"];
										$KampanyaSorgusuKaydiKampanyaAdi	=	$KampanyaSorgusuKaydi["KampanyaAdi"];
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
									exit();
								}
						$KayitSorgusuKayitlariKisiIDsi						=	$KayitSorgusuKayitlari["KisiIDsi"];
							$KisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$KayitSorgusuKayitlariKisiIDsi' ORDER BY ID ASC LIMIT 1");
							$KisiSorgusuKayitSayisi		=	$KisiSorgusu->num_rows;
								if($KisiSorgusuKayitSayisi>0){
									$KisiSorgusuKaydi		=	$KisiSorgusu->fetch_assoc();
										$KisiSorgusuKaydiID				=	$KisiSorgusuKaydi["ID"];
										$KisiSorgusuKaydiAdi			=	$KisiSorgusuKaydi["Adi"];
										$KisiSorgusuKaydiSoyadi			=	$KisiSorgusuKaydi["Soyadi"];
										$KisiSorgusuKaydiEMailAdresi	=	$KisiSorgusuKaydi["EMailAdresi"];
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
									exit();
								}
						$KayitSorgusuKayitlariGonderimTarihi				=	$KayitSorgusuKayitlari["GonderimTarihi"];
						$KayitSorgusuKayitlariIzinsizGonderimBildirimTarihi	=	$KayitSorgusuKayitlari["IzinsizGonderimBildirimTarihi"];

			?>
				<tr>
					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=213&ID=<?php echo $KampanyaSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KampanyaSorgusuKaydiKampanyaAdi); ?></a>
					</td>

					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=148&ID=<?php echo $KisiSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiAdi); ?></a>
					</td>

					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=148&ID=<?php echo $KisiSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiSoyadi); ?></a>
					</td>

					<td>
						<a href="mailto:<?php echo DonusumleriGeriDondur($KisiSorgusuKaydiEMailAdresi); ?>" target="_top"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiEMailAdresi); ?></a>
					</td>
				
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariGonderimTarihi); ?>
					</td>
				
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariIzinsizGonderimBildirimTarihi); ?>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="6">Sisteme kayıtlı kişi bildirim kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=189&Sayfalama=1\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=189&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=189&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=189&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=189&Sayfalama=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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