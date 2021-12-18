<!DOCTYPE html>
<html>
<head>
    <title>Modify Account Information</title>
    <link rel="stylesheet" type="text/css" href="../../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../../css
    /editUser.css">
    <script src="../../js/modifyAccount.js"></script>
</head>
<body>
    <div id="container">
        <a href='<?= BASE ?>/OrderDetails/index'>
            <img src="../../img/shoppingcart.png" id="shopping-bag">
        </a>
        <a href='<?= BASE ?>/User/index'>
            <img src="../../img/accountFilled.png" id="account">
        </a>
    </div>
    
    <header>
        <a href="<?=BASE?>/Default/home">
            <img src="../../img/logo.png" id="logo">
        </a>
    </header>

    <div class="nav_bar">
        <nav>
            <ul id="nav_ul">
                <li><a href="<?=BASE?>/Default/home">Home</a>
                <li><a href='<?= BASE ?>/Product/viewProduct'>Products</a>
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

    <div id="wrapper">
        <form action="" method="POST">
            <div id="form">
                <h1>Modify Email</h1><br>
                <label>Current Email: 
                <input type="text" id="email" name="email"></label>
                <br><br>

                <label>New Email: 
                <input type="text" id="email" name="new_email"></label>
                <br><br>
                </div>

                <input type="submit" id="edit" name="action" value="Submit Changes">
                <a href='<?= BASE ?>/User/index' id="editLink"><p id="goBack">Go Back</p></a><br>
        </form>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one Japanese goods supplier from Canada.
    </footer>
</body>
</html>