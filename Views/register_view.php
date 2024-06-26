<h1>Ansök om konto</h1>
<p>Registera dig genom att fylla i uppgifterna nedan...</p>

<!-- IF LOGIN FAILS WE MIGHT HAVE THESE SESSION VALUES ACTIVE. DISPLAY ERROR TO USER  -->
<?php if (isset($_SESSION["FAILED_LOGIN"]) && ($_SESSION["FAILED_LOGIN"] == true)) : ?>
	<div class="w3-panel w3-pale-yellow w3-border w3-border-yellow">
		<p>* Inloggning misslyckades...<br>
		Det ser ut som att '<?php echo htmlspecialchars($_SESSION["EMAIL"]); ?>' ej finns registrerat hos oss!<br>
		Ansök om konto här</p>
	</div>
<?php endif; ?>

<hr class="custom">
<form class="w3-container" method="post" action="../Register.php">
	<label for="firstname"><b>Namn</b></label>
	<span class="error">* <?php echo $this->getModel()->nameError;?></span><br>
	<input class="w3-input w3-border w3-round" type="text" name="name" value="<?php echo $this->getModel()->name;?>" /><br>
	
	<label for="lastname"><b>Efternamn</b></label>
	<span class="error">* <?php echo $this->getModel()->lastnameError;?></span><br>
	<input class="w3-input w3-border w3-round" type="text" name="lastname" value="<?php echo $this->getModel()->lastname;?>" /><br>
	
	<label for="email"><b>Email</b></label>
	<span class="error">* <?php echo $this->getModel()->emailError;?></span><br>
	
	<!-- IF FAILED LOGIN MAKE SURE WE SET THE EMAIL OF THAT INTO OUR INPUT FOR CONVENIENCE -->
	<?php if (isset($_SESSION["FAILED_LOGIN"]) && ($_SESSION["FAILED_LOGIN"] == true)): ?>
		<input class="w3-input w3-border w3-round" type="email" name="email" value="<?php echo htmlspecialchars($_SESSION["EMAIL"]); ?>" /><br>
		<!-- CLEAR THE SESSION VALUES SO IT DOES NOT REMAIN -->		
		<?php
			unset($_SESSION["FAILED_LOGIN"]);
			unset($_SESSION["EMAIL"]);
		?>
	<?php else: ?>
		<input class="w3-input w3-border w3-round" type="email" name="email" value="<?php echo htmlspecialchars($this->getModel()->email); ?>" /><br>
	<?php endif; ?>
	
	<label for="pwd1"><b>Lösenord</b></label>
	<span class="error">* <?php echo $this->getModel()->password1Error;?></span><br>
	<input class="w3-input w3-border w3-round" type="password" name="password1"/><br>
	
	<label for="pwd2"><b>Upprepa lösenord</b></label>
	<span class="error">* <?php echo $this->getModel()->password2Error;?></span><br>
	<input class="w3-input w3-border w3-round" type="password" name="password2"/><br>
	
	<hr class="custom">
   <p>Genom att skapa ett konto godkänner du vilkoren i <a href="#">Terms & Privacy</a></p>
   <div class="w3-conatiner">
   	<button type="submit" name="submit" value="Submit" class="w3-button w3-green w3-block">Ansök</button>
   </div>
   <div class="w3-container">
   	<p>Har du redan ett konto? <a href="../Login.php">Logga in</a>.</p>
   </div>
</form>