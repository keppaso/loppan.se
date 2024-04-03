
	<!-- LEFT MENU BLOCK -->
	<div class="w3-sidebar w3-bar-block w3-border w3-green" style="width:15%">
		<h5 class="w3-bar-item w3-light-green">Meny</h5>
  		<a href="Index.php" class="w3-bar-item w3-button">Hem</a>
  		<a href="About.php" class="w3-bar-item w3-button">Om</a>
  		<!-- GÖM VISSA MENYER SÅVIDARE MAN INTE ÄR INLOGGAD -->
  		<?php if (isset($_SESSION["LOGGED_IN"]) && ($_SESSION["LOGGED_IN"]) == true): ?>
  		  	<a href="Gallery.php" class="w3-bar-item w3-button">Galleri</a>
  			<a href="Facts.php" class="w3-bar-item w3-button">Rolig fakta</a>
  			<a href="Logout.php" class="w3-bar-item w3-button">Logga ut</a>
  			<a href="#" class="w3-bar-item w3-button"><?= $_SESSION["NAME"]; ?></a>
  		<?php else: ?>
  			<a href="Login.php" class="w3-bar-item w3-button">Logga In</a>
  		<?php endif; ?>
	</div>
	<!-- RIGHT MENU BLOCK -->
	<div class="w3-sidebar w3-bar-block w3-border w3-green" style="width:15%;right:0">
  		<h5 class="w3-bar-item w3-light-green">Himlen</h5>
  		<a href="Heaven.php" class="w3-bar-item w3-button">Skriv till himlen</a>
  		<a href="#" class="w3-bar-item w3-button">Tänd ett ljus</a>
  		<a href="#" class="w3-bar-item w3-button">Link 3</a>
  		<hr class="custom">
  		<div class="w3-container w3-display-bottomleft">
  			<div class="w3-panel w3-border-left w3-border-bottom">
  				<h5 class="">Namn</h5>
  			</div>
  			<p>Senaste inlägg</p>
  		</div>
	</div>