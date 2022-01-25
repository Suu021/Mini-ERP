function check() {
    var passwd = document.getElementById("password").value;
    var passwd2 = document.getElementById("password2").value;

    if (passwd === passwd2) {
        document.getElementById('message').innerHTML = " match!";
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById('message').innerHTML = " no match!";
        document.getElementById("submit").disabled = true;
    }
}