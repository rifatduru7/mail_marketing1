<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function AktarimFormKontrol(){
		if(document.AktarimFormu.AktarimDosyasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Aktarım formu dahilinde bulunan, \"Aktarım Dosyası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Aktarım Dosyası\" seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.AktarimFormu.AktarimDosyasi.value!=""){
			if((document.AktarimFormu.AktarimDosyasi.value.indexOf(".csv")==-1) && (document.AktarimFormu.AktarimDosyasi.value.indexOf(".CSV")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Aktarım formu dahilinde bulunan, \"Aktarım Dosyası\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Aktarım Dosyası\" dosya formatı .csv'dir.";
				ModalAc();
				return;
			}
		}
		
		document.AktarimFormu.submit();
	}
</script>	
	
<div id="ModalKarartmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="ModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">
			Eksik Bilgi Girişi Tespit Edildi!
			<span class="ModalKapatmaAlaniKapsayicisi" onClick="ModalKapat()">&times;</span>
		</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
	</div>
</div>
	
<div id="FormAlaniKapsayicisi">
	<form id="AktarimFormu" name="AktarimFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=165" method="POST" enctype="multipart/form-data">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > İçe Aktar
			<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
				<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
					<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/Dosyalar/Ornek_Dosya.csv" target="_top" download><img src="Resimler/IconIslemlerExcel.png" title="Örnek Dosya" alt="Örnek Dosya"></a>
				</div>
			</span>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Aktarım Dosyası (<span class="KirmiziYazi">*</span>)
			</div>
		
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="AktarimDosyasiDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="AktarimDosyasi" name="AktarimDosyasi" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('AktarimDosyasi', 'AktarimDosyasiDosyaAdiAlani', 'AktarimDosyasiSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="AktarimDosyasiSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('AktarimDosyasi', 'AktarimDosyasiDosyaAdiAlani', 'AktarimDosyasiSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Yükle" class="FormAlaniIciYukleButonlari" onClick="AktarimFormKontrol()" tabindex="1">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>