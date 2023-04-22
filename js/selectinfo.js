/*let fticket = document.getElementById("fullTicket").value;
let sticket = document.getElementById("saleTicket").value;
let oticket = document.getElementById("oldTicket").value;*/
function change(obj, obj2, price) {
    let popItem = document.getElementById(obj);
    let popIndex = popItem.selectedIndex;
    let popValue = popItem.options[popIndex].value;
    document.getElementById(obj2).innerHTML = price * popValue;
}
/*

let ginarod = document.getElementById("ginarod");
let beffroll = document.getElementById("beffroll");



document.getElementById("ginarod-price").innerHTML = 85 * ginarod;
document.getElementById("beffroll-price").innerHTML = 109 * beffroll;*/