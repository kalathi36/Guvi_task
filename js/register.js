function printError(Id, Msg) {
    document.getElementById(Id).innerHTML = Msg;
}

function validateForm() 

    var name = document.Form.name.value;
    var email = document.Form.email.value;
    var password = document.Form.mobile.value;
    var confirm_password = document.Form.country.value;
    

    var nameErr = emailErr = passwordErr = confirm_passwordERR = true;
    

    if(name == "") {
        printError("nameErr", "Please enter your name");
        var elem = document.getElementById("name");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
            var elem = document.getElementById("name");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
        } else {
            printError("nameErr", "");
            nameErr = false;
            var elem = document.getElementById("name");
            elem.classList.add("input-1");
            elem.classList.remove("input-2");

            
        }
    }
    

    if(email == "") {
        printError("emailErr", "Please enter your email address");
         var elem = document.getElementById("email");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
    } else {
        
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
            var elem = document.getElementById("email");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
        } else{
            printError("emailErr", "");
            emailErr = false;
             var elem = document.getElementById("email");
            elem.classList.add("input-1");
            elem.classList.remove("input-2");

        }
    }
    
    if(password == "") {
        printError("passwordErr", "Please enter your password");
        var elem = document.getElementById("password");
        elem.classList.add("input-2");
        elem.classList.remove("input-1");
    } else {
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/; // password must be at least 8 characters, contain at least one uppercase letter, one lowercase letter, and one number
        if(regex.test(password) === false) {
            printError("passwordErr", "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number");
            var elem = document.getElementById("password");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
            var elem = document.getElementById("password");
            elem.classList.add("input-1");
            elem.classList.remove("input-2");
        }
    }

    if(confirm_password == "") {
        printError("confirm_passwordErr", "Please enter your password again");
        var elem = document.getElementById("confirm_password");
        elem.classList.add("input-2");
        elem.classList.remove("input-1");
    } else {
        if(password !== confirm_password) {
            printError("confirm_passwordErr", "Passwords do not match");
            var elem = document.getElementById("confirm_password");
            elem.classList.add("input-2");
            elem.classList.remove("input-1");
        } else {
            printError("confirm_passwordErr", "");
            confirm_passwordErr = false;
            var elem = document.getElementById("confirm_password");
            elem.classList.add("input-1");
            elem.classList.remove("input-2");
        }

 
    

    if((nameErr || emailErr || passwordErr || confirm_passwordErr ) == true) {
       return false;
    } 
};