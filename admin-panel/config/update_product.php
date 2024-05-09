<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $productCategory = $_POST["productCategory"];
    $productShortDesc1 = $_POST["productShortDesc1"];
    $productShortDesc2 = $_POST["productShortDesc2"];
    $productDescription = $_POST["productDescription"];
    $productStatus = $_POST["productStatus"];

    // var_dump($productId);
    // exit;

    if ($_FILES["productImage"]["name"]) {
        $targetDirectory = PRODUCT_IMAGE_SERVER_PATH;
        $productImage = $_FILES["productImage"]["name"];
        $tempFilePath = $_FILES["productImage"]["tmp_name"];
        $uniqueFileName = uniqid() . "_" . $productImage;
        $targetFilePath = $targetDirectory . $uniqueFileName;

        if (move_uploaded_file($tempFilePath, $targetFilePath)) {
            $sql = "UPDATE products SET 
                    product_name = '$productName',
                    cat_id = '$productCategory',
                    photos = '$uniqueFileName',
                    short_desc1 = '$productShortDesc1',
                    short_desc2 = '$productShortDesc2',
                    description = '$productDescription',
                    status = '$productStatus'
                    WHERE product_id = '$productId'";

            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['success_message'] = "Product updated successfully";
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                echo "Error updating product: " . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        $sql = "UPDATE products SET 
                product_name = '$productName',
                cat_id = '$productCategory',
                short_desc1 = '$productShortDesc1',
                short_desc2 = '$productShortDesc2',
                description = '$productDescription',
                status = '$productStatus'
                WHERE product_id = '$productId'";

        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['success_message'] = "Product updated successfully";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Error updating product: " . $conn->error;
        }
    }
}

$conn->close();
?>