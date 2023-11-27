<?php
session_start();

if (isset($_POST['update'])) {
    $upid = $_POST['upid'];
    $qty = $_POST['qty'];

    // Check if the product ID is already in the cart
    if (isset($_SESSION['cart'][$upid])) {
        // Check if the initial price is set in the session
        if (!isset($_SESSION['cart'][$upid]['initial_price'])) {
            // If not set, store the current price as the initial price
            $_SESSION['cart'][$upid]['initial_price'] = $_SESSION['cart'][$upid]['price'];
        }

        // Update the quantity
        $_SESSION['cart'][$upid]['qty'] = $qty;

        // Recalculate the price based on the initial price and updated quantity
        $_SESSION['cart'][$upid]['price'] = $_SESSION['cart'][$upid]['initial_price'] * $qty;
    }

    // echo "Product ID: $upid, Quantity: $qty, Initial Price: " . $_SESSION['cart'][$upid]['initial_price'] . ", Updated Price: " . $_SESSION['cart'][$upid]['price'];
    // die();

    header("location: cart.php");
}
?>
