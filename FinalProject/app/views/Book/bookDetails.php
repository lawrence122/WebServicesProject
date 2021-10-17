<html>

<head>
    <!--Bootsrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

    <title><?= $data->title ?>'s Page</title>
</head>

<body>

    <p><?= $data->title ?>s page...
        <?php
        date_default_timezone_set("America/Montreal");
        ?>
    </p>

    <img src='...' alt='Book image'>
<?php
    echo $data->title;
    echo $data->author;
    echo $data->book_desc;
    echo $data->price
?>
<!-- Add buy and borrow hyperlinks -->
        <a href='" . BASE . "/BorrowedBook/borrow/<?= $data->book_id ?>'>
            <button type='button' class='btn btn-sm btn-outline-secondary'>Borrow</button>
        </a>
        <a href='" . BASE . "/Cart/add/<?= $data->book_id ?>'>
            <button type='button' class='btn btn-sm btn-outline-secondary'>Add to Cart</button>
        </a>
    
    <a href="<?=BASE?>/User/homepage">Cancel</a>
</body>

</html>