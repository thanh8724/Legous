let form_address = document.querySelector('.form__address--container');
let form_hidden = true;
form_address.style.opacity = '0';
form_address.style.visibility = 'hidden';

function show_hidden() {
    console.log('this is add address');
    if(form_hidden) {
        form_address.style.opacity = '1';
        form_address.style.visibility = 'visible';
        form_hidden = false;
    }else {
        form_address.style.opacity = '0';
        form_address.style.visibility = 'hidden';
        form_hidden = true;
    }
}