if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
}
else {
    ready();
}

function ready() {
    
    let cartItem = JSON.parse(localStorage.getItem('cartItem'));
    let productNameCell = document.getElementsByClassName("product-name")
    let inCart = false;
    if (localStorage.getItem("cartItem") !== '') {
        for (let i = 0; i < productNameCell.length; i++) {
            let productName = productNameCell[i].innerHTML;
            if (productName === cartItem.productName) {
                inCart = true;
            }
        } 
        if (inCart === false) {
            addNewItem();
        }
    }

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

function addNewItem() {
    const cartItem = JSON.parse(localStorage.getItem('cartItem'));
    //create table row
    let tr = document.createElement('tr');
    let tbody = document.getElementsByClassName('items-container')[0];
    tbody.appendChild(tr);
    tr.classList.add('cart-item');
    //create remove button cell
    const button = document.createElement('button');
    button.classList.add('remove');
    button.innerHTML = "Remove";
    button.addEventListener('click', removeCartItem);
    const removeCell = document.createElement('td');
    removeCell.append(button);
    tr.append(removeCell);
    //create img cell
    let img = document.createElement('img');
    img.setAttribute('src', cartItem.imgSrc);
    let imageCell = document.createElement('td');
    imageCell.append(img);
    tr.append(imageCell);
    //create name cell
    let nameCell = document.createElement('td');
    nameCell.innerHTML = cartItem.productName;
    tr.append(nameCell);
    //create price cell
    let priceCell = document.createElement('td');
    tr.append(priceCell);
    priceCell.classList.add('item-price');
    priceCell.innerHTML = cartItem.productPrice;
    //create quantity cell
    let input = document.createElement('input');
    input.classList.add('item-quantity');
    input.setAttribute('type', 'number');
    input.setAttribute('min', '1');
    input.setAttribute('value', cartItem.quantity);
    let inputCell = document.createElement('td')
    inputCell.append(input);
    tr.append(inputCell);

    updateCartTotal();
}

function quantityChange(event) {
    let input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 0;
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