<?php
    session_start();
    ob_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];
        $action = $_POST["action"];

        if ($action === "increase") {
            // Increase quantity
            $_SESSION["cart"][$product_id]["qty"]++;
        } elseif ($action === "decrease") {
            // Decrease quantity, but ensure it doesn't go below 0
            if ($_SESSION["cart"][$product_id]["qty"] > 0) {
                $_SESSION["cart"][$product_id]["qty"]--;
            } else {
                $_SESSION["cart"][$product_id]["qty"] = 1;
            }
        }

        // Return updated quantity
        $response = [
            "success" => true,
            "quantity" => $_SESSION["cart"][$product_id]["qty"],
        ];
    } else {
        $response = ["success" => false];
    }

    header("Content-Type: application/json");
    echo json_encode($response);
?>