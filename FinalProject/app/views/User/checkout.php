<html>

<head>
  <!--Bootsrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--Fontawesome-->
  <script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

  <title>Checkout</title>
</head>

<body class="bg-light">
  <?php
  if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_GET['error'] . '</div>';
  }
  ?>
  <a class="btn btn-secondary" href="<?= BASE ?>/Cart/index"><i class="fas fa-arrow-left p-r"></i> Back</a>

  <div class="container">
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill"><?= count($data['cart']) ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php
          foreach ($data['cart'] as $item) {
            echo "<li class='list-group-item d-flex justify-content-between 1h-condensed'>
							<div>
								<h6 class='my-0'>$item->title</h6>
								<small class='text-muted'>$item->author</small>
							</div>
							<span class='text-muted'>$$item->price</span>
						  </li>";
          }
          ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$<?= $data['price'] ?></strong>
          </li>
        </ul>
      </div>

      <div class="col-md-8 order-md-1">
        <br />

        <form method="post" action="" class="needs-validation" novalidate>

          <h4 class="mb-3">Verify Your Purchase</h4>
          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <h4 class="mb-3">Shipping address</h4>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="shipping_address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <h4 class="mb-3">Payment Method</h4>

          <div class="form-group">
            <div class="form-check">
              <input value="credit" name="payment_method" type="radio" class="form-check-input" checked required>
              <label class="form-check-label ml-5" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input value="debit" name="payment_method" type="radio" class="form-check-input" required>
              <label class="form-check-label ml-5" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input value="paypal" name="payment_method" type="radio" class="form-check-input" required>
              <label class="form-check-label ml-5" for="paypal">Paypal</label>
            </div>
          </div>
          <button class="btn btn-primary btn-lg btn-block" name="action" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
    </ul>
    </footer>
  </div>
  </div>
</body>

</html>