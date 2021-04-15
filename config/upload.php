<?php
function UploadProfile($fupload_name){
	$vdir_upload = "../../images/profile/";
	$vfile_upload = $vdir_upload . $fupload_name;
	move_uploaded_file($_FILES["images"]["tmp_name"], $vfile_upload);
}

function UploadDirectory($fupload_name,$directory){
	$vdir_upload = "../../assets/images/".$directory."/";
	$vfile_upload = $vdir_upload . $fupload_name;
	move_uploaded_file($_FILES["images"]["tmp_name"], $vfile_upload);
}

?>