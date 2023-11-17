let btn_add_pr = document.querySelectorAll('.add_product');
let cart_number = document.getElementById('cart_number');
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
for (let i = 0; i < btn_add_pr.length; i++) {
    btn_add_pr[i].addEventListener('click', function () {
        let img_product = document.querySelectorAll('.img_product');
        let name_product = document.querySelectorAll('.name_product');
        let init_price = document.querySelectorAll('.init_price');
        let id_product = document.querySelectorAll('.id_product');
        let oj = {
            id_pr: id_product[i].value,
            name: name_product[i].textContent,
            img: img_product[i].src,
            price: init_price[i].textContent,
            quannity: 1
        };
        let check = true;
        arrCart.forEach(item => {
            if (item.id_pr == oj.id_pr) {
                item.quannity++;
                localStorage.setItem('toCart', JSON.stringify(arrCart));
                check = false;
            }
        });
        if (check) {
            arrCart.push(oj);
            localStorage.setItem('toCart', JSON.stringify(arrCart));
            cart_number.textContent = arrCart.length
        }

    });
}


function renderCart() {
    let html = '';
    let showCart = document.getElementById('showCart');
    arrCart.forEach(e => {
        let price_item = Number(e.quannity) * Number(e.price);
        console.log(price_item);
        html += `
        <tr>
                            <td><img src="${e.img}" alt=""></td>
                            <td class="product-info">
                            <input type="text" class="id_product" value="${e.id_pr}" hidden>
                                <p class="product_name">${e.name}</p>
                                <span class="color-product">Màu: Đỏ</span>
                                <span class="size-product">Size: XL</span>
                            </td>
                            <td>-100.000 VNĐ</td>
                            <td class="product-quantity">
                                <span class="btn_minus"><i class="fa-solid fa-minus"></i></span>
                                <span class="quantity_value">${e.quannity}</span>
                                <span class=" btn_plus"><i class="fa-solid fa-plus"></i></span>
                            </td>
                            <td class="total-price">${price_item} VNĐ</td>
                            <td><a href="" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này ra khỏi giỏ hàng ?')" class="delCart"><i class=" fa-regular fa-trash-can trash-icon"></i></a></td>
                        </tr>
        `;
        showCart.innerHTML = html;
    });
}
renderCart();


//nút bấm tăng giảm số lượng số lượng sản phẩm
var btn_plus = document.querySelectorAll('.btn_plus');
var btn_minus = document.querySelectorAll('.btn_minus');
//xóa cart
var del_cart = document.querySelectorAll('.delCart');

for (let i = 0; i < btn_plus.length; i++) {
    btn_plus[i].addEventListener('click', function () {
        plusQuannity(i);
    })
    btn_minus[i].addEventListener('click', function () {
        minusQuannity(i);
    });
    del_cart[i].addEventListener('click', function () {
        delCart(i);
    })
}

// tăng sô lượng trong giỏ hàng
function plusQuannity(i) {
    let quantity_value = document.querySelectorAll('.quantity_value');
    let id_product = document.querySelectorAll('.id_product');
    let value = quantity_value[i].textContent;
    let id = id_product[i].value;
    value++
    quantity_value[i].textContent = value;
    
    arrCart.forEach(e =>{
        if(e.id_pr == id){
            e.quannity++
            localStorage.setItem('toCart', JSON.stringify(arrCart));
        }
    })

}
// giảm số lượng tong giỏ hàng
function minusQuannity(i) {
    let quantity_value = document.querySelectorAll('.quantity_value');
    let id_product = document.querySelectorAll('.id_product');
    let value = quantity_value[i].textContent;
    let id = id_product[i].value;
    value--
    quantity_value[i].textContent = value;
    
    arrCart.forEach(e =>{
        if(e.id_pr == id){
            e.quannity--
            localStorage.setItem('toCart', JSON.stringify(arrCart));
        }
    })
}
function delCart (i) {  
    let id_product = document.querySelectorAll('.id_product');
    arrCart.forEach((e,index) =>{
        if(e.id_pr == id_product[i].value){
arrCart.splice(index,1);
localStorage.setItem('toCart', JSON.stringify(arrCart));
cart_number.textContent = arrCart.length
        }
    })
}

