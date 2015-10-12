<!--
<script type="text/javascript">

  	var _gaq = _gaq || [];
  	_gaq.push(['_setAccount', '<?php echo $application['ga_code']; ?>']);
  	_gaq.push(['_trackPageview']);

	(function() {
    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  	})();

	function trackEvent(category, action, label, url){
		_gaq.push(['_trackEvent', category, action, label]);
			
		if (url === undefined || url == '' || url === null) {
			return true;
		}
		else {
			setTimeout(function() {
				window.location.href = url;
			}, 500);
		}
	};

</script>
-->