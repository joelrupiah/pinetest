<!doctype html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="/frontend/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="pinecrest">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Pinecrest</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="/frontend/css/linearicons.css">
			<link rel="stylesheet" href="/frontend/css/font-awesome.min.css">
			<link rel="stylesheet" href="/frontend/css/bootstrap.css">
			<link rel="stylesheet" href="/frontend/css/magnific-popup.css">
			<link rel="stylesheet" href="/frontend/css/nice-select.css">							
			<link rel="stylesheet" href="/frontend/css/animate.min.css">
			<link rel="stylesheet" href="/frontend/css/owl.carousel.css">			
			<link rel="stylesheet" href="/frontend/css/jquery-ui.css">			
			<link rel="stylesheet" href="/frontend/css/main.css">
		</head>
		<body>	

			<div id="user">
				<user-master></user-master>
			</div>

			<script src="{{ asset('js/user.js') }}"></script>

			<script src="/frontend/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="/frontend/js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkCmExXT9LSI1HCL-yQvgSOdH4t8oMdqY"></script>
  			<script src="/frontend/js/easing.min.js"></script>			
			<script src="/frontend/js/hoverIntent.js"></script>
			<script src="/frontend/js/superfish.min.js"></script>	
			<script src="/frontend/js/jquery.ajaxchimp.min.js"></script>
			<script src="/frontend/js/jquery.magnific-popup.min.js"></script>	
    		<script src="/frontend/js/jquery.tabs.min.js"></script>						
			<script src="/frontend/js/jquery.nice-select.min.js"></script>	
			<script src="/frontend/js/owl.carousel.min.js"></script>									
			<script src="/frontend/js/mail-script.js"></script>	
			<script src="/frontend/js/main.js"></script>
			<script type="text/javascript">
				(function () {
					var options = {
						whatsapp: "+254(721) 890-969", // WhatsApp number
						call_to_action: "Message us", // Call to action
						button_color: "#FF6550", // Color of button
						position: "right", // Position may be 'right' or 'left'
					};
					var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
					var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
					s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
					var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
				})();
			</script>
		</body>
	</html>