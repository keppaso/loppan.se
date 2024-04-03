<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
 
<style>
.w3-tangerine {
  font-family: "Tangerine", serif;
}

img.hoover:hover {
	border: 1px solid #777;
	cursor: pointer;
}
</style>

<div class="w3-center w3-tangerine w3-text-white">
	<p class="w3-jumbo w3-opacity"><b>Välkommen Till Himlen</b></p>
</div>
<br>
<div class="w3-container w3-text-white">
	<p>Här skriver du till himlen, dela ett minne du har eller bara önska en bra dag!</p>
	<p>(Försök hålla Annette nära genom att skriva till henne som om hon vore med oss i det fysiska)</p>
	<h3>Skriv ett medelande till himlen</h3>
</div>
<hr class="custom">
<div class="w3-container w3-text-white">
	<form method="post", action="../Heaven.php">
		<label for="who">Vem är du/ni?</label>
		<input class="w3-input" type="text" name="who" placeholder="Anonym" value="<?php echo $this->getModel()->who;?>">
		<br>
		<label for="who">Medelande</label>
		<textarea class="w3-input" name="message" style="resize:none" placeholder="Skriv medelandet här"><?php echo $this->getModel()->message;?></textarea>
		<div class="w3-container w3-cell">
			<button type="submit" name="send" class="w3-button w3-green">Skicka</button>
			<!-- <input class="w3-button w3-green" type="button" name="send" value="Skicka"> -->
		</div>
		<div class="w3-container w3-cell">
			<input class="w3-button w3-green" type="button" name="choosefigure" value="Välj figur" onclick="document.getElementById('id01').style.display='block'">
		</div>
		<div class="w3-container w3-cell">
			<label>Tänd ett ljus</label>
		</div>	
		<div class="w3-container w3-cell">
			<input class="w3-check" type="checkbox" name="lightcandle" placeholder="Tänd ett ljus">
		</div>
	</form>
	
	<!-- MODAL -->
  	<div id="id01" class="w3-modal">
   	<div class="w3-modal-content w3-animate-top w3-card-4">
      	<header class="w3-container w3-green"> 
        		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        		<h2>Välj en bild</h2>
      	</header>
      	<div class="w3-container">
      		<!-- THESE COULD BE HARDCODED OR GENERATED WITH A FOR LOOP -->
				<img class="w3-margin hoover" src="../resources/double-hearth.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/hearth.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/rainbow.png" width="45" height="45" alt="" onclick="setImage(this)">
				
				<img class="w3-margin" src="../resources/black-cross.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/blue-butterfly.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/candle.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/dove.png" width="45" height="45" alt="" onclick="setImage(this)">
				
				<img class="w3-margin" src="../resources/hearth-rose.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/pray.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/rose.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin" src="../resources/rose2.png" width="45" height="45" alt="" onclick="setImage(this)">
      	</div>
      	<footer class="w3-container w3-green">
      		<!-- ADD A CHOOSE BUTTON HERE -->
        		<p>Modal Footer</p>
      	</footer>
    	</div>
  	</div>
  	<!-- END OF MODAL -->	
	
	<hr class="custom">
	<br>
	<!-- LOOP OVER DATABASE AND SHOW MESSAGES. STARTING WITH A PANEL OF GREEN GOING LIGHT GREEN -->
	<?php $dark_green = true; ?>
	<?php foreach($this->getModel()->getMessages() as $row):?>
		<?php if ($dark_green): ?>
			<div class="w3-panel w3-green w3-text-white">
			<?php $dark_green = false; ?>
		<?php else: ?>
			<div class="w3-panel w3-light-green w3-text-white">
			<?php $dark_green = true; ?>
		<?php endif;?>
			<h4><?php echo $row["who"] . " - (" . substr($row["created_at"], 0, strpos($row["created_at"], " ")) . ")"?></h4>
			<p><?php echo $row["message"] ?></p>
		</div>
	<?php endforeach;?>
</div>

<script type="text/javascript">
	// OUR current selection
	var currentSelection = null;
	// store default classes
	var defaultClasses = "";
	
	function show()
	{
		alert(currentSelection.src);		
	}
	
	// onClick function on the image
	function setImage(element)
	{
		// If null its our first selection
		// set selection and border
		if (currentSelection == null) 
		{
			currentSelection = element;
			defaultClasses = currentSelection.className;
			
			currentSelection.className = "w3-margin w3-border";
		}
		else
		{
			// make sure we restore our class to default on the current selection before moving on
			currentSelection.className = "w3-margin hoover"
		
			currentSelection = element;
			currentSelection.className = "w3-margin w3-border";
		}
	}
</script>