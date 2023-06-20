<?php 
session_start();

function generateId(){
    return uniqid();
}

function setSession(){
    $_SESSION['userId']=generateId();
}
function checkUser(){
   return   isset($_SESSION["userId"]) ? true : false ;
}
function deleteUser(){
      session_destroy();
}

?>