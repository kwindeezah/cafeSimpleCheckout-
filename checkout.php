<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" value="<?php echo isset($_POST['total-amount']) ? $_POST['total-amount'] : 'N/A'; ?>" readonly>
        </div>

        <button type="button" class="btn btn-primary" id="payButton">Pay</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
</body>
</html>