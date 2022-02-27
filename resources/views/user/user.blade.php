<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="PineCrest" />
	
	<!-- OG -->
	<meta property="og:title" content="PineCrest" />
	<meta property="og:description" content="PineCrest" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="/frontend/assets/images/pinecrest-favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/images/pinecrest-logo.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>PineCrest </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="/frontend/assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="/frontend/assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="/frontend/assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="/frontend/assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="/frontend/assets/css/color/color-1.css">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="/frontend/assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="/frontend/assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="/frontend/assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
</head>
<body id="bg">
<div id="user">
    <user-master></user-master>
</div>

<script src="{{ asset('js/user.js') }}"></script>
<!-- External JavaScripts -->
<script src="/frontend/assets/js/jquery.min.js"></script>
<script src="/frontend/assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="/frontend/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/frontend/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/frontend/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="/frontend/assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="/frontend/assets/vendors/counter/waypoints-min.js"></script>
<script src="/frontend/assets/vendors/counter/counterup.min.js"></script>
<script src="/frontend/assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="/frontend/assets/vendors/masonry/masonry.js"></script>
<script src="/frontend/assets/vendors/masonry/filter.js"></script>
<script src="/frontend/assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="/frontend/assets/js/functions.js"></script>
<script src="/frontend/assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<!-- Revolution JavaScripts Files -->
<script src="/frontend/assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/frontend/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"/frontend/assets/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},
				
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});	
</script>
<!-- GetButton.io widget -->
{{-- <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+254(157) 332-57", // WhatsApp number
            call_to_action: "Talk to us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script> --}}
<!-- /GetButton.io widget -->
</body>

</html>
