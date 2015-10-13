<?php
require_once('../mediaManager.php');

if (isset($_FILES) && !empty($_FILES)) {
	var_dump($_FILES["file"]);

	$filetype = explode('.', $_FILES["file"]["name"]);
	$filetype = $filetype[1];

	$newName = 'TL'.md5($_FILES["file"]["name"].time()).".".$filetype;

	$dirname = 'upload';
	if(!is_dir($dirname)) {
    mkdir($dirname, 0777, true);
	}

	//存储到服务器
	if(file_exists("upload/" . $_FILES["file"]["name"])){
		echo $_FILES["file"]["name"] . " already exists. ";
		exit();
	}else{
		move_uploaded_file($_FILES["file"]["tmp_name"],
    	"upload/" . $newName);
    	echo "Stored in: " . "upload/" . $newName;
	}

	$media = new mediaManager();
	$media->syncFile("upload/" . $newName);
}
	
?>

<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>