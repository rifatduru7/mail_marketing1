<? if(empty($_SESSION["Yonetici"])){ ?>
<div id="YoneticiSifremiUnuttumFormuKapsayiciAlani">
	<form action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=6" method="POST">
		<div id="YoneticiSifremiUnuttumFormuLogosuKapsayiciAlani">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiGirisFormuLogosu); ?>">
		</div>
		<input type="text" id="EMailAdresi" name="EMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('EMailAdresi')" placeholder="E-Mail Adresi" tabindex="1" required>
		<div id="YoneticiSifremiUnuttumFormuCizgisi">
			<i></i>
		</div>
		<input type="text" id="KullaniciAdi" name="KullaniciAdi" onKeyUp="KullaniciAdiAlanlariIcinFiltrele('KullaniciAdi')" placeholder="Kullanıcı Adı" tabindex="2" required>
		<span id="YoneticiSifremiUnuttumFormuGeriGit">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php" target="_top">Geri Git</a>
		</span>
		<input type="submit" id="GonderButonu" name="GonderButonu" value="Yönetici Bilgilerimi Gönder" tabindex="3">
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>