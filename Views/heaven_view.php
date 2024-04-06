<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
 
<style>
.w3-tangerine {
  font-family: "Tangerine", serif;
}

img.hoover:hover {
	border: 1px solid black;
	cursor: pointer;
}


</style>

<div class="w3-center w3-tangerine w3-text-white">
	<p class="w3-jumbo w3-opacity"><b>Välkommen Till Himlen</b></p>
</div>
<br>
<?php if (isset($_SESSION['CANDLE_LIT'])):?>
	<div class="w3-panel w3-green w3-border w3-border-green w3-display-container">
	<span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright">X</span>
		<p>Du har tänt ett ljus för Annette!<br>
	</div>
	<?php unset($_SESSION['CANDLE_LIT']);?>
<?php endif;?>
<div class="w3-container w3-text-white">
	<p>Här skriver du till himlen, dela ett minne du har eller bara önska en bra dag!</p>
	<p>(Försök hålla Annette nära genom att skriva till henne som om hon vore med oss i det fysiska)</p>
	<h3>Skriv ett medelande till himlen</h3>
</div>
<hr class="custom">
<div class="w3-container w3-text-white">
	<form method="post", action="../Heaven.php">
		<label for="who">Vem är du/ni?</label>
		<input class="w3-input" type="text" name="who" placeholder="Anonym" value="<?php echo htmlspecialchars($this->getModel()->who) ?>">
		<br>
		<label for="who">Medelande</label>
		<span class="error">* <?php echo $this->getModel()->messageError; ?></span><br>
		<textarea class="w3-input" name="message" style="resize:none" placeholder="Skriv medelandet här"></textarea>
		<div class="w3-container w3-cell">
			<button type="submit" class="w3-button w3-green">Skicka</button>
			<!-- <input class="w3-button w3-green" type="button" name="send" value="Skicka"> -->
		</div>
		<div class="w3-container w3-cell">
			<input class="w3-button w3-green" type="button" name="choosefigure" value="Välj figur" onclick="document.getElementById('id01').style.display='block'">
		</div>
		<div class="w3-container w3-cell">
			<img id="preview" name="preview" width="30" height="30" style="visibility: hidden;"/>
			<input type="hidden" id="image" name="image"/>
		</div>	
		<div class="w3-container w3-cell">
			<?php if ($this->getModel()->candle == 1): ?>
				<label for="lightcandle"><input class="w3-check" name="candle" type="checkbox" id="lightcandle" checked/>Tänd ett ljus</label>
			<?php else:?>
				<label for="lightcandle"><input class="w3-check" name="candle" type="checkbox" id="lightcandle"/>Tänd ett ljus</label>
			<?php endif;?>
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
				<img class="w3-margin hoover" src="../resources/images/double-hearth.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/hearth.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/rainbow.png" width="45" height="45" alt="" onclick="setImage(this)">
				
				<img class="w3-margin hoover" src="../resources/images/black-cross.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/blue-butterfly.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/candle.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/dove.png" width="45" height="45" alt="" onclick="setImage(this)">
				
				<img class="w3-margin hoover" src="../resources/images/hearth-rose.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/pray.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/rose.png" width="45" height="45" alt="" onclick="setImage(this)">
				<img class="w3-margin hoover" src="../resources/images/rose2.png" width="45" height="45" alt="" onclick="setImage(this)">
      	</div>
      	<footer class="w3-container w3-green">
			<input type="button" class="w3-button w3-green" value="Välj" onclick="selectFigure()"/>
      	</footer>
    	</div>
  	</div>
  	<!-- END OF MODAL -->	
	
	<hr class="custom">
	<br>
	<!-- LOOP OVER DATABASE AND SHOW MESSAGES. STARTING WITH A PANEL OF GREEN GOING LIGHT GREEN -->
	<?php $dark_green = true; ?>
	<?php foreach($this->getModel()->getMessages() as $row):?>

		<!-- END OF SKIP -->
		<?php if ($dark_green): ?>
			<div class="w3-cell-row w3-green w3-text-white">
			<?php $dark_green = false; ?>
		<?php else: ?>
			<div class="w3-cell-row w3-light-green w3-text-white">
			<?php $dark_green = true; ?>
		<?php endif;?>
			<div class="w3-cell">
				<div class="w3-cell">
					<?php if (strval($row["message"]) != ""):?>
						<h4><?php echo $row["who"] . " - (" . substr($row["created_at"], 0, strpos($row["created_at"], " ")) . ")"?></h4>
					<?php else:?>
						<h4><?php echo $row["who"] . " - (" . substr($row["created_at"], 0, strpos($row["created_at"], " ")) . ") - (Tände ett ljus)"?></h4>
					<?php endif;?>
					</div>
				<p><?php echo $row["message"] ?></p>
			</div>
			<div class="w3-cell">
				<?php if($row["image"] != ""):?>
					<img src="<?=$row["image"]?>" width="60", height="60" style="margin-top:10%">
				<?php endif;?>
			</div>
		</div>
	<?php endforeach;?>
</div>

<script type="text/javascript">
	// OUR current selection
	var currentSelection = null;
	
	function selectFigure()
	{
		// close the modal
		document.getElementById('id01').style.display='none'

		var imgElement = document.getElementById('preview');
		var imgInput = document.getElementById('image');
		imgElement.style.visibility = 'visible';
		imgElement.src = currentSelection.src;
		imgInput.value = imgElement.src;
		// had to set border to null before (Border remained when reopenned)
		currentSelection.style.border = null;
		currentSelection = null;
	}
	
	// onClick function on the image
	function setImage(element)
	{
		// If null its our first selection
		// set selection and border
		if (currentSelection == null) 
		{
			currentSelection = element;
			
			currentSelection.style.border = "1px solid black";
		}
		else
		{
			// make sure we restore our class to default on the current selection before moving on
			currentSelection.style.border = null;
		
			currentSelection = element;
			currentSelection.style.border = "1px solid black";
		}
	}
</script>