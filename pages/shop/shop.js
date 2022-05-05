function getProductInfo(id) {
    let productName = document.getElementsByClassName('product-name')[id].innerHTML;
    let productPrice = document.getElementsByClassName('product-price')[id].innerHTML;
    let imgSrc = document.getElementsByClassName('product-img')[id].getAttribute('src');

    const productDetailObject = {
        productName,
        productPrice: productPrice,
        imgSrc,
    }
    localStorage.setItem('productDetail', JSON.stringify(productDetailObject))
    window.location.href='./ProductDetail/detail.php';
}

function getSession(location) {
    const req =  new XMLHttpRequest();
    req.open("GET", "../login/session-update.php");
    req.send();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(req.responseText === ''){
                window.alert("You must be logged in to use this function!");
            }
            else {
                window.location.href=location;
            }
        }
    }
};