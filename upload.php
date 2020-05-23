<?php

error_reporting(E_ALL);

$PASSWORD="verminox[42]";

if(isset($_POST["upload"])) {
	if ($_POST["password"] === $PASSWORD) {
		$target_dir = $_POST["path"];
		$target_file = $target_dir . '/' . basename($_FILES["file"]["name"]);
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				$info = "File uploaded to <a href='http://www.cse.iitb.ac.in/alumni/~rohanpadhye11/$target_file'>$target_file</a> :-)";
		} else {
				$info = "File could not be uploaded to $target_file :-(";
		}
	} else {
		$info = "You must enter the correct password to upload files.";
	}
}

?>

<!DOCTYPE html>
<html>
<body>

<h1>File Upload</h1>

<p><?php echo $info; ?></p>

<form action="upload.php" method="post" enctype="multipart/form-data">
	Password: <input type="password" name="password" id="password" />
    File: <input type="file" name="file" id="file" />
	<input type="hidden" name="path" id="path" value="files" />
    <input type="submit" value="Upload" name="upload" />
</form>

</body>
</html>
