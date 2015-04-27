function deleteCookie(product_list) {
    var d = new Date();
    d.setTime(d.getTime() - 1000);
    var expires = "expires=" + d.toGMTString();
    document.cookie = "brobath_cart_cookie=;"+expires;
}

function getCookie() {
    var name = "brobath_cart_cookie=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function getCookieProductList(){
    var cookie_cart_products = getCookie();
    var product_list = getCookie("brobath_cart_cookie").split('@');
    for(var i=0; i<product_list.length;i++){
        product_list[i] = product_list[i].split('-');
    }
    return product_list;
}

function addProductToCart(){
    var sku = getUrlSku();
    var product_list = getCookieProductList();
    var i=0;
    while(i<product_list.length && product_list[i][0] != sku){
        i++;
    }
    if(i<product_list.length){
        product_list[i][1]++;
    }
    else{
        var prod = [sku, 1];
        product_list[i-1] = prod;
    }
    setCookie(product_list);
}
