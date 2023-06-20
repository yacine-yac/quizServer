<?php 
session_start();

class Session{
   
    private function generateId(){
        return  uniqid();
    }

    public function setSession(){
        $_SESSION['userId']=[$this->generateId(),time()];
    }
    public function checkUser(){
        if(isset($_SESSION["userId"])) {
                if(time()-$_SESSION['userId'][1]<35){
                    return [true];
                }else{
                    return [false,"you are ovveride the quiz time "];
                }
        } else {
            return [false,"you are not tracked"];
        };
    }
    public function deleteUser(){
        session_destroy();
    }
}


?>