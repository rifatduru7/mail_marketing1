<? if(isset($_SESSION["Yonetici"])){ ?>
<div id="HeaderAlaniKapsayicisi">
	<div id="SiteAnaLogoAlaniKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top"><img src="Resimler/<?php echo DonusumleriGeriDondur($SiteAyarlariKaydiSiteAnaLogosu); ?>"></a>
	</div>
	
	<div id="YoneticiResimVeIslemAlaniKapsayicisi">
		<div id="YoneticiIconAlaniKapsayicisi">
			<img src="Resimler/<?php echo DonusumleriGeriDondur($AktifYoneticiBilgisiKaydiYoneticiResmi); ?>">
		</div>
		<div id="YoneticiAdSoyadVeAcilirAlanKapsayicisi">
			<div id="YoneticiAdSoyadAlanikapsayicisi">
				<?php echo DonusumleriGeriDondur($AktifYoneticiBilgisiKaydiYoneticiAdi); ?> <?php echo DonusumleriGeriDondur($AktifYoneticiBilgisiKaydiYoneticiSoyadi); ?><br />
				<span id="YoneticiAdSoyadAltAlaniMetni"><i>Yönetici</i></span>
			</div>
			<div id="YoneticiOkAlaniKapsayicisi">
				<img id="AcilirMenuOku" src="Resimler/OkAsagi.png" onClick="HeaderYoneticiAlaniMenuAcKapat()">
			</div>
			<div id="YoneticiAcilirMenuAlaniKapsayicisi" style="display: none;">
				<ul>
					<li>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">
							<div class="HeaderAlaniIciMenuIciAnaSayfaResimAlani"></div>
							<div class="HeaderAlaniIciMenuIciMetinAlani">Ana Sayfa</div>
						</a>
					</li>
					<li>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top">
							<div class="HeaderAlaniIciMenuIciYoneticiAyarlariResimAlani"></div>
							<div class="HeaderAlaniIciMenuIciMetinAlani">Yönetici Ayarları</div>
						</a>
					</li>
					<li>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=10" target="_top">
							<div class="HeaderAlaniIciMenuIciCikisResimAlani"></div>
							<div class="HeaderAlaniIciMenuIciMetinAlani">Çıkış</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="MobilMenuButonAlaniKapsayicisi">
		<div id="MobilMenuButonIconAlaniKapsayicisi">
			<img src="Resimler/MenuNokatalari.png" onClick="MobilMenuAlaniMenuAcKapat()">
		</div>
	</div>
</div>

<div id="MobilMenuAlaniKapsayicisi" style="display: none;">
	<div id="MobilMenuBaslikAlaniKapsayicisi">
		E-Mail Marketing Sistem
	</div>
	<div id="MobilMenuIcerikAlaniKapsayicisi">
		<ul>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciAnaSayfaResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Ana Sayfa</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciKisilerResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kişiler</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=189" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciKisiBildirimleriResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kişi Bildirimleri</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciKampanyalarResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kampanyalar</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciTemalarResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Temalar</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=7" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciSistemAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Sistem Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciEMailHesapAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">E-Mail Hesap Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=11" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciFirmaAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Firma Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=90" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciSosyalAgAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Sosyal Ağ Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=15" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciUlkeAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Ülke Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciSehirAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Şehir Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciYoneticiAyarlariResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Yönetici Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=10" target="_top">
					<div class="MobilMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MobilMenuIcerikAlaniMenuIciCikisResimAlaniKapsayicisi"></div>
					<div class="MobilMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Çıkış</div>
				</a>
			</li>
		</ul>
	</div>
</div>

<div id="MasaUstuSolMenuAlaniKapsayicisi">
	<div id="MasaUstuSolMenuBaslikAlaniKapsayicisi">
		E-Mail Marketing Sistem
	</div>
	<div id="MasaUstuSolMenuIcerikAlaniKapsayicisi">
		<ul>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=1" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciAnaSayfaResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Ana Sayfa</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciKisilerResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kişiler</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=189" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciKisiBildirimleriResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kişi Bildirimleri</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciKampanyalarResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Kampanyalar</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciTemalarResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Temalar</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=7" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciSistemAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Sistem Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciEMailHesapAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">E-Mail Hesap Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=11" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciFirmaAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Firma Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=90" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciSosyalAgAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Sosyal Ağ Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=15" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciUlkeAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Ülke Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciSehirAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Şehir Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciYoneticiAyarlariResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Yönetici Ayarları</div>
				</a>
			</li>
			<li>
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=10" target="_top">
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciBoyamaAlani">&nbsp;</div>
					<div id="MasaUstuSolMenuIcerikAlaniMenuIciCikisResimAlaniKapsayicisi"></div>
					<div class="MasaUstuSolMenuIcerikAlaniMenuIciMetinAlaniKapsayicisi">Çıkış</div>
				</a>
			</li>
		</ul>
	</div>
</div>

<div id="SagIceriklerBaslikMetniAlanikapsayicisi">
	<?php echo DonusumleriGeriDondur($SayfaBasligiYaz); ?>
</div>

<div id="SagIceriklerAlaniKapsayicisi">
	<div id="SagIceriklerSayfaAlaniKapsayicisi">
		<?php
		if((!$GelenSayfalar) or ($GelenSayfalar=="")){
			include($GelenSayfalar[1]);
		}else{
			include($Sayfalar[$GelenSayfalar]);
		}
		?>
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>