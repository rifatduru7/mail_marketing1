<? if(empty($_SESSION["Yonetici"])){ ?>
	<div id="YoneticiGirisFormuSonucMetinleriKapsayiciAlani">
		<div class="YoneticiGirisFormuSonucMetinleriLogosuKapsayiciAlani">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
		</div>
		<div class="YoneticiGirisFormuSonucMetinleriUstCizgisi">
			<i></i>
		</div>
		<div class="YoneticiGirisFormuSonucMetinleriIconKapsayiciAlani">
			<img src="../Resimler/Dikkat.png">
		</div>
		<div class="YoneticiGirisFormuSonucMetinleriBaslikAlaniKapsayicisi">
			Yönetici Hesabı Pasif!
		</div>
		<div class="YoneticiGirisFormuSonucMetinleriIcerikAlaniKapsayicisi">
			Giriş yapmak istediğiniz yönetici hesabı pasiftir. Konu ile ilgili lütfen firma yöneticinize başvurun. Yönetici giriş sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php" target="_top">buraya tıklayınız</a>.
		</div>
		<div class="YoneticiGirisFormuSonucMetinleriAltCizgisi">
			<i></i>
		</div>
	</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>