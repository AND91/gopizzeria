<!DOCTYPE html>
<html>
	<head>
		<noscript>
		<meta http-equiv="Refresh" content="1;   url=http://localhost/passagem/index.php/javascript">
	  </noscript>
		<meta charset="UTF-8">
		<title>Pizzaria</title>
		<base href="{sys_site_url}">
		<meta name="description" content="Pizzaria">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="twitter:card" value="summary">
		<meta name="twitter:title" content="Passagem">
		<meta name="twitter:description" content="">
		<meta name="twitter:image" content="http://assets/img/logo-social.png">

		<meta property="og:title" content="Passagem" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://" />
		<meta property="og:image" content="http://assets/img/logo-social.png'" />
		<meta property="og:description" content="" />
		<meta property="og:site_name" content="" />

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon">

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<!--<link href="<//?php echo base_url(); ?>assets/css/estilo.css" rel="stylesheet">-->

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<link href="<?php echo base_url(); ?>assets/css/estilo.css" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url(); ?>assets/css/vendors/linericon/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/vendors/lightbox/simpleLightbox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/vendors/nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/vendors/jquery-ui/jquery-ui.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/vendors/animate-css/animate.css" rel="stylesheet">

		<link rel="stylesheet" href="css/bootstrap.css">

		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
		<link href="<?php echo base_url(); ?>assets/css/magnific-popup.css">

		<!-- main css -->
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	</head>

	
<body>

<?php function moeda($valor){
	echo number_format($valor, 2, ',', '.');
} ?>
