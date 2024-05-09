<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "grocery";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH','http://grocery.test:8080/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'assets/imgs/products/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'assets/imgs/products/');