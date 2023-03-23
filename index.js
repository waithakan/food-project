let menuBar = document.getElementById('menuBar');
let menu = document.getElementById('menu');

function openMenu(){
    // display menu and remove menu icon
    menuBar.style.display= "none";
    menu.style.display= "block";
}

function closeMenu(){
    // display menu icon and remove menu
    menuBar.style.display= "block";
    menu.style.display= "none";
}
 //password functionality for restaurant form
let password =  document.getElementById('password');
let checker =  document.getElementById('passwordChecker');

//check for upper case letters
let poorRegExp = /[a-z]/;

//check for numbers
let weakRegExp = /(?=.*?[0-9])/;

//check for symbols
let strongRegExp = /(?=.*?[#?!@$%^&*-])/;

//check for spaces
let whitespaceRegExp = /^$|\s+/;

//when password is entered
password.oninput = function(){
    //store value of password in variable
    let passwordValue = password.value;

    //check for upper case letters in password
    let poorPassword= passwordValue.match(poorRegExp);

    //check for numbers in password
    let weakPassword= passwordValue.match(weakRegExp);

    //check for symbols in password
    let strongPassword= passwordValue.match(strongRegExp);

    //check for spaces in password
    let whitespace= passwordValue.match(whitespaceRegExp);

    //if there is a white space
    if(whitespace){
        //show warning
        checker.textContent = "Spaces not allowed";
        checker.style.color = "red";
    }
    // if there is not upper case letter or number or symbol in password and it is shorter than 8 characters and longer than 20
    else if((poorPassword || weakPassword ||strongPassword) && (passwordValue.length < 8 || passwordValue.length > 20)){
        //show warning
        checker.textContent = "8 -20 characters required including uppercase letter, number and symbol";
        checker.style.color = "orange";
    }
    //if there is a symbol and the password is between 8 and 20 characters long
    else if((strongPassword) && (passwordValue.length >= 8 && passwordValue.length <= 20)){
        //confirm the strength of the password
        checker.textContent = "Your password is strong";
        checker.style.color = "green";
    }
}

// show passord or not depending on the user's choice
function showPassword() {
    if (password.type === "password") {
        password.type = "text";
        document.getElementById('showPassword').style.display = "none";
        document.getElementById('hidePassword').style.display = "block";
    }else {
        password.type = "password";
        document.getElementById('showPassword').style.display = "block";
        document.getElementById('hidePassword').style.display = "none";
    }
  }
function changeType(){
    document.getElementById("photo").type = "file";
}

//password functionality for client form
let password1 =  document.getElementById('password1');
let checker1 =  document.getElementById('passwordChecker1');

//check for upper case letters
let poorRegExp1 = /[a-z]/;

//check for numbers
let weakRegExp1 = /(?=.*?[0-9])/;

//check for symbols
let strongRegExp1 = /(?=.*?[#?!@$%^&*-])/;

//check for spaces
let whitespaceRegExp1 = /^$|\s+/;

//when password is entered
password1.oninput = function(){
    //store value of password in variable
    let passwordValue1 = password1.value;

    //check for upper case letters in password
    let poorPassword1 = passwordValue1.match(poorRegExp);

    //check for numbers in password
    let weakPassword1 = passwordValue1.match(weakRegExp);

    //check for symbols in password
    let strongPassword1 = passwordValue1.match(strongRegExp);

    //check for spaces in password
    let whitespace1 = passwordValue1.match(whitespaceRegExp);

    //if there is a white space
    if(whitespace1){
        //show warning
        checker1.textContent = "Spaces not allowed";
        checker1.style.color = "red";
    }
    // if there is not upper case letter or number or symbol in password and it is shorter than 8 characters and longer than 20
    else if((poorPassword1 || weakPassword1 ||strongPassword1) && (passwordValue1.length < 8 || passwordValue1.length > 20)){
        //show warning
        checker1.textContent = "8 -20 characters required including uppercase letter, number and symbol";
        checker1.style.color = "orange";
    }
    //if there is a symbol and the password is between 8 and 20 characters long
    else if((strongPassword1) && (passwordValue1.length >= 8 && passwordValue1.length <= 20)){
        //confirm the strength of the password
        checker1.textContent = "Your password is strong";
        checker1.style.color = "green";
    }
}

// show passord or not depending on the user's choice
function showPassword1() {
    if (password1.type === "password") {
        password1.type = "text";
        document.getElementById('showPassword1').style.display = "none";
        document.getElementById('hidePassword1').style.display = "block";
    }else {
        password.type = "password";
        document.getElementById('showPassword1').style.display = "block";
        document.getElementById('hidePassword1').style.display = "none";
    }
  }
function changeType1(){
    document.getElementById("photo1").type = "file";
}

// get location of user using geolocation api
let locationPin = document.getElementById('locationPin');
locationPin.onclick = navigator.geolocation.getCurrentPosition(position => {
                            const { latitude, longitude } = position.coords;
                            // Show a map centered at latitude / longitude.
                            locationPin.value = latitude +'"S ' + longitude +'"E ' ;
                                                    });
                        
function showForm(){
    // display menu upload form and remove menu
    document.getElementById("uploadMenu").style.display = "block";
    document.getElementById("uploadMenu2").style.display = "block";
    document.getElementById("chefMenu").style.display = "none";
    document.getElementById("chefMenu2").style.display = "none";
}
function showList(){
    // display menu  and remove menu upload form
    document.getElementById("uploadMenu").style.display = "none";
    document.getElementById("uploadMenu2").style.display = "none";
    document.getElementById("chefMenu").style.display = "block";
    document.getElementById("chefMenu2").style.display = "block";
    document.getElementById("chefMenu2").style.marginLeft = "20%";
}
function selectTime(){
    // show input time, location and finsih buttons and remove checkout button
    document.getElementById("time").style.display = "block";
    document.getElementById("finish").style.display = "block";
    document.getElementById("locationPin").style.display = "block";
    document.getElementById("checkout").style.display = "none";
}
//highlight searched word
 function search(e){
    let keyword = document.getElementById('keyword').value.trim();
    if (keyword !== "") {
        let text = document.getElementsByTagName("body").innerHTML;
        let re = new RegExp(keyword,"g"); // search for all instances
        let newText = text.replace(re, `<mark>${keyword}</mark>`);
          document.getElementById("body").innerHTML = newText;
    }
  }
//show client form
function showClientForm(){
    document.getElementById('clientForm').style.display = "block"
    document.getElementById('registrationPrompt').style.display = "none"

}
//show restaurant admin form
function showRestaurantForm(){
    document.getElementById('restaurantForm').style.display = "block"
    document.getElementById('registrationPrompt').style.display = "none"

}


                        