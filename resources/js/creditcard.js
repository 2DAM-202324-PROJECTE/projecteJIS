document.getElementById("number").addEventListener("focus", (e) => {
    document.getElementById("card").classList.remove('flip')
    document.getElementById("highlight").className = 'highlight__number'
})

document.getElementById("holder").addEventListener("focus", (e) => {
    document.getElementById("card").classList.remove('flip')
    document.getElementById("highlight").className = 'highlight__holder'
})

document.getElementById("expiration_month").addEventListener("focus", (e) => {
    document.getElementById("card").classList.remove('flip')
    document.getElementById("highlight").className = 'highlight__expire'
})

document.getElementById("expiration_year").addEventListener("focus", (e) => {
    document.getElementById("card").classList.remove('flip')
    document.getElementById("highlight").className = 'highlight__expire'
})

document.getElementById("cvv").addEventListener("focus", (e) => {
    document.getElementById("card").classList.add('flip')
    document.getElementById("highlight").className = 'highlight__cvv'
})

document.getElementById("cvv").addEventListener("focusout", (e) => {
    document.getElementById("card").classList.remove('flip')
    document.getElementById("highlight").className = 'hidden'
})

let enteredCardNumbers = 0

document.getElementById("number").addEventListener("input", (e) => {
    const value = e.target.value

    if(enteredCardNumbers > value.length) {
        document.getElementById('card_number').children[15 - (15 - value.length)].classList.remove('filed')
        document.getElementById('card_number').children[value.length].innerHTML = "#<br>"
    }
    else {
        if(value.length > 4 && value.length < 13) {
            document.getElementById('card_number').children[value.length - 1].innerText += "*"
        }else {
            document.getElementById('card_number').children[value.length - 1].innerText += value.slice(-1)
        }

        document.getElementById('card_number').children[value.length - 1].classList.add('filed')
    }

    enteredCardNumbers = value.length

})

document.getElementById("holder").addEventListener("input", (e) => {
    document.getElementById('card_holder').innerText = e.target.value
})

document.getElementById("cvv").addEventListener("input", (e) => {
    document.getElementById('card_cvv_field').innerText = Array(e.target.value.length+1).join("*")
})

document.getElementById("expiration_month").addEventListener("change", (e) => {
    document.getElementById('card_expires_month').innerText = e.target.value
})

document.getElementById("expiration_year").addEventListener("change", (e) => {
    document.getElementById('card_expires_year').innerText = e.target.value.slice(-2)
})

// Obtener el input de CVV
const cvvInput = document.getElementById('cvv');

// Escuchar el evento input para limitar la longitud del valor
cvvInput.addEventListener('input', function(event) {
    // Obtener el valor actual del input
    let cvv = this.value;

    // Limitar la longitud del valor a 4 caracteres
    if (cvv.length > 3) {
        cvv = cvv.slice(0, 3);
        this.value = cvv;
    }
});

const numberInput = document.getElementById('number');

// Escuchar el evento input para limitar la longitud del valor
numberInput.addEventListener('input', function(event) {
    // Obtener el valor actual del input
    let cardNumber = this.value;

    // Limitar la longitud del valor a 19 caracteres
    if (cardNumber.length > 16) {
        cardNumber = cardNumber.slice(0, 16);
        this.value = cardNumber;
    }
});
