function giveth()
{
    var theater =document.getElementById("theater").value;
    document.cookie="th_id="+theater
    console.log(document.cookie)
    document.cookie = 'th+id=1; expires=Thu, 01 Jan 1970 00:00:00 GMT';
}

var film=document.getElementById("film").value
document.cookie="film_id="+film+";";
var date=document.getElementById("date").value
document.cookie="date_id"+date+";";
