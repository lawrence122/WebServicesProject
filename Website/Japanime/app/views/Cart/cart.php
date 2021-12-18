<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /cart.css">
    <script src="../js/core.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <div id="container">
        <a href='<?= BASE ?>/OrderDetails/index'>
            <img src="../img/shoppingcartFilled.png" id="shopping-bag">
        </a>
        <a href='<?= BASE ?>/User/index'>
            <img src="../img/account.png" id="account">
        </a>
    </div>
    
    <header>
        <a href="<?=BASE?>/Default/home">
            <img src="../img/logo.png" id="logo">
        </a>
    </header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href="<?=BASE?>/Default/home">Home</a>
                <li><a href='<?= BASE ?>/Product/index'>Products</a>
                <ul class="dropdown">
                    <li><a href='<?= BASE ?>/Product/viewAnime'>Anime DVD</a>
                    <li><a href='<?= BASE ?>/Product/viewManga'>Manga</a>
                    <li><a href='<?= BASE ?>/Product/viewFigure'>Figures</a>
                </ul>
                <li class="curr_page"><a href='<?= BASE ?>/OrderDetails/index'>View Shopping Cart</a>
                <li><a href='<?= BASE ?>/Default/logout'>Log Out</a>
            </ul>
        </nav>
    </div>

    <div class="shopping-cart">
        <div class="title">
            Shopping Cart
        </div>
        <?php
            $index = 0;
            foreach ($data['products'] as $product) {
                echo "<div class='item'>
                        <div class='buttons'>
                            <span class='delete-btn'>
                                <a href='" . BASE . "/OrderDetails/delete/$product->product_id'>
                                    <img src='../img/delete.png'>
                                </a>
                            </span>
                        </div>

                        <div class='image'>
                            <img src='" . BASE . "/uploads/$product->filename' style='width: 40%;'>
                        </div>
     
                        <div class='description'>
                            <span>$product->product_name</span>
                        </div>
                        <div class='quantity'>
                            <a href='" . BASE . "/OrderDetails/addQty/$product->product_id'>
                                <button class='plus-btn' type='button' name='button'>
                                    <img src='../img/plus.png'>
                                </button>
                            </a>
                            <input type='text' name='name' value='" . $data['quantities'][$index]->product_quantity . "'>
                            <a href='" . BASE . "/OrderDetails/removeQty/$product->product_id'>
                            <button class='minus-btn' type='button' name='button'>
                                <img src='../img/minus.png'>
                            </button>
                        </a>
                    </div>
                    <div class='total-price'>" . $data['prices'][$index]->total_item_price . "$</div>
                    </div>";
                $index++;
            }
        ?>
    </div>

    <div class="line"></div>

    <div id="totalPrice">
        <label id="priceLabel">Total Price: </label>
            <label id="totalPriceLabel" name="total_price">
                <?php
                    $total_price = 0;

                    foreach ($data['prices'] as $price) {
                        $total_price += $price->total_item_price;
                    }

                    echo "$total_price$";
                ?>
            </label>
    </div>

    <div id="next-btn">
        <a href="<?=BASE?>/Default/home"><button id="continue-shopping">Continue Shopping</button></a>

        <?php
            if ($data['order_id'] != null) {
                echo "<a href='" . BASE . "/Order/update/" . $data['order_id'] . "'><button id='checkout'>Checkout</button></a>";
            } else {
                echo "<button id='checkout' disabled>Checkout</button>";
            }

        ?>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>
</body>
</html>