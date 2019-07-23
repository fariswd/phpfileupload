<?php
include './upload.php';

function get() {
    if(isset($_POST["type"]) && !empty($_POST["type"])) {
        post();
    } else {
        $result = array(
        'status' => 200,
        'message' => "File Upload v0.0.1",
        );
        header('Content-type: application/json');
        echo json_encode($result);
    }
}

function post() {
    $user = 'capung';
    $pass = '999';
    if (isset($_FILES["file"]['name']) && !empty($_FILES["file"]['name'])) {
        if(
            isset($_SERVER['PHP_AUTH_USER']) &&
            isset($_SERVER['PHP_AUTH_PW']) &&
            $_SERVER['PHP_AUTH_USER'] === $user &&
            $_SERVER['PHP_AUTH_PW'] === $pass) {
            upload();
        } else {
        $result = array(
            'status' => 401,
            'message' => "Unauthorized",
        );
        header('Content-type: application/json');
        echo json_encode($result);
        }
    } else {
        $result = array(
            'status' => 400,
            'message' => "File not set",
        );
        header('Content-type: application/json');
        echo json_encode($result);
    }
}

?>