<?php
/* SPECIFIES THE DIR WHERE THE FILE IS GOING TO BE PLACED */
$target_dir = __DIR__ . "/uploads/";
echo $target_dir;
/* PATH OF THE FILE TO BE UPLOADED */
$target_file = $target_dir . basename($_FILES["file"]["name"]);
echo($target_file);
/* FLAG */
$uploadOk = 1;
/* HOLDS THE FILE EXTENSION IN LOWERCASE */
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo($imageFileType);

/* CHECK IF FILE IS AN ACTUAL IMAGE AND NOT A FAKE FILE  */
if(isset($_POST["submit"])) 
{
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) 
  {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } 
  else 
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) 
{
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 4194304) // 4 mb
{
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) 
{
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
	echo($_FILES["file"]["tmp_name"]);
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
  {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } 
  else 
  {
    echo "Sorry, there was an error uploading your file.";
  }
}