<!DOCTYPE html>
<html>
<head>
    <title>View Order History</title>
    <link rel="stylesheet" type="text/css" href="../../css
    /core.css">
    <link rel="stylesheet" type="text/css" href="../../css
    /editUser.css">
    <link rel="stylesheet" type="text/css" href="../../css
    /viewOrder.css">
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

    <div id="view-container">
        <div id="view">
            <h1>View Order History</h1><br><br>
            <div id="wrapper">

                <table id="order">
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Order Status</th>

                    <?php
                        foreach ($data as $order) {
                            echo "<tr>
                                    <td>$order->order_id</td>
                                    <td>$order->total_price</td>
                                    <td>$order->status</td>
                                </tr>";
                        }

                    ?>

                </table>
            </div>

            <a href='<?= BASE ?>/User/index' id="editLink"><p id="goBack">Go Back</p></a><br>
        </div>
    </div>

    <footer>
        &copy 2021 Japanime Co., Ltd. - Your number one Japanese goods supplier from Canada.
    </footer>
</body>
</html>