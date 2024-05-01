
    const count_field = document.querySelector('input[name="count_field"]');
    const count_btn = document.querySelector('#count_btn');

    const count_academ = document.querySelector('#academ');
    const count_social = document.querySelector('#social');
    const count_needhelp = document.querySelector('#needhelp');
    const count_upacadem = document.querySelector('#upacadem');
    const count_upsocial = document.querySelector('#upsocial');
    const count_military = document.querySelector('#military');
    const count_namestep = document.querySelector('#namestep');
    const count_president = document.querySelector('#president');

    const january = document.querySelector('#january');
    const february_june = document.querySelector('#february_june');
    const july = document.querySelector('#july');
    const august = document.querySelector('#august');
    const september = document.querySelector('#september');
    const october = document.querySelector('#october');
    const november = document.querySelector('#november');
    const december = document.querySelector('#december');

    let all_procents = document.querySelectorAll('#procent');
 
    all_procents.forEach((procent) => procent.style.visibility = "hidden");

   
    function count_fond(){
        if (count_field.value.length == 0){
            alert('Сумма не заполнена');
        } else{
        const total_sum = count_field.value;

        count_academ.textContent = Math.ceil(total_sum * 0.4);
        count_social.textContent = Math.ceil(total_sum * 0.2);
        count_needhelp.textContent = Math.ceil(total_sum * 0.1);
        count_upacadem.textContent = Math.ceil(total_sum * 0.1);
        count_upsocial.textContent = Math.ceil(total_sum * 0.08);
        count_military.textContent = Math.ceil(total_sum * 0.04);
        count_namestep.textContent = Math.ceil(total_sum * 0.04);
        count_president.textContent = Math.ceil(total_sum * 0.04);

        january.textContent =  Math.ceil(total_sum * 0.065);
        february_june.textContent =  Math.ceil(total_sum * 0.061);
        july.textContent =  Math.ceil(total_sum * 0.053);
        august.textContent =  Math.ceil(total_sum * 0.058);
        september.textContent =  Math.ceil(total_sum * 0.066);
        october.textContent =  Math.ceil(total_sum * 0.07);
        november.textContent =  Math.ceil(total_sum * 0.073);
        december.textContent =  Math.ceil(total_sum * 0.087);
        
        all_procents.forEach((procent) => procent.style.visibility = "visible");
        }


    }

  
   
 