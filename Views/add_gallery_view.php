<div class="w3-text-white">
	<h1>Lägg till foto till galleri</h1>
	<p>Lägg till genom att ange detaljer nedan</p>
	<hr>
	<form class="w3-container" method="post" action="../AddGallery.php" enctype="multipart/form-data">
		<label for="file">Välj en bildfil:</label>
		<input type="file" id="file" name="file" accept="image/*">
		<input class="w3-button w3-green" type="submit" name="submit" value="Ladda upp">
		<br>
		<br>
		<?php if ($this->getModel()->picture != ""): ?>
				<div class="w3-cell-row" style="width: auto">
					<div class="w3-container w3-cell">
						<img class="w3-round" src="<?php echo $this->getModel()->picture; ?>", width="300", height="250">
					</div>
					<div class="w3-container w3-cell" style="width: 100%">
						<label for="descr">Beskrivning:</label>
						<br>
						<input class="w3-input w3-border" type="text" name="descr">
						<br>
						<label for="category">Kategori:</label>
						<br>
			  			<select class="w3-select w3-border" name="category">
			    			<option value="" disabled selected>Välj en kategori</option>
			    			<option value="jul">Jul</option>
			    			<option value="nyår">Nyår</option>
			    			<option value="påsk">Påsk</option>
			    			<option value="midsommar">Midsommar</option>
			    			<option value="födelsedagar">Födelsedagar</option>
			    			<option value="semestrar">Semestrar</option>
			    			<option value="general">Vanlig hederlig dag</option>
			  			</select>
			  			<br>
			  			<br>
						<label for="memory">Beskriv ett minne du har av bilden:</label>
						<label for="showmemory" style="margin-right: 0;">Visa minne</label>
						<input class="w3-check" type="checkbox" id="showmemory" name="showmemory">
						<br>
						<input class="w3-input w3-border w3-round" type="text" id="memory" name="memory">
					</div>
				</div>
				<br>
				<br>
				<input type="submit" class="w3-button w3-green w3-block" name="save" id="save" value="Spara">
			<?php else: ?>
				<label><?php echo $this->getModel()->pictureError;?></label>
			<?php endif;?>
	</form>
</div>