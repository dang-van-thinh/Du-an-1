// thêm ô input color
document.getElementById('add_color').addEventListener('click', function () {
    add_color();
});
function add_color () {
    let showColor = document.getElementById('show_color');
console.log('hiiii');
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

    // Thêm input vào div
    colorDiv.appendChild(nameInput);
    colorDiv.appendChild(valueInput);

    // Thêm div mới vào show_color
    showColor.appendChild(colorDiv);
  }
