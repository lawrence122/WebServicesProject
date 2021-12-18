<!DOCTYPE html>
<html>
<head>
    <title>Anime DVD</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /userProduct.css">
    <script src="../js/core.js"></script>
</head>
<body>
    <div id="container">
        <a href='<?= BASE ?>/OrderDetails/index'>
            <img src="../img/shoppingcart.png" id="shopping-bag">
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
                <li class="curr_page"><a href='<?= BASE ?>/Product/index'>Products</a>
                <ul class="dropdown">
                    <li><a href='<?= BASE ?>/Product/viewAnime'>Anime DVD</a>
                    <li><a href='<?= BASE ?>/Product/viewManga'>Manga</a>
                    <li><a href='<?= BASE ?>/Product/viewFigure'>Figures</a>
                </ul>
                <li><a href='<?= BASE ?>/OrderDetails/index'>View Shopping Cart</a>
                <li><a href='<?= BASE ?>/Default/logout'>Log Out</a>
            </ul>
        </nav>
    </div>

    <form method="POST" action="">
        <div class="tb" id="categoryOrderDiv">
            <div class="td">
                <div class="select" id="categoryChooseOrder">
                    <select name="slct" id="slct">
                        <option selected disabled>Choose an option to sort</option>
                        <option value="1">Name Ascending</option>
                        <option value="2">Name Descending</option>
                        <option value="3">Price Ascending</option>
                        <option value="4">Price Descending</option>
                    </select>
                </div>
            </div>
            <div class="td">
                <button type="submit" name="action" id="categoryChooseOrderButton">
                    <div class="ph-float">
                        <a class='ph-button ph-btn-blue'>Sort</a>
                    </div>
               </button>
            </div>
        </div>
    </form>

    <div class="products">
        <ul id="products-list">
            <?php
                foreach ($data as $product) {
                    echo "<li>
                            <div class='product'>
                                <img src='" . BASE . "/uploads/$product->filename' style='width: 100%;'>
                                <h1 class='title'>$product->product_name</h1>
                                <p class='price'>$product->price$</p>
                                <p>$product->description</p>";
                    if ($product->qoh == 0) {
                        echo "<button type='button' class='m_btn' disabled>Add to Cart</button>
                                <p class='line'>Quantity: $product->qoh</p>
                                <p id='status_out' class='line'>$product->stock_status</p>
                            </div>";
                    } else {
                        echo "<a href='" . BASE . "/OrderDetails/add/$product->product_id'><button type='button' class='m_btn'>Add to Cart</button></a>
                                <p class='line'>Quantity: $product->qoh</p>
                                <p id='status_in' class='line'>$product->stock_status</p>
                            </div>";
                    }
                }
            ?>
        </ul>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>
</body>
</html>