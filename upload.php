<?php

function upload () {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $message = '';
    $filename = $_FILES["file"]["name"];
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $message =  "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $message =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message =   $message . " Your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $message =  "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            $message =  $message . " there was an error uploading your file.";
        }
    }
    $status = 200;
    if($uploadOk == 0) {
        header("HTTP/1.1 500 Internal Server Error");
        $status = 500;
    }
    $result = array(
        'status' => 500,
        'filename' => $filename,
        'url' => $target_dir . $filename,
        'message' => $message,
    );
    header('Content-type: application/json');
    echo json_encode($result);
}

?>
