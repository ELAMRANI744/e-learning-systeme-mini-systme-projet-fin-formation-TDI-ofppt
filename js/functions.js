//get value of cookie by his name
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

// check if all letters are string words
function allLetters(name)
{
    var letters = /^[A-Za-z]+$/;
    if(name.val().match(letters))
        return true;
    else
        return false;  
}

// check if email is valid
function validEmail(email)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.val().match(mailformat))
        return true;
    else
        return false;
}

// Validate numbers
function validNumber(number)
{
    var numbers = /[0-9]/g;
    if(number.val().match(numbers))
        return true;
    else
        return false;
}

// Validate length
function validLength(element, min, max)
{
    if(element.val().length >= min && element.val().length <= max) 
        return true;
    else 
        return false;   
}

// Validate lowercase letters
function check_lowercaseLetters(element_id)
{
    var lowerCaseLetters = /[a-z]/g;
    if(!(element_id.val().match(lowerCaseLetters)))
        return true;
    else
        return false;
}
    
// Validate uppercase letters
function check_uppercaseLetters(element_id)
{
    var upperCaseLetters = /[A-Z]/g;
    if(!(element_id.val().match(upperCaseLetters)))
        return true;
    else
        return false;
}

// show error_msg
function show_msg(element_id, msg, input_color)
{           
    $("#" + element_id).html(msg);
    $("#" + element_id).show();
    input_color.css("background-color","#f7c4cb");
}
     
// hide error_msg
function hide_msg(element_id, input_color)
{
    $("#" + element_id).hide(); 
    input_color.css("background-color","#fff");
}
