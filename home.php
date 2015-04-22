<?php
        require_once("scripts/getProduct.php");
?>

<html>

<head> <title> BroBathShop - Homepage </title> </head>

<body>
    <!-- Inicializa Data Layer -->
    <script>
    <?php
        include("scripts/data_layer.php");
        $data_layer = new DataLayer("home");
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

    <?php
        $prod_list = new ProductList();
        $str = "categ";
        $cat_list = $prod_list->getAllCategories();
        for($i=0;$i<2;$i++){
                $link = "href=category.php?category=";
                $link .= $cat_list[$i];
                echo '<a ' . $link .'>' . $cat_list[$i] . '</a>';
                echo "<br>";
        }
    ?>

    <a href="pagGamesPrince1.html">PoW</a>

</body>
</html>
