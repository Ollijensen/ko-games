
//form validering
function checkform(){
    let formElement = document.querySelector("#checkform");
    let userName = formElement.username; 
    let pass1 = formElement.pass1; 
    let pass2 = formElement.pass2; 
    let email = formElement.email; 
    let a = document.myForm.email.value;

if(userName.value == ""){
    document.getElementById('alertUser').innerHTML ="** PLease fill the username field";
    return false;
}
if(email.value == ""){
    document.getElementById('alertEmail').innerHTML ="** PLease fill the email field";
    return false;
}
if(a.indexOf('@')<=0){
    document.getElementById('alertEmail').innerHTML ="** invalid @ position";
    return false;
}
if((a.charAt(a.length-4)!='.') && (a.charAt(a.length-3)!='.')){
    document.getElementById('alertEmail').innerHTML ="** invalid . position";
return false;
}
   
if(pass1.value.length < 6){
    document.getElementById('alertPass').innerHTML ="** password must be 7 characters og more";
    return false;

}

if(pass1.value !== pass2.value){
    document.getElementById('alertPass').innerHTML ="** passwords must match";
    return false;
    }

    if(pass1 && pass2){
        alert("You are now registered - please logn in");
        
        return true;
        
    }

}

/* Navbar skifter farve ved scroll*/
function checkScroll(){
    var startY = $('.navbar').height() * 0.3; //Punktet hvor navbar skal skifte til mørk baggrund

    if($(window).scrollTop() > startY){
        $('.navbar').addClass("scrolled");
    }else{
        $('.navbar').removeClass("scrolled");
    }
}

if($('.navbar').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}