function getSession(location) {
    const req =  new XMLHttpRequest();
    req.open("GET", "./pages/login/session-update.php");
    req.send();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(req.responseText === ''){
                window.alert("You must be logged in to use this function!");
            }
            else {
                window.location.href=location;
            }
        }
    }
};

function changePage() {
    // const pos = window.innerHeight * 0.8
    window.scrollTo(100, 0)
}

console.log("hello world")