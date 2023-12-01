

var btn_add_cart = document.querySelector('#btn_add_cart');
var cart_number = document.getElementById('cart_number');
var storage = JSON.parse(localStorage.getItem('toCart'));
console.log(storage);
if (storage == null) {
    var arrCart = [];
    cart_number.textContent = arrCart.length
} else {
    var arrCart = [];
    arrCart = storage;
    cart_number.textContent = arrCart.length
}
// check validate add cart
function check_add_cart() {
    let color = document.querySelector('input[name=color]:checked');
    let size_checked = document.querySelector('input[name=size]:checked');
    let size = document.querySelector('input[name=size]');
    if(size != undefined){
        if(size_checked == null || color == null){
            alert('Bạn chưa chọn màu hoặc size !');
        }
    }else{
        if(color  == null){
            alert('Bạn chưa chọn màu !');
        }
    }
    
    
  }


btn_add_cart.addEventListener('click', function () {
    check_add_cart();
    let img_product = document.querySelector('#img_product');
    let name_product = document.querySelector('.name_product');
    let init_price = document.querySelector('#init_price');
    let id_product = document.querySelector('#id_product');
    let color = document.querySelector('input[name=color]:checked');
    let size = document.querySelector('input[name=size]:checked');
    
    let start_price = document.querySelector('#start_price');
    let checkSize = document.querySelector('input[name=size]');
    let quantity_value = document.querySelector('#quantity_value');

    let check = true;
    let size_sp = 0;

    if (checkSize != null) {
        size_sp = size.value;
    }
    
  

    // check trùng lặp trong giỏ hàng
    if (arrCart.length > 0) {
        arrCart.forEach(item => {
            if (item.id_pr == id_product.value) {
                if(item.size == size.value && item.color == color.value) {
                    item.quannity = Number(item.quannity) + Number(quantity_value.textContent);
                    localStorage.setItem('toCart', JSON.stringify(arrCart));
                    check = false;
                } else {
                    check = true;
                }
            }
        });
    }

    let oj = {
        id_pr: id_product.value,
        name: name_product.textContent,
        img: img_product.src,
        s_price: start_price.textContent,
        price: init_price.textContent,
        color: color.value,
        size: size_sp,
        quannity: quantity_value.textContent
    };


    if (check) {
        arrCart.push(oj);
        localStorage.setItem('toCart', JSON.stringify(arrCart));
        cart_number.textContent = arrCart.length
    }

});


// product detail;
// tăng số lượng
document.querySelector('.btn_plus').addEventListener('click', function () {
    tangSL()
})
document.querySelector('.btn_minus').addEventListener('click', function () {
    giamSL();
})
function tangSL() {
    var quantity_value = document.getElementById('quantity_value');
    var value = quantity_value.textContent;
    value++
    quantity_value.textContent = value;
}
function giamSL() {
    let quantity_value = document.getElementById('quantity_value');
    let value = quantity_value.textContent;
    if (value > 0) {
        value--
        quantity_value.textContent = value;
    }

}
