<?php
// Include your database connection file
include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["productId"])) {
    $productId = $_GET["productId"];

    // Prepare and execute the query to fetch product data
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return product data as JSON response
        echo json_encode($row);
    } else {
        // No product found with the given ID
        echo json_encode(array("error" => "Product not found"));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>