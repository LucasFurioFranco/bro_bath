<?php
        require_once("scripts/getProduct.php");
        if(!isset($_GET["sku"])){
                header("Location: home.php");
        }
        $product_sku = $_GET["sku"];
        $product_list = new ProductList();
        if(!$product_list->isValidSKU($product_sku)){
                header("Location: home.php");
        }
        $product = $product_list->getProductBySKU($product_sku);
        function formatPrice($value){
                return "R$ " . number_format($value, 2, ',', '.');
        }
        if(!isset($_COOKIE["brobath_cart_cookie"])) {
            setcookie("brobath_cart_cookie");
        }
?>

<!--
        <?php
                var_dump($product);
        ?>
 -->


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
            $data_layer = new DataLayer("product");
            $data_layer->addInfo("productTitle", $product['title']);
            $data_layer->addInfo("productSku", $product['sku']);
            $data_layer->addInfo("productCategory", $product['category']);
            $data_layer->addInfo("productAvailability", $product['availability']);
            $data_layer->addInfo("productProdPrice", $product['prod_price']);
            $data_layer->addInfo("productSalePrice", $product['sale_price']);
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
        <a href="cart.php"><img src="img/cart.png" alt="Veeja seus produtos no carrinho" height=50 width=50></a>
        <br><br>


        <big style="font-weight: bold;"><big><big><?= $product['title'];  ?></big></big></big>
        <br><br>
        <big><big>Categoria: <?= $product['category'];  ?></big></big>
        <br><br>
        <img src=<?=$product['img_link']?> alt=<?=$product['title']?> height="200" width="200">
        <br><br>
        Pre&ccedil;o: <?= formatPrice($product['sale_price']);  ?>
        <br><br>
        <?php if($product['availability']):?>
            <script>
                function addProductToCart(){
                    var cart_cookie = getCookie("brobath_cart_cookie");
                    alert(cart_cookie);
                }
            </script>
            <input value="comprar" id="add-to-cart-available" type="button" onclick=addProductToCart()>

        <?php else:?>
                <span id="add-to-cart-unavailable">Indispon&iacute;vel&nbsp;&nbsp;&nbsp;</span>
        <?php endif?>
</body>

</html>
