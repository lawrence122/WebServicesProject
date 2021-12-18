<!DOCTYPE html>
<html>
<head>
    <title>Modify Account</title>
    <link rel="stylesheet" type="text/css" href="../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../css
    /editUser.css">
    <script src="../js/modifyAccount.js"></script>
</head>
<body>
    <div id="container">
        <a href='<?= BASE ?>/OrderDetails/index'>
            <img src="../img/shoppingcart.png" id="shopping-bag">
        </a>
        <a href='<?= BASE ?>/User/index'>
            <img src="../img/accountFilled.png" id="account">
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
        <div id="buttons">
            <a href='<?= BASE ?>/User/changeEmail/<?= $_SESSION['token'] ?>'>
                <button type="button" class="editBtn">Modify Account</button>
            </a><br>
            <a href='<?= BASE ?>/User/changePassword/<?= $_SESSION['user_id'] ?>'>
                <button type="button" class="editBtn">Change Password</button>
            </a><br>
            <a href='<?= BASE ?>/User/viewOrders/<?= $_SESSION['user_id'] ?>'>
                <button type="button" class="editBtn">View Order History</button>
            </a><br>
            <a href='<?= BASE ?>/User/delete/<?= $_SESSION['user_id'] ?>' id="editLink" onclick="return confirm('Are you sure you want to delete your account?');"><p id="deleteText">Delete Account</p></a><br>
        </div>
    </div>


    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one Japanese goods supplier from Canada.
    </footer>
</body>
</html>