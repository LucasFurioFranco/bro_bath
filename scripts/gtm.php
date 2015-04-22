<?php
	function getGTM($container, $data_layer = "dataLayer"){
	return <<< EOT
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=$container"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='$data_layer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','$data_layer','$container');</script>
EOT;
}
?>
