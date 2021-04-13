/* 
    The golden lines of code that make Pantry Buddy, Pantry Buddy.
    

*/ 

const expirationDateCells = Array.from(document.getElementsByClassName("expirationDate"));
expirationDateCells.forEach((expirationDateCell) => {
    const cellDate = new Date(expirationDateCell.innerText);
    const currentDate = new Date();
    var daysToExpire = cellDate.getTime() - currentDate.getTime();
    // To check if the days till expiration is under 1 Day, in milliseconds
    if (daysToExpire <= 0) {
        expirationDateCell.classList.add("expired");
    }
    // To check if the days till expiration is under 3 Days, in milliseconds
    else if (daysToExpire <= 259200000) {
        expirationDateCell.classList.add("expiresSoon");
    }
    else {
    }

});


/*
    Using date-fns to get a formatted updating calendar date
    it didn't make sense using time because there isn't a setting
     for that, that Pantry Buddy logs
*/ 


setInterval(() => {
    /* 
    M = Month Numbers 1 2 3 
    d = Day of the Month Numbers 1 2 3 4
    y = Calendar year 2017 2018
    */
    var updatingDate = dateFns.format(new Date(), "M-D-YYYY");
    document.getElementById("clock-text").innerText = updatingDate
  }, 1000);




/*

        =======================================================================

            I genuinely tried to get the regex working by using a video 
            guide, I had all the work done and it still wasn't working,
            that was when I emailed you about the JS. You said we can meet
            in the afternoon to get it fixed, I sent you an email saying I
            would be free in the afternoon and I was never given a timeframe
            to meet at. I then tried to use the class example to just understand
            the code, but i never really had the time to sift through it and
            break it apart piece by piece. My older code went missing through
            winSCP so all I have is the class exaqmple commented out.


        =======================================================================


*/

// //   signUp.php REGEX AKA Form Validation

// const firstname = document.getElementById("firstname");
// const lastname = document.getElementById("lastname");
// const gender = document.getElementById("gender");
// const email = document.getElementById("email");
// const username = document.getElementById("username");
// const password = document.getElementById("password");
// const confirmPassword = document.getElementById("confirmPassword");
// const address = document.getElementById("address");
// const state = document.getElementById("state");
// const country = document.getElementById("country");
// const form = document.getElementById("form");
// const errorElement = document.getElementById("error");



//     // All REGEX cases, similar to the PHP.
//     // syntax is
//     // match = ____PregMatch.test(constant variable pulled from form)
//     // if theres a match, it's true, if it doesn't match it's false


// const emailPregMatch = new RegExp("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/");
// const passwordWhiteSpacePregMatch = new RegExp("/\s/");
// const passwordSpecialCharacterPregMatch = new RegExp("/[\!\@\#\$\%\^\&\*]/");
// const passwordLowercasePregMatch = new RegExp("/[a-z]/");
// const passwordUppercasePregMatch = new RegExp("/[A-Z]/");
// const passwordNumberPregMatch = new RegExp("/[0-9]/");

// /*** DEFINE ALL YOUR FUNCTIONS ***/

// /*
//     checkSize
//     Parameters: e - represents the event that is being passed
//     Return: none
//     Purpose: this function will validate the size of
//     the forms field according to the following rules:
//     Username must be 4 or more characters
//     Password must be 6 or more characters
//     if there is an error, display it
// */
// function checkSize(myEvent)
// {
//     let element = myEvent.target;
//     //console.log("We have selected: " + element.id);
//     // check whether we are dealing with username 
//     if (element.id == "username")
//     {
//         let usernameValue = element.value;
//         let message = "";
//         if(usernameValue.length < 4 )
//         {
//             message = "The username must be 4 or more characters";
//         }
//         else
//         {
//             message = "";
//         }
//         document.getElementById("errorUsername").textContent = message;
//     }
//     // could whether other fields were triggered
// }

// function validateForm(myEvent)
// {
//     myEvent.preventDefault();
// }

// function checkPassword()
// {
//     // another way to retrieve an element, is by using its name!
//     let password = document.getElementById("password");
//     let message = "";
//     let isValid = true;
//     matchPassword();
//     // check whether password has the correct size
//     if (password.value.length < 6)
//     {
//         message += "<p class='errorMessage'>The length of the password needs to be 6 or more</p>";
//         isValid = false;
//     }
//     // check whether the password has an lower case letter
    
//     // check whether password has an upper case letter
    
//     // check wehther there is a digit
    
//     document.getElementById("errorPassword").innerHTML = message; 
//     return isValid;
// }

// function matchPassword()
// {
//     let password = document.getElementById("password");
//     let confirmPassword = document.getElementById("confirmPassword");
//     let message = "";
//     let isValid = true;
//     if (password.value != confirmPassword.value)
//     {
//         message = "The passwords do not match";
//         isValid = false;
//     }
//     document.getElementById("matchPasswords").textContent = message; 
//     return isValid;
// }


// /*** Define the main part of the program ***/

// /* window.onload ensures this code only runs
//    AFTER the entire HTML has loaded in the window */

// window.onload = function()
// {
//     var usernameInput = document.getElementById("username");
//     var passwordInput = document.getElementById("password");
//     var confirmPasswordInput = document.getElementById("confirmPassword");
//     document.getElementById("registerForm").addEventListener("submit", validateForm);
//     usernameInput.addEventListener("keyup", checkSize);
//     passwordInput.addEventListener("keyup", checkPassword);
//     confirmPasswordInput.addEventListener("keyup", matchPassword);
// }