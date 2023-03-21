function delCookie(){
    document.cookie.split(";").forEach(function(c){
        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
    }); 
}

function getCookie(cName){
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie);
    const cArr = cDecoded.split('; ');
    let res;
    cArr.forEach(val => {
      if (val.indexOf(name) === 0) res = val.substring(name.length);
    })

    if(res !== undefined){
        console.log(cName + " available.");
    }
    if(res === undefined){
        console.log(cName + " unavailable.");
        alert("Session timeout. Please signin again.");
        window.location.href = "./login.php";
        delCookie();
        exit();
    }
}

if (localStorage.getItem("userid") === null){
    console.log("User ID does not exist.");
    // alert("Session timeout. Please signin again.");
    window.location.href = "./login.php";
}
else if (localStorage.getItem("email") === null){
    console.log("Email does not exist.");
    // alert("Session timeout. Please signin again.");
    window.location.href = "./login.php";
}
else if (localStorage.getItem("pass") === null){
    console.log("Password does not exist.");
    // alert("Session timeout. Please signin again.");
    window.location.href = "./login.php";
}

if (localStorage.getItem("userid") !== null){
    console.log("User ID exists in LocalStorage.");
    getCookie("userid");
}
if (localStorage.getItem("email") !== null){
    console.log("Email exists in LocalStorage.");
    getCookie("email");
}
if (localStorage.getItem("pass") !== null){
    console.log("Password exists in LocalStorage.");
    getCookie("pass");
}
