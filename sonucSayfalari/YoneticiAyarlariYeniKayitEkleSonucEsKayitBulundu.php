<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="SonucSayfalariAlaniKapsayicisi">
	<div class="SonucSayfalariIconAlaniKapsayicisi">
		<img src="../Resimler/Dikkat.png">
	</div>
	<div class="SonucSayfalariBaslikAlaniKapsayicisi">
		İşlem Sırasında Eş Kayıt Tespit Edildi!
	</div>
	<div class="SonucSayfalariIcerikAlaniKapsayicisi">
		Girmiş olduğunuz bilgilerle sistemde eşleşen farklı bir kayıt bulunmaktadır. Lütfen bilgilerinizi kontrol ederek tekrar deneyiniz.<br />Yöneticiler sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top">buraya tıklayınız</a>.<br />Yeni yönetici kaydı eklemek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=64" target="_top">buraya tıklayınız</a>.<br />Ana sayfaya dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">buraya tıklayınız</a>.
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>