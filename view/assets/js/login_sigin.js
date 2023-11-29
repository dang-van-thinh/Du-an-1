
  var rpw = document.getElementById('rpw');
  rpw.addEventListener('input',function(){
    let pw = document.getElementById('pw').value;
    if(rpw.value != pw){
        rpw.style.border = '2px solid red';
    }else{
        rpw.style.border = 'none'
    }
  });
  function check_sigin() {
    let check = true;
    let email = document.getElementById('email');
    let name_user = document.getElementById('name_user');
    let pw = document.getElementById('pw');
    let rpw = document.getElementById('rpw');
    let number_phone = document.getElementById('number_phone');
    // check email
    if(email.value == ''){
        email.style.border = '2px solid red';
        check = false;
        email.setAttribute('placeholder','Không được để trống Email');
    }else{
        email.style.border = 'none';
        check = true;
    } 
// check name_user
    if(name_user.value == ''){
        name_user.style.border = '2px solid red';
        name_user.setAttribute('placeholder','Không được để trống Tên người dùng');
        check = false;
    }else{
        name_user.style.border = 'none';
        check = true;
    } 
    // check password
    if(pw.value == ''){
        pw.style.border = '2px solid red';
        pw.setAttribute('placeholder','Không được để trống Password');
        check = false;
    }else{
        pw.style.border = 'none';
        check = true;
    }
    if(rpw.value == ''){
        rpw.style.border = '2px solid red';
        rpw.setAttribute('placeholder','Không được để trống Enter password');
        check = false;
    }else{
        rpw.style.border = 'none';
        check = true;
    }
// check number_phone
    let value_number_phone = number_phone.value;
    if(value_number_phone != ''){
        if(value_number_phone.length < 10 ||value_number_phone.length >10){
            number_phone.style.border = '2px solid red';
            alert('Số điện thoại không đúng !');
            check = false;
        }else{
            number_phone.style.border = 'none';
            check = true
        }
    }else{
        number_phone.style.border = '2px solid red';
        number_phone.setAttribute('placeholder','Không được để trống Số điện thoại');
        check = false;
    }
return check;
    }

    function check_login(){
        let check = true;
        let email = document.getElementById('email');
        let pw = document.getElementById('password');
        if(email.value == ''){ 
            email.style.border = '2px solid red';
            check = false;
            email.setAttribute('placeholder','Không được để trống Email')
        }else{
            email.style.border = 'none';
            check= true;
        }

        //password
        if(pw.value == ''){ 
            pw.style.border = '2px solid red';
            check = false;
            pw.setAttribute('placeholder','Không được để trống Password')
        }else{
            pw.style.border = 'none';
            check= true;
        }
return check;
    }
