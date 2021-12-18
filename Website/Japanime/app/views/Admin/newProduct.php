<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /addProduct.css">
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

    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form">
                <h1>Add Product</h1><br>
                <label>Product Name: 
                    <input type="text" name="product_name">
                </label><br><br>

                <label>Select an image file to upload: <br>
                    <input type="file" name="myImage">
                </label><br><br>

                <label>Description: </label><br>
                    <textarea name="description"></textarea>
                <br><br>

                <label>Price: 
                    <input type="text" name="price">
                </label><br><br>

                <label>Quantity: 
                    <input type="text" name="quantity">
                </label><br><br>

                <label>Stock Status: 
                    <select id="stock" name="stock_status">
                        <option value="In Stock">In Stock</option>
                        <option value="Sold Out">Sold Out</option>
                    </select>
                </label><br><br>

                <label>Category: 
                    <select id="category" name="category">
                        <option value="Anime DVD">Anime DVD</option>
                        <option value="Manga">Manga</option>
                        <option value="Figure">Figure</option>
                    </select>
                </label><br>
            </div>

            <input id="add" type="submit" name="action" value="Add Product"><br><br>
        </form>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>
</body>
</html>