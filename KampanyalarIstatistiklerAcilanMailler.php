<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KampanyaIDsi='$GelenID' AND MailAcilmaDurumu='1'");
		$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
		$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti)-$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti;
		$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti);
?>
<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=224&ID=<?php echo $GelenID; ?>" target="_top">İstatistikler</a> > Açılan Mailler
	</div>
			
	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>				
			
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>E-Mail Adresi</th>
					<th class="ListelemeAlaniTablolariVIPDurumuBaslikSutunu">VIP Durumu</th>
					<th class="ListelemeAlaniTablolariRatingDurumuBaslikSutunu">Rating Değeri</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Gönderim Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">İlk Açılma Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Son Açılma Tarihi</th>
					<th class="ListelemeAlaniTablolariMailAcilmaVeTiklamaSayisiBaslikSutunu">Açılma Sayısı</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$KayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KampanyaIDsi='$GelenID' AND MailAcilmaDurumu='1' ORDER BY MailSonAcilmaTarihiZamanDamgasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti");
			$KayitSorgusuKayitSayisi	=	$KayitSorgusu->num_rows;
				if($KayitSorgusuKayitSayisi>0){
					while($KayitSorgusuKayitlari=$KayitSorgusu->fetch_assoc()){
						$KayitSorgusuKayitlariID									=	$KayitSorgusuKayitlari["ID"];
						$KayitSorgusuKayitlariGonderimTarihi						=	$KayitSorgusuKayitlari["GonderimTarihi"];
						$KayitSorgusuKayitlariMailIlkAcilmaTarihi					=	$KayitSorgusuKayitlari["MailIlkAcilmaTarihi"];
						$KayitSorgusuKayitlariMailSonAcilmaTarihi					=	$KayitSorgusuKayitlari["MailSonAcilmaTarihi"];
						$KayitSorgusuKayitlariMailAcilmaSayisi						=	$KayitSorgusuKayitlari["MailAcilmaSayisi"];
						$KayitSorgusuKayitlariKisiIDsi								=	$KayitSorgusuKayitlari["KisiIDsi"];
							$KisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$KayitSorgusuKayitlariKisiIDsi' ORDER BY ID ASC LIMIT 1");
							$KisiSorgusuKayitSayisi		=	$KisiSorgusu->num_rows;
								if($KisiSorgusuKayitSayisi>0){
									$KisiSorgusuKaydi		=	$KisiSorgusu->fetch_assoc();
										$KisiSorgusuKaydiID								=	$KisiSorgusuKaydi["ID"];
										$KisiSorgusuKaydiAdi							=	$KisiSorgusuKaydi["Adi"];
										$KisiSorgusuKaydiSoyadi							=	$KisiSorgusuKaydi["Soyadi"];
										$KisiSorgusuKaydiEMailAdresi					=	$KisiSorgusuKaydi["EMailAdresi"];
										$KisiSorgusuKaydiVIPDurumu						=	$KisiSorgusuKaydi["VIPDurumu"];
											if($KisiSorgusuKaydiVIPDurumu==1){
												$KisiSorgusuKaydiVIPDurumuYaz		=	"VIP";
											}else{
												$KisiSorgusuKaydiVIPDurumuYaz		=	"Standart";
											}
										$KisiSorgusuKaydiRatingDegeri					=	$KisiSorgusuKaydi["RatingDegeri"];
											if($KisiSorgusuKaydiRatingDegeri==0){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz0.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>0) and ($KisiSorgusuKaydiRatingDegeri<=10)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz1.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>10) and ($KisiSorgusuKaydiRatingDegeri<=20)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz2.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>20) and ($KisiSorgusuKaydiRatingDegeri<=30)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz3.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>30) and ($KisiSorgusuKaydiRatingDegeri<=40)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz4.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>40) and ($KisiSorgusuKaydiRatingDegeri<=50)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz5.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>50) and ($KisiSorgusuKaydiRatingDegeri<=60)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz6.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>60) and ($KisiSorgusuKaydiRatingDegeri<=70)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz7.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>70) and ($KisiSorgusuKaydiRatingDegeri<=80)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz8.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif(($KisiSorgusuKaydiRatingDegeri>80) and ($KisiSorgusuKaydiRatingDegeri<=90)){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz9.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}elseif($KisiSorgusuKaydiRatingDegeri>90){
												$KisiSorgusuKaydiRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz10.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
											}

								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=224&ID=".$GelenID);
									exit();
								}
			?>
				<tr>
					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=148&ID=<?php echo $KisiSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiAdi); ?></a>
					</td>
				
					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=148&ID=<?php echo $KisiSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiSoyadi); ?></a>
					</td>
				
					<td>
						<a href="mailto:<?php echo DonusumleriGeriDondur($KisiSorgusuKaydiEMailAdresi); ?>"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiEMailAdresi); ?></a>
					</td>
				
					<td class="ListelemeAlaniTablolariVIPDurumuSutunu">
						<?php echo DonusumleriGeriDondur($KisiSorgusuKaydiVIPDurumuYaz); ?>
					</td>
				
					<td>
						<div class="ListelemeAlaniIciTablolariRatingSutunuYildizAlani"><?php echo DonusumleriGeriDondur($KisiSorgusuKaydiRatingDegeriYaz); ?></div>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariGonderimTarihi); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariMailIlkAcilmaTarihi); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariMailSonAcilmaTarihi); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariMailAcilmaVeTiklamaSayisiSutunu">
						<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KayitSorgusuKayitlariMailAcilmaSayisi); ?>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="9">Sisteme kayıtlı açılan mail kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=227&Sayfalama=1&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=227&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=227&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."&ID=".$GelenID."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=227&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=227&Sayfalama=".$BulunanSayfaSayisi."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
		}
		?>
	</div>
</div>
<?php
	}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=224&ID=".$GelenID);
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>