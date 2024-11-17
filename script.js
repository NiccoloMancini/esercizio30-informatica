function showDiv(){
    document.getElementById('divPiùBiglietti').classList.remove('d-none');
    document.getElementById('divPiùBiglietti').classList.add('d-block');
}

function hideDiv(){
    document.getElementById('divPiùBiglietti').classList.remove('d-block');
    document.getElementById('divPiùBiglietti').classList.add('d-none');
}

function addPeople(){
    if(document.getElementById('personNumber').value != "4"){
        document.getElementById('personNumber').value = parseInt(document.getElementById('personNumber').value) + 1;
        addCF();
    }
}

function removePeople(){
    if(document.getElementById('personNumber').value != "1"){
        document.getElementById('personNumber').value = parseInt(document.getElementById('personNumber').value) - 1;
        addCF();
    }
}

function addCF(){
    let div = document.getElementById('aggiungiCF');
    let n = parseInt(document.getElementById('personNumber').value);
    div.innerHTML = " ";
    for(let i = 1; i <=n; i++){
        let labelCF = document.createElement('label');
        labelCF.innerHTML = 'codice fiscale'
        let inputCF = document.createElement('input');
        inputCF.setAttribute('type', 'text');
        inputCF.setAttribute('name', 'cf' + i);
        inputCF.setAttribute('maxlength', '16');
        inputCF.setAttribute("placeholder", "XXXXXX99X99X999X");
        inputCF.classList.add("my-2");
        div.appendChild(labelCF);
        div.appendChild(inputCF);
        div.appendChild(document.createElement('br'));
    }   
}