function check() {
    let pwd1 = document.getElementById("pwd1").value;
    let pwd2 = document.getElementById("pwd2").value;
    if (pwd1 == pwd2) {
        return true;
    } else
        return false;
}