document.addEventListener('DOMContentLoaded',function(){

document.getElementById('checkAll').addEventListener('click', function () {
    let check_box = document.querySelectorAll('.item_checkbox');
let check_all = document.getElementById('checkAll');
    if (check_all.checked == true) {
        for (let i = 0; i < check_box.length; i++) {
            check_box[i].checked = true
        }
    } else {
        for (let i = 0; i < check_box.length; i++) {
            check_box[i].checked = false
        }
    }
})
// chọn tất cả
document.getElementById('selectAll').addEventListener('click', function () {
    let check_box = document.querySelectorAll('.item_checkbox');
    for (let i = 0; i < check_box.length; i++) {
        check_box[i].checked = true
    }

});
// bỏ chọn tất cả
document.getElementById('unSelectAll')
unSelectAll.addEventListener('click', function () {
    let check_box = document.querySelectorAll('.item_checkbox');
    for (let i = 0; i < check_box.length; i++) {
        check_box[i].checked = false
    }

});

// xóa tât cả theo lựa chọn

document.querySelector('#delSelect').addEventListener('click',function () { 
    let item_checked = document.querySelectorAll('input[name=check_sp]:checked');
    for (let i = 0; i < item_checked.length; i++) {
        if(item_checked[i]){
            console.log(item_checked[i].parentNode);
            // chưa xong
        }
    }
 })


  
})