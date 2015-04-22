<?php
        require_once("scripts/getProduct.php");
        if(!isset($_GET["category"])){
                header("Location: home.php");
        }
        $category = $_GET["category"];
        if(!ProductList::isValidCategory($category)){
                header("Location: home.php");
        }
        $product_list = new ProductList();
        $cat_list = $product_list->getProductListByCategory($category);
        function formatPrice($value){
                return "R$ " . number_format($value, 2, ',', '.');
        }
?>

<html>

<head>
         <title> BroBathShop - <?= $category ?> </title>

         <style>
                .prod_box{
                        float:left;
                        border:1px solid #888;
                        padding: 5px;
                        margin: 5px;
                        width: 300px;
                        height: 300px;
                }
                .prod_box img{
                        margin-left: 50px;
                }
                .prod_box:hover{
                        background-color: #eee;
                }
         </style>
</head>

<body>
    <!-- Inicializa Data Layer -->
    <script>
    <?php
        include("scripts/data_layer.php");
        $data_layer = new DataLayer("categ");
        $data_layer->addInfo("categoryTitle", $category);
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


    <h2>Categoria: <?= $category ?></h2>

    <?php for($i=0;$i<sizeof($cat_list);$i++): ?>
    <div class="prod_box" onclick="window.location.href='product.php?sku=<?=$cat_list[$i]['sku']?>'">
            <img src="<?=$cat_list[$i]['img_link']?>" alt="<?=$cat_list[$i]['title']?>" height = "200" width="200">
            <h3><?=$cat_list[$i]['title']?></h3>
            <h2>Pre&ccedil;o: <?=formatPrice($cat_list[$i]['sale_price'])?></h2>

    </div>

    <?php endfor;?>

</body>

</html>
