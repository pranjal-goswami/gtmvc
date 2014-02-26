<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{if $controller_title}{$controller_title} | {/if}{$app_title}</title>
	
	<!-- le bootstrap -->
	<link type="text/css" rel="stylesheet" href="{$site_root_path}plugins/bootstrap/css/bootstrap.css" />
	
	<!-- le font-awesome -->
	<link type="text/css" rel="stylesheet" href="{$site_root_path}plugins/font-awesome-4.0.3/css/font-awesome.min.css" />
	
	<!--  le fonts -->
	<link rel="stylesheet" type="text/css" 
			href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600" />
	<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Glegoo|Fauna+One|Bitter|Junge' rel='stylesheet' type='text/css'>
	
	<!-- le theme stylesheets -->
	<link type="text/css" rel="stylesheet" href="{$site_root_path}assets/css/style.css" /> 
	
	{foreach from=$header_css item=css}
	<link type="text/css" rel="stylesheet" href="{$site_root_path}{$css}" />
	{/foreach}
	
	<script type="text/javascript" src="{$site_root_path}assets/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="{$site_root_path}assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="{$site_root_path}plugins/bootstrap/js/bootstrap.js"></script>
	{foreach from=$header_scripts item=script}
    <script type="text/javascript" src="{$site_root_path}{$script}"></script>
    {/foreach} 	
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><strong>GTMVC</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
