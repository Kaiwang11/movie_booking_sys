let totalticket = 0;
var obj=document.getElementsByTagName("input") 
function myTicket() {
    var f = document.getElementById("fullTicket").value;
    var s = document.getElementById("saleTicket").value;
    var o = document.getElementById("oldTicket").value;
    totalticket=parseInt(f)+parseInt(s)+parseInt(o);
    console.log(totalticket);
}
console.log(totalticket);
function check() { 
    var sun=0; 
        for(var i=0;i<obj.length;i++) { 
            if(obj[i].type=="checkbox" && obj[i].checked) {
                sun++; 
                if( sun< 3 ) 
                { 
                    for(var j=0;j<obj.length;j++) 
                    obj[j].disabled = false;
                } 
            }
            else if(sun == 3 ) { 
                for(var j=0;j<obj.length;j++) { 
                    if ( !obj[j].checked ) 
                    obj[j].disabled = true; 
                } 
                event.srcElement.checked=true; 
                layer.msg("最多选择3个！");
                break; 
            } 
            else if(sun > 3 ) 
            { 
                event.srcElement.checked=false; 
                break; 
            } 
        } 
}
