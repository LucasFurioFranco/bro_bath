<?php

class ProductList{

        private $product_list;

        public function __construct(){
                $this->product_list = new Product();
        }

        public function getProductListByCategory($cat){ //Envia um array de informações
                $ret_list = array();
                for($i=1;$i<=5;$i++){
                        if($this->product_list->selectBySKU($i)['category'] == $cat){
                                $ret_list[] = $this->product_list->selectBySKU($i);
                        }
                }
                return $ret_list;
        }

        public static function isValidCategory($category){
                $all_cat = ProductList::getAllCategories();
                for($i=0;$i<sizeof($all_cat);$i++){
                        if($all_cat[$i]==$category){
                                return true;
                        }
                }
                return false;
        }

        public static function getAllCategories(){
                $all_cat[] = "Higiene";
                $all_cat[] = "Outros";
                return $all_cat;
        }

        public function isValidSKU($sku){
                if($sku>=1 && $sku <=5){
                        return true;
                }
                return false;
        }

        public function getProductBySKU($sku){
                return $this->product_list->selectBySKU($sku);
        }
}


class Product{
        private $sku;
        private $product_info;

        public function __construct(){

        }

        public function getProductInfo(){
                return $this->product_info;
        }

        public function selectBySKU($sku){
                if($sku == 1){
                        $this->product_info['title'] = "Sabonete \"Dove Fresh\"";
                        $this->product_info['sku'] = "1";
                        $this->product_info['category'] = "Higiene";
                        $this->product_info['availability'] = true;
                        $this->product_info['prod_price'] = 1.70;
                        $this->product_info['sale_price'] = 1.55;
                        $this->product_info['img_link'] = "img/saboneteDove.jpg";
                }
                else if($sku == 2){
                        $this->product_info['title'] = "Creme Dental sabor 'Bacon'";
                        $this->product_info['sku'] = "2";
                        $this->product_info['category'] = "Higiene";
                        $this->product_info['availability'] = false;
                        $this->product_info['prod_price'] = 2.50;
                        $this->product_info['sale_price'] = 2.50;
                        $this->product_info['img_link'] = "img/cremeDental.jpg";
                }
                else if($sku == 3){
                        $this->product_info['title'] = "Shampoo Dove Anti Caspa Man";
                        $this->product_info['sku'] = "3";
                        $this->product_info['category'] = "Higiene";
                        $this->product_info['availability'] = true;
                        $this->product_info['prod_price'] = 9.30;
                        $this->product_info['sale_price'] = 9.30;
                        $this->product_info['img_link'] = "img/shampooDove.jpg";
                }
                else if($sku == 4){
                        $this->product_info['title'] = "Aromatizador de Privada";
                        $this->product_info['sku'] = "4";
                        $this->product_info['category'] = "Outros";
                        $this->product_info['availability'] = true;
                        $this->product_info['prod_price'] = 5.20;
                        $this->product_info['sale_price'] = 4.50;
                        $this->product_info['img_link'] = "img/aromatizadorPrivada.jpg";
                }
                else if($sku == 5){
                        $this->product_info['title'] = "Limpador de Privada";
                        $this->product_info['sku'] = "5";
                        $this->product_info['category'] = "Outros";
                        $this->product_info['availability'] = true;
                        $this->product_info['prod_price'] = 13.00;
                        $this->product_info['sale_price'] = 13.00;
                        $this->product_info['img_link'] = "img/limpaPrivada.jpg";
                }
                return $this->product_info;
        }

        public function getProduct(){
                return $product_info;
        }
}

?>
