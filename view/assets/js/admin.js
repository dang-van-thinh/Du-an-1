let check_all = document.querySelector('#checkAll')

check_all.addEventListener('click', function (param) {
    let check_box = document.querySelectorAll('.item_checkbox');

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
let selectAll = document.querySelector('#selectAll');
selectAll.addEventListener('click', function (param) {
    let check_box = document.querySelectorAll('.item_checkbox');
    for (let i = 0; i < check_box.length; i++) {
        check_box[i].checked = true
    }

});
// bỏ chọn tất cả
let unSelectAll = document.querySelector('#unSelectAll');
unSelectAll.addEventListener('click', function (param) {
    let check_box = document.querySelectorAll('.item_checkbox');
    for (let i = 0; i < check_box.length; i++) {
        check_box[i].checked = false
    }

});

// xóa tât cả theo lựa chọn

let delSelect = document.querySelector('#delSelect');
delSelect.addEventListener('click',function (param) { 
    let item_checked = document.querySelectorAll('input[name=check_sp]:checked');
    for (let i = 0; i < item_checked.length; i++) {
        if(item_checked[i]){
            console.log(item_checked[i].parentNode);
            // chưa xong
        }
    }
 })



  
