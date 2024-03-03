const squareInput = document.querySelector('#square-input');
const squareRange = document.querySelector('#square-range');
const inputs = document.querySelectorAll('input');

//радиокнопки
const radioType = document.querySelectorAll('input[name="type"]');
const radioBuilding= document.querySelectorAll('input[name="building"]');

//чекбоксы
const academ= document.querySelector('input[name="academ"]');
const social= document.querySelector('input[name="social"]');
const upacadem= document.querySelector('input[name="upacadem"]');
const upsocial= document.querySelector('input[name="upsocial"]');
const military= document.querySelector('input[name="military"]');
const namestep= document.querySelector('input[name="namestep"]');
const president= document.querySelector('input[name="president"]');




const totalPriceElement = document.querySelector('#total-price')

//связка ползунка c квадратным полем
//слушаем событие инпут
squareRange.addEventListener('input', function(){
    squareInput.value = squareRange.value;
})


//привязываем квадратное поле к ползунку
squareInput.addEventListener('input', function(){
    squareRange.value = squareInput.value;
})

//пересчитываем итог
function calculate(){
    let totalPrice = parseInt(squareInput.value);
   
//смотрим какая форма обучения выбрана
    radioType.forEach((radio)=>{
        if (radio.checked){
            totalPrice += parseInt(radio.value);
           
        }
    }
);
//смотрим какие оценки
    radioBuilding.forEach((radio)=>{
        if (radio.checked){
            totalPrice += parseInt(radio.value);
           
        }
    }
);

// if (academ.checked){
//     totalPrice += parseInt(academ.value);
// }
if (social.checked){
    totalPrice += parseInt(social.value);
}
if (upacadem.checked){
    totalPrice += 11500;
}
if (upsocial.checked){
    totalPrice += 10500;
}
if (military.checked){
    totalPrice += 4400;
}
if (military.checked){
    totalPrice += 11875;
}
if (president.checked){
    totalPrice += 3000;
}



//форматируем итоговую сумму
    const formatter = new Intl.NumberFormat('ru');
    totalPriceElement.innerText =  formatter.format(totalPrice);
}
calculate()


//при каждом измении значения вызываем calculate 
inputs.forEach((element)=>
    element.addEventListener('input', function(){
        calculate()
    }

));