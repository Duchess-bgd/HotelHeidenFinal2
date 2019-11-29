function clearRed(){
    let reds = document.querySelectorAll('.redErr');
    if(reds){
        for(let i=0; i<reds.length; i++)
            reds[i].classList.remove('redErr');
    }
}
function formValidate(){
    clearRed();
    let d1El = document.querySelector('input[name="d1"]');
    let d2El = document.querySelector('input[name="d2"]');
    let bgEl = document.querySelector('select[name="broj-gostiju"]');
    let d1 = new Date(d1El.value);
    let d2 = new Date(d2El.value);

    let ispravnaForma = true;
    if (isNaN(d1.getTime())) { 
        d1El.classList.add('redErr');
        ispravnaForma = false;
    }
    if (isNaN(d2.getTime())) { 
        d2El.classList.add('redErr');
        ispravnaForma = false;
    }
    if(d1 >= d2){
        d1El.classList.add('redErr');
        d2El.classList.add('redErr');
        ispravnaForma = false;
        alert("Please choose valid dates!")
    }
    let sad = new Date();
    if(d1 < sad){
        d1El.classList.add('redErr');
        ispravnaForma = false;
        alert("Please choose valid dates!")
    }
    let bg = bgEl.value;
    if(bg < 1){
        bgEl.classList.add('redErr');
        ispravnaForma = false;
    } 
    return ispravnaForma;
}
