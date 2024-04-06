
	<!-- LEFT MENU BLOCK -->
	<div class="w3-sidebar w3-bar-block w3-border w3-green" style="width:15%">
		<h5 class="w3-bar-item w3-light-green w3-text-white"><b>Meny</b></h5>
  		<a href="Index.php" class="w3-bar-item w3-button">Hem</a>
  		<a href="About.php" class="w3-bar-item w3-button">Om</a>
  		<!-- GÖM VISSA MENYER SÅVIDARE MAN INTE ÄR INLOGGAD -->
  		<?php if (isset($_SESSION["LOGGED_IN"]) && ($_SESSION["LOGGED_IN"]) == true): ?>
  		  	<a href="Gallery.php" class="w3-bar-item w3-button">Galleri</a>
  			<a href="Facts.php" class="w3-bar-item w3-button">Rolig fakta</a>
			<a href="Settings.php" class="w3-bar-item w3-button">Inställningar</a>
  			<a href="Logout.php" class="w3-bar-item w3-button">Logga ut</a>
  			<a href="#" class="w3-bar-item w3-button"><?= $_SESSION["NAME"]; ?></a>
  		<?php else: ?>
  			<a href="Login.php" class="w3-bar-item w3-button">Logga In</a>
  		<?php endif; ?>
	</div>
	<!-- RIGHT MENU BLOCK -->
	<div class="w3-sidebar w3-bar-block w3-border w3-green" style="width:15%;right:0">
  		<h5 class="w3-bar-item w3-light-green w3-text-white"><b>Himlen</b></h5>
  		<a href="Heaven.php" class="w3-bar-item w3-button">Skriv till himlen</a>
  		<a href="#" class="w3-bar-item w3-button" onclick="showModal()">Tänd ett ljus</a>
  		<a href="#" class="w3-bar-item w3-button">Link 3</a>
  		<hr class="custom">
  		<div class="w3-container w3-display-bottomleft">
  			<div class="w3-panel w3-border-left w3-border-bottom">
  				<h5 class="">Namn</h5>
  			</div>
  			<p>Senaste inlägg</p>
  		</div>
	</div>

	<!-- MODAL -->
	<div id="idlight" class="w3-modal">
   		<div class="w3-modal-content w3-animate-top w3-card-4">
			<header class="w3-container w3-green"> 
					<span onclick="document.getElementById('idlight').style.display='none'" class="w3-button w3-display-topright">&times;</span>
					<h2>Tänd ett ljus</h2>
			</header>
			<form method="post" action="../Heaven.php">
				<div class="w3-container">
					<label for="candleWho">Från:</label>
					<input type="text" class="w3-input w3-border w3-round" name="candleWho" placeholder="Ditt namn...">
				</div>
				<footer class="w3-container w3-green">
					<input type="submit" class="w3-button w3-green" value="Tänd" onclick="document.getElementById('idlight').style.display='none'"/>
				</footer>
			</form>
    	</div>
  	</div>
  	<!-- END OF MODAL -->	

	<script>
		function showModal()
		{
			document.getElementById('idlight').style.display='block';
		}
	</script>