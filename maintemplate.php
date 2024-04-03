<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style>
	hr.custom
	{
		border: 1px;
		border-color: gray;
		border-style: solid;
		margin-bottom: 25px;
	}
	.error
	{
		color: red;
	}

	.banner
	{
		width: 100%;
		padding-left: 16px;
		padding-right: 16px;
		background-image: url("resources/logo.jpg");
		height: 300px;
		background-position: center;
	}
</style>
<link rel="stylesheet" href="css/w3.css">
<title>My web site - <?=$this->getTitle();?></title>
</head>
<body class="w3-light-green">
	<?php if ($this->getNavigation() !== null) { include($this->getNavigation()); } ?>
	
	<!-- THE REST OF THE STYLES ARE SET TO MARGINS (TO FIT WITHIN THE MENU BARS) -->
	<div style="margin-left:15%; margin-right:15%"> 
	
	<div class="w3-container">
		<?php if ($this->getContent() !== null) { include($this->getContent()); } ?>
	</div>
</body>
</html>