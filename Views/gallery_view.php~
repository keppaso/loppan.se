<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
 
<style>
.w3-tangerine {
  font-family: "Tangerine", serif;
}

div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}


.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>

<!-- OM EN NY BILD NYLIGEN LAGTS TILL MEDDELA ANVÄNDAREN DET -->
<?php if (isset($_SESSION["NEWPIC"])): ?>
	<div class="w3-panel w3-display-container w3-green w3-text-white">
  		<span onclick="this.parentElement.style.display='none'" class="w3-button w3-green w3-display-topright">X</span>
  		<p>YES! Din bild har lagts till i galleriet...</p>
	</div>
	<?php unset($_SESSION["NEWPIC"]) ?>
<?php endif; ?>

<div class="w3-center w3-tangerine w3-text-white">
	<p class="w3-jumbo w3-opacity"><b>Galleriet av Annette</b></p>
</div>
<br>
<div class="w3-container">
	<a href="AddGallery.php" class="w3-button w3-green w3-block" name="Add">Lägg till bild</a>
</div>
<br>
<br>
<!-- COPY THIS SECTION WITH DIFFERENT SOURCES TO CREATE A PHOTO ALBUM -->
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="../resources/mamma_profil_cypern.jpg">
      <img src="../resources/mamma_profil_cypern.jpg" alt="Profil" width="600" height="400">
    <div class="desc">Mamma njuter av en paus vid stranden i Ayia Napa Cypern</div>
    </a>
  </div>
</div>
<!-- END -->

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="../resources/mamma_profil_cypern.jpg">
      <img src="../resources/mamma_profil_cypern.jpg" alt="Profil" width="600" height="400">
    <div class="desc">Mamma njuter av en paus vid stranden i Ayia Napa Cypern</div>
    </a>
  </div>
</div>

<div class="clearfix"></div>

