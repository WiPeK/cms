<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Keywords" content="<?php echo $cmscfg->keywords; ?>" />
	<meta name="Author" content="Krzysztof Adamczyk" />
	<meta name="Description" content="<?php echo $cmscfg->description; ?>" />
	<meta name="Robots" content="Index, Follow" />
	<title><?php echo $site_name; ?> </title>
	<link rel="stylesheet" href="<?php echo site_url('css/style.css'); ?> ">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    	<!-- jquery -->
	<script src="<?php echo site_url() . 'assets/js/jquery.js'; ?>"></script>
	<!-- bootstrap js -->
	<script src="<?php echo site_url() . 'assets/js/bootstrap.js'; ?>"></script>
	<!-- frontend function -->
	<script src="<?php echo site_url() . 'assets/js/frontend_function.js'; ?>"></script>
	<!-- menu js -->
	<script src="<?php echo site_url() . 'assets/js/menu.js'; ?>"></script>
	<script src="<?php echo site_url() . 'assets/js/holder.js'; ?>"></script>

	<script src="<?php echo site_url() . 'assets/js/jquery.navgoco.js'; ?>"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64348174-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1545214289054555',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'pl'}
</script>