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
document.querySelector('#hoan_thanh').addEventListener('submit',function (e) { 
    let name_user = document.getElementById('name_user');
if(name_user.value == ''){
    
    name_user.style.border = '2px solid red'
    e.preventDefault();
}else{
    name_user.style.border = '2px solid green'
}
 })