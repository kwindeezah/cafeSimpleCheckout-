<?php
session_start();
// session_regenerate_id(true);
// require '../config.php';
// require '../RetrieveUser.php';
require 'vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();



if (isset($_POST['button'])) {

    if (isset($_POST['amount'])) {
        $totalCartValue = $_POST['amount'];
    } else {
        echo "Error, No amount Selected";
    }

    $secret_key = 'sk_test_c048ea8b447ac81cf926724b2538c5feaec366c1'; #USE YOUR PAYSTACK SECRET KEY HERE
    $paystack = new Yabacon\Paystack($secret_key);
    $email = $_POST['email'];

    function generate_random_string($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
    }

    function generate_reference_number()
    {
    // Step 1: Get the current date in the format YYYY-MM-DD
        $current_date = date("Y-m-d");

    // Step 2: Generate 12 random alphanumeric characters
        $random_string = generate_random_string(12);

    // Step 3: Combine the date and random string to form the reference number
        return $current_date . "-" . $random_string;
    }

    $reference = generate_reference_number();

    $amount = $totalCartValue * 100;

    $_SESSION['reference'] = $reference;
    $_SESSION['amount'] = $amount;

    try
    {
        $tranx = $paystack->transaction->initialize([
            'amount'=>$amount,       // in kobo
            'email'=>$email,         // unique to customers
            'reference'=>$reference, // unique to transactions
        ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
        print_r($e->getResponseObject());
        die($e->getMessage());
    }

// store transaction reference so we can query in case user never comes back
// perhaps due to network issue
    // save_last_transaction_reference($tranx->data->reference);
    // Save the transaction reference for future reference
    $_SESSION['last_transaction_reference'] = $tranx->data->reference;

// redirect to page so User can pay
    header('Location: ' . $tranx->data->authorization_url);

} else {
    // Handle the case when the 'totalCart' key is not present in $_POST
    echo 'Error';
    header("location: index.php");
}