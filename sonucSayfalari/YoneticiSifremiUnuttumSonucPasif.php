<? if(empty($_SESSION["Yonetici"])){ ?>
	<div id="YoneticiSifremiUnuttumFormuSonucMetinleriKapsayiciAlani">
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriLogosuKapsayiciAlani">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriUstCizgisi">
			<i></i>
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriIconKapsayiciAlani">
			<img src="../Resimler/Dikkat.png">
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriBaslikAlaniKapsayicisi">
			Yönetici Hesabı Pasif!
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriIcerikAlaniKapsayicisi">
			Şifre talebinde bulunduğunuz yönetici hesabı pasiftir. Konu ile ilgili lütfen firma yöneticinize başvurun. Yönetici giriş sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php" target="_top">buraya tıklayınız</a>.
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriAltCizgisi">
			<i></i>
		</div>
	</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>