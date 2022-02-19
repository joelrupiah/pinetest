<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="skcats">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>Pinecrest Admin</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="/backend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/backend/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="/backend/assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="/backend/assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="/backend/assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="/backend/assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="/backend/assets/css/ecaps.min.css" rel="stylesheet">
        <link href="/backend/assets/css/custom.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    </head>
    <body>
        
        <div id="admin">
            <admin-master></admin-master>
        </div>
        
        <script src="{{ asset('js/admin.js') }}"></script>
        
        <!-- Javascripts -->
        <script src="/backend/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="/backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/backend/assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="/backend/assets/plugins/switchery/switchery.min.js"></script>
        <script src="/backend/assets/plugins/d3/d3.min.js"></script>
        <script src="/backend/assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="/backend/assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="/backend/assets/plugins/chartjs/chart.min.js"></script>
        <script src="/backend/assets/js/ecaps.min.js"></script>
        <script src="/backend/assets/js/pages/dashboard.js"></script>

        <!-- GetButton.io widget -->
        {{-- <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+254(715) 733-257", // WhatsApp number
                    call_to_action: "Message us", // Call to action
                    position: "right", // Position may be 'right' or 'left'
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