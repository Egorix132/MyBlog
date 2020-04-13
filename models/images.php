<?php
	class Model_Images{

		function __construct(){

		}

		function handleImage($img_name, $tmp_name, $uploads_dir, $max_width, $max_height){
			$img_name = basename($img_name);
			$img_name = substr_replace($img_name, uniqid(), strpos($img_name, "."), 0);
			$img_name = "$uploads_dir/$img_name";

			move_uploaded_file($tmp_name, Core::$root.$img_name);
			$this->resizeImage(Core::$root.$img_name, Core::$root.$img_name, $max_width, $max_height);
			return $img_name;
		}

		function resizeImage($source, $destination, $max_width, $max_height){
						/* [1 - INIT & SETTINGS] */
			$max_width = 770;
			$max_height = 420;
			// Image quality
			// JPG files - 0 is lowest, 100 is highest
			// PNG files - 0 no compression to 9 most compression
			$quality = ["jpg"=>100, "jpeg"=>100, "png"=>0];
			$allowed = ["bmp", "gif", "jpg", "jpeg", "png", "webp"];
			$ext = strtolower(pathinfo($source, PATHINFO_EXTENSION));
			$size = getimagesize($source);
			$pass = true;
			$error = "";

			/* [2 - FILE CHECKS] */
			// Invalid file type
			if (!in_array($ext, $allowed)) {
			  $pass = false;
				$error = "$ext file type not allowed - $source";
			}
			// Invalid image
			if ($pass && $size == false) {
			  $pass = false;
				$error = "$source is not a valid image file.";
			}
			// Error!
			if (!$pass) { return 'error'; }

			/* [3 - RESIZE] */
			// Resize only if source is larger than allow max
			$width = $size[0];
			$height = $size[1];
			if ($width>$max_width || $height>$max_height) {
			  // Landscape image
			  if ($width > $height) {
			    $new_width = $max_width;
			    $new_height = CEIL($height / ($width/$max_width));
			  }
			  // Square or portrait
			  else {
			    $new_height = $max_height;
			    $new_width = CEIL($width / ($height/$max_height));
			  }
			  // Create new resized image
			  $fn = "imagecreatefrom" . ($ext=="jpg"?"jpeg":$ext);
			  $original = $fn($source);
			  $resize = imagecreatetruecolor($new_width, $new_height);
			  imagecopyresampled($resize, $original, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			  // Save resized to file
			  $fn = "image" . ($ext=="jpg"?"jpeg":$ext);
			  if (is_numeric($quality[$ext])) { $fn($resize, $destination, $quality[$ext]); }
			  else { $fn($resize, $destination); }
			  imagedestroy($original);
			  imagedestroy($resize);
			} else {
			  if (!copy($source, $destination)) {
			    $pass = false;
			    $error = "Error copying from $source to $destination";
			  }
			}
		}

	}
?>
