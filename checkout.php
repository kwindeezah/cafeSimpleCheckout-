<?php session_start(); 

print_r($_SESSION)?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form action="action.php" method="post" >
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email-address" name="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo isset($_POST['total_amount']) ? $_POST['total_amount'] : ''; ?>" readonly>
        </div>

        <button type="button" class="btn btn-primary" name="button">Pay</button>
    </form>
</div>

<script>
    const totalAmount = <?= isset($_POST['total_amount']) ? $_POST['total_amount'] : 0; ?>;
    document.getElementById('amount').value = totalAmount;
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
</body>
</html>