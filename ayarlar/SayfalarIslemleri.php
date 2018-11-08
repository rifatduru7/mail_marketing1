<?php
if((!$GelenSayfalar) or ($GelenSayfalar=="") or ($GelenSayfalar<=6)){
	$SayfaBasligiYaz	=	"Ana Sayfa / Pano";
}elseif(($GelenSayfalar>=7) and ($GelenSayfalar<=10)){
	$SayfaBasligiYaz	=	"Sistem Ayarları";
}elseif(($GelenSayfalar>=11) and ($GelenSayfalar<=14)){
	$SayfaBasligiYaz	=	"Firma Ayarları";
}elseif(($GelenSayfalar>=15) and ($GelenSayfalar<=34)){
	$SayfaBasligiYaz	=	"Ülke Ayarları";
}elseif(($GelenSayfalar>=35) and ($GelenSayfalar<=56)){
	$SayfaBasligiYaz	=	"Şehir Ayarları";
}elseif(($GelenSayfalar>=57) and ($GelenSayfalar<=89)){
	$SayfaBasligiYaz	=	"Yönetici Ayarları";
}elseif(($GelenSayfalar>=90) and ($GelenSayfalar<=108)){
	$SayfaBasligiYaz	=	"Sosyal Ağ Ayarları";
}elseif(($GelenSayfalar>=109) and ($GelenSayfalar<=143)){
	$SayfaBasligiYaz	=	"E-Mail Hesap Ayarları";
}elseif(($GelenSayfalar>=144) and ($GelenSayfalar<=188)){
	$SayfaBasligiYaz	=	"Kişiler";
}elseif($GelenSayfalar==189){
	$SayfaBasligiYaz	=	"Kişi Bildirimleri";
}elseif(($GelenSayfalar>=190) and ($GelenSayfalar<=210)){
	$SayfaBasligiYaz	=	"Temalar";
}elseif(($GelenSayfalar>=211) and ($GelenSayfalar<=229)){
	$SayfaBasligiYaz	=	"Kampanyalar";
}
?>