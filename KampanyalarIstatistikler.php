<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);	
	
	if($GelenID!=""){
		$KampanyaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KampanyaBilgileriSorgusuKayitSayisi	=	$KampanyaBilgileriSorgusu->num_rows;
			if($KampanyaBilgileriSorgusuKayitSayisi>0){
				$KampanyaBilgileriSorgusu		=	$KampanyaBilgileriSorgusu->fetch_assoc();
					$KampanyaBilgileriSorgusuID										=	$KampanyaBilgileriSorgusu["ID"];
					$KampanyaBilgileriSorgusuGonderimBekleyenMailSayisi				=	$KampanyaBilgileriSorgusu["GonderimBekleyenMailSayisi"];
					$KampanyaBilgileriSorgusuGonderilenMailSayisi					=	$KampanyaBilgileriSorgusu["GonderilenMailSayisi"];
					$KampanyaBilgileriSorgusuAcilanMailSayisi						=	$KampanyaBilgileriSorgusu["AcilanMailSayisi"];
					$KampanyaBilgileriSorgusuMailAcilmaSayisi						=	$KampanyaBilgileriSorgusu["MailAcilmaSayisi"];
					$KampanyaBilgileriSorgusuIcerigineTiklananMailSayisi			=	$KampanyaBilgileriSorgusu["IcerigineTiklananMailSayisi"];
					$KampanyaBilgileriSorgusuMailIcerigineTiklanmaSayisi			=	$KampanyaBilgileriSorgusu["MailIcerigineTiklanmaSayisi"];
					$KampanyaBilgileriSorgusuIzinsizGonderimBildirenKisiSayisi		=	$KampanyaBilgileriSorgusu["IzinsizGonderimBildirenKisiSayisi"];
?>
<script type="text/javascript" language="javascript">
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuGonderimBekleyenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuGonderilenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuAcilanMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuMailAcilmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuIcerigineTiklananMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuMailIcerigineTiklanmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani", <?php echo $KampanyaBilgileriSorgusuIzinsizGonderimBildirenKisiSayisi; ?>);	
	
	var AnlikSayac		=	setInterval(function(){
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange = function(){
			if(this.readyState==4 && this.status==200){
				var Sonuc			=	this.responseText;
				var GelenDegerler	=	Sonuc.split("|");
				
				var GonderimBekleyenMailSayisiDegeri		=	GelenDegerler[0];
				var GonderilenMailSayisiDegeri				=	GelenDegerler[1];
				var AcilanMailSayisiDegeri					=	GelenDegerler[2];
				var MailAcilmaSayisiDegeri					=	GelenDegerler[3];
				var IcerigineTiklananMailSayisiDegeri		=	GelenDegerler[4];
				var MailIcerigineTiklanmaSayisiDegeri		=	GelenDegerler[5];
				var IzinsizGonderimBildirenKisiSayisiDegeri	=	GelenDegerler[6];
				
				document.getElementById("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani").innerHTML			=	GonderimBekleyenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani").innerHTML					=	GonderilenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani").innerHTML						=	AcilanMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani").innerHTML						=	MailAcilmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani").innerHTML			=	IcerigineTiklananMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani").innerHTML			=	MailIcerigineTiklanmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani").innerHTML	=	IzinsizGonderimBildirenKisiSayisiDegeri;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/KampanyalarIstatistiklerAnlikGuncelleme.php?ID=" + <?php echo $GelenID; ?>, true);
		VeriTalepEt.send();
	}, 1000);
</script>

<div id="IstatistiklerAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > İstatistikler
	</div>

	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>	

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=225&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Gönderim Bekleyen Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=226&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Gönderilen Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=227&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Açılan Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Mail Açılma Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=228&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			İçeriğine Tıklanan Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Mail İçeriğine Tıklanma Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=229&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			İzinsiz Gönderim Bildiren Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>
</div>		
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=211");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>