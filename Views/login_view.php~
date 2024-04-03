<p>Logga in genom att ange E-Mail och lösenord</p>
<h1>Logga in</h1>

<!-- IF REGISTRATION FAILS WE MIGHT HAVE THESE SESSION VALUES ACTIVE. DISPLAY ERROR TO USER  -->
<?php if (isset($_SESSION["FAILED_REGISTRATION"]) && ($_SESSION["FAILED_REGISTRATION"] == true)): ?>
	<div class="w3-panel w3-pale-yellow w3-border w3-border-yellow">
		<p>* Registreringen misslyckades...<br>
		Det ser ut som att '<?php echo htmlspecialchars($_SESSION["EMAIL"]); ?>' redan är registrerat hos oss!<br>
		Testa logga in istället eller återställ lösenordet <a href="#" >här</a></p>
	</div>
<?php endif; ?>

<hr class="custom">
<form class="w3-container" method="post" action="../Login.php">
	<label for="email"><b>Email</b></label>
	<span class="error">* <?php echo $this->getModel()->emailError; ?></span><br>
	
	<!-- IF FAILED REGISTRATION MAKE SURE WE SET THE EMAIL OF SESSION INTO OUR INPUT FOR CONVENIENCE -->
	<?php if (isset($_SESSION["FAILED_REGISTRATION"]) && ($_SESSION["FAILED_REGISTRATION"] == true)): ?>
		<input class="w3-input w3-border w3-round" type="email" name="email" value="<?php echo htmlspecialchars($_SESSION["EMAIL"]); ?>"/><br>
		<!-- CLEAR THE SESSION VALUES SO IT DOES NOT REMAIN -->		
		<?php
			unset($_SESSION["FAILED_REGISTRATION"]);
			unset($_SESSION["EMAIL"]);
		?>
	<?php else: ?>
		<input class="w3-input w3-border w3-round" type="email" name="email" value="<?php echo htmlspecialchars($this->getModel()->email); ?>"/><br>
	<?php endif; ?>
	
	<label for="password"><b>Lösenord</b></label>
	<span class="error">* <?php echo $this->getModel()->passwordError; ?></span><br>
	<input class="w3-input w3-border w3-round" id="password" type="password" name="password"/><br>
	
	<hr class="custom">
   <button type="submit" class="w3-button w3-green w3-block">Logga In</button>
   <div class="w3-container">
   	<p>Har du inget konto? <a href="../Register.php">Ansök här</a>.</p>
   	<p>Har du glömt ditt Lösenord? <a href="#">Återställ</p>
   </div>
</form>