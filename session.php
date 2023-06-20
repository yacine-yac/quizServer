<?php 
session_start();

function generateId(){
    return uniqid();
}

function setSession(){
    $_SESSION['userId']=[generateId(),time()];
}
function checkUser(){
    if(isset($_SESSION["userId"])) {
            if(time()-$_SESSION['userId']<35){
                return [true];
            }else{
                return [false,"you are ovveride the quiz time "];
            }
    } else {
        return [false,"you are not tracked"];
     };
}
function deleteUser(){
      session_destroy();
}

?>