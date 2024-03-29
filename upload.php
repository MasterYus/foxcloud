<?php
$targetFolder = 'storage/tmp/';


if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];
	
	// Validate the file type
	$fileTypes = array('mp3'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);
	$response = array ();
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		$response['success'] = 1;
		foreach ($_POST as $key => $value){
			$response[$key] = $value;
		}
		echo json_encode($response);
	} else {
		$response['success'] = 0;
		$response['error'] = 'Invalid file type.';
		echo json_encode($response);
	}
}
?>