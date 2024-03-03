let bakalavriatblocks = document.querySelectorAll('.bakalavriat');
let magistryblocks = document.querySelectorAll('.magistry');
let aspirantyrablocks = document.querySelectorAll('.aspirantyra');

let checkboxmagistry = document.getElementById("checkboxmagistry");
let checkboxbakalavriat = document.getElementById("checkboxbakalavriat");
let checkboxaspirantyra = document.getElementById("checkboxaspirantyra");


//показывать и скрывать номер курса для разной формы обучения
checkboxbakalavriat.onchange = function(){
    bakalavriatblocks.forEach(element => {
       if(element.style.display = this.checked) {
        element.style.display="block";
       }
       ;
    });
   
}

checkboxmagistry.onchange = function(){
    magistryblocks.forEach(element => {
        element.style.display = this.checked? "none" : "block";
    });
   
}
checkboxaspirantyra.onchange = function(){
    bakalavriatblocks.forEach(element => {
        if(element.style.display = this.checked) {
         element.style.display="block";
        }
        ;
    });
    aspirantyrablocks.forEach(element => {
        element.style.display = this.checked? "none" : "block";
    });
   
}

//проверка чтобы в студенческий номер вводились только цифры

let input = document.getElementById("inputIn");
input.addEventListener('keyup', e => {
  e.target.value = e.target.value.replace(/[^\d]/g, '');
});