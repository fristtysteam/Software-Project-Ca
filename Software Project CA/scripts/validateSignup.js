/********************************************
 * JavaScript to validate Data Entery
 * befor submitting user data for signup
 ********************************************/

function validateSignUp() {
    //Check if first name is empty
    let fname = document.forms["sign_up_form"]["fname"].value;
    if (fname === ""){
        alert("First name must be filled out");
        return false;
    }
    //Check if last name is empty
    let lname = document.forms["sign_up_form"]["sname"].value;
    if (lname === ""){
        alert("Last name must be filled out");
        return false;
    }
    //Check if email
    let email = document.forms["sign_up_form"]["email"].value;
    if (email === ""){
        alert("Email must be filled out");
        return false;
    }

    //Check if password are the same
    let password1 = document.forms["sign_up_form"]["password1"].value;
    let password2 = document.forms["sign_up_form"]["password2"].value;
    if (password1.lenght >! 2){
        alert("Password must be over 2 characters");
        return false;
    }
    if (password1 !== password2){
        alert("Password Must be the same");
        return false;
    }
}

/*
$(document).ready(function(){
 $("#signup_form").click(function(){

 var pwd1 = $("#password1").val();
 var pwd2 = $("#password2").val();


 var isValid = true;

 // validate the first email address
 if(pwd1 === "" ){
 $("#password1").next().text("This field is required.");
 isValid = false;
 }else{
 $("#password1").next().text("");
 }

 // validate the secondt email address
 if(pwd2 === "" ){
 $("#password2").next().text("This field is required.");
 isValid = false;
 }else if(pwd1 !== pwd2){
 $("#password2").next().text("This entry must equal first entry.");
 isValid = false;
 }else{
 $("#password2").next().text("");
 }

 // validate the first name entry
 if($("#firstName").val() === "" ){
 $("#firstName").next().text("This field is required.");
 isValid = false;
 }else{
 $("#firstName").next().text("");
 }
 // validate the last name entry
 if($("#lastName").val() === "" ){
 $("#lastName").next().text("This field is required.");
 isValid = false;
 }else{
 $("#lastName").next().text("");
 }
 // validate the email entry
 if($("#email").val() === "" ){
 $("#email").next().text("This field is required.");
 isValid = false;
 }else{
 $("#email").next().text("");
 }

 // submit the form if all entr ies are valid
 if(isValid){
 $("#signup_form").submit();
 }
 }); // end click
 $("#firstName").focus();
 }); //end ready


*/