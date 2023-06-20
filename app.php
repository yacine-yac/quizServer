<?php
require 'session.php';
require "access.php";
require "Result.php";
$data=file_get_contents('php://input');
$received_data=json_decode($data,true);


$session=new Session();
$checked=$session->checkUser();
if($checked[0]){ 
     if($received_data==null){
        print_r(json_encode([
            "global"=>"you did't send any answers!",
            "information"=>""
        ]));
     }else{
        $app=new Result($received_data);
        $resulted=$app->getResponse();
        $session->deleteUser();
        print_r($resulted);
     }
       
}else{ 
    print_r(json_encode([
            "global"=>$checked[1],
            "information"=> time()
    ]));
}


?>