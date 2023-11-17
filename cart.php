<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Cart</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="">Cart</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
        </ul>

        <div class="d-flex">
          <a class="btn btn-outline-info" href="cart.php">Cart 
          <?php if (isset($_SESSION['cart'])) : ?>
            <?php echo count($_SESSION['cart']);; ?>
          <?php endif; ?>
          </a>
        </div>

      </div>
    </div>
  </nav>

  <div class="container">
    <form action="checkout.php" method="post">
  <table class="table my-3">
    <a href="emptycart.php" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
    <thead>
      <tr class="text-center">
        <th>S.no</th>
        <th>Product Name</th>
        <th>Price(#)</th>
        <th>Quantity</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['cart'])) :
        $i = 1;
        foreach ($_SESSION['cart'] as $cart) :
      ?>
          <tr class="text-center">
            <td><?php echo $i; ?></td>
            <td><?php echo $cart['pro_id']; ?></td>
            <td>
              <?php echo $cart['price']; ?>
            </td>
            <form action="update.php" method="post">
            <td>
                <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
            </td>
            <td>
              <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
              </form>
            </td>
            <td><a class="btn btn-sm btn-danger" href="removecartitem.php?id=<?= $cart['pro_id']; ?>">Remove</a></td>
          </tr>
          <?php
          $i++;
          
        endforeach;
        ?>
    </tbody>
  </table>
  <?php
  $total = array_sum(array_column($_SESSION['cart'], 'price'));
  ?>
  <h3>Total #<?=$total;?></h3>
  <input type="hidden" name="total_amount" value="<?= $total; ?>">
  <?php endif; ?>
  <div class="text-center">
    <button id="buy-now" class="btn btn-sm btn-success col-2 btn-lg" href="checkout.php">Buy Now</button>
  </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>