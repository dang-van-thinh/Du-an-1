$(document).ready(function () {

    // ẩn hiện nút thêm giỏ hàng và mua hàng
$('.product_item').hover(function (e) {
        $(this).find('.btn_buy').toggle(200)
    }
);
});