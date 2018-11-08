<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$TemaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$TemaBilgileriSorgusuKayitSayisi	=	$TemaBilgileriSorgusu->num_rows;
			if($TemaBilgileriSorgusuKayitSayisi>0){
				$TemaBilgileriSorgusuKaydi	=	$TemaBilgileriSorgusu->fetch_assoc();
					$TemaBilgileriSorgusuKaydiID									=	$TemaBilgileriSorgusuKaydi["ID"];
					$TemaBilgileriSorgusuKaydiTemaTaslakDosyasi						=	$TemaBilgileriSorgusuKaydi["TemaTaslakDosyasi"];
					$TemaBilgileriSorgusuKaydiTemaAdi								=	$TemaBilgileriSorgusuKaydi["TemaAdi"];
					$TemaBilgileriSorgusuKaydiLogosu								=	$TemaBilgileriSorgusuKaydi["Logosu"];
					$TemaBilgileriSorgusuKaydiLogoLinki								=	$TemaBilgileriSorgusuKaydi["LogoLinki"];
					$TemaBilgileriSorgusuKaydiBaslikMetniBir						=	$TemaBilgileriSorgusuKaydi["BaslikMetniBir"];
					$TemaBilgileriSorgusuKaydiBaslikMetniIki						=	$TemaBilgileriSorgusuKaydi["BaslikMetniIki"];
					$TemaBilgileriSorgusuKaydiBaslikMetniUc							=	$TemaBilgileriSorgusuKaydi["BaslikMetniUc"];
					$TemaBilgileriSorgusuKaydiBaslikMetniDort						=	$TemaBilgileriSorgusuKaydi["BaslikMetniDort"];
					$TemaBilgileriSorgusuKaydiBaslikMetniBes						=	$TemaBilgileriSorgusuKaydi["BaslikMetniBes"];
					$TemaBilgileriSorgusuKaydiIcerikMetniBir						=	$TemaBilgileriSorgusuKaydi["IcerikMetniBir"];
					$TemaBilgileriSorgusuKaydiIcerikMetniIki						=	$TemaBilgileriSorgusuKaydi["IcerikMetniIki"];
					$TemaBilgileriSorgusuKaydiIcerikMetniUc							=	$TemaBilgileriSorgusuKaydi["IcerikMetniUc"];
					$TemaBilgileriSorgusuKaydiIcerikMetniDort						=	$TemaBilgileriSorgusuKaydi["IcerikMetniDort"];
					$TemaBilgileriSorgusuKaydiIcerikMetniBes						=	$TemaBilgileriSorgusuKaydi["IcerikMetniBes"];
					$TemaBilgileriSorgusuKaydiIcerikMetniBirinciButonMetni			=	$TemaBilgileriSorgusuKaydi["IcerikMetniBirinciButonMetni"];
					$TemaBilgileriSorgusuKaydiIcerikMetniBirinciButonLinki			=	$TemaBilgileriSorgusuKaydi["IcerikMetniBirinciButonLinki"];
					$TemaBilgileriSorgusuKaydiIcerikMetniIkinciButonMetni			=	$TemaBilgileriSorgusuKaydi["IcerikMetniIkinciButonMetni"];
					$TemaBilgileriSorgusuKaydiIcerikMetniIkinciButonLinki			=	$TemaBilgileriSorgusuKaydi["IcerikMetniIkinciButonLinki"];
					$TemaBilgileriSorgusuKaydiBirinciResimDosyasiAdi				=	$TemaBilgileriSorgusuKaydi["BirinciResimDosyasiAdi"];
					$TemaBilgileriSorgusuKaydiBirinciResimLinki						=	$TemaBilgileriSorgusuKaydi["BirinciResimLinki"];
					$TemaBilgileriSorgusuKaydiBirinciResimAltMetni					=	$TemaBilgileriSorgusuKaydi["BirinciResimAltMetni"];
					$TemaBilgileriSorgusuKaydiBirinciResimBirinciButonMetni			=	$TemaBilgileriSorgusuKaydi["BirinciResimBirinciButonMetni"];
					$TemaBilgileriSorgusuKaydiBirinciResimBirinciButonLinki			=	$TemaBilgileriSorgusuKaydi["BirinciResimBirinciButonLinki"];
					$TemaBilgileriSorgusuKaydiBirinciResimIkinciButonMetni			=	$TemaBilgileriSorgusuKaydi["BirinciResimIkinciButonMetni"];
					$TemaBilgileriSorgusuKaydiBirinciResimIkinciButonLinki			=	$TemaBilgileriSorgusuKaydi["BirinciResimIkinciButonLinki"];
					$TemaBilgileriSorgusuKaydiIkinciResimDosyasiAdi					=	$TemaBilgileriSorgusuKaydi["IkinciResimDosyasiAdi"];
					$TemaBilgileriSorgusuKaydiIkinciResimLinki						=	$TemaBilgileriSorgusuKaydi["IkinciResimLinki"];
					$TemaBilgileriSorgusuKaydiIkinciResimAltMetni					=	$TemaBilgileriSorgusuKaydi["IkinciResimAltMetni"];
					$TemaBilgileriSorgusuKaydiIkinciResimBirinciButonMetni			=	$TemaBilgileriSorgusuKaydi["IkinciResimBirinciButonMetni"];
					$TemaBilgileriSorgusuKaydiIkinciResimBirinciButonLinki			=	$TemaBilgileriSorgusuKaydi["IkinciResimBirinciButonLinki"];
					$TemaBilgileriSorgusuKaydiIkinciResimIkinciButonMetni			=	$TemaBilgileriSorgusuKaydi["IkinciResimIkinciButonMetni"];
					$TemaBilgileriSorgusuKaydiIkinciResimIkinciButonLinki			=	$TemaBilgileriSorgusuKaydi["IkinciResimIkinciButonLinki"];
					$TemaBilgileriSorgusuKaydiSiraNumarasi							=	$TemaBilgileriSorgusuKaydi["SiraNumarasi"];
?>
<script type="text/javascript" src="Frameworkler/CKEditor/ckeditor.js" language="javascript"></script>

<script type="text/javascript" language="javascript">
	function GuncellemeFormKontrol(){
		if(document.GuncellemeFormu.TemaAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Tema Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Tema Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.Logosu.value!=""){
			if((document.GuncellemeFormu.Logosu.value.indexOf(".png")==-1) && (document.GuncellemeFormu.Logosu.value.indexOf(".PNG")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Logo\" dosya formatı .png'dir.";
				ModalAc();
				return;
			}
		}		
		
		if(document.GuncellemeFormu.LogoLinki.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"Logo Yönlendirme Linki\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.LogoLinki.value!=""){
			var LogoLinkiDegeri		=	document.getElementById("LogoLinki").value;
			var LogoLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(LogoLinkiDegeri);
				if(LogoLinkiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"Logo Yönlendirme Linki\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.GuncellemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.BaslikMetniBir.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Başlık Bilgileri\" başlığı içerisindeki \"1. Başlık Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Başlık Metni\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
			var IcerikMetniBirDegeri		=	CKEDITOR.instances.IcerikMetniBir.getData();
			if(IcerikMetniBirDegeri==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"1. İçerik Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. İçerik Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
		
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")){ ?>
				if(document.GuncellemeFormu.IcerikMetniBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IcerikMetniBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IcerikMetniBirinciButonLinki.value!=""){
					var IcerikMetniBirinciButonLinkiDegeri		=	document.getElementById("IcerikMetniBirinciButonLinki").value;
					var IcerikMetniBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IcerikMetniBirinciButonLinkiDegeri);
						if(IcerikMetniBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"İçerik Metni 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
	
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")){ ?>
				if(document.GuncellemeFormu.IcerikMetniIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IcerikMetniIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IcerikMetniIkinciButonLinki.value!=""){
					var IcerikMetniIkinciButonLinkiDegeri		=	document.getElementById("IcerikMetniIkinciButonLinki").value;
					var IcerikMetniIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IcerikMetniIkinciButonLinkiDegeri);
						if(IcerikMetniIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"İçerik Metni 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
			if(document.GuncellemeFormu.BirinciResimDosyasiAdi.value!=""){
				if((document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".jpg")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".JPG")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".jpeg")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".JPEG")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".png")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".PNG")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".gif")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".GIF")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".bmp")==-1) && (document.GuncellemeFormu.BirinciResimDosyasiAdi.value.indexOf(".BMP")==-1)){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"1. Resim\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
					ModalAc();
					return;
				}
			}
											  
			if(document.GuncellemeFormu.BirinciResimLinki.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim Yönlendirme Linki\" değeri giriniz.";
				ModalAc();
				return;
			}

			if(document.GuncellemeFormu.BirinciResimLinki.value!=""){
				var BirinciResimLinkiDegeri		=	document.getElementById("BirinciResimLinki").value;
				var BirinciResimLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(BirinciResimLinkiDegeri);
					if(BirinciResimLinkiKontrol==false){
						document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim Yönlendirme Linki\" değeri giriniz.";
						ModalAc();
						return;
					}
			}
											  
			if(document.GuncellemeFormu.BirinciResimAltMetni.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Alt Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim Alt Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
											  
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.GuncellemeFormu.BirinciResimBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.BirinciResimBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.BirinciResimBirinciButonLinki.value!=""){
					var BirinciResimBirinciButonLinkiDegeri		=	document.getElementById("BirinciResimBirinciButonLinki").value;
					var BirinciResimBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(BirinciResimBirinciButonLinkiDegeri);
						if(BirinciResimBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.GuncellemeFormu.BirinciResimIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.BirinciResimIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.BirinciResimIkinciButonLinki.value!=""){
					var BirinciResimIkinciButonLinkiDegeri		=	document.getElementById("BirinciResimIkinciButonLinki").value;
					var BirinciResimIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(BirinciResimIkinciButonLinkiDegeri);
						if(BirinciResimIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
			if(document.GuncellemeFormu.IkinciResimDosyasiAdi.value!=""){
				if((document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".jpg")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".JPG")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".jpeg")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".JPEG")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".png")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".PNG")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".gif")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".GIF")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".bmp")==-1) && (document.GuncellemeFormu.IkinciResimDosyasiAdi.value.indexOf(".BMP")==-1)){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"2. Resim\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
					ModalAc();
					return;
				}
			}
											  
			if(document.GuncellemeFormu.IkinciResimLinki.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim Yönlendirme Linki\" değeri giriniz.";
				ModalAc();
				return;
			}

			if(document.GuncellemeFormu.IkinciResimLinki.value!=""){
				var IkinciResimLinkiDegeri		=	document.getElementById("IkinciResimLinki").value;
				var IkinciResimLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimLinkiDegeri);
					if(IkinciResimLinkiKontrol==false){
						document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim Yönlendirme Linki\" değeri giriniz.";
						ModalAc();
						return;
					}
			}
											  
			if(document.GuncellemeFormu.IkinciResimAltMetni.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Alt Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim Alt Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
											  
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.GuncellemeFormu.IkinciResimBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IkinciResimBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IkinciResimBirinciButonLinki.value!=""){
					var IkinciResimBirinciButonLinkiDegeri		=	document.getElementById("IkinciResimBirinciButonLinki").value;
					var IkinciResimBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimBirinciButonLinkiDegeri);
						if(IkinciResimBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		
			<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.GuncellemeFormu.IkinciResimIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IkinciResimIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.GuncellemeFormu.IkinciResimIkinciButonLinki.value!=""){
					var IkinciResimIkinciButonLinkiDegeri		=	document.getElementById("IkinciResimIkinciButonLinki").value;
					var IkinciResimIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimIkinciButonLinkiDegeri);
						if(IkinciResimIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		document.GuncellemeFormu.submit();
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
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=199&ID=<?php echo $GelenID; ?>" method="POST" enctype="multipart/form-data">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Kayıt Güncelle > Bilgi Girişi
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Tema Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="TemaAdi" name="TemaAdi" class="FormAlaniIciTextInputlari" value="<?php echo $TemaBilgileriSorgusuKaydiTemaAdi; ?>" maxlength="100" tabindex="1">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Logo [196px * 54px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="LogosuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="Logosu" name="Logosu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('Logosu', 'LogosuDosyaAdiAlani', 'LogosuSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="LogosuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('Logosu', 'LogosuDosyaAdiAlani', 'LogosuSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Logo Yönlendirme Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="LogoLinki" name="LogoLinki" value="<?php echo $TemaBilgileriSorgusuKaydiLogoLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('LogoLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="2">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="3">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM temalar ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
								$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi							=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=190");
							exit();
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi;
				
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($TemaBilgileriSorgusuKaydiSiraNumarasi==$DonguBaslangicDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
					<?php
						$DonguBaslangicDegeri++;
					}
					?>
				</select></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Kayıt Güncelle > Başlık Bilgileri
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Başlık Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniBir" name="BaslikMetniBir" value="<?php echo $TemaBilgileriSorgusuKaydiBaslikMetniBir; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="4">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniIki" name="BaslikMetniIki" value="<?php echo $TemaBilgileriSorgusuKaydiBaslikMetniIki; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				3. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniUc" name="BaslikMetniUc" value="<?php echo $TemaBilgileriSorgusuKaydiBaslikMetniUc; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="6">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				4. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniDort" name="BaslikMetniDort" value="<?php echo $TemaBilgileriSorgusuKaydiBaslikMetniDort; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="7">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				5. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniBes" name="BaslikMetniBes" value="<?php echo $TemaBilgileriSorgusuKaydiBaslikMetniBes; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="8">
			</div>
		</div>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
		
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Kayıt Güncelle > İçerik Bilgileri
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. İçerik Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniBir" name="IcerikMetniBir" tabindex="9"><?php echo $TemaBilgileriSorgusuKaydiIcerikMetniBir; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniBir");
				</script>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. İçerik Metni
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniIki" name="IcerikMetniIki" tabindex="10"><?php echo $TemaBilgileriSorgusuKaydiIcerikMetniIki; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniIki");
				</script>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				3. İçerik Metni
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniUc" name="IcerikMetniUc" tabindex="11"><?php echo $TemaBilgileriSorgusuKaydiIcerikMetniUc; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniUc");
				</script>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				4. İçerik Metni
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniDort" name="IcerikMetniDort" tabindex="12"><?php echo $TemaBilgileriSorgusuKaydiIcerikMetniDort; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniDort");
				</script>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				5. İçerik Metni
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniBes" name="IcerikMetniBes" tabindex="13"><?php echo $TemaBilgileriSorgusuKaydiIcerikMetniBes; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniBes");
				</script>
			</div>
		</div>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IcerikMetniBirinciButonMetni" name="IcerikMetniBirinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiIcerikMetniBirinciButonMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="14"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IcerikMetniBirinciButonLinki" name="IcerikMetniBirinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiIcerikMetniBirinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('IcerikMetniBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="15">
			</div>
		</div>
		<?php } ?>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IcerikMetniIkinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiIcerikMetniIkinciButonMetni; ?>" name="IcerikMetniIkinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="16"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IcerikMetniIkinciButonLinki" name="IcerikMetniIkinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiIcerikMetniIkinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('IcerikMetniIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="17">
			</div>
		</div>
		<?php } ?>
		<?php } ?>
		
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Kayıt Güncelle > 1. Resim Bilgileri
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim <?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022")){ ?>[600px * 450px]<?php } ?><?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>[295px * 220px]<?php } ?>
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="BirinciResimDosyasiAdiDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="BirinciResimDosyasiAdi" name="BirinciResimDosyasiAdi" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('BirinciResimDosyasiAdi', 'BirinciResimDosyasiAdiDosyaAdiAlani', 'BirinciResimDosyasiAdiSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="BirinciResimDosyasiAdiSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('BirinciResimDosyasiAdi', 'BirinciResimDosyasiAdiDosyaAdiAlani', 'BirinciResimDosyasiAdiSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>		
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim Yönlendirme Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimLinki" name="BirinciResimLinki" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="18">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim Alt Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimAltMetni" name="BirinciResimAltMetni" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimAltMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="19">
			</div>
		</div>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="BirinciResimBirinciButonMetni" name="BirinciResimBirinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimBirinciButonMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="20"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimBirinciButonLinki" name="BirinciResimBirinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimBirinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="21">
			</div>
		</div>
		<?php } ?>
		
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="BirinciResimIkinciButonMetni" name="BirinciResimIkinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimIkinciButonMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="22"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimIkinciButonLinki" name="BirinciResimIkinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiBirinciResimIkinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="23">
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Kayıt Güncelle > 2. Resim Bilgileri
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim [295px * 220px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="IkinciResimDosyasiAdiDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="IkinciResimDosyasiAdi" name="IkinciResimDosyasiAdi" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('IkinciResimDosyasiAdi', 'IkinciResimDosyasiAdiDosyaAdiAlani', 'IkinciResimDosyasiAdiSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="IkinciResimDosyasiAdiSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('IkinciResimDosyasiAdi', 'IkinciResimDosyasiAdiDosyaAdiAlani', 'IkinciResimDosyasiAdiSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>		
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim Yönlendirme Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimLinki" name="IkinciResimLinki" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="24">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim Alt Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimAltMetni" name="IkinciResimAltMetni" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimAltMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="25">
			</div>
		</div>
	
		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IkinciResimBirinciButonMetni" name="IkinciResimBirinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimBirinciButonMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="26"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimBirinciButonLinki" name="IkinciResimBirinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimBirinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="27">
			</div>
		</div>
		<?php } ?>

		<?php if(($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($TemaBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){ ?>	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IkinciResimIkinciButonMetni" name="IkinciResimIkinciButonMetni" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimIkinciButonMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="28"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimIkinciButonLinki" name="IkinciResimIkinciButonLinki" value="<?php echo $TemaBilgileriSorgusuKaydiIkinciResimIkinciButonLinki; ?>" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="29">
			</div>
		</div>
		<?php } ?>
		<?php } ?>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="GuncellemeFormKontrol()" tabindex="30">
		</div>
	</form>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=192");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=192");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>