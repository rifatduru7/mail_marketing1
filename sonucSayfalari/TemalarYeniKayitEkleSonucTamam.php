<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="SonucSayfalariAlaniKapsayicisi">
	<div class="SonucSayfalariIconAlaniKapsayicisi">
		<img src="../Resimler/Tamam.png">
	</div>
	<div class="SonucSayfalariBaslikAlaniKapsayicisi">
		İşlem Başarıyla Tamamlandı.
	</div>
	<div class="SonucSayfalariIcerikAlaniKapsayicisi">
		Temalar sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">buraya tıklayınız</a>.<br />Yeni tema kaydı eklemek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=192" target="_top">buraya tıklayınız</a>.<br />Ana sayfaya dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">buraya tıklayınız</a>.
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>