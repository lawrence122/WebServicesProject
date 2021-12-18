<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /home.css">
    <script src="../js/home.js"></script>
    <script src="../js/core.js"></script>
</head>
<body onload="showSlides(1);">
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
                <li class="curr_page"><a href="<?=BASE?>/Admin/index">Home</a>
                <li><a href='<?= BASE ?>/Admin/viewProduct'>Products</a>
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

    <div class="slideshow-container">
        <div class="figure_slideshow">
            <div class="slides fade">
                <a href='<?= BASE ?>/Product/viewFigure'>
                    <img src="../img/figures.jpg">
                </a>
            </div>

            <div class="slides fade">
                <a href='<?= BASE ?>/Product/viewAnime'>
                    <img src="../img/anime.jpg">
                </a>
            </div>

            <div class="slides fade">
                <a href='<?= BASE ?>/Product/viewManga'>
                    <img src="../img/manga.jpg">
                </a>
            </div>
            <div class="arrows">
                <a class="prev" onclick="plusSlides(-1);">&#10094;</a>
                <a class="next" onclick="plusSlides(1);">&#10095;</a>
            </div>
        </div>

        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>
</body>
</html>