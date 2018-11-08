<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="SonucSayfalariAlaniKapsayicisi">
	<div class="SonucSayfalariIconAlaniKapsayicisi">
		<img src="../Resimler/Dikkat.png">
	</div>
	<div class="SonucSayfalariBaslikAlaniKapsayicisi">
		İşlem Durduruldu!
	</div>
	<div class="SonucSayfalariIcerikAlaniKapsayicisi">
		Sistem tarafından kullanılmakta olan bir kayıt silinemez. Lütfen öncelikle ilgili kaydın kullanıldığı tüm alanları farklı bir kayıt ile güncelledikten sonra tekrar deneyiniz.<br />Ülkeler sayfasına dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=15" target="_top">buraya tıklayınız</a>.<br />Ana sayfaya dönmek için lütfen <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">buraya tıklayınız</a>.
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>