<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);	
	if($GelenID!=""){
		$KisiBilgileriSorgusuKaydi				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KisiBilgileriSorgusuKaydiKayitSayisi	=	$KisiBilgileriSorgusuKaydi->num_rows;
			if($KisiBilgileriSorgusuKaydiKayitSayisi>0){
				$KisiBilgileriSorgusuKaydi		=	$KisiBilgileriSorgusuKaydi->fetch_assoc();
					$KisiBilgileriSorgusuKaydiID									=	$KisiBilgileriSorgusuKaydi["ID"];
					$KisiBilgileriSorgusuKaydiGonderimBekleyenMailSayisi			=	$KisiBilgileriSorgusuKaydi["GonderimBekleyenMailSayisi"];
					$KisiBilgileriSorgusuKaydiGonderilenMailSayisi					=	$KisiBilgileriSorgusuKaydi["GonderilenMailSayisi"];
					$KisiBilgileriSorgusuKaydiAcilanMailSayisi						=	$KisiBilgileriSorgusuKaydi["AcilanMailSayisi"];
					$KisiBilgileriSorgusuKaydiMailAcilmaSayisi						=	$KisiBilgileriSorgusuKaydi["MailAcilmaSayisi"];
					$KisiBilgileriSorgusuKaydiIcerigineTiklananMailSayisi			=	$KisiBilgileriSorgusuKaydi["IcerigineTiklananMailSayisi"];
					$KisiBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi			=	$KisiBilgileriSorgusuKaydi["MailIcerigineTiklanmaSayisi"];
					$KisiBilgileriSorgusuKaydiIzinsizGonderimBildirimiSayisi		=	$KisiBilgileriSorgusuKaydi["IzinsizGonderimBildirimiSayisi"];
?>
<script type="text/javascript" language="javascript">
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiGonderimBekleyenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiGonderilenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiAcilanMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiMailAcilmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiIcerigineTiklananMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirimiSayisiRakamAlani", <?php echo $KisiBilgileriSorgusuKaydiIzinsizGonderimBildirimiSayisi; ?>);	
	
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
				var IzinsizGonderimBildirimiSayisiDegeri	=	GelenDegerler[6];
				
				document.getElementById("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani").innerHTML			=	GonderimBekleyenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani").innerHTML					=	GonderilenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani").innerHTML						=	AcilanMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani").innerHTML						=	MailAcilmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani").innerHTML			=	IcerigineTiklananMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani").innerHTML			=	MailIcerigineTiklanmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirimiSayisiRakamAlani").innerHTML		=	IzinsizGonderimBildirimiSayisiDegeri;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/KisilerIstatistiklerAnlikGuncelleme.php?ID=" + <?php echo $GelenID; ?>, true);
		VeriTalepEt.send();
	}, 1000);
</script>

<div id="IstatistiklerAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > İstatistikler
	</div>

	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>	

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=184&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=185&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=186&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=187&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=188&ID=<?php echo $GelenID; ?>" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			İzinsiz Gönderim Bildirdiği Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciIzinsizGonderimBildirimiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>
</div>		
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>