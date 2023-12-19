// Used in browse.php

const submitButton = document.getElementById('browse-submit');
const controlButton = document.getElementById('control-button');
var fields = document.getElementsByClassName('field');


/* Children elements */
let fieldButtons = document.getElementsByClassName("field-button");
let fieldSelects = document.getElementsByClassName("field-select");
let fieldInputs = document.getElementsByClassName("field-input");
let fieldExacts = document.getElementsByClassName("field-exact");

function setInfo(i) { // field button a --> add r --> remove

    let button = fieldButtons[i];
    let select = fieldSelects[i];
    let input = fieldInputs[i];
    let exact = fieldExacts[i];

    button.id = `r-button-${i}`;
    button.setAttribute("class", "field-button field-button-r");
    button.removeEventListener('click', addField);
    button.addEventListener('click', (evt, i) => {
        removeField(evt, i);
    });

    /* Setting form fields for processing later */
    select.id = `field-select-${i}`;
    input.id = input.name = `field-input-${i}`;
    exact.id = exact.name = `field-exact-${i}`;

} // setInfo

function addField() {

    let N = fields.length;
    if (N >= 7) return;

    let newField = fields[N-1].cloneNode(true);
    fields[N-1].parentNode.insertBefore(newField, submitButton);
    setInfo(N, N);
    return;

} // addField


function removeField(evt, i) {
    evt.target.parentNode.parentNode.removeChild(evt.target.parentNode);
    for (let j = 0; j < fields.length - i; j++) {
        setInfo()
    }
}

controlButton.addEventListener('click', addField);