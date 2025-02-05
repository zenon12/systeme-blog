var icons=document.querySelectorAll("i.icon-password") ;
var check= {} ;
const register=document.forms["register"] ;
const login=document.forms["login"] ;

if(register) {
    var full_name=register["full_name"] ;
    var  adresse=register["adresse"] ;
    var  email=register["email"] ;
    var  confirmPassword=register["confirm_password"] ;
}
// console.log(confirmPassword);
const  username=document.forms[0]["username"] ;
const password=document.forms[0]["password"] ;

// Les fonctions de gestionnaire d'abonnement 

var listernerFunction={
    toggleInputType:(ev)=>{
        var i=ev.target ;
        i.classList.toggle("fa-eye") ;
        var input=i.parentNode.children[1] ;
        if (input && input.type === "password") {
            input.type="text" ;
        }else if (input) {
            input.type="password" ;
        }
    },
    checkfull_name:(ev)=>{
        let input=ev.target ;
        let content=input.value.trim();
        var error="";
        input.style.borderBottom="2px solid green" ;
        const errorfull_name=document.querySelector(".form-error.error-full_name") ;
        errorfull_name.innerHTML='' ;
        if (!content) {
            error="Your full_name must not be empty" ;
        }else if (!(/^[a-z ]{2,20}$/i.test(content))) {
            error="You shouldn't use symbole."
        }
        
        if (error) {
            errorfull_name.innerHTML=error ;
            input.style.borderBottom="2px solid red" ;
            check.full_name=false ;
        }else{
            check.full_name=true ;
        }
        setButton() ;
    },
    checkusername:(ev)=>{
        let input=ev.target ;
        let content=input.value.trim();
        var error="";
        input.style.borderBottom="2px solid green" ;
        const errorusername=document.querySelector(".form-error.error-username") ;
        errorusername.innerHTML='' ;
        if (!content) {
            error="Your username must not be empty" ;
        }else if (!(/^[a-z0-9]{2,20}$/i.test(content))) {
            error="You shouldn't use symboles."
        }
        
        if (error) {
            errorusername.innerHTML=error ;
            input.style.borderBottom="2px solid red" ;
            check.username=false ;
        }else{
            check.username=true ;
        }
        setButton() ;
    },
    checkEmail:(ev)=>{
        let input=ev.target ;
        let content=input.value.trim();
        var error="";
        input.style.borderBottom="2px solid green" ;
        document.querySelector(".form-error.error-email").innerHTML='';
        if (!content) {
            error="Your username must not be empty" ;
        }else if (!(/^[a-z0-9._-]{2,20}@[a-z0-9_-]{2,8}\.[a-z]{2,8}$/.test(content))) {
            error="You shouldn't use symbole or space."
        }
        
        if (error) {
            document.querySelector(".form-error.error-email").innerHTML=error ;
            input.style.borderBottom="2px solid red" ;
            check.email=false ;
        }else{
            check.email=true
        }
        setButton() ;
    },
    checkPassword:(ev)=>{
        let input=ev.target ;
        let content=input.value.trim();
        var regPassword= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/ ;
        var error="";
        input.style.borderBottom="2px solid green" ;
        document.querySelector(".form-error.error-password").innerHTML='';
        if (!content) {
            error="Your password must not be empty" ;
        }else if (!regPassword.test(content)){
            error="Your password must have at least on capitale letter, one special letter, one lowercase letter" ;
        }
        
        if (error) {
            document.querySelector(".form-error.error-password").innerHTML=error ;
            input.style.borderBottom="2px solid red" ;
            check.password=false ;
        }else{
            check.password=true ;
        }
        setButton() ;
    },
    checkConfirmPassword:(ev)=>{
        let input=ev.target ;
        let content=input.value.trim();
        let contentPassword=password.value ;
        var error="";
        input.style.borderBottom="2px solid gray" ;
        document.querySelector(".form-error.error-confirmPassword").innerHTML='';
        console.log("j'arrive pas à comprendre");
        if (!content) {
            error="Your confirm password must not be empty" ;
        }else if (contentPassword !== content){
            error="Your confirm password doesn't match width your entered password" ;
        }
        
        if (error) {
            document.querySelector(".form-error.error-confirmPassword").innerHTML=error ;
            input.style.borderBottom="2px solid red" ;
            check.confirmPassword=false ;
        }else{
            check.confirmPassword=true ;
        }
        setButton() ;
    }
}

//les fonctions de verification de la validité du formulaire
var checkValidityForm=()=>{
    if (register) {
        if (Object.keys(check).length === 5) {
            for (const key in check) {
              if (check[key] === false) {
                 return false ;
              }
            }
            return true ;
        }else{
            return false ; 
        }
    }
    if (login) {
        if (Object.keys(check).length === 2) {
            for (const key in check) {
              if (check[key] === false) {
                 return false ;
              }
            }
            return true ;
        }else{
            return false ; 
        }
    }
}

var setButton=()=>{
    if (checkValidityForm()) {
        document.getElementById("btn-submit").disabled=false ;
        document.getElementById("btn-submit").style.cursor="pointer" ;
    }else{
        document.getElementById("btn-submit").disabled=true ;
        document.getElementById("btn-submit").style.cursor="not-allowed" ;
    }
}

//cette fonction permet de creer des abonnements
var setupListener=()=>{
    icons.forEach(icon => {
        icon.onclick=listernerFunction.toggleInputType ;
    });

    if (register) {
        full_name ? full_name.onkeyup=listernerFunction.checkfull_name : null ;
        email ? email.onkeyup=listernerFunction.checkEmail : null ;
        // adresse ? adresse.onkeyup=listernerFunction.checkAdresse : null ;
        confirmPassword ? confirmPassword.onkeyup=listernerFunction.checkConfirmPassword : null ;
    }
    username ? username.onkeyup=listernerFunction.checkusername : null ;
    password ? password.onkeyup=listernerFunction.checkPassword : null ;
}