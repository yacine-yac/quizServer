<?php
require "sessionConfig.php";
require "session.php";
require "access.php";
function getQuestions(string $path=__DIR__."/data.json"){
          $read=@file_get_contents($path);
          $read_parsed=json_decode($read,true);
         $output= array_map(function($x){
             unset($x['truth']);
             return $x;
      },$read_parsed);
          return json_encode($output);
} 
$result=getQuestions();
$session=new Session();
$session->setSession();
print_r($result);

?>