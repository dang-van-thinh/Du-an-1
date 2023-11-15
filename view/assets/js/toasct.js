document.addEventListener('DOMContentLoaded',function(){
     // toasct
 let toasct_custom = document.querySelector('#toasct');
 toasct_custom.addEventListener('click',function () {
    toasct_custom.classList.add('toasct_active');
    toasct_custom.style = 'z-index= 999';
   })

})