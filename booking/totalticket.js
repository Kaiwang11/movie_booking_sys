let totalticket = 0;

var stuff=document.getElementsByTagName("input") 
function myTicket() {
    var f = document.getElementById("fullTicket").value;
    var s = document.getElementById("saleTicket").value;
    var o = document.getElementById("oldTicket").value;
    totalticket=parseInt(f)+parseInt(s)+parseInt(o);
    console.log(totalticket);
}
console.log(totalticket)
function check(obj,status) {
    if(status==1)
    {
        obj.disabled=true;
        obj.style="background-color:#e4171a";
    } 
}
function change(obj, obj2, price) {
    let popItem = document.getElementById(obj);
    let popIndex = popItem.selectedIndex;
    let popValue = popItem.options[popIndex].value;
    document.getElementById(obj2).innerHTML = price * popValue;
}
function final(obj, obj2, price)
{
    change(obj, obj2, price);
    myTicket();
}
var sum=0;
var temp=totalticket;
var selected=document.querySelectorAll("input[type='checkbox']").forEach((item)=>{
    var pre=item.checked
    item.addEventListener('click', () => {
        if(sum>=totalticket)
        {
            if(item.checked==true)
            {
                item.checked=false;
                //console.log("a :"+sum,pre,item.checked)
            }
            else  
            {
                sum--;
                //console.log("b :"+sum,pre,item.checked)
            }   
        }
        else if(sum<totalticket)
        {
            if(item.checked==true)
            {
                sum=sum-2;
                //item.checked=true;
            }
            sum++;
            temp--;
            console.log("c "+sum,pre,item.checked)
        }
      console.log(item.checked)
    })
});

