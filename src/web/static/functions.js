// Damian Strojek 184407 2021 WAI 
// Funkcja do wyświetlania zrealizowanych zamówień (local storage)
function orders(){
    var div = document.getElementById("completed_orders");
    div.innerHTML = "How many orders have been realized on our webpage - " + localStorage.click_count;
}

// Zliczanie zrealizowanych zamówień na stronie internetowej (local storage)
function numberOf_orders(){
    if(localStorage.click_count){
        localStorage.click_count = Number(localStorage.click_count) + 1;
    } else{
        localStorage.click_count = 1;
    }
    var div = document.getElementById("completed_orders");
    div.innerHTML = "How many orders have been realized on our webpage - " + localStorage.click_count;
}

// Funkcja, która zapisuje text z wcześniej wstawionej text area (session storage)
function text_area(){
    const form = document.querySelector("#form");
    const textarea = document.querySelector("#textarea");
    if(sessionStorage.getItem("textareaValue") !== null){
        textarea.value = sessionStorage.getItem("textareaValue");
    }

    textarea.addEventListener("input", e=> {
        sessionStorage.setItem("textareaValue", textarea.value);
    });
    form.addEventListener("submit", e => {
        sessionStorage.removeItem("textareaValue");
    });
}

// Po kliknięciu potwierdzenia rodzaju biletów zmienia się tło oraz guziki
function button_confirmed(){
    const button = document.querySelector("#numberOfTickets");
    button.addEventListener("click", e => {
        button.style.backgroundColor = "#3b91d8";
        button.style.borderRadius = "4rem";
        button.style.color = "#FFFFFF";
        button.value = "Confirmed"
        document.getElementById("fieldset").style.backgroundColor = '#c41a1ada';
    });
}

// Po resecie trzeba wrócić do poprzedniej wersji formularza
function button_reset(){
    var button_reset = document.querySelector("#reset");
    var button = document.querySelector("#numberOfTickets");
    button_reset.addEventListener("click", e => {
        button.style.backgroundColor = "#0b3455";
        button.style.borderRadius = "5rem";
        button.value = "Confirm selection";
        document.getElementById("fieldset").style.backgroundColor = '#830f0fda';
        var parent = document.getElementById("textareaForNumberOfTickets");
        while(parent.firstChild){
            parent.removeChild(parent.firstChild);
        }
    });
}

// Funkcja do wyświetlenia pola tekstowego z podpisem
function numberOf_tickets(){
    if(document.getElementById("1day").checked !== true && document.getElementById("2day").checked !== true && 
    document.getElementById("3day").checked !== true && document.getElementById("pass").checked !== true){
        alert("Please choose one of the tickets from the options.");
    }
    else{
        var quantity = document.createElement("textarea");
        var text = document.createElement("label");
        const lineBreak = document.createElement("br");
        if(document.getElementById("1day").checked == true){
            text.innerHTML = "How many 1 day tickets do you want?";
        }
        else if(document.getElementById("2day").checked == true){
            text.innerHTML = "How many 2 day tickets do you want?";
        }
        else if(document.getElementById("3day").checked == true){
            text.innerHTML = "How many 3 day tickets do you want?";
        }
        else{
            text.innerHTML = "How many tickets for the whole tournament do you want?";
        }
        quantity.innerHTML = "Insert the number";
        document.getElementById("textareaForNumberOfTickets").style.width = "60%";
        document.getElementById("textareaForNumberOfTickets").style.margin = "auto";
        document.getElementById("textareaForNumberOfTickets").appendChild(text);
        document.getElementById("textareaForNumberOfTickets").appendChild(lineBreak);
        document.getElementById("textareaForNumberOfTickets").appendChild(quantity);
    }
}

// Funkcja do zmiany oświetlenia strony od zamówień
function changeLight(){
    var button = document.getElementById("buttonLight");
    var navColor = document.getElementById("navColor");
    var buttonColor = document.getElementsByClassName("login");
    var fieldset = document.getElementById("fieldset");
    var footer = document.getElementById("footer");
    var i;
    if(button.innerHTML === "Dark"){
        button.innerHTML = "Light";
        document.body.style.backgroundColor = '#0a111b';
        navColor.style.backgroundColor = "#222222";
        for(i = 0; i < buttonColor.length; i++){
            buttonColor[i].style.backgroundColor = "#640d0a";
            buttonColor[i].style.color = "#ffcccc";
        }
        fieldset.style.backgroundColor = "#830f0fda";
        footer.style.backgroundColor = "#ffffff";
    }
    else{
        button.innerHTML = "Dark";
        document.body.style.backgroundColor = '#1f3553';
        navColor.style.backgroundColor = "#4d4d4d";
        for(i = 0; i < buttonColor.length; i++){
            buttonColor[i].style.backgroundColor = "#8d4d4b";
            buttonColor[i].style.color = "#ffffff";
        }
        fieldset.style.backgroundColor = "#8d4d4b";
        footer.style.backgroundColor = "#3bacee";
    }
}