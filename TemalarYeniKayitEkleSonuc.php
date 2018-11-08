<? if(isset($_SESSION["Yonetici"])){
	$GelenTemaTaslakDosyasi													=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["TemaTaslakDosyasi"]);

	if($GelenTemaTaslakDosyasi!=""){
		if(($GelenTemaTaslakDosyasi=="Tema_003") or ($GelenTemaTaslakDosyasi=="Tema_004") or ($GelenTemaTaslakDosyasi=="Tema_007") or ($GelenTemaTaslakDosyasi=="Tema_008") or ($GelenTemaTaslakDosyasi=="Tema_009") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_013") or ($GelenTemaTaslakDosyasi=="Tema_014") or ($GelenTemaTaslakDosyasi=="Tema_015") or ($GelenTemaTaslakDosyasi=="Tema_016") or ($GelenTemaTaslakDosyasi=="Tema_017") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_021") or ($GelenTemaTaslakDosyasi=="Tema_022")){
			$BirinciResimGenislikDegeri			=	600;
			$BirinciResimYukseklikDegeri		=	450;
			$IkinciResimGenislikDegeri			=	0;
			$IkinciResimYukseklikDegeri			=	0;
		}


		if(($GelenTemaTaslakDosyasi=="Tema_005") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_023") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_031") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")){
			$BirinciResimGenislikDegeri			=	295;
			$BirinciResimYukseklikDegeri		=	220;
			$IkinciResimGenislikDegeri			=	295;
			$IkinciResimYukseklikDegeri			=	220;
		}

		$GelenTemaAdi														=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["TemaAdi"]));
		$GelenLogosu														=	$_FILES["Logosu"];
		$GelenLogoLinki														=	LinkliIcerikleriFiltrele($_REQUEST["LogoLinki"]);
			if($GelenLogoLinki!=""){
				if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenLogoLinki)!=1){
					$GelenLogoLinki			=	"";
				}
			}
		$GelenSiraNumarasi													=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
		$GelenBaslikMetniBir												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniBir"]);
		$GelenBaslikMetniIki												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniIki"]);
		$GelenBaslikMetniUc													=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniUc"]);
		$GelenBaslikMetniDort												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniDort"]);
		$GelenBaslikMetniBes												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniBes"]);
		
		if(isset($_REQUEST["IcerikMetniBir"])){
			$GelenIcerikMetniBir											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniBir"]);
		}else{
			$GelenIcerikMetniBir											=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniIki"])){
			$GelenIcerikMetniIki											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniIki"]);
		}else{
			$GelenIcerikMetniIki											=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniUc"])){
			$GelenIcerikMetniUc												=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniUc"]);
		}else{
			$GelenIcerikMetniUc												=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniDort"])){
			$GelenIcerikMetniDort											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniDort"]);
		}else{
			$GelenIcerikMetniDort											=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniBes"])){
			$GelenIcerikMetniBes											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniBes"]);
		}else{
			$GelenIcerikMetniBes											=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_001") or ($GelenTemaTaslakDosyasi=="Tema_002") or ($GelenTemaTaslakDosyasi=="Tema_007") or ($GelenTemaTaslakDosyasi=="Tema_008") or ($GelenTemaTaslakDosyasi=="Tema_009") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_013") or ($GelenTemaTaslakDosyasi=="Tema_014") or ($GelenTemaTaslakDosyasi=="Tema_015") or ($GelenTemaTaslakDosyasi=="Tema_016") or ($GelenTemaTaslakDosyasi=="Tema_017") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_021") or ($GelenTemaTaslakDosyasi=="Tema_022") or ($GelenTemaTaslakDosyasi=="Tema_023") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_031") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")) and ($GelenIcerikMetniBir=="")){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["IcerikMetniBirinciButonMetni"])){
			$GelenIcerikMetniBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IcerikMetniBirinciButonMetni"]));
		}else{
			$GelenIcerikMetniBirinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniBirinciButonLinki"])){
			$GelenIcerikMetniBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IcerikMetniBirinciButonLinki"]);
				if($GelenIcerikMetniBirinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIcerikMetniBirinciButonLinki)!=1){
						$GelenIcerikMetniBirinciButonLinki					=	"";
					}
				}
		}else{
			$GelenIcerikMetniBirinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_001") or ($GelenTemaTaslakDosyasi=="Tema_002") or ($GelenTemaTaslakDosyasi=="Tema_007") or ($GelenTemaTaslakDosyasi=="Tema_008") or ($GelenTemaTaslakDosyasi=="Tema_009") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_015") or ($GelenTemaTaslakDosyasi=="Tema_016") or ($GelenTemaTaslakDosyasi=="Tema_017") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_023") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_031") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036")) and (($GelenIcerikMetniBirinciButonMetni=="") or ($GelenIcerikMetniBirinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["IcerikMetniIkinciButonMetni"])){
			$GelenIcerikMetniIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IcerikMetniIkinciButonMetni"]));
		}else{
			$GelenIcerikMetniIkinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["IcerikMetniIkinciButonLinki"])){
			$GelenIcerikMetniIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IcerikMetniIkinciButonLinki"]);
				if($GelenIcerikMetniIkinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIcerikMetniIkinciButonLinki)!=1){
						$GelenIcerikMetniIkinciButonLinki					=	"";
					}
				}
		}else{
			$GelenIcerikMetniIkinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_002") or ($GelenTemaTaslakDosyasi=="Tema_008") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_016") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036")) and (($GelenIcerikMetniIkinciButonMetni=="") or ($GelenIcerikMetniIkinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_FILES["BirinciResimDosyasiAdi"])){
			$GelenBirinciResimDosyasiAdi									=	$_FILES["BirinciResimDosyasiAdi"];
		}else{
			$GelenBirinciResimDosyasiAdi									=	"";
		}
		
		if(isset($_REQUEST["BirinciResimLinki"])){
			$GelenBirinciResimLinki											=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimLinki"]);
				if($GelenBirinciResimLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimLinki)!=1){
						$GelenBirinciResimLinki								=	"";
					}
				}
		}else{
			$GelenBirinciResimLinki											=	"";
		}
		
		if(isset($_REQUEST["BirinciResimAltMetni"])){
			$GelenBirinciResimAltMetni										=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimAltMetni"]);
		}else{
			$GelenBirinciResimAltMetni										=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_003") or ($GelenTemaTaslakDosyasi=="Tema_004") or ($GelenTemaTaslakDosyasi=="Tema_005") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_007") or ($GelenTemaTaslakDosyasi=="Tema_008") or ($GelenTemaTaslakDosyasi=="Tema_009") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_013") or ($GelenTemaTaslakDosyasi=="Tema_014") or ($GelenTemaTaslakDosyasi=="Tema_015") or ($GelenTemaTaslakDosyasi=="Tema_016") or ($GelenTemaTaslakDosyasi=="Tema_017") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_021") or ($GelenTemaTaslakDosyasi=="Tema_022") or ($GelenTemaTaslakDosyasi=="Tema_023") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_031") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimDosyasiAdi=="") or ($GelenBirinciResimLinki=="") or ($GelenBirinciResimAltMetni==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["BirinciResimBirinciButonMetni"])){
			$GelenBirinciResimBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimBirinciButonMetni"]));
		}else{
			$GelenBirinciResimBirinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["BirinciResimBirinciButonLinki"])){
			$GelenBirinciResimBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimBirinciButonLinki"]);
				if($GelenBirinciResimBirinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimBirinciButonLinki)!=1){
						$GelenBirinciResimBirinciButonLinki					=	"";
					}
				}
		}else{
			$GelenBirinciResimBirinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_003") or ($GelenTemaTaslakDosyasi=="Tema_004") or ($GelenTemaTaslakDosyasi=="Tema_005") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_009") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_011") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_013") or ($GelenTemaTaslakDosyasi=="Tema_014") or ($GelenTemaTaslakDosyasi=="Tema_017") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_019") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_021") or ($GelenTemaTaslakDosyasi=="Tema_022") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimBirinciButonMetni=="") or ($GelenBirinciResimBirinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["BirinciResimIkinciButonMetni"])){
			$GelenBirinciResimIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimIkinciButonMetni"]));
		}else{
			$GelenBirinciResimIkinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["BirinciResimIkinciButonLinki"])){
			$GelenBirinciResimIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimIkinciButonLinki"]);
				if($GelenBirinciResimIkinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimIkinciButonLinki)!=1){
						$GelenBirinciResimIkinciButonLinki					=	"";
					}
				}
		}else{
			$GelenBirinciResimIkinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_004") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_010") or ($GelenTemaTaslakDosyasi=="Tema_012") or ($GelenTemaTaslakDosyasi=="Tema_014") or ($GelenTemaTaslakDosyasi=="Tema_018") or ($GelenTemaTaslakDosyasi=="Tema_020") or ($GelenTemaTaslakDosyasi=="Tema_022") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimIkinciButonMetni=="") or ($GelenBirinciResimIkinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_FILES["IkinciResimDosyasiAdi"])){
			$GelenIkinciResimDosyasiAdi										=	$_FILES["IkinciResimDosyasiAdi"];
		}else{
			$GelenIkinciResimDosyasiAdi										=	"";
		}
		
		if(isset($_REQUEST["IkinciResimLinki"])){
			$GelenIkinciResimLinki											=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimLinki"]);
				if($GelenIkinciResimLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimLinki)!=1){
						$GelenIkinciResimLinki								=	"";
					}
				}
		}else{
			$GelenIkinciResimLinki											=	"";
		}
		
		if(isset($_REQUEST["IkinciResimAltMetni"])){
			$GelenIkinciResimAltMetni										=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimAltMetni"]);
		}else{
			$GelenIkinciResimAltMetni										=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_005") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_023") or ($GelenTemaTaslakDosyasi=="Tema_024") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_031") or ($GelenTemaTaslakDosyasi=="Tema_032") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimDosyasiAdi=="") or ($GelenIkinciResimLinki=="") or ($GelenIkinciResimAltMetni==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["IkinciResimBirinciButonMetni"])){
			$GelenIkinciResimBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimBirinciButonMetni"]));
		}else{
			$GelenIkinciResimBirinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["IkinciResimBirinciButonLinki"])){
			$GelenIkinciResimBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimBirinciButonLinki"]);
				if($GelenIkinciResimBirinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimBirinciButonLinki)!=1){
						$GelenIkinciResimBirinciButonLinki					=	"";
					}
				}
		}else{
			$GelenIkinciResimBirinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_005") or ($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_025") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_027") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_029") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_033") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_035") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_037") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimBirinciButonMetni=="") or ($GelenIkinciResimBirinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(isset($_REQUEST["IkinciResimIkinciButonMetni"])){
			$GelenIkinciResimIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimIkinciButonMetni"]));
		}else{
			$GelenIkinciResimIkinciButonMetni								=	"";
		}
		
		if(isset($_REQUEST["IkinciResimIkinciButonLinki"])){
			$GelenIkinciResimIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimIkinciButonLinki"]);
				if($GelenIkinciResimIkinciButonLinki!=""){
					if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimIkinciButonLinki)!=1){
						$GelenIkinciResimIkinciButonLinki					=	"";
					}
				}
		}else{
			$GelenIkinciResimIkinciButonLinki								=	"";
		}
		
		if((($GelenTemaTaslakDosyasi=="Tema_006") or ($GelenTemaTaslakDosyasi=="Tema_026") or ($GelenTemaTaslakDosyasi=="Tema_028") or ($GelenTemaTaslakDosyasi=="Tema_030") or ($GelenTemaTaslakDosyasi=="Tema_034") or ($GelenTemaTaslakDosyasi=="Tema_036") or ($GelenTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimIkinciButonMetni=="") or ($GelenIkinciResimIkinciButonLinki==""))){
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
		
		if(($GelenTemaTaslakDosyasi!="") and ($GelenTemaAdi!="") and (($GelenLogosu["name"]!="") and ($GelenLogosu["type"]!="") and ($GelenLogosu["tmp_name"]!="") and ($GelenLogosu["error"]==0) and ($GelenLogosu["size"]>0)) and ($GelenLogoLinki!="") and ($GelenSiraNumarasi!="") and ($GelenBaslikMetniBir!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE TemaAdi='$GelenTemaAdi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM temalar ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}
		
				$LogosuDosyaAdiOlustur					=	RastgeleResimAdiUret();
				$LogosuDosyaAdi							=	$GelenLogosu["name"];
				$LogosuDosyaUzantisiKontrolEt			=	substr($LogosuDosyaAdi, -4);
					if(($LogosuDosyaUzantisiKontrolEt==".png") or ($LogosuDosyaUzantisiKontrolEt==".PNG")){
						$LogosuDosyaUzantisi			=	$LogosuDosyaUzantisiKontrolEt;
						$LogosuYeniDosyaAdi				=	$LogosuDosyaAdiOlustur.$LogosuDosyaUzantisi;
		
						$LogosuYukle				=	new upload($GelenLogosu, 'tr-TR');
							if($LogosuYukle->uploaded){
								$LogosuYukle->mime_magic_check				=	true;
								$LogosuYukle->allowed						=	array("image/*");
								$LogosuYukle->file_new_name_body			=	$LogosuDosyaAdiOlustur;
								$LogosuYukle->file_auto_rename				=	false;
								$LogosuYukle->file_overwrite				=	true;								
								$LogosuYukle->image_background_color		=	null;
								$LogosuYukle->image_resize					=	true;
								$LogosuYukle->image_x						=	196;
								$LogosuYukle->image_y						=	54;
								$LogosuYukle->process(SITEKOKDIZINI."Resimler/");
									if($LogosuYukle->processed){
										$LogosuYukle->clean();
									}else{
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
										exit();
									}
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
						exit();
					}

					$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO temalar (TemaTaslakDosyasi, TemaAdi, Logosu, LogoLinki, BaslikMetniBir, BaslikMetniIki, BaslikMetniUc, BaslikMetniDort, BaslikMetniBes, IcerikMetniBir, IcerikMetniIki, IcerikMetniUc, IcerikMetniDort, IcerikMetniBes, IcerikMetniBirinciButonMetni, IcerikMetniBirinciButonLinki, IcerikMetniIkinciButonMetni, IcerikMetniIkinciButonLinki, BirinciResimDosyasiAdi, BirinciResimLinki, BirinciResimAltMetni, BirinciResimBirinciButonMetni, BirinciResimBirinciButonLinki, BirinciResimIkinciButonMetni, BirinciResimIkinciButonLinki, IkinciResimDosyasiAdi, IkinciResimLinki, IkinciResimAltMetni, IkinciResimBirinciButonMetni, IkinciResimBirinciButonLinki, IkinciResimIkinciButonMetni, IkinciResimIkinciButonLinki, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi) values ('$GelenTemaTaslakDosyasi', '$GelenTemaAdi', '$LogosuYeniDosyaAdi', '$GelenLogoLinki', '$GelenBaslikMetniBir', '$GelenBaslikMetniIki', '$GelenBaslikMetniUc', '$GelenBaslikMetniDort', '$GelenBaslikMetniBes', '$GelenIcerikMetniBir', '$GelenIcerikMetniIki', '$GelenIcerikMetniUc', '$GelenIcerikMetniDort', '$GelenIcerikMetniBes', '$GelenIcerikMetniBirinciButonMetni', '$GelenIcerikMetniBirinciButonLinki', '$GelenIcerikMetniIkinciButonMetni', '$GelenIcerikMetniIkinciButonLinki', '', '$GelenBirinciResimLinki', '$GelenBirinciResimAltMetni', '$GelenBirinciResimBirinciButonMetni', '$GelenBirinciResimBirinciButonLinki', '$GelenBirinciResimIkinciButonMetni', '$GelenBirinciResimIkinciButonLinki', '', '$GelenIkinciResimLinki', '$GelenIkinciResimAltMetni', '$GelenIkinciResimBirinciButonMetni', '$GelenIkinciResimBirinciButonLinki', '$GelenIkinciResimIkinciButonMetni', '$GelenIkinciResimIkinciButonLinki', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi')");
						if($KayitEkle){
							if($GelenSiraNumarasi<=$SonSiraNumarasi){
								$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE temalar SET SiraNumarasi=SiraNumarasi+1 WHERE TemaAdi!='$GelenTemaAdi' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
									if(!$DigerKayitlarinSiraNumaralariniGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
										exit();
									}
							}
							
							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET TemaSayisi=TemaSayisi+1");
								if(!$GenelIstatistikleriGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
									exit();
								}
							
							if($GelenBirinciResimDosyasiAdi!=""){
								if(($GelenBirinciResimDosyasiAdi["name"]!="") and ($GelenBirinciResimDosyasiAdi["type"]!="") and ($GelenBirinciResimDosyasiAdi["tmp_name"]!="") and ($GelenBirinciResimDosyasiAdi["error"]==0) and ($GelenBirinciResimDosyasiAdi["size"]>0)){
									$BirinciResimDosyaAdiOlustur					=	RastgeleResimAdiUret();
									$BirinciResimDosyaAdi							=	$GelenBirinciResimDosyasiAdi["name"];
									$BirinciResimDosyaUzantisiKontrolEt				=	substr($BirinciResimDosyaAdi, -4);
										if(($BirinciResimDosyaUzantisiKontrolEt==".jpg") or ($BirinciResimDosyaUzantisiKontrolEt==".JPG") or ($BirinciResimDosyaUzantisiKontrolEt=="jpeg") or ($BirinciResimDosyaUzantisiKontrolEt=="JPEG") or ($BirinciResimDosyaUzantisiKontrolEt==".png") or ($BirinciResimDosyaUzantisiKontrolEt==".PNG") or ($BirinciResimDosyaUzantisiKontrolEt==".gif") or ($BirinciResimDosyaUzantisiKontrolEt==".GIF") or ($BirinciResimDosyaUzantisiKontrolEt==".bmp") or ($BirinciResimDosyaUzantisiKontrolEt==".BMP")){
											if(($BirinciResimDosyaUzantisiKontrolEt=="jpeg") or ($BirinciResimDosyaUzantisiKontrolEt=="JPEG")){
												$BirinciResimDosyasiAdiDosyaUzantisi			=	".jpeg";
												$BirinciResimDosyasiAdiYeniDosyaAdi				=	$BirinciResimDosyaAdiOlustur.$BirinciResimDosyasiAdiDosyaUzantisi;
												$BirinciResimConvertDurumu						=	1;
											}else{
												$BirinciResimDosyasiAdiDosyaUzantisi			=	$BirinciResimDosyaUzantisiKontrolEt;
												$BirinciResimDosyasiAdiYeniDosyaAdi				=	$BirinciResimDosyaAdiOlustur.$BirinciResimDosyasiAdiDosyaUzantisi;
												$BirinciResimConvertDurumu						=	0;
											}

											$BirinciResimDosyasiAdiYukle				=	new upload($GelenBirinciResimDosyasiAdi, 'tr-TR');
												if($BirinciResimDosyasiAdiYukle->uploaded){
													$BirinciResimDosyasiAdiYukle->mime_magic_check				=	true;
													$BirinciResimDosyasiAdiYukle->allowed						=	array("image/*");
													$BirinciResimDosyasiAdiYukle->file_new_name_body			=	$BirinciResimDosyaAdiOlustur;
													$BirinciResimDosyasiAdiYukle->file_auto_rename				=	false;
													$BirinciResimDosyasiAdiYukle->file_overwrite				=	true;																	
													if($BirinciResimConvertDurumu==1){
														$BirinciResimDosyasiAdiYukle->image_convert				=	"jpg";
														$BirinciResimDosyasiAdiYukle->image_quality				=	100;
													}
													if(($BirinciResimDosyaUzantisiKontrolEt==".png") or ($BirinciResimDosyaUzantisiKontrolEt==".PNG") or ($BirinciResimDosyaUzantisiKontrolEt==".gif") or ($BirinciResimDosyaUzantisiKontrolEt==".GIF")){
														$BirinciResimDosyasiAdiYukle->image_background_color	=	null;
													}else{
														$BirinciResimDosyasiAdiYukle->image_background_color	=	"#FFFFFF";
													}
													$BirinciResimDosyasiAdiYukle->image_resize					=	true;
													$BirinciResimDosyasiAdiYukle->image_x						=	$BirinciResimGenislikDegeri;
													$BirinciResimDosyasiAdiYukle->image_y						=	$BirinciResimYukseklikDegeri;
													$BirinciResimDosyasiAdiYukle->process(SITEKOKDIZINI."Resimler/");
														if($BirinciResimDosyasiAdiYukle->processed){
															$BirinciResimDosyasiAdiYukle->clean();
									
															$KaydiGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET BirinciResimDosyasiAdi='$BirinciResimDosyasiAdiYeniDosyaAdi' WHERE TemaAdi='$GelenTemaAdi' ORDER BY ID DESC LIMIT 1");
																if(!$KaydiGuncelle){
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
													exit();
												}
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
											exit();
										}
								}
							}
							
							if($GelenIkinciResimDosyasiAdi!=""){
								if(($GelenIkinciResimDosyasiAdi["name"]!="") and ($GelenIkinciResimDosyasiAdi["type"]!="") and ($GelenIkinciResimDosyasiAdi["tmp_name"]!="") and ($GelenIkinciResimDosyasiAdi["error"]==0) and ($GelenIkinciResimDosyasiAdi["size"]>0)){
									$IkinciResimDosyaAdiOlustur						=	RastgeleResimAdiUret();
									$IkinciResimDosyaAdi							=	$GelenIkinciResimDosyasiAdi["name"];
									$IkinciResimDosyaUzantisiKontrolEt				=	substr($IkinciResimDosyaAdi, -4);
										if(($IkinciResimDosyaUzantisiKontrolEt==".jpg") or ($IkinciResimDosyaUzantisiKontrolEt==".JPG") or ($IkinciResimDosyaUzantisiKontrolEt=="jpeg") or ($IkinciResimDosyaUzantisiKontrolEt=="JPEG") or ($IkinciResimDosyaUzantisiKontrolEt==".png") or ($IkinciResimDosyaUzantisiKontrolEt==".PNG") or ($IkinciResimDosyaUzantisiKontrolEt==".gif") or ($IkinciResimDosyaUzantisiKontrolEt==".GIF") or ($IkinciResimDosyaUzantisiKontrolEt==".bmp") or ($IkinciResimDosyaUzantisiKontrolEt==".BMP")){
											if(($IkinciResimDosyaUzantisiKontrolEt=="jpeg") or ($IkinciResimDosyaUzantisiKontrolEt=="JPEG")){
												$IkinciResimDosyasiAdiDosyaUzantisi				=	".jpeg";
												$IkinciResimDosyasiAdiYeniDosyaAdi				=	$IkinciResimDosyaAdiOlustur.$IkinciResimDosyasiAdiDosyaUzantisi;
												$IkinciResimConvertDurumu						=	1;
											}else{
												$IkinciResimDosyasiAdiDosyaUzantisi				=	$IkinciResimDosyaUzantisiKontrolEt;
												$IkinciResimDosyasiAdiYeniDosyaAdi				=	$IkinciResimDosyaAdiOlustur.$IkinciResimDosyasiAdiDosyaUzantisi;
												$IkinciResimConvertDurumu						=	0;
											}

											$IkinciResimDosyasiAdiYukle				=	new upload($GelenIkinciResimDosyasiAdi, 'tr-TR');
												if($IkinciResimDosyasiAdiYukle->uploaded){
													$IkinciResimDosyasiAdiYukle->mime_magic_check				=	true;
													$IkinciResimDosyasiAdiYukle->allowed						=	array("image/*");
													$IkinciResimDosyasiAdiYukle->file_new_name_body				=	$IkinciResimDosyaAdiOlustur;
													$IkinciResimDosyasiAdiYukle->file_auto_rename				=	false;
													$IkinciResimDosyasiAdiYukle->file_overwrite					=	true;																	
													if($IkinciResimConvertDurumu==1){
														$IkinciResimDosyasiAdiYukle->image_convert				=	"jpg";
														$IkinciResimDosyasiAdiYukle->image_quality				=	100;
													}
													if(($IkinciResimDosyaUzantisiKontrolEt==".png") or ($IkinciResimDosyaUzantisiKontrolEt==".PNG") or ($IkinciResimDosyaUzantisiKontrolEt==".gif") or ($IkinciResimDosyaUzantisiKontrolEt==".GIF")){
														$IkinciResimDosyasiAdiYukle->image_background_color		=	null;
													}else{
														$IkinciResimDosyasiAdiYukle->image_background_color		=	"#FFFFFF";
													}
													$IkinciResimDosyasiAdiYukle->image_resize					=	true;
													$IkinciResimDosyasiAdiYukle->image_x						=	$IkinciResimGenislikDegeri;
													$IkinciResimDosyasiAdiYukle->image_y						=	$IkinciResimYukseklikDegeri;
													$IkinciResimDosyasiAdiYukle->process(SITEKOKDIZINI."Resimler/");
														if($IkinciResimDosyasiAdiYukle->processed){
															$IkinciResimDosyasiAdiYukle->clean();
									
															$KaydiGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET IkinciResimDosyasiAdi='$IkinciResimDosyasiAdiYeniDosyaAdi' WHERE TemaAdi='$GelenTemaAdi' ORDER BY ID DESC LIMIT 1");
																if(!$KaydiGuncelle){
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
													exit();
												}
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
											exit();
										}
								}
							}
							
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=195");
							exit();
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
							exit();
						}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=197");
				exit();
			}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=196");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>