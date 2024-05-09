<?php 
require 'conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $categoryName = $_POST["categoryName"];
    $categoryStatus = $_POST["categoryStatus"];

    // Specify the directory where you want to store the uploaded images
    $targetDirectory = PRODUCT_IMAGE_SERVER_PATH;

    // Get the file name and path of the uploaded image
    $categoryImage = $_FILES["categoryImage"]["name"];
    $tempFilePath = $_FILES["categoryImage"]["tmp_name"];

    // Generate a unique name for the uploaded image to prevent conflicts
    $uniqueFileName = uniqid() . "_" . $categoryImage;

    // Construct the full path where the image will be stored on the server
    $targetFilePath = $targetDirectory . $uniqueFileName;

    // Move the uploaded image to the specified directory on the server
    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
        // echo "Image uploaded successfully.";

      
        $sql = "INSERT INTO categories (category_name, photos, status) VALUES ('$categoryName',  '$uniqueFileName', '$categoryStatus')";

        if ($conn->query($sql) === TRUE) {
            session_start();
                $_SESSION['success_message'] = "New category added successfully";
                header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}


// $conn->close();
?>