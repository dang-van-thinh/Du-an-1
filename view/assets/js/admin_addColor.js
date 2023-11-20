// thêm ô input color
document.getElementById('add_color').addEventListener('click', function () {
    add_color();
});
function add_color() {
    let showColor = document.getElementById('show_color');
    // console.log('hiiii');
    // Tạo một div mới để chứa mỗi lần thêm màu
    let colorDiv = document.createElement('div');
    colorDiv.classList.add('input-group');

    // Tạo input cho tên màu
    let nameInput = document.createElement('input');
    nameInput.type = 'text';
    nameInput.name = 'name_color[]';
    nameInput.placeholder = 'Tên màu';

    // Tạo input cho giá trị màu
    let valueInput = document.createElement('input');
    valueInput.type = 'color';
    valueInput.name = 'value_color[]';

    // Tạo phần tử button để xóa
    let deleteButton = document.createElement('button');
    deleteButton.textContent = 'Xóa';
    deleteButton.addEventListener('click', function () {
        // Xóa div chứa phần tử đang được nhấn nút xóa
        showColor.removeChild(colorDiv);
    });

    // Thêm input và button vào div
    colorDiv.appendChild(nameInput);
    colorDiv.appendChild(valueInput);
    colorDiv.appendChild(deleteButton);

    // // Thêm input vào div
    // colorDiv.appendChild(nameInput);
    // colorDiv.appendChild(valueInput);

    // Thêm div mới vào show_color
    showColor.appendChild(colorDiv);
}
let del_color = document.querySelectorAll('.del_color');
for (let i = 0; i < del_color.length; i++) {
    del_color[i].addEventListener('click', function (e) {
        e.preventDefault()
        let show_color = document.getElementById('show_color')
        let group_color = document.querySelectorAll('.group_color')
        show_color.removeChild(group_color[i])
        console.log(i);
    })
}
