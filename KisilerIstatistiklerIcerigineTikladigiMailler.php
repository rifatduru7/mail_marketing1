<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KisiIDsi='$GelenID' AND MailTiklanmaDurumu='1'");
		$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
		$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti)-$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti;
		$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti);
?>
<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=183&ID=<?php echo $GelenID; ?>" target="_top">İstatistikler</a> > İçeriğine Tıklanan Mailler
	</div>
			
	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>				
			
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th>Kampanya Adı</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Gönderim Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">İlk Tıklama Tarihi</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Son Tıklama Tarihi</th>
					<th class="ListelemeAlaniTablolariMailAcilmaVeTiklamaSayisiBaslikSutunu">Tıklama Sayısı</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$KayitSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailgonderimlerigonderilen WHERE KisiIDsi='$GelenID' AND MailTiklanmaDurumu='1' ORDER BY MailSonTiklanmaTarihiZamanDamgasi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKisilerSayfasiListelemeLimiti");
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
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=183&ID=".$GelenID);
									exit();
								}
						$KayitSorgusuKayitlariGonderimTarihi				=	$KayitSorgusuKayitlari["GonderimTarihi"];
						$KayitSorgusuKayitlariMailIlkTiklanmaTarihi			=	$KayitSorgusuKayitlari["MailIlkTiklanmaTarihi"];
						$KayitSorgusuKayitlariMailSonTiklanmaTarihi			=	$KayitSorgusuKayitlari["MailSonTiklanmaTarihi"];
						$KayitSorgusuKayitlariMailTiklanmaSayisi			=	$KayitSorgusuKayitlari["MailTiklanmaSayisi"];
			?>
				<tr>
					<td>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=213&ID=<?php echo $KampanyaSorgusuKaydiID; ?>" target="_top"><?php echo DonusumleriGeriDondur($KampanyaSorgusuKaydiKampanyaAdi); ?></a>
					</td>
				
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariGonderimTarihi); ?>
					</td>
				
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariMailIlkTiklanmaTarihi); ?>
					</td>
				
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($KayitSorgusuKayitlariMailSonTiklanmaTarihi); ?>
					</td>
				
					<td class="ListelemeAlaniTablolariMailAcilmaVeTiklamaSayisiSutunu">
						<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KayitSorgusuKayitlariMailTiklanmaSayisi); ?>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="5">Sisteme kayıtlı içeriğine tıklanan mail kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=187&Sayfalama=1&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=187&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=187&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."&ID=".$GelenID."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=187&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=187&Sayfalama=".$BulunanSayfaSayisi."&ID=".$GelenID."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
		}
		?>
	</div>
</div>
<?php
	}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=183&ID=".$GelenID);
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>