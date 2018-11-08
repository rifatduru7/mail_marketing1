<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$SecimUzunlugu		=	strlen($GelenID);
			if($SecimUzunlugu==1){
				$TemaTaslakDosyasi			=	"Tema_00".$GelenID;
			}elseif($SecimUzunlugu==2){
				$TemaTaslakDosyasi			=	"Tema_0".$GelenID;
			}elseif($SecimUzunlugu==3){
				$TemaTaslakDosyasi			=	"Tema_".$GelenID;
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=192");
				exit();
			}
?>
<script type="text/javascript" src="Frameworkler/CKEditor/ckeditor.js" language="javascript"></script>

<script type="text/javascript" language="javascript">
	function KayitEklemeFormKontrol(){
		if(document.KayitEklemeFormu.TemaAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Tema Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Tema Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.Logosu.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo\" değeri boş bırakılamaz. Lütfen geçerli bir \"Logo\" dosyası giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.Logosu.value!=""){
			if((document.KayitEklemeFormu.Logosu.value.indexOf(".png")==-1) && (document.KayitEklemeFormu.Logosu.value.indexOf(".PNG")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Logo\" dosya formatı .png'dir.";
				ModalAc();
				return;
			}
		}		
		
		if(document.KayitEklemeFormu.LogoLinki.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"Logo Yönlendirme Linki\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.LogoLinki.value!=""){
			var LogoLinkiDegeri		=	document.getElementById("LogoLinki").value;
			var LogoLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(LogoLinkiDegeri);
				if(LogoLinkiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Logo Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"Logo Yönlendirme Linki\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.KayitEklemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Bilgi Girişi\" başlığı içerisindeki \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.BaslikMetniBir.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Başlık Bilgileri\" başlığı içerisindeki \"1. Başlık Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Başlık Metni\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		<?php if(($TemaTaslakDosyasi=="Tema_001") or ($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
			var IcerikMetniBirDegeri		=	CKEDITOR.instances.IcerikMetniBir.getData();
			if(IcerikMetniBirDegeri==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"1. İçerik Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. İçerik Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
		
			<?php if(($TemaTaslakDosyasi=="Tema_001") or ($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036")){ ?>
				if(document.KayitEklemeFormu.IcerikMetniBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IcerikMetniBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IcerikMetniBirinciButonLinki.value!=""){
					var IcerikMetniBirinciButonLinkiDegeri		=	document.getElementById("IcerikMetniBirinciButonLinki").value;
					var IcerikMetniBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IcerikMetniBirinciButonLinkiDegeri);
						if(IcerikMetniBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"İçerik Metni 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
	
			<?php if(($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036")){ ?>
				if(document.KayitEklemeFormu.IcerikMetniIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IcerikMetniIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçerik Metni 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IcerikMetniIkinciButonLinki.value!=""){
					var IcerikMetniIkinciButonLinkiDegeri		=	document.getElementById("IcerikMetniIkinciButonLinki").value;
					var IcerikMetniIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IcerikMetniIkinciButonLinkiDegeri);
						if(IcerikMetniIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"İçerik Bilgileri\" başlığı içerisindeki \"İçerik Metni 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"İçerik Metni 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		<?php if(($TemaTaslakDosyasi=="Tema_003") or ($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
			if(document.KayitEklemeFormu.BirinciResimDosyasiAdi.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim\" seçiniz.";
				ModalAc();
				return;
			}

			if(document.KayitEklemeFormu.BirinciResimDosyasiAdi.value!=""){
				if((document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".jpg")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".JPG")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".jpeg")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".JPEG")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".png")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".PNG")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".gif")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".GIF")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".bmp")==-1) && (document.KayitEklemeFormu.BirinciResimDosyasiAdi.value.indexOf(".BMP")==-1)){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"1. Resim\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
					ModalAc();
					return;
				}
			}
											  
			if(document.KayitEklemeFormu.BirinciResimLinki.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim Yönlendirme Linki\" değeri giriniz.";
				ModalAc();
				return;
			}

			if(document.KayitEklemeFormu.BirinciResimLinki.value!=""){
				var BirinciResimLinkiDegeri		=	document.getElementById("BirinciResimLinki").value;
				var BirinciResimLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(BirinciResimLinkiDegeri);
					if(BirinciResimLinkiKontrol==false){
						document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim Yönlendirme Linki\" değeri giriniz.";
						ModalAc();
						return;
					}
			}
											  
			if(document.KayitEklemeFormu.BirinciResimAltMetni.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim Alt Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim Alt Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
											  
			<?php if(($TemaTaslakDosyasi=="Tema_003") or ($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.KayitEklemeFormu.BirinciResimBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.BirinciResimBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.BirinciResimBirinciButonLinki.value!=""){
					var BirinciResimBirinciButonLinkiDegeri		=	document.getElementById("BirinciResimBirinciButonLinki").value;
					var BirinciResimBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(BirinciResimBirinciButonLinkiDegeri);
						if(BirinciResimBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		
			<?php if(($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.KayitEklemeFormu.BirinciResimIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.BirinciResimIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"1. Resim 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.BirinciResimIkinciButonLinki.value!=""){
					var BirinciResimIkinciButonLinkiDegeri		=	document.getElementById("BirinciResimIkinciButonLinki").value;
					var BirinciResimIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(BirinciResimIkinciButonLinkiDegeri);
						if(BirinciResimIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"1. Resim Bilgileri\" başlığı içerisindeki \"1. Resim 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"1. Resim 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		<?php if(($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
			if(document.KayitEklemeFormu.IkinciResimDosyasiAdi.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim\" seçiniz.";
				ModalAc();
				return;
			}

			if(document.KayitEklemeFormu.IkinciResimDosyasiAdi.value!=""){
				if((document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".jpg")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".JPG")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".jpeg")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".JPEG")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".png")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".PNG")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".gif")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".GIF")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".bmp")==-1) && (document.KayitEklemeFormu.IkinciResimDosyasiAdi.value.indexOf(".BMP")==-1)){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"2. Resim\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
					ModalAc();
					return;
				}
			}
											  
			if(document.KayitEklemeFormu.IkinciResimLinki.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Yönlendirme Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim Yönlendirme Linki\" değeri giriniz.";
				ModalAc();
				return;
			}

			if(document.KayitEklemeFormu.IkinciResimLinki.value!=""){
				var IkinciResimLinkiDegeri		=	document.getElementById("IkinciResimLinki").value;
				var IkinciResimLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimLinkiDegeri);
					if(IkinciResimLinkiKontrol==false){
						document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Yönlendirme Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim Yönlendirme Linki\" değeri giriniz.";
						ModalAc();
						return;
					}
			}
											  
			if(document.KayitEklemeFormu.IkinciResimAltMetni.value==""){
				document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim Alt Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim Alt Metni\" değeri giriniz.";
				ModalAc();
				return;
			}
											  
			<?php if(($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.KayitEklemeFormu.IkinciResimBirinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 1. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IkinciResimBirinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 1. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IkinciResimBirinciButonLinki.value!=""){
					var IkinciResimBirinciButonLinkiDegeri		=	document.getElementById("IkinciResimBirinciButonLinki").value;
					var IkinciResimBirinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimBirinciButonLinkiDegeri);
						if(IkinciResimBirinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 1. Buton Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim 1. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		
			<?php if(($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
				if(document.KayitEklemeFormu.IkinciResimIkinciButonMetni.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Yazısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 2. Buton Yazısı\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IkinciResimIkinciButonLinki.value==""){
					document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"2. Resim 2. Buton Linki\" değeri giriniz.";
					ModalAc();
					return;
				}

				if(document.KayitEklemeFormu.IkinciResimIkinciButonLinki.value!=""){
					var IkinciResimIkinciButonLinkiDegeri		=	document.getElementById("IkinciResimIkinciButonLinki").value;
					var IkinciResimIkinciButonLinkiKontrol		=	LinkOnEkiZorunluKontrolEt(IkinciResimIkinciButonLinkiDegeri);
						if(IkinciResimIkinciButonLinkiKontrol==false){
							document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"2. Resim Bilgileri\" başlığı içerisindeki \"2. Resim 2. Buton Linki\" geçersizdir. Lütfen geçerli bir \"2. Resim 2. Buton Linki\" değeri giriniz.";
							ModalAc();
							return;
						}
				}
			<?php } ?>
		<?php } ?>
		
		document.KayitEklemeFormu.submit();
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=194" method="POST" enctype="multipart/form-data">
		<input type="hidden" id="TemaTaslakDosyasi" name="TemaTaslakDosyasi" value="<?php echo DonusumleriGeriDondur($TemaTaslakDosyasi); ?>">
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > Bilgi Girişi
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Tema Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="TemaAdi" name="TemaAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Logo (<span class="KirmiziYazi">*</span>) [196px * 54px]
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
				<input type="text" id="LogoLinki" name="LogoLinki" onKeyUp="LinkAlanlariIcinFiltrele('LogoLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="2">
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
								$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							$SonSiraNumarasi		=	0;
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi+1;
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($DonguBaslangicDegeri==$DonguBitisDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
					<?php
						$DonguBaslangicDegeri++;
					}
					?>
				</select></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > Başlık Bilgileri
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Başlık Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniBir" name="BaslikMetniBir" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="4">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniIki" name="BaslikMetniIki" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				3. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniUc" name="BaslikMetniUc" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="6">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				4. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniDort" name="BaslikMetniDort" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="7">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				5. Başlık Metni
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BaslikMetniBes" name="BaslikMetniBes" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="8">
			</div>
		</div>
	
		<?php if(($TemaTaslakDosyasi=="Tema_001") or ($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
		
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > İçerik Bilgileri
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. İçerik Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi" style="padding-bottom: 9px;">
				<textarea id="IcerikMetniBir" name="IcerikMetniBir" tabindex="9"></textarea>
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
				<textarea id="IcerikMetniIki" name="IcerikMetniIki" tabindex="10"></textarea>
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
				<textarea id="IcerikMetniUc" name="IcerikMetniUc" tabindex="11"></textarea>
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
				<textarea id="IcerikMetniDort" name="IcerikMetniDort" tabindex="12"></textarea>
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
				<textarea id="IcerikMetniBes" name="IcerikMetniBes" tabindex="13"></textarea>
				<script type="text/javascript">
					CKEDITOR.replace("IcerikMetniBes");
				</script>
			</div>
		</div>
	
		<?php if(($TemaTaslakDosyasi=="Tema_001") or ($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IcerikMetniBirinciButonMetni" name="IcerikMetniBirinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="14"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IcerikMetniBirinciButonLinki" name="IcerikMetniBirinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('IcerikMetniBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="15">
			</div>
		</div>
		<?php } ?>
	
		<?php if(($TemaTaslakDosyasi=="Tema_002") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IcerikMetniIkinciButonMetni" name="IcerikMetniIkinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="16"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçerik Metni 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IcerikMetniIkinciButonLinki" name="IcerikMetniIkinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('IcerikMetniIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="17">
			</div>
		</div>
		<?php } ?>
		<?php } ?>
		
		<?php if(($TemaTaslakDosyasi=="Tema_003") or ($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > 1. Resim Bilgileri
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim (<span class="KirmiziYazi">*</span>) <?php if(($TemaTaslakDosyasi=="Tema_003") or ($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_007") or ($TemaTaslakDosyasi=="Tema_008") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_015") or ($TemaTaslakDosyasi=="Tema_016") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022")){ ?>[600px * 450px]<?php } ?><?php if(($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>[295px * 220px]<?php } ?>
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
				<input type="text" id="BirinciResimLinki" name="BirinciResimLinki" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="18">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim Alt Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimAltMetni" name="BirinciResimAltMetni" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="19">
			</div>
		</div>
	
		<?php if(($TemaTaslakDosyasi=="Tema_003") or ($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_009") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_011") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_013") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_017") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_019") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_021") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="BirinciResimBirinciButonMetni" name="BirinciResimBirinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="20"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimBirinciButonLinki" name="BirinciResimBirinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="21">
			</div>
		</div>
		<?php } ?>
		
		<?php if(($TemaTaslakDosyasi=="Tema_004") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_010") or ($TemaTaslakDosyasi=="Tema_012") or ($TemaTaslakDosyasi=="Tema_014") or ($TemaTaslakDosyasi=="Tema_018") or ($TemaTaslakDosyasi=="Tema_020") or ($TemaTaslakDosyasi=="Tema_022") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="BirinciResimIkinciButonMetni" name="BirinciResimIkinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="22"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				1. Resim 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="BirinciResimIkinciButonLinki" name="BirinciResimIkinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('BirinciResimIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="23">
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	
		<?php if(($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_023") or ($TemaTaslakDosyasi=="Tema_024") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_031") or ($TemaTaslakDosyasi=="Tema_032") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>
	
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > 2. Resim Bilgileri
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim (<span class="KirmiziYazi">*</span>) [295px * 220px]
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
				<input type="text" id="IkinciResimLinki" name="IkinciResimLinki" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="24">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim Alt Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimAltMetni" name="IkinciResimAltMetni" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="25">
			</div>
		</div>
	
		<?php if(($TemaTaslakDosyasi=="Tema_005") or ($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_025") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_027") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_029") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_033") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_035") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_037") or ($TemaTaslakDosyasi=="Tema_038")){ ?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 1. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IkinciResimBirinciButonMetni" name="IkinciResimBirinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="26"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 1. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimBirinciButonLinki" name="IkinciResimBirinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimBirinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="27">
			</div>
		</div>
		<?php } ?>

		<?php if(($TemaTaslakDosyasi=="Tema_006") or ($TemaTaslakDosyasi=="Tema_026") or ($TemaTaslakDosyasi=="Tema_028") or ($TemaTaslakDosyasi=="Tema_030") or ($TemaTaslakDosyasi=="Tema_034") or ($TemaTaslakDosyasi=="Tema_036") or ($TemaTaslakDosyasi=="Tema_038")){ ?>	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 2. Buton Yazısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="IkinciResimIkinciButonMetni" name="IkinciResimIkinciButonMetni" class="FormAlaniIciTextInputlari" maxlength="25" tabindex="28"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				2. Resim 2. Buton Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IkinciResimIkinciButonLinki" name="IkinciResimIkinciButonLinki" onKeyUp="LinkAlanlariIcinFiltrele('IkinciResimIkinciButonLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="29">
			</div>
		</div>
		<?php } ?>
		<?php } ?>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Kaydet" class="FormAlaniIciKaydetButonlari" onClick="KayitEklemeFormKontrol()" tabindex="30">
		</div>
	</form>
</div>
<?php
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=192");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>