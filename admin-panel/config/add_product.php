<?php
require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $productName = $_POST["productName"];
    $productCategory = $_POST["productCategory"];
    $productShortDesc1 = $_POST["productShortDesc1"];
    $productShortDesc2 = $_POST["productShortDesc2"];
    $productDescription = $_POST["productDescription"];
    $productStatus = $_POST["productStatus"];

    // Upload image to server path
    $targetDirectory = PRODUCT_IMAGE_SERVER_PATH; 


    // Get the file name and path of the uploaded image
    $productImage = $_FILES["productImage"]["name"];
    $tempFilePath = $_FILES["productImage"]["tmp_name"];

    // Generate a unique name for the uploaded image to prevent conflicts
    $uniqueFileName = uniqid() . "_" . $productImage;

    // Construct the full path where the image will be stored on the server
    $targetFilePath = $targetDirectory . $uniqueFileName;


      if (move_uploaded_file($tempFilePath, $targetFilePath)) {

     
        $sql = "INSERT INTO products (product_name, cat_id, photos, short_desc1, short_desc2, description, status) 
                VALUES ('$productName', '$productCategory', '$uniqueFileName', '$productShortDesc1', 
                        '$productShortDesc2', '$productDescription', '$productStatus')";

        if ($conn->query($sql) === TRUE) {
            session_start();
                $_SESSION['success_message'] = "New category added successfully";
                header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Failed to upload image.";
    }
}
?>