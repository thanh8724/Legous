<?php

$dburl = "mysql:host=localhost;dbname=legous_db;charset=utf8";
$username = 'root';
$password = '';

$conn = new PDO($dburl, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the product ID is provided
if (isset($_POST['product_id'])) {
    // Get the product ID from the request
    $productId = $_POST['product_id'];

    // Perform the database update
    $sql = "UPDATE product SET love = love + 100 WHERE id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();

    // Return a response (you can customize this based on your needs)
    if ($stmt->rowCount() > 0) {
        echo "Love updated successfully";
    } else {
        echo "Failed to update love";
    }
} else {
    echo "Invalid request";
}
?>