<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="FormAlaniKapsayicisi">
	<form id="DetayliAramaFormu" name="DetayliAramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=38" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top">Şehirler</a> > Detaylı Arama
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Adı
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Ulkesi" name="Ulkesi" class="FormAlaniIciSelectleri" tabindex="1">
					<option value="Tüm Ülkeler" selected="selected">Tüm Ülkeler</option>
					<?php
					$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi ASC");
					$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
						if($UlkelerKayitSayisi>0){
							while($UlkelerKayitlari=$Ulkeler->fetch_assoc()){
								$UlkelerKayitlariID			=	$UlkelerKayitlari["ID"];
								$UlkelerKayitlariUlkeAdi	=	$UlkelerKayitlari["UlkeAdi"];
					?>
								<option value="<?php echo $UlkelerKayitlariID; ?>"><?php echo DonusumleriGeriDondur($UlkelerKayitlariUlkeAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Şehir Adı
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SehirAdi" name="SehirAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="2">
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="submit" value="Arama Yap" class="FormAlaniIciAramaYapButonlari" tabindex="3">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>