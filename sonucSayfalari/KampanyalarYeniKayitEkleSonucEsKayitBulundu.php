<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="SonucSayfalariAlaniKapsayicisi">
	<div class="SonucSayfalariIconAlaniKapsayicisi">
		<img src="../Resimler/Dikkat.png">
	</div>
	<div class="SonucSayfalariBaslikAlaniKapsayicisi">
		İşlem Sırasında Eş Kayıt Tespit Edildi!
	</div>
	<div class="SonucSayfalariIcerikAlaniKapsayicisi">
		Girmiş olduğunuz bilgilerle sistemde eşleşen farklı bir kayıt bulunmaktadır. Lütfen bilgilerinizi kontrol ederek tekrar deneyiniz.<br />Kampanyalar sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">buraya tıklayınız</a>.<br />Yeni kampanya kaydı eklemek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=214" target="_top">buraya tıklayınız</a>.<br />Ana sayfaya dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">buraya tıklayınız</a>.
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>