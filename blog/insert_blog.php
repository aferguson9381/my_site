<?php 

	include('includes/connection.php'); 

	if(isset($_POST['sub'])) {

		$name = nl2br(addslashes($_POST['name']));
		$title = nl2br(addslashes($_POST['title']));
		$post = nl2br(addslashes($_POST['content']));
		$img_upload = $_FILES['img_upload']['name'];
		$img_type = $_FILES['img_upload']['type'];
		$img_size = $_FILES['img_upload']['size'];

		$target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["img_upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img_upload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["img_upload"]["size"] > 100000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "mov" && $imageFileType != "MOV" && $imageFileType != "MP3" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img_upload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["img_upload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

		$insert = "INSERT INTO my_blogs (blog_date, blog_title, blog_author, blog_img, blog_img_type, blog_img_size, blog_content) VALUES (NOW(), '$title', '$name', '$img_upload', '$img_type', '$img_size', '$post')";

		
	 if ($con->query($insert) === TRUE) {
	    	echo "<script>window.open('blog.php','_self')</script>";
		} 

	}



?>
