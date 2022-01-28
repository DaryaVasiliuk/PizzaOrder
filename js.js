
console.log(document.forms);
document.forms.pizza.onsubmit = function (e) {
    console.log(e);
    e.preventDefault();
    let variety = document.forms.pizza.variety.value; //данные из элемента хтмл в форме
    let size = document.forms.pizza.size.value;
    let sauce = document.forms.pizza.sauce.value;
    let data = {variety, size, sauce };

    let formData = new URLSearchParams();
    for(let key in data) {
        formData.append(key, data[key]);
    }
    console.log(formData)

    sendRequest(formData);
}

let sendRequest = function(data){
    let Request = new XMLHttpRequest();
    Request.open("POST", "pizza.php");
    Request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    Request.onreadystatechange = function (){
        if(Request.readyState === 4 && Request.status === 200){
            let div = document.querySelector('div[id=cheque]');
            let response = JSON.parse(Request.responseText);
            console.log(response);
            div.innerHTML = "<ol>Чек: <li><b>Название:</b> "+response.type+"</li><li><b>Размер:</b> "+response.size+"</li><li><b>Соус:</b> "+response.sauce+"</li><li><b>Цена:</b> "+response.price+"</li><li><b>Дата/Время заказа:</b> "+response.created+"</li></ol>";
        }
    }
    Request.send(data);
}