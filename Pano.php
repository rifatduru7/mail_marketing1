<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciKisiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiKisiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciBekleyenIceAktarimIslemSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiBekleyenIceAktarimIslemSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciBekleyenDisaAktarimIslemSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiBekleyenDisaAktarimIslemSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciDisaAktarimDosyalariSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiDisaAktarimDosyalariSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciKampanyaSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiKampanyaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciTemaSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiTemaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciEMailHesapSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiEMailHesapSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciAktifEMailHesabiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiAktifEMailHesabiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciPasifEMailHesabiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiPasifEMailHesabiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciDinlendirilenEMailHesabiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiDinlendirilenEMailHesabiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGunlukMaksimumMailGonderimSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGunlukMaksimumMailGonderimSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGunlukGonderilenMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGunlukGonderilenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGunlukKalanMailGonderimSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGunlukKalanMailGonderimSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciSosyalAgSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiSosyalAgSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciUlkeSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiUlkeSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciSehirSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiSehirSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciYoneticiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiYoneticiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciAktifYoneticiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiAktifYoneticiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciPasifYoneticiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiPasifYoneticiSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGonderimBekleyenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGonderilenMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciGeriDonenGecersizMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiGeriDonenGecersizMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiAcilanMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiMailAcilmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiIcerigineTiklananMailSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiMailIcerigineTiklanmaSayisi; ?>);	
	 SaydirmaAnimasyonu("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani", <?php echo $GeneleIstatistikBilgisiKaydiIzinsizGonderimBildirenKisiSayisi; ?>);	
	
	var AnlikSayac		=	setInterval(function(){
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange = function(){
			if(this.readyState==4 && this.status==200){
				var Sonuc			=	this.responseText;
				var GelenDegerler	=	Sonuc.split("|");
				
				var KisiSayisiDegeri							=	GelenDegerler[0];
				var BekleyenIceAktarimIslemSayisiDegeri			=	GelenDegerler[1];
				var BekleyenDisaAktarimIslemSayisiDegeri		=	GelenDegerler[2];
				var DisaAktarimDosyalariSayisiDegeri			=	GelenDegerler[3];
				var KampanyaSayisiDegeri						=	GelenDegerler[4];
				var TemaSayisiDegeri							=	GelenDegerler[5];
				var EMailHesapSayisiDegeri						=	GelenDegerler[6];
				var AktifEMailHesabiSayisiDegeri				=	GelenDegerler[7];
				var PasifEMailHesabiSayisiDegeri				=	GelenDegerler[8];
				var DinlendirilenEMailHesabiSayisiDegeri		=	GelenDegerler[9];
				var GunlukMaksimumMailGonderimSayisiDegeri		=	GelenDegerler[10];
				var GunlukGonderilenMailSayisiDegeri			=	GelenDegerler[11];
				var GunlukKalanMailGonderimSayisiDegeri			=	GelenDegerler[12];				
				var SosyalAgSayisiDegeri						=	GelenDegerler[13];
				var UlkeSayisiDegeri							=	GelenDegerler[14];
				var SehirSayisiDegeri							=	GelenDegerler[15];
				var YoneticiSayisiDegeri						=	GelenDegerler[16];
				var AktifYoneticiSayisiDegeri					=	GelenDegerler[17];
				var PasifYoneticiSayisiDegeri					=	GelenDegerler[18];
				var GonderimBekleyenMailSayisiDegeri			=	GelenDegerler[19];
				var GonderilenMailSayisiDegeri					=	GelenDegerler[20];
				var GeriDonenGecersizMailSayisiDegeri			=	GelenDegerler[21];
				var AcilanMailSayisiDegeri						=	GelenDegerler[22];
				var MailAcilmaSayisiDegeri						=	GelenDegerler[23];
				var IcerigineTiklananMailSayisiDegeri			=	GelenDegerler[24];
				var MailIcerigineTiklanmaSayisiDegeri			=	GelenDegerler[25];
				var IzinsizGonderimBildirenKisiSayisiDegeri		=	GelenDegerler[26];
				
				document.getElementById("IstatistiklerCerceveAlaniIciKisiSayisiRakamAlani").innerHTML							=	KisiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciBekleyenIceAktarimIslemSayisiRakamAlani").innerHTML		=	BekleyenIceAktarimIslemSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciBekleyenDisaAktarimIslemSayisiRakamAlani").innerHTML		=	BekleyenDisaAktarimIslemSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciDisaAktarimDosyalariSayisiRakamAlani").innerHTML			=	DisaAktarimDosyalariSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciKampanyaSayisiRakamAlani").innerHTML						=	KampanyaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciTemaSayisiRakamAlani").innerHTML							=	TemaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciEMailHesapSayisiRakamAlani").innerHTML						=	EMailHesapSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciAktifEMailHesabiSayisiRakamAlani").innerHTML				=	AktifEMailHesabiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciPasifEMailHesabiSayisiRakamAlani").innerHTML				=	PasifEMailHesabiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciDinlendirilenEMailHesabiSayisiRakamAlani").innerHTML		=	DinlendirilenEMailHesabiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGunlukMaksimumMailGonderimSayisiRakamAlani").innerHTML		=	GunlukMaksimumMailGonderimSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGunlukGonderilenMailSayisiRakamAlani").innerHTML			=	GunlukGonderilenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGunlukKalanMailGonderimSayisiRakamAlani").innerHTML		=	GunlukKalanMailGonderimSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciSosyalAgSayisiRakamAlani").innerHTML						=	SosyalAgSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciUlkeSayisiRakamAlani").innerHTML							=	UlkeSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciSehirSayisiRakamAlani").innerHTML							=	SehirSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciYoneticiSayisiRakamAlani").innerHTML						=	YoneticiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciAktifYoneticiSayisiRakamAlani").innerHTML					=	AktifYoneticiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciPasifYoneticiSayisiRakamAlani").innerHTML					=	PasifYoneticiSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGonderimBekleyenMailSayisiRakamAlani").innerHTML			=	GonderimBekleyenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGonderilenMailSayisiRakamAlani").innerHTML					=	GonderilenMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciGeriDonenGecersizMailSayisiRakamAlani").innerHTML			=	GeriDonenGecersizMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciAcilanMailSayisiRakamAlani").innerHTML						=	AcilanMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailAcilmaSayisiRakamAlani").innerHTML						=	MailAcilmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIcerigineTiklananMailSayisiRakamAlani").innerHTML			=	IcerigineTiklananMailSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciMailIcerigineTiklanmaSayisiRakamAlani").innerHTML			=	MailIcerigineTiklanmaSayisiDegeri;
				document.getElementById("IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani").innerHTML	=	IzinsizGonderimBildirenKisiSayisiDegeri;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/PanoIstatistiklerAnlikGuncelleme.php", true);
		VeriTalepEt.send();
	}, 1000);
