function htmlBillCart () { 
    var storage = JSON.parse(localStorage.getItem('toCart'));
    console.log(storage);
    if (storage == null) {
        var arrCart = [];
       
    } else {
        var arrCart = [];
        arrCart = storage;
    }
    let htmlProduct = document.getElementById('total_product');
    let totall_price_product = document.getElementById('totall_price_product');
    let price_final =document.getElementById('price_final');

    let totalProduct = 0;
    let priceTotall= 0;
    arrCart.forEach((item,index) => {
        totalProduct += Number(item.quannity);
        priceTotall += Number(item.quannity) * Number(item.price);
    });
    htmlProduct.textContent = totalProduct;
    totall_price_product.textContent = priceTotall;
    price_final.textContent = priceTotall;
    console.log(totalProduct);
 }
 htmlBillCart();

 function check_order(){ 
    let email_order = document.getElementById('email_order');
    let address_order = document.getElementById('address_order');
    let number_phone_order = document.getElementById('number_phone_order');
    let user_name_order = document.getElementById('user_name_order');
let check = true;
    if(user_name_order.value == ""){
        user_name_order.style.border = '2px solid red';
        check =  false;
    }else{
        user_name_order.style.border = 'none';
        check = true;
    }
// check validate address

if(address_order.value == ""){ 
    address_order.style.border = '2px solid red';
    check = false;
}else {
    address_order.style.border = 'none';
    check = true;
}

if(email_order.value == ""){ 
    email_order.style.border = '2px solid red';
    check = false;
}else {
    email_order.style.border = 'none';
    check = true;
}

if(number_phone_order.value == ""){ 
    number_phone_order.style.border = '2px solid red';
    check = false;
}else {
    number_phone_order.style.border = 'none';
    check = true;
}
return check;
 }