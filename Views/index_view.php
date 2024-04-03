<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
 
<style>
.w3-tangerine {
  font-family: "Tangerine", serif;
}
</style>

<!-- OM ANSÖKAN OM REGISTRERING ÄR GJORD VISA ETT MEDELANDE -->
<?php if (isset($_SESSION["REGREQ"])): ?>
	<div class="w3-panel w3-display-container w3-green w3-text-white">
  		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-green w3-display-topright">X</span>
  		<p>Ansökan är under behandling...</p>
  		<p>Du kommer få ett E-Mail när du blivit godkänd.</p>
	</div>
	<?php unset($_SESSION["REGREQ"]) ?>
<?php endif; ?>

<div class="w3-center w3-tangerine w3-text-white">
	<p class="w3-jumbo w3-opacity"><b>Annette's Minnessida</b></p>
</div>
<div class="w3-center">
	 <img src="../resources/mamma_profil_cypern.jpg" class="w3-circle" alt="Alps"> 
</div>