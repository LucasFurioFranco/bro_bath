<!--?php
    if(!isset($_COOKIE["brobath_cart_cookie"])) {
        echo "Cookie named '" . "brobath_cart_cookie" . "' is not set!";
    } else {
        echo "Cookie '" . "brobath_cart_cookie" . "' is set!<br>";
    }
?-->
<html>

<head>

        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title> BroBathShop - Product </title>
        <style>
        #add-to-cart-available{
                border:1px solid #008800;
                background-color: #88ff88;
        }
        #add-to-cart-unavailable{
                border:1px solid #008800;
                background-color: #880000;
                font-size: 13px;
                witdh: 73px;
                padding: 2px;
                padding-left: 15px;
                color: white;
        }
        </style>
</head>

<body>
        <!-- Inicializa Data Layer -->
        <script>
        <?php
            include("scripts/data_layer.php");
            $data_layer = new DataLayer("cart");
            echo $data_layer->getDataLayer()."\n";
        ?>
        </script>
        <!-- Final do Data Layer -->

        <!-- Inicializa o GTM -->
            <?php
                    include("scripts/gtm.php");
                    echo getGTM("GTM-WKXW2V");
            ?>
        <!-- Final do GTM -->

        <a href="home.php"><img src="img/bath.png" alt="Share bath, share happiness"></a>
        <img src="img/cart.png" alt="Veeja seus produtos no carrinho" height=50 width=50>
        <br><br>


        <h1>Itens do Carrinho abaixo logo!</h1>

</body>

</html>
