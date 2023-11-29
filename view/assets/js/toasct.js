document.addEventListener('DOMContentLoaded',function(){
     // toasct
 let toasct_custom = document.querySelector('#toasct');
 toasct_custom.addEventListener('click',function () {
    hiddenToasct()
   });

setTimeout(() => {
   hiddenToasct();
}, 5000);

   // hàm ẩn toasct
   function hiddenToasct() { 
      toasct_custom.classList.add('toasct_active');
      toasct_custom.style = 'z-index= 999';
    }
});
