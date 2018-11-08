<? if(empty($_SESSION["Yonetici"])){ ?>
	<div id="YoneticiSifremiUnuttumFormuSonucMetinleriKapsayiciAlani">
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriLogosuKapsayiciAlani">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriUstCizgisi">
			<i></i>
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriIconKapsayiciAlani">
			<img src="../Resimler/Tamam.png">
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriBaslikAlaniKapsayicisi">
			İşlem Başarıyla Tamamlandı.
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriIcerikAlaniKapsayicisi">
			Yönetici bilgileriniz sisteme kayıtlı e-mail adresinize gönderilmiştir. E-mail hesabınıza giriş yaparak yönetici bilgilerinizi öğrenebilirsiniz. Yönetici giriş sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php" target="_top">buraya tıklayınız</a>.
		</div>
		<div class="YoneticiSifremiUnuttumFormuSonucMetinleriAltCizgisi">
			<i></i>
		</div>
	</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>