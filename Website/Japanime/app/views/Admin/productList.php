<!DOCTYPE html>
<html>
<head>
	<title>Products</title>

	<link rel="stylesheet" type="text/css" href="../css/core.css">
	<link rel="stylesheet" type="text/css" href="../css/products.css">
    <script src="../js/core.js"></script>
</head>
<body>
	<div id="container">
		<a href='<?= BASE ?>/OrderDetails/index'>
			<img src="../img/shoppingcart.png" id="shopping-bag">
		</a>
	</div>

	<header>
        <a href="<?=BASE?>/Admin/home">
            <img src="../img/logo.png" id="logo">
        </a>
    </header>

	<div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href="<?=BASE?>/Admin/home">Home</a>
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

    <div class="categories">
    	<div class="hovereffect">
    		<img src="../img/animes.jpg">
    		<div class="overlay-anime">
    			<p><a href='<?= BASE ?>/Admin/viewAnime' class="anime-text">Go to Anime DVD Page</a></p>
    		</div>
    	</div>
    	<div class="hovereffect">
    		<img src="../img/mangas.jpg">
    		<div class="overlay-manga">
    			<p><a href='<?= BASE ?>/Admin/viewManga' class="manga-text">Go to Manga Page</a></p>
    		</div>
    	</div>
    	<div class="hovereffect">
    		<img src="../img/figure.jpg">
    		<div class="overlay-figure">
    			<p><a href='<?= BASE ?>/Admin/viewFigure' class="figure-text">Go to Figure Page</a></p>
    		</div>
    	</div>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one japanese goods supplier from Canada.
    </footer>

</body>
</html>