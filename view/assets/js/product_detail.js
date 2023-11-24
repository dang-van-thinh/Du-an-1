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