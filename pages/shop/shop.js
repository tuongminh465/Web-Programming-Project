function getProductInfo(id) {
    let productName = document.getElementsByClassName('product-name')[id].innerHTML;
    let productPrice = document.getElementsByClassName('product-price')[id].innerHTML;
    let imgSrc = document.getElementsByClassName('product-img')[id].getAttribute('src');
    localStorage.removeItem('productDetail');
    const productDetailObject = {
        productName,
        productPrice: productPrice,
        imgSrc,
    }
    localStorage.setItem('productDetail', JSON.stringify(productDetailObject))
    window.location.href='./ProductDetail/detail.php';
}