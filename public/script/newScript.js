console.log('test');
const actionAdd = '/?action=addProduct&id=';
const actionDelete = '/?action=deleteProduct&id=';
const actionDeleteAll = '/?action=deleteProductAll';

const buttonAddProduct = document.querySelectorAll('.button-js');
const buttonDelete = document.querySelectorAll('.user-cart__proposal');
const buttonDeleteAll = document.querySelector('.delete_all');
const headerCart = document.querySelector('.header-cart__js');

const requestServer = async (address, idProduct = '') => {
    const response = await fetch(address + idProduct);
    return await response.json();
}

const changingStyles = (countProduct) => {
    if (countProduct > 0 && headerCart.classList.contains('inactive')) {
        headerCart.classList.remove('inactive')
        headerCart.classList.add('header-cart__counter')
    }
    if (countProduct === 0 && headerCart.classList.contains('header-cart__counter')) {
        headerCart.classList.remove('header-cart__counter')
        headerCart.classList.add('inactive')
    }
}

const renderCart = (countProduct, subTotal = 0) => {
    headerCart.innerText = countProduct;
    if (document.querySelector('.execution__item')) {
        document.querySelector('.execution__subtitle_pl-20').innerText = subTotal;
        document.querySelector('.execution__title_color').innerText = subTotal;
    }
}

const renderProductCard = (productCard, quantity) => {
    if (quantity === 0) {
        productCard.parentNode.removeChild(productCard)
    }
    productCard.querySelector('.user-cart__proposal-text_border').innerText = quantity
}

buttonAddProduct.forEach((elem) => {
    elem.addEventListener('click', () => {
        let idProduct = elem.getAttribute('data-id');
        requestServer(actionAdd, idProduct)
            .then(answer => {
                changingStyles(+answer.countProduct);
                renderCart(+answer.countProduct);
            });
    })
})

buttonDelete.forEach((elem) => {
    elem.addEventListener('click', onrejected => {
        let idProduct = elem.getAttribute('data-id');
        requestServer(actionDelete, idProduct)
            .then(answer => {
                changingStyles(+answer.countProduct);
                renderCart(+answer.countProduct, +answer.subTotal);
                renderProductCard(elem, +answer.quantity)
            })
            .catch(renderCart(0, 0), changingStyles(0));
    })
})
if(buttonDeleteAll){
    buttonDeleteAll.addEventListener('click', () => {
        document.querySelector('.user-cart_js').innerText = '';
        requestServer(actionDeleteAll).then();
        changingStyles(0);
        renderCart(0, 0);
    })
}