</script>

<div id="IstatistiklerAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">Ana Sayfa / Pano</a> > İstatistikler
	</div>

	<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>	

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Günlük Maksimum Mail Gönderim Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGunlukMaksimumMailGonderimSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Günlük Gönderilen Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGunlukGonderilenMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Günlük Kalan Mail Gönderim Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGunlukKalanMailGonderimSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			E-Mail Hesap Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciEMailHesapSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Aktif E-Mail Hesap Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciAktifEMailHesabiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Pasif E-Mail Hesap Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciPasifEMailHesabiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Dinlendirilen E-Mail Hesap Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciDinlendirilenEMailHesabiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Kampanya Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciKampanyaSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Kişi Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciKisiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			İçe Aktarım Bekleyen İşlem Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciBekleyenIceAktarimIslemSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Dışa Aktarım Bekleyen İşlem Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciBekleyenDisaAktarimIslemSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=175" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Dışa Aktarım Dosyaları Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciDisaAktarimDosyalariSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=2" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=3" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=4" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=5" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
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
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=6" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			İzinsiz Gönderim Bildiren Kişi Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciIzinsizGonderimBildirenKisiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Geri Dönen Geçersiz Mail Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciGeriDonenGecersizMailSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Yönetici Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciYoneticiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Aktif Yönetici Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciAktifYoneticiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Pasif Yönetici Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciPasifYoneticiSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Tema Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciTemaSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=90" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Sosyal Ağ Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciSosyalAgSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=15" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Ülke Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciUlkeSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>

	<div class="IstatistiklerAlaniIciParcaliCerceveAlanlariKapsayicisi">
		<div class="IstatistiklerAlaniIciCerceveAlanlariIciKapsayicisi">
			<div class="IstatistiklerAlaniIciCerceveAlanlariIciDetayliIstatistiklerIconAlaniKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top"><img src="Resimler/IconDetayliIstatistik.png" alt="Detay" title="Detay"></a>
			</div>
    		
    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciOrtalamaAlaniKapsayicisi">
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciBaslikAlanlariKapsayicisi">
	    			Şehir Sayısı
	    		</div>
	    		<div class="IstatistiklerAlaniIciCerceveAlanlariIciRakamAlanlariKapsayicisi">
	    			<span id="IstatistiklerCerceveAlaniIciSehirSayisiRakamAlani">0</span>
	    		</div>
			</div>
		</div>
	</div>
</div>		
<?php
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>