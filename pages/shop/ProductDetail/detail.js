if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}


function ready() {
    const productDetailObject = JSON.parse(localStorage.getItem('productDetail'));
    const productName = productDetailObject.productName;
    const productPrice = productDetailObject.productPrice;
    const imgSrc = '../' + productDetailObject.imgSrc;

    document.getElementById('name').innerHTML = productName;
    document.getElementById('price').innerHTML = productPrice;
    document.getElementById('img').setAttribute('src', imgSrc);
}

function addtoCart() {
    const imgSrc = document.getElementById('img').getAttribute('src').substring(3);
    const productName = document.getElementById('name').innerHTML;
    const productPrice = document.getElementById('price').innerHTML;
    const quantity = document.getElementById('quantity').value;

    if (quantity <= 0) {
        quantity = 1;
    }

    const cartItemObject = {
        imgSrc,
        productName,
        productPrice,
        quantity,
    }

    localStorage.setItem('cartItem', JSON.stringify(cartItemObject))
    window.location.href='../../cart/cart.html';
}