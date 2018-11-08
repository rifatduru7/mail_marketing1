<? if(empty($_SESSION["Yonetici"])){ ?>
<div id="YoneticiGirisFormuKapsayiciAlani">
	<form action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=2" method="POST">
		<div id="YoneticiGirisFormuLogosuKapsayiciAlani">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
		</div>
		<input type="text" id="KullaniciAdi" name="KullaniciAdi" onKeyUp="KullaniciAdiAlanlariIcinFiltrele('KullaniciAdi')" placeholder="Kullanıcı Adı" tabindex="1" required>
		<div id="YoneticiGirisFormuCizgisi">
			<i></i>
		</div>
		<input type="password" id="KullaniciSifresi" name="KullaniciSifresi" onKeyUp="KullaniciSifresiAlanlariIcinFiltrele('KullaniciSifresi')" placeholder="Şifre" tabindex="2" required>
		<span id="YoneticiGirisFormuSifremiUnuttum">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=5" target="_top">Unuttum?</a>
		</span>
		<input type="submit" id="GirisButonu" name="GirisButonu" value="Giriş Yap" tabindex="3">
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>