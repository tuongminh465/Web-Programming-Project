if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {
    let removeButton = document.getElementsByClassName('remove');
    console.log(removeButton);
    for (let i = 0; i < removeButton.length; i++) {
        let button = removeButton[i];
        button.addEventListener('click', removeCartItem);
    }

    let quantityInput = document.getElementsByClassName('item-quantity');
    for (let i = 0; i < removeButton.length; i++) {
        let input = quantityInput[i];
        input.addEventListener('input', quantityChange);
    }
}   

function quantityChange(event) {
    let input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        console.log('oh no')
    }
    updateCartTotal();
}

function removeCartItem(event) {
    let buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateCartTotal();
}

function updateCartTotal() {
    let cartItemContainer = document.getElementsByClassName('items-container')[0]
    let cartItems = cartItemContainer.getElementsByClassName('cart-item');
    let total = 0;
    for (let i = 0; i < cartItems.length; i++){
        let cartItem = cartItems[i];
        let priceElement = cartItem.getElementsByClassName('item-price')[0];
        let quantityElement = cartItem.getElementsByClassName('item-quantity')[0];
        let price = parseFloat(priceElement.innerHTML.replace('$', ''));
        let quantity = quantityElement.value;
        total = total + (price * quantity);
    }
    total = Math.round(total * 100)/100;
    document.getElementsByClassName('cart-total')[0].innerHTML = '$' + total;
    document.getElementsByClassName('total-payment')[0].innerHTML = '$' + total;
}