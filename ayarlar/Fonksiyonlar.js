function BuyukHarfKucukHarfDegistir(Deger){
	var GelenDeger					=	Deger;
	var IcerikNesnesi				=	{"A":"a", "B":"b", "C":"c", "Ç":"ç", "D":"d", "E":"e", "F":"f", "G":"g", "Ğ":"ğ", "H":"h", "I":"ı", "İ":"i", "J":"j", "K":"k", "L":"l", "M":"m", "N":"n", "O":"o", "Ö":"ö", "P":"p", "R":"r", "S":"s", "Ş":"ş", "T":"t", "U":"u", "Ü":"ü", "V":"v", "Y":"y", "Z":"z", "Q":"q", "W":"w", "X":"x"};
	var DegisimSonucu				=	GelenDeger.replace(/[A-ZÇĞİÖŞÜ]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	return DegisimSonucu;
}

function KucukHarfBuyukHarfDegistir(Deger){
	var GelenDeger					=	Deger;
	var IcerikNesnesi				=	{"a":"A", "b":"B", "c":"C", "ç":"Ç", "d":"D", "e":"E", "f":"F", "g":"G", "ğ":"Ğ", "h":"H", "ı":"I", "i":"İ", "j":"J", "k":"K", "l":"L", "m":"M", "n":"N", "o":"O", "ö":"Ö", "p":"P", "r":"R", "s":"S", "ş":"Ş", "t":"T", "u":"U", "ü":"Ü", "v":"V", "y":"Y", "z":"Z", "q":"Q", "w":"W", "x":"X"};
	var DegisimSonucu				=	GelenDeger.replace(/[a-zçğıöşü]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	return DegisimSonucu;
}

function IngilizceyeGoreBuyukHarfKucukHarfDegistir(Deger){
	var GelenDeger					=	Deger;
	var IcerikNesnesi				=	{"A":"a", "B":"b", "C":"c", "Ç":"c", "D":"d", "E":"e", "F":"f", "G":"g", "Ğ":"g", "H":"h", "I":"i", "İ":"i", "J":"j", "K":"k", "L":"l", "M":"m", "N":"n", "O":"o", "Ö":"o", "P":"p", "R":"r", "S":"s", "Ş":"s", "T":"t", "U":"u", "Ü":"u", "V":"v", "Y":"y", "Z":"z", "Q":"q", "W":"w", "X":"x"};
	var DegisimSonucu				=	GelenDeger.replace(/[A-ZÇĞİÖŞÜ]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	return DegisimSonucu;
}

function IngilizceyeGoreKucukHarfBuyukHarfDegistir(Deger){
	var GelenDeger					=	Deger;
	var IcerikNesnesi				=	{"a":"A", "b":"B", "c":"C", "ç":"C", "d":"D", "e":"E", "f":"F", "g":"G", "ğ":"G", "h":"H", "ı":"I", "i":"I", "j":"J", "k":"K", "l":"L", "m":"M", "n":"N", "o":"O", "ö":"O", "p":"P", "r":"R", "s":"S", "ş":"S", "t":"T", "u":"U", "ü":"U", "v":"V", "y":"Y", "z":"Z", "q":"Q", "w":"W", "x":"X"};
	var DegisimSonucu				=	GelenDeger.replace(/[a-zçğıöşü]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	return DegisimSonucu;
}

function TurkceHarfleriIngilizceHarflereDegistir(Deger){
	var GelenDeger					=	Deger;
	var IcerikNesnesi				=	{"Ç":"C", "ç":"c", "Ğ":"G", "ğ":"g", "İ":"I", "ı":"i", "Ö":"O", "ö":"o", "Ş":"S", "ş":"s", "Ü":"U", "ü":"u"};
	var DegisimSonucu				=	GelenDeger.replace(/[ÇçĞğİıÖöŞşÜü]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	return DegisimSonucu;
}

function KullaniciAdiAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜü]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function KullaniciSifresiAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜü]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function EMailAdresiAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var TurkceHarfleriDegistir		=	TurkceHarfleriIngilizceHarflereDegistir(FormElemaniIcerikDegeri);
	var HarfleriDegistir			=	IngilizceyeGoreBuyukHarfKucukHarfDegistir(TurkceHarfleriDegistir);
	var DegisimSonucu				=	HarfleriDegistir.replace(/[^a-z0-9_\-\.@]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function LinkAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var TurkceHarfleriDegistir		=	TurkceHarfleriIngilizceHarflereDegistir(FormElemaniIcerikDegeri);
	var HarfleriDegistir			=	IngilizceyeGoreBuyukHarfKucukHarfDegistir(TurkceHarfleriDegistir);
	var DegisimSonucu				=	HarfleriDegistir.replace(/[^a-z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function DosyaAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜü\[\]\(\) ]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function TelefonAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[^0-9]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function UluslararasiKodAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var TurkceHarfleriDegistir		=	TurkceHarfleriIngilizceHarflereDegistir(FormElemaniIcerikDegeri);
	var HarfleriDegistir			=	IngilizceyeGoreKucukHarfBuyukHarfDegistir(TurkceHarfleriDegistir);
	var DegisimSonucu				=	HarfleriDegistir.replace(/[^A-Z]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}

function EMailKontrolEt(Deger){
	var EMailKontrolYapisi		=	/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var KontrolEt				=	EMailKontrolYapisi.test(Deger);
	return KontrolEt;
}

function LinkKontrolEt(Deger){
	var LinkKontrolYapisi		=	/^(http(s)?:\/\/.)?(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/;
	var KontrolEt				=	LinkKontrolYapisi.test(Deger);
	return KontrolEt;
}

function LinkOnEkiZorunluKontrolEt(Deger){
	var LinkKontrolYapisi		=	/^(http(s)?:\/\/.)+(www\.)?[a-zA-Z0-9\.\:\+\-\_\#\=\%\~\@]{2,256}\.[a-z]{2,6}\b([a-zA-Z0-9\.\:\+\-\_\#\?\&\/\=\%\~\@]*)+$/;
	var KontrolEt				=	LinkKontrolYapisi.test(Deger);
	return KontrolEt;
}

function DosyaAdiYazdir(FormElemaniDegeri, DosyaAdiAlaniDegeri, SecimIptalAlaniDegeri){
	var FormElemani											=	FormElemaniDegeri;
	var DosyaAdiAlani										=	DosyaAdiAlaniDegeri;
	var SecimIptalAlani										=	SecimIptalAlaniDegeri;
	var SecilenDosya										=	document.getElementById(FormElemani).value;
	var SecilenDosyaAdiniDuzenle							=	SecilenDosya.replace("C:\\fakepath\\", "");
	document.getElementById(DosyaAdiAlani).innerHTML		=	SecilenDosyaAdiniDuzenle;
	document.getElementById(SecimIptalAlani).style.display	=	"inline-block";
}

function DosyaAdiSifirla(FormElemaniDegeri, DosyaAdiAlaniDegeri, SecimIptalAlaniDegeri){
	var FormElemani											=	FormElemaniDegeri;
	var DosyaAdiAlani										=	DosyaAdiAlaniDegeri;
	var SecimIptalAlani										=	SecimIptalAlaniDegeri;
	document.getElementById(FormElemani).value				=	"";
	document.getElementById(DosyaAdiAlani).innerHTML		=	"";
	document.getElementById(SecimIptalAlani).style.display	=	"none";
}

function HeaderYoneticiAlaniMenuAcKapat(){
	var AcilirKapanirAlanDivi		=	document.getElementById("YoneticiAcilirMenuAlaniKapsayicisi");
	var AcilirKapanirAlanIconu		=	document.getElementById("AcilirMenuOku");
	
	if(AcilirKapanirAlanDivi.style.display === "none"){
		AcilirKapanirAlanDivi.style.display		=	"block";
		AcilirKapanirAlanIconu.setAttribute("src", "Resimler/OkYukari.png");
	}else{
		AcilirKapanirAlanDivi.style.display		=	"none";
		AcilirKapanirAlanIconu.setAttribute("src", "Resimler/OkAsagi.png");
	}
}

function MobilMenuAlaniMenuAcKapat(){
	var MobilMenuAcilirKapanirAlanDivi		=	document.getElementById("MobilMenuAlaniKapsayicisi");
	
	if(MobilMenuAcilirKapanirAlanDivi.style.display === "none"){
		MobilMenuAcilirKapanirAlanDivi.style.display		=	"block";
	}else{
		MobilMenuAcilirKapanirAlanDivi.style.display		=	"none";
	}
}

function ModalAc(){
	document.getElementById("ModalKarartmaAlani").style.display		=	"block";
	document.getElementById("ModalAlani").style.display				=	"block";
}

function ModalKapat(){
	document.getElementById("ModalKarartmaAlani").style.display		=	"none";
	document.getElementById("ModalAlani").style.display				=	"none";
	document.getElementById("ModalMetinAlani").innerHTML			=	"";
}

function SaydirmaAnimasyonu(FormElemaniDegeri, SayacDegeri){
	var AnlikDeger		=	null;
	var SayiFormatla	=	null;
	var Saniye			=	2;
	var Sayac			=	setInterval(function(){
		AnlikDeger			+=	SayacDegeri / (Saniye * 250);
		SayiFormatla		=	Math.floor(AnlikDeger).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		document.getElementById(FormElemaniDegeri).innerHTML		=	SayiFormatla;
		
		if(AnlikDeger>=SayacDegeri){
			AnlikDeger	=	SayacDegeri;
			clearInterval(Sayac);
			SayiFormatla		=	Math.floor(AnlikDeger).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			document.getElementById(FormElemaniDegeri).innerHTML		=	SayiFormatla;
		}
	}, 4);
}
