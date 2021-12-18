<!DOCTYPE html>
<html>
<head>
    <title>Manga</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /adminProduct.css">
    <script src="../js/core.js"></script>
</head>
<body>
    <div id="container">
        <a href='<?= BASE ?>/OrderDetails/index'>
            <img src="../img/shoppingcart.png" id="shopping-bag">
        </a>
    </div>
    
    <header>
        <a href="<?=BASE?>/Admin/index">
            <img src="../img/logo.png" id="logo">
        </a>
    </header>
    
    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href="<?=BASE?>/Admin/index">Home</a>
                <li class="curr_page"><a href='<?= BASE ?>/Admin/viewProduct'>Products</a>
                <ul class="dropdown">
                    <li><a href='<?= BASE ?>/Product/add'>Add Product</a>
                    <li><a href='<?= BASE ?>/Admin/viewAnime'>Anime DVD</a>
                    <li><a href='<?= BASE ?>/Admin/viewManga'>Manga</a>
                    <li><a href='<?= BASE ?>/Admin/viewFigure'>Figures</a>
                </ul>
                <li><a href='<?= BASE ?>/OrderDetails/index'>View Shopping Cart</a>
                <li><a href='<?= BASE ?>/Default/logout'>Log Out</a>
            </ul>
        </nav>
    </div>

    <div class="products">
        <ul id="products-list">
            <?php
                foreach ($data as $product) {
                    echo "<li>
                            <div class='product'>
                                <img src='" . BASE . "/uploads/$product->filename' style='width: 100%;'>
                                <h1 class='title'>$product->product_name</h1>
                                <p class='price'>$product->price$</p>
                                <p>$product->description</p>
                                <a href='" . BASE . "/Product/edit/$product->product_id'>
                                    <button class='adminBtn' type='button' id='edit'>Edit</button>
                                </a>
                                <a href='" . BASE . "/Product/delete/$product->product_id'>
                                    <button class='adminBtn' type='button' id='delete'>Delete</button>
                                </a>
                                <p class='line'>Quantity: $product->qoh</p>
                                <p id='status' class='line'>$product->stock_status</p>
                            </div>";
                    }
            ?>
        </ul>
    </div>
    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>
</body>
</html>