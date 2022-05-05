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

function getSessionForCart() {
    const req =  new XMLHttpRequest();
    req.open("GET", "../../login/session-update.php");
    req.send();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(req.responseText === ''){
                window.alert("You must be logged in to use this function!");
            }
            else {
                addtoCart()
            }
        }
    }
};

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
    window.location.href='../../cart/cart.php';
}

function getSession() {
    const req =  new XMLHttpRequest();
    req.open("GET", "../../login/session-update.php");
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