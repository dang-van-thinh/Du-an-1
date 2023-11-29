var cart_number = document.getElementById('cart_number');
if (cart_number.textContent == 0) {
    let btn_dat_hang = document.querySelector('input[name=dat_hang]');
    btn_dat_hang.style.display = 'none';
}
function renderCart() {
    var storage = JSON.parse(localStorage.getItem('toCart'));
    // console.log(storage);
    if (storage == null) {
        var arrCart = [];

    } else {
        var arrCart = [];
        arrCart = storage;
    }
    let html = '';
    let showCart = document.getElementById('showCart');
    arrCart.forEach(e => {
        let price_item = Number(e.quannity) * Number(e.price);
        // console.log(price_item);
        console.log(e.s_price);
        console.log(e.price);
        let discountPrice = Number(e.s_price) - Number(e.price);
        html += `
        <tr>
                            <td><img src="${e.img}" alt=""></td>
                            <td class="product-info">
                            <input type="text" class="id_product" value="${e.id_pr}" hidden>
                                <p class="product_name">${e.name}</p>
                                <span>Màu:</span> <span class="color-product"> ${e.color}</span>
                              <span>Size:</span>  <span class="size-product"> ${e.size}</span>
                            </td>
                            <td>-${discountPrice} VNĐ</td>
                            <td class="product-quantity">
                                <span class="btn_minus"><i class="fa-solid fa-minus"></i></span>
                                <span class="quantity_value">${e.quannity}</span>
                                <span class=" btn_plus"><i class="fa-solid fa-plus"></i></span>
                            </td>
                            <td> 
                            <span class="total-price">${price_item} </span> <u>VNĐ</u>
                            </td>
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

for (let i = 0; i < del_cart.length; i++) {
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

    let total_price = document.querySelectorAll('.total-price');
    let update_price = 0;

   
    value++
    quantity_value[i].textContent = value;

    arrCart.forEach((e, index) => {
        if (e.id_pr == id && index == i) {
            e.quannity++
            localStorage.setItem('toCart', JSON.stringify(arrCart));
            update_price = Number(e.quannity) * Number(e.price);
        }
    })

    total_price[i].textContent = update_price;
    htmlBillCart()
}
// giảm số lượng tong giỏ hàng
function minusQuannity(i) {
    let quantity_value = document.querySelectorAll('.quantity_value');
    let id_product = document.querySelectorAll('.id_product');
    let value = quantity_value[i].textContent;
    let id = id_product[i].value;
    let total_price = document.querySelectorAll('.total-price');
    let update_price = 0;
    if (value > 1) {
        value--
        quantity_value[i].textContent = value;
        arrCart.forEach((e, index) => {
            if (e.id_pr == id && index == i) {
                e.quannity--
                localStorage.setItem('toCart', JSON.stringify(arrCart));
                update_price = Number(e.quannity) * Number(e.price);
            }
        });
        total_price[i].textContent = update_price;
    }
    htmlBillCart()

}
function delCart(i) {
    // let id_product = document.querySelectorAll('.id_product');
    // arrCart.forEach((e, index) => {
    arrCart.splice(i, 1);
    localStorage.setItem('toCart', JSON.stringify(arrCart));
    cart_number.textContent = arrCart.length



    // })
}
function htmlBillCart() {
    // var storage = JSON.parse(localStorage.getItem('toCart'));
    // // console.log(storage);
    // if (storage == null) {
    //     var arrCart = [];

    // } else {
    //     var arrCart = [];
    //     arrCart = storage;
    // }
    let htmlProduct = document.getElementById('total_product');
    let totall_price_product = document.getElementById('totall_price_product');
    let price_final = document.getElementById('price_final');

    let totalProduct = 0;
    let priceTotall = 0;
    arrCart.forEach((item, index) => {
        totalProduct += Number(item.quannity);
        priceTotall += Number(item.quannity) * Number(item.price);
    });
    htmlProduct.textContent = totalProduct;
    totall_price_product.textContent = priceTotall;
    price_final.textContent = priceTotall;
    // console.log(totalProduct);
}
htmlBillCart();


