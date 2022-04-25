if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {

    checkNewItem() 

    let removeButton = document.getElementsByClassName('remove');
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

function checkNewItem() {
    const cartItem = JSON.parse(localStorage.getItem('cartItem'));
    //create table row
    const tr = document.createElement('tr');
    tr.classList.add('cart-item');
    //create remove button cell
    const button = document.createElement('button');
    button.classList.add('remove');
    const icon = document.createElement('i');
    icon.classList.add("fas");
    icon.classList.add("fa-ban");
    const removeCell = document.createElement('td');
    removeCell.append(button.append(icon));
    //create img cell
    const img = document.createElement('img');
    img.setAttribute('src', cartItem.imgSrc);
    const imageCell = document.createElement('td');
    imageCell.append(img);
    //create name cell
    const nameCell = document.createElement('td');
    nameCell.innerHTML = cartItem.productName;
    //create price cell
    const priceCell = document.createElement('td');
    priceCell.classList.add('item-price');
    priceCell.innerHTML = cartItem.productPrice;
    //create quantity cell
    const input = document.createElement('input');
    input.classList.add('item-quantity');
    input.setAttribute('type', 'number');
    input.setAttribute('min', '1');
    input.setAttribute('value', cartItem.quantity);
    const inputCell = document.createElement('td')
    inputCell.append(input);
    //create total cell
    const totalCell = document.createElement('td');
    totalCell.innerHTML = cartItem.productPrice * cartItem.quantity;
    //append all cell to table row
    tr.append(removeCell);
    tr.append(imageCell);
    tr.append(nameCell);
    tr.append(priceCell);
    tr.append(inputCell);
    tr.append(totalCell);
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